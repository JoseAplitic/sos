<?php
	if($peticionAjax){
		require_once "../modelos/pedidoModelo.php";
	}else{
		require_once "./modelos/pedidoModelo.php";
	}

	class pedidoControlador extends pedidoModelo
	{

        public function cargar_pedido($pedido, $tipo_usuario, $id_usuario)
        {
            $respuesta = "";
            $error = false;
            $tipo_usuario_pedido = substr($pedido, 0, 1);
            $codigoPedido = explode("-", $pedido);
            $id_pedido = $codigoPedido[1];
            if ($tipo_usuario_pedido == "C" && $tipo_usuario == "personal")
            {
                $datosPedido = pedidoModelo::cargar_pedido_personal($id_usuario, $id_pedido);
                if($datosPedido->rowCount()>0)
                {
                    $datosPedido = $datosPedido->fetch();
                    $respuesta = pedidoControlador::formato_pedido($datosPedido, $tipo_usuario_pedido, $id_pedido);
                }
                else
                {
                    $error = true;
                }
            }
            elseif ($tipo_usuario_pedido == "E" && $tipo_usuario == "empresarial")
            {
                $datosPedido = pedidoModelo::cargar_pedido_empresarial($id_usuario, $id_pedido);
                if($datosPedido->rowCount()>0)
                {
                    $datosPedido = $datosPedido->fetch();
                    $respuesta = pedidoControlador::formato_pedido($datosPedido, $tipo_usuario_pedido, $id_pedido);
                }
                else
                {
                    $error = true;
                }
            }
            elseif ($tipo_usuario_pedido == "V" && $tipo_usuario == "invitado")
            {
                $datosPedido = pedidoModelo::cargar_pedido_invitado($id_pedido);
                if($datosPedido->rowCount()>0)
                {
                    $datosPedido = $datosPedido->fetch();
                    $respuesta = pedidoControlador::formato_pedido($datosPedido, $tipo_usuario_pedido, $id_pedido);
                }
                else
                {
                    $error = true;
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
                    <a href="'.SERVERURL.'pedidos/">Volver a Pedidos</a>
                </div>';
            }

            return $respuesta;
        }

        public function formato_pedido($datos, $tipo_pedido, $id_pedido)
        {
            $formaPago = "";
            if($datos['metodo_pago']=="tarjeta")
            {
                $formaPago = "Pago por VisaNet o Mastercard";
            }
            elseif ($datos['metodo_pago']=="cheque")
            {
                $formaPago = "Pago por cheque ó deposito bancario";
            }
            elseif ($datos['metodo_pago']=="credito")
            {
                $formaPago = "Crédito empresas";
            }
            $items = "";
            $itemsPedido = array();
            if($tipo_pedido == "C")
            {
                $detalle = pedidoModelo::cargar_detalle_pedido_personal($id_pedido);
                if($detalle->rowCount()>0)
                {
                    $itemsPedido = $detalle->fetchAll();
                }
            }
            if($tipo_pedido == "E")
            {
                $detalle = pedidoModelo::cargar_detalle_pedido_empresarial($id_pedido);
                if($detalle->rowCount()>0)
                {
                    $itemsPedido = $detalle->fetchAll();
                }
            }
            if($tipo_pedido == "V")
            {
                $detalle = pedidoModelo::cargar_detalle_pedido_invitado($id_pedido);
                if($detalle->rowCount()>0)
                {
                    $itemsPedido = $detalle->fetchAll();
                }
            }
            foreach ($itemsPedido as $item)
            {
                $titulo = "";
                $slug = "";
                $infoProducto = pedidoModelo::cargar_nombre_producto($item['producto']);
                if($infoProducto->rowCount()>0)
                {
                    $infoProducto = $infoProducto->fetch();
                    $titulo = $infoProducto['nombre'];
                    $slug = $infoProducto['slug'];
                }
                $items .= '
                <div class="row item">
                    <div class="column producto w60">
                        <div class="imagen">
                            <a href="'.SERVERURL.'producto/'.$slug.'/">
                                <img src="'.PRODUCTOSURL.$item['producto'].'.jpg" alt="'.$titulo.'">
                            </a>
                        </div>
                        <div class="texto">
                            <a href="'.SERVERURL.'producto/'.$slug.'/">
                                <h3 class="nombre">'.$titulo.'</h3>
                            </a>
                        </div>
                    </div>
                    <div class="column precio w20"><p>Q'.$item['costo'].'</p></div>
                    <div class="column cantidad w20"><p>'.$item['cantidad'].'</p></div>
                    <div class="column subtotal w20"><p>Q'.number_format($item['costo']*$item['cantidad'],2).'</p></div>
                </div>';
            }
            $formato = '
            <div class="fecha"><p><b>Fecha: </b>'.$datos['fecha'].'</p></div>
            <div class="fila">
                <div class="columna">
                    <div class="titulo">
                        <h4>Datos de facturación</h4>
                    </div>
                    <div class="detalles">
                        <p><b>Nit: </b>'.$datos['factura_nit'].'</p>
                        <p><b>Nombre: </b>'.$datos['factura_nombre'].'</p>
                        <p><b>Dirección: </b>'.$datos['factura_direccion'].'</p>
                    </div>
                </div>
                <div class="columna">
                    <div class="titulo">
                        <h4>Datos de entrega</h4>
                    </div>
                    <div class="detalles">
                        <p><b>Nombre: </b>'.$datos['entrega_nombre'].'</p>
                        <p><b>Apellidos: </b>'.$datos['entrega_apellidos'].'</p>
                        <p><b>Correo electrónico: </b>'.$datos['entrega_correo'].'</p>
                        <p><b>Teléfono: </b>'.$datos['entrega_telefono'].'</p>
                        <p><b>Dirección: </b>'.$datos['entrega_direccion'].'</p>
                        <p><b>Departamento: </b>'.$datos['entrega_departamento'].'</p>
                        <p><b>Municipio: </b>'.$datos['entrega_municipio'].'</p>
                        <p><b>Código postal: </b>'.$datos['entrega_codigo_postal'].'</p>
                        <p><b>Observaciones: </b>'.$datos['entrega_observaciones'].'</p>
                    </div>
                </div>
            </div>
            <div class="fila">
                <div class="columna-full">
                    <div class="titulo">
                        <h4>Detalles de compra</h4>
                    </div>
                    <div class="detalles">
                        <p><b>Forma de pago: </b>'.$formaPago.'</p>
                        <div class="carrito-items">
                            <div class="row cabecera">
                                <div class="column w60 texto-left"><p>Producto</p></div>
                                <div class="column w20"><p>Precio</p></div>
                                <div class="column w20"><p>Cantidad</p></div>
                                <div class="column w20"><p>Sub-total</p></div>
                            </div>
                                '.$items.'
                            <div class="total-contenedor">
                                <div class="total">
                                    <div class="texto-total"><p>Total:</p></div>
                                    <div class="numero-total"><p>Q'.$datos['monto'].'</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
            return $formato;
        }
        
    }