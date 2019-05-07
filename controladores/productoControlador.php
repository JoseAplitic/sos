<?php
	if($peticionAjax){
		require_once "../modelos/productoModelo.php";
	}else{
		require_once "./modelos/productoModelo.php";
	}

	class productoControlador extends productoModelo
	{

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
			$relaciones = productoModelo::obtener_relaciones_modelo($sku);
			foreach ($relaciones as $relacion)
			{
				$relacionInfo = productoModelo::obtener_info_relacion_modelo($relacion['id_taxonomia']);
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
			$imagenesGaleria = productoModelo::obtener_galeria_modelo($sku);
			foreach ($imagenesGaleria as $imagen)
			{
				$infoImagen = productoModelo::obtener_info_medio_modelo($imagen['medio']);
				if ($infoImagen->rowCount()>0)
				{
					$infoImagen = $infoImagen->fetch();
					$lista .= '<img src="'.$infoImagen['url'].'" class="show-small-img" alt="'.$infoImagen['titulo'].'">';
				}
			}
			return $lista;
		}

		public function obtener_jerarquia_categoria($id)
		{
			$lista = "";
			$categoria = $id;
			$continuar = true;
			while ($continuar == true)
			{
				$infoCategoria = productoModelo::obtener_info_relacion_modelo($categoria);
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
		
		public function obtener_regla_precio($categoria, $tipo)
		{
			$regla = 0;
			$tipoUsuario = "regla_visitantes";

			if ($tipo == "invitado"){$tipoUsuario = "regla_visitantes";}
			elseif ($tipo == "personal"){$tipoUsuario = "regla_usuarios";}
			elseif ($tipo == "empresarial") {$tipoUsuario = "regla_empresas";}
			else {$tipoUsuario = "regla_visitantes";}

			$datosRegla = productoModelo::obtener_regla_modelo($categoria, $tipoUsuario);
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

			$descuentoProductoSku = productoModelo::verificar_descuento_modelo($sku, "producto");
			if ($descuentoProductoSku->rowCount()>0)
			{
				$datosDescuento = $descuentoProductoSku->fetchAll();
				foreach ($datosDescuento as $descuento)
				{
					$infoDescuento = productoModelo::obtener_info_descuento_modelo($descuento['id_descuento'], $tipoUsuario);
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
				$descuentoProductoRelacion = productoModelo::verificar_descuento_modelo($relacion['id'], $relacion['taxonomia']);
				if ($descuentoProductoRelacion->rowCount()>0)
				{
					$datosDescuento = $descuentoProductoRelacion->fetchAll();
					foreach ($datosDescuento as $descuento)
					{
						$infoDescuento = productoModelo::obtener_info_descuento_modelo($descuento['id_descuento'], $tipoUsuario);
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

	}