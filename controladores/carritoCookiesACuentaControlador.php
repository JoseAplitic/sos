<?php
	if($peticionAjax){
		require_once "../modelos/carritoCookiesACuentaModelo.php";
	}else{
		require_once "./modelos/carritoCookiesACuentaModelo.php";
	}
    
	class carritoCookiesACuentaControlador extends carritoCookiesACuentaModelo
	{
        public function mover_carrito_cookies_a_cuenta_controlador($id_usuario, $tipo_usuario)
        {
            if (isset($_COOKIE['user_carrito']))
            {
                $carrito = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                foreach ($carrito as $item)
                {
                    if ($tipo_usuario=="personal")
                    {
                        $cantidad = carritoCookiesACuentaModelo::verificar_producto_carrito_personal($id_usuario, $item['Producto']);
                        if ($cantidad->rowCount()>0)
                        {
                            carritoCookiesACuentaModelo::actualizar_producto_carrito_personal($id_usuario, $item['Producto'], $item['Cantidad']);
                        }
                        else
                        {
                            carritoCookiesACuentaModelo::agregar_producto_carrito_personal($id_usuario, $item['Producto'], $item['Cantidad']);
                        }
                    }
                    elseif ($tipo_usuario=="empresarial")
                    {
                        $cantidad = carritoCookiesACuentaModelo::verificar_producto_carrito_empresarial($id_usuario, $item['Producto']);
                        if ($cantidad->rowCount()>0)
                        {
                            carritoCookiesACuentaModelo::actualizar_producto_carrito_empresarial($id_usuario, $item['Producto'], $item['Cantidad']);
                        }
                        else
                        {
                            carritoCookiesACuentaModelo::agregar_producto_carrito_empresarial($id_usuario, $item['Producto'], $item['Cantidad']);
                        }
                    }
                }
                $carrito = array();
                setcookie('user_carrito',serialize($carrito),time()+2629750,'/');
            }
        }
    }