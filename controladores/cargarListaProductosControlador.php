<?php
	if($peticionAjax){
		require_once "../modelos/cargarListaProductosModelo.php";
	}else{
		require_once "./modelos/cargarListaProductosModelo.php";
	}

	class cargarListaProductosControlador extends cargarListaProductosModelo
	{

		public function cargar_lista_productos($productos)
		{
			$listaProductos=array();
			foreach ($productos as $producto) {
				$infoProducto = cargarListaProductosModelo::obtener_info_producto_modelo($producto);
				if ($infoProducto->rowCount()>0)
				{
					$infoProducto = $infoProducto->fetch();
					array_push($listaProductos, $infoProducto);
				}
			}
			return $listaProductos;
		}

	}