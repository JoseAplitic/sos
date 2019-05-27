<?php
	if($peticionAjax){
		require_once "../modelos/accionesCarritoModelo.php";
	}else{
		require_once "./modelos/accionesCarritoModelo.php";
	}

	class accionesCarritoControlador extends accionesCarritoModelo
	{

        public function actualizar_carrito()
        {
            $respuesta = "";
            $tipo_usuario=mainModel::limpiar_cadena($_POST['tipo_usuario']);
            $id_usuario=mainModel::limpiar_cadena($_POST['id_usuario']);
            $id_usuario=mainModel::decryption($id_usuario);
            $producto=mainModel::limpiar_cadena($_POST['producto']);
            $cantidad=mainModel::limpiar_cadena($_POST['cantidad']);

            if ($tipo_usuario=="personal")
            {
                if (accionesCarritoModelo::actualizar_carrito_personal($id_usuario, $producto, $cantidad)->rowCount()>0)
                {
                    $respuesta = '<script>location.reload();</script>';
                }
                else 
                {
                    $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                if (accionesCarritoModelo::actualizar_carrito_empresarial($id_usuario, $producto, $cantidad)->rowCount()>0)
                {
                    $respuesta = '<script>location.reload();</script>';
                }
                else 
                {
                    $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                }
            }
            elseif ($tipo_usuario=="invitado")
            {
                if (isset($_COOKIE['user_carrito']))
                {
                    $carrito = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                    foreach ($carrito as $key => $item)
                    {
                        if($item['Producto'] == $producto)
                        {
                            $carrito[$key]['Cantidad'] = $cantidad;
                        }
                    }
                    setcookie('user_carrito',serialize($carrito),time()+2629750,'/');
                    $respuesta = "<script>location.reload();</script>";
                }
                else
                {
                    $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                }
            }
            else
            {
                $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
            }

            return $respuesta;
        }

        public function borrar_carrito()
        {
            $respuesta = "";
            $tipo_usuario=mainModel::limpiar_cadena($_POST['tipo_usuario']);
            $id_usuario=mainModel::limpiar_cadena($_POST['id_usuario']);
            $id_usuario=mainModel::decryption($id_usuario);
            $producto=mainModel::limpiar_cadena($_POST['producto']);

            if ($tipo_usuario=="personal")
            {
                if (accionesCarritoModelo::borrar_carrito_personal($id_usuario, $producto)->rowCount()>0)
                {
                    $respuesta = '<script>location.reload();</script>';
                }
                else 
                {
                    $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                if (accionesCarritoModelo::borrar_carrito_empresarial($id_usuario, $producto)->rowCount()>0)
                {
                    $respuesta = '<script>location.reload();</script>';
                }
                else 
                {
                    $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                }
            }
            elseif ($tipo_usuario=="invitado")
            {
                if (isset($_COOKIE['user_carrito']))
                {
                    $carrito = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                    $nuevoCarrito = array();
                    foreach ($carrito as $item)
                    {
                        if($item['Producto'] != $producto)
                        {
                            array_push($nuevoCarrito, $item);
                        }
                    }
                    setcookie('user_carrito',serialize($nuevoCarrito),time()+2629750,'/');
                    $respuesta = "<script>location.reload();</script>";
                }
                else
                {
                    $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
                }
            }
            else
            {
                $respuesta = "<script>alert('¡Ha ocurrido un error!');</script>";
            }

            return $respuesta;
        }
        
    }