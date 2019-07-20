<?php
	if($peticionAjax){
		require_once "../modelos/finalizarCompraModelo.php";
	}else{
		require_once "./modelos/finalizarCompraModelo.php";
	}

	class finalizarCompraControlador extends finalizarCompraModelo
	{

        public function obtener_datos_pedido_controlador($tipo_usuario, $id_usuario)
        {
            if ($tipo_usuario=="personal")
            {
                $datos = finalizarCompraModelo::obtener_datos_pedido_personal($id_usuario);
                if($datos->rowCount()>0)
                {
                    $datos = $datos->fetch();
                    date_default_timezone_set('UTC');
                    $dia=date('Y-m-d');
                    $datosPedido=[
                        "Nit" => $datos["facturacion_nit"],
                        "NombreFactura" => $datos["facturacion_nombre"],
                        "DireccionFactura" => $datos["facturacion_direccion"],
                        "Nombre" => $datos["entrega_nombre"],
                        "Apellidos" => $datos["entrega_apellidos"],
                        "Correo" => $datos["entrega_correo"],
                        "Telefono" => $datos["entrega_telefono"],
                        "Direccion" => $datos["entrega_direccion_1"],
                        "Departamento" => $datos["entrega_departamento"],
                        "Municipio" => $datos["entrega_municipio"],
                        "Postal" => $datos["entrega_codigo_postal"],
                        "Observaciones" => $datos["entrega_observaciones"],
                        "Monto" => $datos["pedido_monto"],
                        "Fecha" => $dia,
                        "Metodo" => "tarjeta"
                    ];
                    return $datosPedido;
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                $datos = finalizarCompraModelo::obtener_datos_pedido_empresarial($id_usuario);
                if($datos->rowCount()>0)
                {
                    $datos = $datos->fetch();
                    date_default_timezone_set('UTC');
                    $dia=date('Y-m-d');
                    $datosPedido=[
                        "Nit" => $datos["nit"],
                        "NombreFactura" => $datos["institucion"],
                        "DireccionFactura" => $datos["direccion"],
                        "Nombre" => $datos["entrega_nombre"],
                        "Apellidos" => $datos["entrega_apellidos"],
                        "Correo" => $datos["entrega_correo"],
                        "Telefono" => $datos["entrega_telefono"],
                        "Direccion" => $datos["entrega_direccion_1"],
                        "Departamento" => $datos["entrega_departamento"],
                        "Municipio" => $datos["entrega_municipio"],
                        "Postal" => $datos["entrega_codigo_postal"],
                        "Observaciones" => $datos["entrega_observaciones"],
                        "Monto" => $datos["pedido_monto"],
                        "Fecha" => $dia,
                        "Metodo" => "tarjeta"
                    ];
                    return $datosPedido;
                }
            }
        }

        public function guardar_pedido_controlador($tipo_usuario, $id_usuario, $datosPedido)
        {
            $id_pedido_retornar = 0;
            if ($tipo_usuario=="personal")
            {
                $guardarPedido = finalizarCompraModelo::guardar_pedido_personal($id_usuario, $datosPedido);
                if($guardarPedido->rowCount()>0)
                {
                    $id_pedido = finalizarCompraModelo::obtener_id_pedido_personal();
                    if($id_pedido->rowCount()>0)
                    {
                        $id_pedido = $id_pedido->fetch();
                        $productos = finalizarCompraModelo::cargar_carrito_personal($id_usuario);
                        if($productos->rowCount()>0)
                        {
                            $productos = $productos->fetchAll();
                            foreach ($productos as $item)
                            {
                                finalizarCompraModelo::llenar_pedido_personal($id_pedido["id"], $item['sku'], $item['cantidad']);
                            }
                            $id_pedido_retornar = $id_pedido["id"];
                        }
                    }
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                $guardarPedido = finalizarCompraModelo::guardar_pedido_empresarial($id_usuario, $datosPedido);
                if($guardarPedido->rowCount()>0)
                {
                    $id_pedido = finalizarCompraModelo::obtener_id_pedido_empresarial();
                    if($id_pedido->rowCount()>0)
                    {
                        $id_pedido = $id_pedido->fetch();
                        $productos = finalizarCompraModelo::cargar_carrito_empresarial($id_usuario);
                        if($productos->rowCount()>0)
                        {
                            $productos = $productos->fetchAll();
                            foreach ($productos as $item)
                            {
                                finalizarCompraModelo::llenar_pedido_empresarial($id_pedido["id"], $item['sku'], $item['cantidad']);
                            }
                            $id_pedido_retornar = $id_pedido["id"];
                        }
                    }
                }
            }
            elseif ($tipo_usuario=="invitado")
            {
                $guardarPedido = finalizarCompraModelo::guardar_pedido_invitado($datosPedido);
                if($guardarPedido->rowCount()>0)
                {
                    $id_pedido = finalizarCompraModelo::obtener_id_pedido_invitado();
                    if($id_pedido->rowCount()>0)
                    {
                        $id_pedido = $id_pedido->fetch();                        
                        $productos = array();
                        if (isset($_COOKIE['user_carrito']))
                        {
                            $productos = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                            foreach ($productos as $item)
                            {
                                finalizarCompraModelo::llenar_pedido_invitado($id_pedido["id"], $item['Producto'], $item['Cantidad']);
                            }
                            $id_pedido_retornar = $id_pedido["id"];
                        }
                    }
                }
            }
            return $id_pedido_retornar;
        }
        
    }