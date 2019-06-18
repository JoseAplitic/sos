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

		public function obtener_productos_filtro_marca_controlador($marca, $productos)
		{
			$productosVerificados = array();

			foreach ($productos as $producto)
			{
				$verificarMarcaRelacion = filtroCategoriaModelo::verificar_relacion_marca_modelo($marca, $producto["sku"]);
				if($verificarMarcaRelacion->rowCount()>0)
				{
					$verificado = $verificarMarcaRelacion->fetchAll();
					$productosVerificados = array_merge($productosVerificados, $verificado);
				}
			}

			$retornar = [
				"Productos"=>$productosVerificados,
				"Marcas"=>$marca
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

	}