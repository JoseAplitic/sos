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

		public function obtener_precio_producto($producto, $tipo, $precio)
		{
			$descuentoSeleccionado = array();
			$precioProducto = $precio;
			$descuento = 0;
			$regla = 0;

			$tipoUsuario = "regla_visitantes";
			if ($tipo == "invitado"){$tipoUsuario = "regla_visitantes";}
			elseif ($tipo == "personal"){$tipoUsuario = "regla_usuarios";}
			elseif ($tipo == "empresarial") {$tipoUsuario = "regla_empresas";}
			else {$tipoUsuario = "regla_visitantes";}

			$categoria = cargarListaProductosModelo::obtener_categoria_modelo($producto);
			if ($categoria->rowCount()>0)
			{
				$categoria = $categoria->fetch();
				$reglaProducto = cargarListaProductosModelo::obtener_regla_modelo($categoria['id_taxonomia'], $tipoUsuario);
				if ($reglaProducto->rowCount()>0)
				{
					$reglaProducto = $reglaProducto->fetch();
					$regla = $reglaProducto[$tipoUsuario];
				}

				$descuentos = array();

				$descuentoProductoSku = cargarListaProductosModelo::verificar_descuento_modelo($producto, "producto");
				if ($descuentoProductoSku->rowCount()>0)
				{
					$datosDescuento = $descuentoProductoSku->fetchAll();
					foreach ($datosDescuento as $descuento)
					{
						$infoDescuento = cargarListaProductosModelo::obtener_info_descuento_modelo($descuento['id_descuento'], $tipoUsuario);
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

				$relaciones = cargarListaProductosModelo::obtener_relaciones_modelo($producto);
				if ($relaciones->rowCount()>0)
				{
					$relaciones = $relaciones->fetchAll();
					foreach ($relaciones as $relacion)
					{
						$infoRelacion = cargarListaProductosModelo::obtener_info_relacion_modelo($relacion['id_taxonomia']);
						if ($infoRelacion->rowCount()>0)
						{
							$infoRelacion = $infoRelacion->fetch();
							$descuentoProductoRelacion = cargarListaProductosModelo::verificar_descuento_modelo($relacion['id_taxonomia'], $infoRelacion['taxonomia']);
							if ($descuentoProductoRelacion->rowCount()>0)
							{
								$datosDescuento = $descuentoProductoRelacion->fetchAll();
								foreach ($datosDescuento as $descuento)
								{
									$infoDescuento = cargarListaProductosModelo::obtener_info_descuento_modelo($descuento['id_descuento'], $tipoUsuario);
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
					}
				}

				$start = true;

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
			}

			if (count($descuentoSeleccionado)>0)
			{
				$precioProducto = $descuentoSeleccionado['precio_final'];
			}
			$precioProducto = ($regla * $precioProducto) + $precioProducto;
			$precioProducto = number_format($precioProducto,2);

			return $precioProducto;
		}

	}