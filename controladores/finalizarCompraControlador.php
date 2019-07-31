<?php
    
    /** Mandar a llamar las dependencias para generar el PDF */
    require __DIR__.'/../vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;

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
                        $formaPago = "";
                        if($datosPedido['Metodo']=="tarjeta")
                        {
                            $formaPago = "Pago por VisaNet o Mastercard";
                        }
                        elseif ($datosPedido['Metodo']=="cheque")
                        {
                            $formaPago = "Pago por cheque ó deposito bancario";
                        }
                        elseif ($datosPedido['Metodo']=="credito")
                        {
                            $formaPago = "Crédito empresas";
                        }
                        /** Maquetando el contenido para el PDF */
                        $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
                        $contenidoPDF = '
                        <style>
                            *{margin: 0px;box-sizing:border-box;}
                            .cabecera{width:100%;}
                            .codigo{font-size: 14pt;text-align:right;width: 100%;margin-top:10px;}
                            h3{margin: 30px 0px 0px 0px;width: 100%;font-size:16pt;}
                            .decorador{width:100%;height:2px;margin-bottom:15px;background-color:#3b3b3b;}
                            .dato{margin: 5px 0px;width: 100%;font-size:12pt;}
                            .dato-pago{margin: 5px 0px 15px 0px;width: 100%;font-size:12pt;}
                            table, th, td{border: 1px solid #3b3b3b;border-collapse: collapse;}
                            th, td{padding: 5px;text-align: left;}
                            th{background-color: #3b3b3b;color: #fff;font-size: 12pt;}
                            td{font-size:12pt;}
                            .total{text-align:right;}
                        </style>
                        <page backcolor="#fff" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
                            <img class="cabecera" src="'.SERVERURL.'vistas/assets/img/cabecera-pdf.jpg">
                            <p class="codigo">Pedido No.: C'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"].'</p>
                            <p class="codigo">Fecha: '.$datosPedido['Fecha'].'</p>
                            <h3>DATOS DE FACTURACIÓN</h3>
                            <div class="decorador"></div>
                            <p class="dato"><b>Nit: </b>'.$datosPedido['Nit'].'</p>
                            <p class="dato"><b>Nombre: </b>'.$datosPedido['NombreFactura'].'</p>
                            <p class="dato"><b>Dirección: </b>'.$datosPedido['DireccionFactura'].'</p>
                            <h3>DATOS DE ENTREGA</h3>
                            <div class="decorador"></div>
                            <p class="dato"><b>Nombre: </b>'.$datosPedido['Nombre'].'</p>
                            <p class="dato"><b>Apellidos: </b>'.$datosPedido['Apellidos'].'</p>
                            <p class="dato"><b>Correo electrónico: </b>'.$datosPedido['Correo'].'</p>
                            <p class="dato"><b>Teléfono: </b>'.$datosPedido['Telefono'].'</p>
                            <p class="dato"><b>Dirección: </b>'.$datosPedido['Direccion'].'</p>
                            <p class="dato"><b>Departamento: </b>'.$datosPedido['Departamento'].'</p>
                            <p class="dato"><b>Municipio: </b>'.$datosPedido['Municipio'].'</p>
                            <p class="dato"><b>Código postal: </b>'.$datosPedido['Postal'].'</p>
                            <p class="dato"><b>Observaciones: </b>'.$datosPedido['Observaciones'].'</p>
                            <h3>DETALLES DE COMPRA</h3>
                            <div class="decorador"></div>
                            <p class="dato-pago"><b>Forma de pago: </b>'.$formaPago.'</p>
                            <table>
                                <colgroup>
                                    <col style="width: 15%">
                                    <col style="width: 40%">
                                    <col style="width: 15%">
                                    <col style="width: 15%">
                                    <col style="width: 15%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>';
                        $productos = finalizarCompraModelo::cargar_carrito_personal($id_usuario);
                        if($productos->rowCount()>0)
                        {
                            $peticionAjax = false;
                            require_once "./controladores/cargarListaProductosControlador.php";
                            $instanciaCargarProductos = new cargarListaProductosControlador();
                            $productos = $productos->fetchAll();
                            foreach ($productos as $item)
                            {
                                /** Obtener el precio y nombre del producto */
                                $nombreProducto = "";
                                $precioFinal = 0;
                                $cargarPrecio = finalizarCompraModelo::obtener_precio_producto($item['sku']);
                                if($cargarPrecio->rowCount()>0)
                                {
                                    $cargarPrecio = $cargarPrecio->fetch();
                                    $cargarPrecio = $cargarPrecio["precio"];
                                    $precio = $instanciaCargarProductos->obtener_precio_producto($item['sku'],$tipo_usuario,$cargarPrecio);
                                    $precioFinal = number_format($precio,2);
                                    $cargarNombre = finalizarCompraModelo::obtener_nombre_producto($item['sku']);
                                    if($cargarNombre->rowCount()>0)
                                    {
                                        $cargarNombre = $cargarNombre->fetch();
                                        $nombreProducto = $cargarNombre["nombre"];
                                    }
                                }
                                finalizarCompraModelo::llenar_pedido_personal($id_pedido["id"], $item['sku'], $item['cantidad'], $precioFinal);
                                $contenidoPDF .= '
                                <tr>
                                    <td>'.$item['sku'].'</td>
                                    <td>'.$nombreProducto.'</td>
                                    <td>'.$item['cantidad'].'</td>
                                    <td>Q.'.$precioFinal.'</td>
                                    <td>Q.'.number_format($item['cantidad']*$precioFinal,2).'</td>
                                </tr>';
                            }
                            finalizarCompraModelo::vaciar_carrito_personal($id_usuario);
                        }
                        $contenidoPDF .= '
                                <tr>
                                    <td class="total" colspan="4">Total</td>
                                    <td>Q.'.$datosPedido['Monto'].'</td>
                                </tr>
                            </table>
                        </page>';
                        //Guardar PDF en una carpeta
                        $html2pdf->writeHTML($contenidoPDF);
                        $html2pdf->output(__DIR__.'/../pedidos/clientes/C'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"].'.pdf', 'F');
                        finalizarCompraControlador::enviar_mail('C'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"], $tipo_usuario);
                        $id_pedido_retornar = 'C'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"];
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
                        $formaPago = "";
                        if($datosPedido['Metodo']=="tarjeta")
                        {
                            $formaPago = "Pago por VisaNet o Mastercard";
                        }
                        elseif ($datosPedido['Metodo']=="cheque")
                        {
                            $formaPago = "Pago por cheque ó deposito bancario";
                        }
                        elseif ($datosPedido['Metodo']=="credito")
                        {
                            $formaPago = "Crédito empresas";
                        }
                        /** Maquetando el contenido para el PDF */
                        $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
                        $contenidoPDF = '
                        <style>
                            *{margin: 0px;box-sizing:border-box;}
                            .cabecera{width:100%;}
                            .codigo{font-size: 14pt;text-align:right;width: 100%;margin-top:10px;}
                            h3{margin: 30px 0px 0px 0px;width: 100%;font-size:16pt;}
                            .decorador{width:100%;height:2px;margin-bottom:15px;background-color:#3b3b3b;}
                            .dato{margin: 5px 0px;width: 100%;font-size:12pt;}
                            .dato-pago{margin: 5px 0px 15px 0px;width: 100%;font-size:12pt;}
                            table, th, td{border: 1px solid #3b3b3b;border-collapse: collapse;}
                            th, td{padding: 5px;text-align: left;}
                            th{background-color: #3b3b3b;color: #fff;font-size: 12pt;}
                            td{font-size:12pt;}
                            .total{text-align:right;}
                        </style>
                        <page backcolor="#fff" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
                            <img class="cabecera" src="'.SERVERURL.'vistas/assets/img/cabecera-pdf.jpg">
                            <p class="codigo">Pedido No.: E'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"].'</p>
                            <p class="codigo">Fecha: '.$datosPedido['Fecha'].'</p>
                            <h3>DATOS DE FACTURACIÓN</h3>
                            <div class="decorador"></div>
                            <p class="dato"><b>Nit: </b>'.$datosPedido['Nit'].'</p>
                            <p class="dato"><b>Nombre: </b>'.$datosPedido['NombreFactura'].'</p>
                            <p class="dato"><b>Dirección: </b>'.$datosPedido['DireccionFactura'].'</p>
                            <h3>DATOS DE ENTREGA</h3>
                            <div class="decorador"></div>
                            <p class="dato"><b>Nombre: </b>'.$datosPedido['Nombre'].'</p>
                            <p class="dato"><b>Apellidos: </b>'.$datosPedido['Apellidos'].'</p>
                            <p class="dato"><b>Correo electrónico: </b>'.$datosPedido['Correo'].'</p>
                            <p class="dato"><b>Teléfono: </b>'.$datosPedido['Telefono'].'</p>
                            <p class="dato"><b>Dirección: </b>'.$datosPedido['Direccion'].'</p>
                            <p class="dato"><b>Departamento: </b>'.$datosPedido['Departamento'].'</p>
                            <p class="dato"><b>Municipio: </b>'.$datosPedido['Municipio'].'</p>
                            <p class="dato"><b>Código postal: </b>'.$datosPedido['Postal'].'</p>
                            <p class="dato"><b>Observaciones: </b>'.$datosPedido['Observaciones'].'</p>
                            <h3>DETALLES DE COMPRA</h3>
                            <div class="decorador"></div>
                            <p class="dato-pago"><b>Forma de pago: </b>'.$formaPago.'</p>
                            <table>
                                <colgroup>
                                    <col style="width: 15%">
                                    <col style="width: 40%">
                                    <col style="width: 15%">
                                    <col style="width: 15%">
                                    <col style="width: 15%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>';
                        $productos = finalizarCompraModelo::cargar_carrito_empresarial($id_usuario);
                        if($productos->rowCount()>0)
                        {
                            $peticionAjax = false;
                            require_once "./controladores/cargarListaProductosControlador.php";
                            $instanciaCargarProductos = new cargarListaProductosControlador();
                            $productos = $productos->fetchAll();
                            foreach ($productos as $item)
                            {
                                /** Obtener el precio y nombre del producto */
                                $nombreProducto = "";
                                $precioFinal = 0;
                                $cargarPrecio = finalizarCompraModelo::obtener_precio_producto($item['sku']);
                                if($cargarPrecio->rowCount()>0)
                                {
                                    $cargarPrecio = $cargarPrecio->fetch();
                                    $cargarPrecio = $cargarPrecio["precio"];
                                    $precio = $instanciaCargarProductos->obtener_precio_producto($item['sku'],$tipo_usuario,$cargarPrecio);
                                    $precioFinal = number_format($precio,2);
                                    $cargarNombre = finalizarCompraModelo::obtener_nombre_producto($item['sku']);
                                    if($cargarNombre->rowCount()>0)
                                    {
                                        $cargarNombre = $cargarNombre->fetch();
                                        $nombreProducto = $cargarNombre["nombre"];
                                    }
                                }
                                finalizarCompraModelo::llenar_pedido_empresarial($id_pedido["id"], $item['sku'], $item['cantidad'], $precioFinal);
                                $contenidoPDF .= '
                                <tr>
                                    <td>'.$item['sku'].'</td>
                                    <td>'.$nombreProducto.'</td>
                                    <td>'.$item['cantidad'].'</td>
                                    <td>Q.'.$precioFinal.'</td>
                                    <td>Q.'.number_format($item['cantidad']*$precioFinal,2).'</td>
                                </tr>';
                            }
                            finalizarCompraModelo::vaciar_carrito_empresarial($id_usuario);
                        }
                        $contenidoPDF .= '
                                <tr>
                                    <td class="total" colspan="4">Total</td>
                                    <td>Q.'.$datosPedido['Monto'].'</td>
                                </tr>
                            </table>
                        </page>';
                        //Guardar PDF en una carpeta
                        $html2pdf->writeHTML($contenidoPDF);
                        $html2pdf->output(__DIR__.'/../pedidos/empresas/E'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"].'.pdf', 'F');
                        finalizarCompraControlador::enviar_mail('E'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"], $tipo_usuario);
                        $id_pedido_retornar = 'E'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"];
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
                        $formaPago = "";
                        if($datosPedido['Metodo']=="tarjeta")
                        {
                            $formaPago = "Pago por VisaNet o Mastercard";
                        }
                        elseif ($datosPedido['Metodo']=="cheque")
                        {
                            $formaPago = "Pago por cheque ó deposito bancario";
                        }
                        elseif ($datosPedido['Metodo']=="credito")
                        {
                            $formaPago = "Crédito empresas";
                        }
                        /** Maquetando el contenido para el PDF */
                        $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
                        $contenidoPDF = '
                        <style>
                            *{margin: 0px;box-sizing:border-box;}
                            .cabecera{width:100%;}
                            .codigo{font-size: 14pt;text-align:right;width: 100%;margin-top:10px;}
                            h3{margin: 30px 0px 0px 0px;width: 100%;font-size:16pt;}
                            .decorador{width:100%;height:2px;margin-bottom:15px;background-color:#3b3b3b;}
                            .dato{margin: 5px 0px;width: 100%;font-size:12pt;}
                            .dato-pago{margin: 5px 0px 15px 0px;width: 100%;font-size:12pt;}
                            table, th, td{border: 1px solid #3b3b3b;border-collapse: collapse;}
                            th, td{padding: 5px;text-align: left;}
                            th{background-color: #3b3b3b;color: #fff;font-size: 12pt;}
                            td{font-size:11pt;}
                            .total{text-align:right;}
                        </style>
                        <page backcolor="#fff" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
                            <img class="cabecera" src="'.SERVERURL.'vistas/assets/img/cabecera-pdf.jpg">
                            <p class="codigo">Pedido No.: V'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"].'</p>
                            <p class="codigo">Fecha: '.$datosPedido['Fecha'].'</p>
                            <h3>DATOS DE FACTURACIÓN</h3>
                            <div class="decorador"></div>
                            <p class="dato"><b>Nit: </b>'.$datosPedido['Nit'].'</p>
                            <p class="dato"><b>Nombre: </b>'.$datosPedido['NombreFactura'].'</p>
                            <p class="dato"><b>Dirección: </b>'.$datosPedido['DireccionFactura'].'</p>
                            <h3>DATOS DE ENTREGA</h3>
                            <div class="decorador"></div>
                            <p class="dato"><b>Nombre: </b>'.$datosPedido['Nombre'].'</p>
                            <p class="dato"><b>Apellidos: </b>'.$datosPedido['Apellidos'].'</p>
                            <p class="dato"><b>Correo electrónico: </b>'.$datosPedido['Correo'].'</p>
                            <p class="dato"><b>Teléfono: </b>'.$datosPedido['Telefono'].'</p>
                            <p class="dato"><b>Dirección: </b>'.$datosPedido['Direccion'].'</p>
                            <p class="dato"><b>Departamento: </b>'.$datosPedido['Departamento'].'</p>
                            <p class="dato"><b>Municipio: </b>'.$datosPedido['Municipio'].'</p>
                            <p class="dato"><b>Código postal: </b>'.$datosPedido['Postal'].'</p>
                            <p class="dato"><b>Observaciones: </b>'.$datosPedido['Observaciones'].'</p>
                            <h3>DETALLES DE COMPRA</h3>
                            <div class="decorador"></div>
                            <p class="dato-pago"><b>Forma de pago: </b>'.$formaPago.'</p>
                            <table>
                                <colgroup>
                                    <col style="width: 15%">
                                    <col style="width: 40%">
                                    <col style="width: 15%">
                                    <col style="width: 15%">
                                    <col style="width: 15%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>';
                        $productos = array();
                        if (isset($_COOKIE['user_carrito']))
                        {
                            $peticionAjax = false;
                            require_once "./controladores/cargarListaProductosControlador.php";
                            $instanciaCargarProductos = new cargarListaProductosControlador();
                            $productos = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                            foreach ($productos as $item)
                            {
                                /** Obtener el precio y nombre del producto */
                                $nombreProducto = "";
                                $precioFinal = 0;
                                $cargarPrecio = finalizarCompraModelo::obtener_precio_producto($item['Producto']);
                                if($cargarPrecio->rowCount()>0)
                                {
                                    $cargarPrecio = $cargarPrecio->fetch();
                                    $cargarPrecio = $cargarPrecio["precio"];
                                    $precio = $instanciaCargarProductos->obtener_precio_producto($item['Producto'],$tipo_usuario,$cargarPrecio);
                                    $precioFinal = number_format($precio,2);
                                    $cargarNombre = finalizarCompraModelo::obtener_nombre_producto($item['Producto']);
                                    if($cargarNombre->rowCount()>0)
                                    {
                                        $cargarNombre = $cargarNombre->fetch();
                                        $nombreProducto = $cargarNombre["nombre"];
                                    }
                                }
                                finalizarCompraModelo::llenar_pedido_invitado($id_pedido["id"], $item['Producto'], $item['Cantidad'], $precioFinal);
                                $contenidoPDF .= '
                                <tr>
                                    <td>'.$item['Producto'].'</td>
                                    <td>'.$nombreProducto.'</td>
                                    <td>'.$item['Cantidad'].'</td>
                                    <td>Q.'.$precioFinal.'</td>
                                    <td>Q.'.number_format($item['Cantidad']*$precioFinal,2).'</td>
                                </tr>';
                            }
                            finalizarCompraModelo::vaciar_carrito_invitado();
                        }
                        $contenidoPDF .= '
                                <tr>
                                    <td class="total" colspan="4">Total</td>
                                    <td>Q.'.$datosPedido['Monto'].'</td>
                                </tr>
                            </table>
                        </page>';
                        //Guardar PDF en una carpeta
                        $html2pdf->writeHTML($contenidoPDF);
                        $html2pdf->output(__DIR__.'/../pedidos/visitantes/V'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"].'.pdf', 'F');
                        finalizarCompraControlador::enviar_mail('V'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"], $tipo_usuario);
                        $id_pedido_retornar = 'V'.str_replace("-", "", $datosPedido['Fecha']).'-'.$id_pedido["id"];
                    }
                }
            }
            return $id_pedido_retornar;
        }

        public function enviar_mail($codigo, $tipo_usuario)
        {
            require __DIR__.'/../vistas/modulos/class.phpmailer.php';
            require __DIR__.'/../vistas/modulos/class.smtp.php';

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = MAIL_PORT; 
            $mail->IsHTML(true); 
            $mail->CharSet = "utf-8";

            $mail->Host = MAIL_HOST; 
            $mail->Username = MAIL_USUARIO_SMTP; 
            $mail->Password = MAIL_PASS;


            $mail->From = MAIL_EMISOR;
            $mail->FromName = MAIL_EMISOR_NOMBRE;
            $mail->AddAddress(MAIL_RECEPTOR);

            $mail->Subject = "Pedido ".$codigo;
            $mensajeHtml = nl2br("Nuevo pedido: ".$codigo);
            $mail->Body = "Nuevo pedido: ".$codigo;
            $mail->AltBody = "Nuevo pedido: ".$codigo;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $ruta = __DIR__.'/../pedidos/';
            if($tipo_usuario == "personal")
            {
                $ruta .= "clientes/";
            }
            elseif($tipo_usuario == "empresarial")
            {
                $ruta .= "empresas/";
            }
            elseif($tipo_usuario == "invitado")
            {
                $ruta .= "visitantes/";
            }
            $ruta .= $codigo.".pdf";
            
            $mail->addAttachment($ruta);

            $mail->Send(); 
        }
    }