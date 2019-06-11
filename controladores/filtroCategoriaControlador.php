<?php
	if($peticionAjax){
		require_once "../modelos/filtroCategoriaModelo.php";
	}else{
		require_once "./modelos/filtroCategoriaModelo.php";
	}

	class filtroCategoriaControlador extends filtroCategoriaModelo
	{

		public function obtener_jerarquia_categoria($id)
		{
			$lista = "";
			$categoria = $id;
			$continuar = true;
			while ($continuar == true)
			{
				$infoCategoria = filtroCategoriaModelo::obtener_info_relacion_modelo($categoria);
				if ($infoCategoria->rowCount()>0)
				{
					$infoCategoria = $infoCategoria->fetch();
					$lista = '<li><a href="'.SERVERURL.'categorias/'.$infoCategoria['slug'].'/">'.$infoCategoria['nombre'].'</a></li>'.$lista;
					$continuar = false;
					if ($infoCategoria['padre']>0)
					{
						$categoria = $infoCategoria['padre'];
						$continuar = true;
					}
				}
			}
			return $lista;
		}

		public function obtener_todos_los_productos_controlador($categoria)
		{
			$productos = array();
			$subcategorias = array();
			$marcas = array();

			$productosPorRelacion = filtroCategoriaModelo::obtener_productos_por_categoria_modelo($categoria);
			if($productosPorRelacion->rowCount()>0)
			{
				$productos = array_merge($productos, $productosPorRelacion->fetchAll());
			}

			$obtenerSubcategorias = filtroCategoriaModelo::obtener_subcategorias_categoria_modelo($categoria);
			if($obtenerSubcategorias->rowCount()>0)
			{
				$subcategorias = array_merge($subcategorias, $obtenerSubcategorias->fetchAll());
			}

			$todo_recorrido = false;
			while ($todo_recorrido == false)
			{
				$encontrados = 0;
				foreach ($subcategorias as $subcat)
				{
					$obtenerSubcategorias = filtroCategoriaModelo::obtener_subcategorias_categoria_modelo($subcat["id"]);
					if($obtenerSubcategorias->rowCount()>0)
					{
						$subcategorias = array_merge($subcategorias, $obtenerSubcategorias->fetchAll());
						$encontrados++;
					}
				}
				if($encontrados==0)
				{
					$todo_recorrido = true;
				}
			}

			foreach ($subcategorias as $subCat)
			{
				$productosPorSubcategoria = filtroCategoriaModelo::obtener_productos_por_categoria_modelo($subCat["id"]);
				if($productosPorSubcategoria->rowCount()>0)
				{
					$productos = array_merge($productos, $productosPorSubcategoria->fetchAll());
				}
			}

			$relacionesProducto = filtroCategoriaModelo::obtener_productos_relaciones_modelo($productos);
			if($relacionesProducto->rowCount()>0)
			{
				$relaciones = $relacionesProducto->fetchAll();
				$obtenerMarcas = filtroCategoriaModelo::obtener_marcas_de_relaciones_modelo($relaciones);
				if($obtenerMarcas->rowCount()>0)
				{
					$marcas = $obtenerMarcas->fetchAll();
				}
			}

			$retornar = [
				"Productos"=>$productos,
				"Marcas"=>$marcas
			];

			return $retornar;
		}

		public function obtener_info_producto($slug)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM productos WHERE slug=:Slug");
			$sql->bindParam(":Slug",$slug);
			$sql->execute();
			return $sql;
		}

		public function obtener_relaciones_producto($sku)
		{
			$relacionesProducto = array();
			$relaciones = filtroCategoriaModelo::obtener_relaciones_modelo($sku);
			foreach ($relaciones as $relacion)
			{
				$relacionInfo = filtroCategoriaModelo::obtener_info_relacion_modelo($relacion['id_taxonomia']);
				if ($relacionInfo->rowCount() > 0)
				{
					$relacionInfo = $relacionInfo->fetch();
					array_push($relacionesProducto, $relacionInfo);
				}
			}
			return $relacionesProducto;
		}

		public function obtener_info_medio($id)
        {
            $sql=mainModel::conectar()->prepare("SELECT titulo, url FROM medios WHERE id = :Id;");
            $sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}

		public function obtener_galeria_producto($sku)
		{
			$lista = "";
			$imagenesGaleria = filtroCategoriaModelo::obtener_galeria_modelo($sku);
			foreach ($imagenesGaleria as $imagen)
			{
				$infoImagen = filtroCategoriaModelo::obtener_info_medio_modelo($imagen['medio']);
				if ($infoImagen->rowCount()>0)
				{
					$infoImagen = $infoImagen->fetch();
					$lista .= '<img src="'.$infoImagen['url'].'" class="show-small-img" alt="'.$infoImagen['titulo'].'">';
				}
			}
			return $lista;
		}
		
		public function obtener_regla_precio($categoria, $tipo)
		{
			$regla = 0;
			$tipoUsuario = "regla_visitantes";

			if ($tipo == "invitado"){$tipoUsuario = "regla_visitantes";}
			elseif ($tipo == "personal"){$tipoUsuario = "regla_usuarios";}
			elseif ($tipo == "empresarial") {$tipoUsuario = "regla_empresas";}
			else {$tipoUsuario = "regla_visitantes";}

			$datosRegla = filtroCategoriaModelo::obtener_regla_modelo($categoria, $tipoUsuario);
			if ($datosRegla->rowCount()>0)
			{
				$datosRegla = $datosRegla->fetch();
				$regla = $datosRegla[$tipoUsuario];
			}
			return $regla;
		}
		
		public function obtener_descuentos_producto($sku, $relaciones, $precio, $tipo)
		{
			$descuentos = array();

			$tipoUsuario = "regla_visitantes";
			if ($tipo == "invitado"){$tipoUsuario = "regla_visitantes";}
			elseif ($tipo == "personal"){$tipoUsuario = "regla_usuarios";}
			elseif ($tipo == "empresarial") {$tipoUsuario = "regla_empresas";}
			else {$tipoUsuario = "regla_visitantes";}

			$descuentoProductoSku = filtroCategoriaModelo::verificar_descuento_modelo($sku, "producto");
			if ($descuentoProductoSku->rowCount()>0)
			{
				$datosDescuento = $descuentoProductoSku->fetchAll();
				foreach ($datosDescuento as $descuento)
				{
					$infoDescuento = filtroCategoriaModelo::obtener_info_descuento_modelo($descuento['id_descuento'], $tipoUsuario);
					if ($infoDescuento->rowCount()>0)
					{
						$infoDescuento = $infoDescuento->fetch();
						$hoy = date("Y-m-d");
						if ($hoy>=$infoDescuento[2] && $hoy<=$infoDescuento[3])
						{
							$precioFinal = $precio;
							if($infoDescuento[0]=="porcentaje")
							{
								$precioFinal = $precio - (($precio * $infoDescuento[1])/100);
							}
							elseif($infoDescuento[0]=="fijo")
							{
								$precioFinal = $precio - $infoDescuento[1];
							}
							else
							{
								$precioFinal = $precio;
							}
							$descuentosInsertar = [
								"tipo" => $infoDescuento[0],
								"regla" => $infoDescuento[1],
								"inicio" => $infoDescuento[2],
								"vencimiento" => $infoDescuento[3],
								"precio_final" => $precioFinal
							];
							array_push($descuentos, $descuentosInsertar);
						}
					}
				}
			}

			foreach ($relaciones as $relacion)
			{
				$descuentoProductoRelacion = filtroCategoriaModelo::verificar_descuento_modelo($relacion['id'], $relacion['taxonomia']);
				if ($descuentoProductoRelacion->rowCount()>0)
				{
					$datosDescuento = $descuentoProductoRelacion->fetchAll();
					foreach ($datosDescuento as $descuento)
					{
						$infoDescuento = filtroCategoriaModelo::obtener_info_descuento_modelo($descuento['id_descuento'], $tipoUsuario);
						if ($infoDescuento->rowCount()>0)
						{
							$infoDescuento = $infoDescuento->fetch();
							$hoy = date("Y-m-d");
							if ($hoy>=$infoDescuento[2] && $hoy<=$infoDescuento[3])
							{
								$precioFinal = $precio;
								if($infoDescuento[0]=="porcentaje")
								{
									$precioFinal = $precio - (($precio * $infoDescuento[1])/100);
								}
								elseif($infoDescuento[0]=="fijo")
								{
									$precioFinal = $precio - $infoDescuento[1];
								}
								else
								{
									$precioFinal = $precio;
								}
								$descuentosInsertar = [
									"tipo" => $infoDescuento[0],
									"regla" => $infoDescuento[1],
									"inicio" => $infoDescuento[2],
									"vencimiento" => $infoDescuento[3],
									"precio_final" => $precioFinal
								];
								array_push($descuentos, $descuentosInsertar);
							}
						}
					}
				}
			}

			$start = true;
			$descuentoSeleccionado = array();

			foreach ($descuentos as $descuento)
			{
				if ($start == true)
				{
					$descuentoSeleccionado = $descuento;
					$start = false;
				}

				if ($descuento['precio_final']<$descuentoSeleccionado['precio_final'])
				{
					$descuentoSeleccionado = $descuento;
				}
			}

			return $descuentoSeleccionado;
		}
		
		public function obtener_relacionados_producto($sku, $relaciones)
		{
			$listaRelacionados = array();
			$relacionados = array();
			foreach ($relaciones as $relacion)
			{
				$coincidencias = filtroCategoriaModelo::obtener_relacionados_modelo($sku, $relacion['id']);
				if($coincidencias->rowCount()>0)
				{
					$coincidencias = $coincidencias->fetchAll();
					foreach ($coincidencias as $coincidencia)
					{
						$encontrado = false;
						for ($relacionado=0; $relacionado < count($relacionados); $relacionado++)
						{
							if ($relacionados[$relacionado]['Sku']==$coincidencia['sku'])
							{
								$relacionados[$relacionado]['Cantidad'] = $relacionados[$relacionado]['Cantidad'] + 1;
								$encontrado = true;
							}
						}
						if ($encontrado == false)
						{
							$agregarCoincidencia = [
								"Sku" => $coincidencia['sku'],
								"Cantidad" => 1
							];
							array_push($relacionados, $agregarCoincidencia);
						}
					}
				}
			}

			for ($orden=0; $orden < count($relacionados); $orden++)
			{ 
				for ($orden2=0; $orden2 < count($relacionados)-$orden-1; $orden2++)
				{ 
					if ($relacionados[$orden2]['Cantidad']<$relacionados[$orden2+1]['Cantidad'])
					{
						$skuTemp = $relacionados[$orden2+1]['Sku'];
						$cantidadTemp = $relacionados[$orden2+1]['Cantidad'];

						$relacionados[$orden2+1]['Sku'] = $relacionados[$orden2]['Sku'];
						$relacionados[$orden2+1]['Cantidad'] = $relacionados[$orden2]['Cantidad'];

						$relacionados[$orden2]['Sku'] = $skuTemp;
						$relacionados[$orden2]['Cantidad'] = $cantidadTemp;
					}
				}
			}
			
			foreach ($relacionados as $key => $value)
			{
				if ($key<15)
				{
					array_push($listaRelacionados, $value['Sku']);
				}
			}

			return $listaRelacionados;
		}

	}