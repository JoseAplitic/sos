<?php
	if($peticionAjax){
		require_once "../modelos/pedidosModelo.php";
	}else{
		require_once "./modelos/pedidosModelo.php";
	}

	class pedidosControlador extends pedidosModelo
	{

        public function cargar_pedidos($tipo_usuario, $id_usuario)
        {
            $respuesta = "";
            $error = false;
            $no_encontrado = false;
            if($tipo_usuario == "personal")
            {
                if(isset($_POST["filtro"]))
                {
                    $listaPedidos = pedidosModelo::buscar_pedidos_personal($id_usuario, $_POST["filtro"]);
                    if($listaPedidos->rowCount()>0)
                    {
                        $listaPedidos = $listaPedidos->fetchAll();
                        $respuesta = '<div class="row cabecera">
                                          <div class="column w40 texto-left"><p>Código Pedido</p></div>
                                          <div class="column w30"><p>Monto</p></div>
                                          <div class="column w30"><p>Fecha</p></div>
                                      </div>';
                        foreach ($listaPedidos as $datosPedido)
                        {
                            $codigoPedido = 'C'.str_replace("-", "", $datosPedido['fecha']).'-'.$datosPedido["id"];
                            $respuesta .= '<div class="row item">
                                            <div class="column pedido w40">
                                                <a href="'.SERVERURL.'pedido/'.$codigoPedido.'/">
                                                    <h3 class="nombre">'.$codigoPedido.'</h3>
                                                </a>
                                            </div>
                                            <div class="column w30"><p>Q'.$datosPedido['monto'].'</p></div>
                                            <div class="column w30"><p>'.$datosPedido['fecha'].'</p></div>
                                        </div>';
                        }
                    }
                    else
                    {
                        $no_encontrado = true;
                    }
                }
                else
                {
                    $listaPedidos = pedidosModelo::cargar_pedidos_personal($id_usuario);
                    if($listaPedidos->rowCount()>0)
                    {
                        $listaPedidos = $listaPedidos->fetchAll();
                        $respuesta = '<div class="row cabecera">
                                          <div class="column w40 texto-left"><p>Código Pedido</p></div>
                                          <div class="column w30"><p>Monto</p></div>
                                          <div class="column w30"><p>Fecha</p></div>
                                      </div>';
                        foreach ($listaPedidos as $datosPedido)
                        {
                            $codigoPedido = 'C'.str_replace("-", "", $datosPedido['fecha']).'-'.$datosPedido["id"];
                            $respuesta .= '<div class="row item">
                                            <div class="column pedido w40">
                                                <a href="'.SERVERURL.'pedido/'.$codigoPedido.'/">
                                                    <h3 class="nombre">'.$codigoPedido.'</h3>
                                                </a>
                                            </div>
                                            <div class="column w30"><p>Q'.$datosPedido['monto'].'</p></div>
                                            <div class="column w30"><p>'.$datosPedido['fecha'].'</p></div>
                                        </div>';
                        }
                    }
                    else
                    {
                        $no_encontrado = true;
                    }
                }
            }
            elseif($tipo_usuario == "empresarial")
            {
                if(isset($_POST["filtro"]))
                {
                    $listaPedidos = pedidosModelo::buscar_pedidos_empresarial($id_usuario, $_POST["filtro"]);
                    if($listaPedidos->rowCount()>0)
                    {
                        $listaPedidos = $listaPedidos->fetchAll();
                        $respuesta = '<div class="row cabecera">
                                          <div class="column w40 texto-left"><p>Código Pedido</p></div>
                                          <div class="column w30"><p>Monto</p></div>
                                          <div class="column w30"><p>Fecha</p></div>
                                      </div>';
                        foreach ($listaPedidos as $datosPedido)
                        {
                            $codigoPedido = 'E'.str_replace("-", "", $datosPedido['fecha']).'-'.$datosPedido["id"];
                            $respuesta .= '<div class="row item">
                                            <div class="column pedido w40">
                                                <a href="'.SERVERURL.'pedido/'.$codigoPedido.'/">
                                                    <h3 class="nombre">'.$codigoPedido.'</h3>
                                                </a>
                                            </div>
                                            <div class="column w30"><p>Q'.$datosPedido['monto'].'</p></div>
                                            <div class="column w30"><p>'.$datosPedido['fecha'].'</p></div>
                                        </div>';
                        }
                    }
                    else
                    {
                        $no_encontrado = true;
                    }
                }
                else
                {
                    $listaPedidos = pedidosModelo::cargar_pedidos_empresarial($id_usuario);
                    if($listaPedidos->rowCount()>0)
                    {
                        $listaPedidos = $listaPedidos->fetchAll();
                        $respuesta = '<div class="row cabecera">
                                          <div class="column w40 texto-left"><p>Código Pedido</p></div>
                                          <div class="column w30"><p>Monto</p></div>
                                          <div class="column w30"><p>Fecha</p></div>
                                      </div>';
                        foreach ($listaPedidos as $datosPedido)
                        {
                            $codigoPedido = 'E'.str_replace("-", "", $datosPedido['fecha']).'-'.$datosPedido["id"];
                            $respuesta .= '<div class="row item">
                                            <div class="column pedido w40">
                                                <a href="'.SERVERURL.'pedido/'.$codigoPedido.'/">
                                                    <h3 class="nombre">'.$codigoPedido.'</h3>
                                                </a>
                                            </div>
                                            <div class="column w30"><p>Q'.$datosPedido['monto'].'</p></div>
                                            <div class="column w30"><p>'.$datosPedido['fecha'].'</p></div>
                                        </div>';
                        }
                    }
                    else
                    {
                        $no_encontrado = true;
                    }
                }
            }
            elseif($tipo_usuario == "invitado")
            {
                if(isset($_POST["correo"]) && isset($_POST["telefono"]))
                {
                    $listaPedidos = pedidosModelo::buscar_pedidos_invitado($_POST["correo"], $_POST["telefono"]);
                    if($listaPedidos->rowCount()>0)
                    {
                        $listaPedidos = $listaPedidos->fetchAll();
                        $respuesta = '<div class="row cabecera">
                                          <div class="column w40 texto-left"><p>Código Pedido</p></div>
                                          <div class="column w30"><p>Monto</p></div>
                                          <div class="column w30"><p>Fecha</p></div>
                                      </div>';
                        foreach ($listaPedidos as $datosPedido)
                        {
                            $codigoPedido = 'V'.str_replace("-", "", $datosPedido['fecha']).'-'.$datosPedido["id"];
                            $respuesta .= '<div class="row item">
                                            <div class="column pedido w40">
                                                <a href="'.SERVERURL.'pedido/'.$codigoPedido.'/">
                                                    <h3 class="nombre">'.$codigoPedido.'</h3>
                                                </a>
                                            </div>
                                            <div class="column w30"><p>Q'.$datosPedido['monto'].'</p></div>
                                            <div class="column w30"><p>'.$datosPedido['fecha'].'</p></div>
                                        </div>';
                        }
                    }
                    else
                    {
                        $no_encontrado = true;
                    }
                }
                else
                {
                    $respuesta = '
                    <div class="error-pedido">
                        <p>Puedes buscar tu pedido llenando el formulario de arriba.</p>
                    </div>';
                }
            }
            else
            {
                $error = true;
            }

            if ($error == true)
            {
                $respuesta = '
                <div class="error-pedido">
                    <p>¡Ha ocurrido un error!<br>Vuelve a intentarlo más tarde.</p>
                </div>';
            }

            if ($no_encontrado == true)
            {
                $respuesta = '
                <div class="error-pedido">
                    <p>¡No se han encontrado pedidos que coincidan!</p>
                    <a href="'.SERVERURL.'pedidos/">Regresar</a>
                </div>';
            }

            return $respuesta;
        }
        
    }