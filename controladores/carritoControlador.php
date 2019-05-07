<?php
	if($peticionAjax){
		require_once "../modelos/carritoModelo.php";
	}else{
		require_once "./modelos/carritoModelo.php";
	}

	class carritoControlador extends carritoModelo
	{

        public function agregar_al_carrito()
        {
            $respuesta = "";
            $tipo_usuario=mainModel::limpiar_cadena($_POST['tipo_usuario']);
            $id_usuario=mainModel::limpiar_cadena($_POST['id_usuario']);
            $producto=mainModel::limpiar_cadena($_POST['producto']);

            if ($tipo_usuario=="personal")
            {
                $cantidad = carritoModelo::verificar_producto_carrito_personal($id_usuario, $producto);
                if ($cantidad->rowCount()>0)
                {
                    $cantidad = $cantidad->fetch();
                    $cantidad = $cantidad['cantidad'] + 1;
                    if (carritoModelo::actualizar_producto_carrito_personal($id_usuario, $producto, $cantidad)->rowCount()>0)
                    {
                        $respuesta = "<script>alert('¡Producto añadido a tu carrito de compras!');</script>";
                    }
                    else 
                    {
                        $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                    }
                }
                else
                {
                    if (carritoModelo::agregar_producto_carrito_personal($id_usuario, $producto)->rowCount()>0)
                    {
                        $respuesta = "<script>alert('¡Producto añadido a tu carrito de compras!');</script>";
                    }
                    else 
                    {
                        $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                    }
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                $cantidad = carritoModelo::verificar_producto_carrito_empresarial($id_usuario, $producto);
                if ($cantidad->rowCount()>0)
                {
                    $cantidad = $cantidad->fetch();
                    $cantidad = $cantidad['cantidad'] + 1;
                    if (carritoModelo::actualizar_producto_carrito_empresarial($id_usuario, $producto, $cantidad)->rowCount()>0)
                    {
                        $respuesta = "<script>alert('¡Producto añadido a tu carrito de compras!');</script>";
                    }
                    else 
                    {
                        $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                    }
                }
                else
                {
                    if (carritoModelo::agregar_producto_carrito_empresarial($id_usuario, $producto)->rowCount()>0)
                    {
                        $respuesta = "<script>alert('¡Producto añadido a tu carrito de compras!');</script>";
                    }
                    else 
                    {
                        $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                    }
                }
            }
            elseif ($tipo_usuario=="invitado")
            {
                if (isset($_COOKIE['user_carrito']))
                {
                    $coincidencia = false;
                    $carrito = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                    for ($i=0; $i < count($carrito); $i++)
                    { 
                        if ($carrito[$i]['Producto'] == $producto)
                        {
                            $carrito[$i]['Cantidad'] = $carrito[$i]['Cantidad'] + 1;
                            $coincidencia = true;
                        }
                    }
                    if ($coincidencia == false)
                    {
                        $datosCarrito=[
                            "Producto" => $producto,
                            "Cantidad" => 1
                        ];
                        array_push($carrito, $datosCarrito);
                    }
                    setcookie('user_carrito',serialize($carrito),time()+2629750,'/');
                    $respuesta = "<script>alert('¡Producto añadido a tu carrito de compras!');</script>";
                }
                else
                {
                    $carrito = array();
                    $datosCarrito=[
                        "Producto" => $producto,
                        "Cantidad" => 1 
                    ];
                    array_push($carrito, $datosCarrito);
                    setcookie('user_carrito',serialize($carrito),time()+2629750,'/');
                    $respuesta = "<script>alert('¡Producto añadido a tu carrito de compras!');</script>";
                }
            }
            else
            {
                $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
            }

            return $respuesta;
        }
        
    }