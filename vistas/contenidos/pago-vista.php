
<?php
//if(isset($_POST["nit"]) && isset($_POST["nombre-factura"]) && isset($_POST["direccion-factura"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["correo"]) && isset($_POST["telefono"]) && isset($_POST["direccion-linea-1"]) && isset($_POST["direccion-linea-2"]) && isset($_POST["pais"]) && isset($_POST["departamento"]) && isset($_POST["municipio"]) && isset($_POST["postal"]) && isset($_POST["observaciones"])):
    
    $tipo = "";
    $id_usuario = "";
    if (isset($_COOKIE['user_tipo']))
    {
        $tipo = $_COOKIE['user_tipo'];
        $id_usuario = $_SESSION['user_id'];
    }
    else
    {
        $tipo = "invitado";
    }

    // $datosPedidoCliente = [
    //     "Nit" => $_POST["nit"],
    //     "NombreFactura" => $_POST["nombre-factura"],
    //     "DireccionFactura" => $_POST["direccion-factura"],
    //     "Nombre" => $_POST["nombre"],
    //     "Apellidos" => $_POST["apellidos"],
    //     "Correo" => $_POST["correo"],
    //     "Telefono" => $_POST["telefono"],
    //     "Direccion1" => $_POST["direccion-linea-1"],
    //     "Direccion2" => $_POST["direccion-linea-2"],
    //     "Pais" => $_POST["pais"],
    //     "Departamento" => $_POST["departamento"],
    //     "Municipio" => $_POST["municipio"],
    //     "Postal" => $_POST["postal"],
    //     "Observaciones" => $_POST["observaciones"]
    // ];
    // require_once "./controladores/cargarInfoCarritoControlador.php";
    // $instanciaCargarInfoCarrito = new cargarInfoCarritoControlador();
    // $instanciaCargarInfoCarrito->guardar_datos_usuario_controlador($tipo, $id_usuario, $datosPedidoCliente);
    /*
    */
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    /*** Pone tus variables GET aca
     $bill_to_address_line1 = $_POST['bill_to_address_line1']
    *///             
?>

    <script>
        $(document).ready( function(){
            $('.metodo-titulo').click(function(){
                $('.opcion').removeClass('activo');
                $(this).parent('.opcion').addClass('activo');
            });
        });
    </script>

    <main class="full-width">

		<style type="text/css">

			main{
				background-color: #f5f5f5;
			}

			.sombra-inferior{
				-webkit-box-shadow: 0px 2px 4px 0px #e5e5e5;
				-moz-box-shadow: 0px 2px 4px 0px #e5e5e5;
				box-shadow: 0px 2px 4px 0px #e5e5e5;
				position:relative;
				z-index: 1;
			}

			.value-proposal-box .value-proposal{
				display: flex;
				flex-flow: row wrap;
				justify-content: space-around;
				align-items: center;
				padding: 20px 0px;
			}
			.value-proposal-box .value-proposal .item{
				width: 25%;
				border-right: 1px dashed #646162;
				display: flex;
				flex-flow: row wrap;
				justify-content: center;
				align-items: center;
			}
			.value-proposal-box .value-proposal .item .contain{
				display: flex;
				flex-flow: row wrap;
				justify-content: center;
				align-items: center;
				width: 80%;
			}
			.value-proposal-box .value-proposal .item:last-child{
				border-right-width: 0px;
			}
			.value-proposal-box .value-proposal .item i{color: #a91410;margin-right: 10px;font-size: 24px;}
			.value-proposal-box .value-proposal .item p{font-size: 18px;font-weight: lighter;}
			.value-proposal-box .value-proposal .item p span{font-weight: bold;}

			.carrito-contenedor{background-color:#fff;padding: 30px 20px;}
			.carrito-contenedor .title{font-size:24pt;font-weight:bold;margin-bottom:30px;}
			.carrito-contenedor .menu-proceso-compra{margin-bottom:30px;display:flex;flex-flow:row wrap;align-items:center;}
			.carrito-contenedor .menu-proceso-compra .paso{width:25%;display:flex;flex-flow:row nowrap;align-items:center;padding:10px 20px;height:60px;color:#fff;position:relative;}

			.carrito-contenedor .menu-proceso-compra .paso:after{content: " ";position: absolute;display: block;width: 0;height: 0;}
			.carrito-contenedor .menu-proceso-compra .paso:before, .carrito-contenedor .menu-proceso-compra .paso:after{border-bottom: 30px solid transparent;border-top: 30px solid transparent;top:0px;}
			.carrito-contenedor .menu-proceso-compra .paso:after{right: -20px;z-index: 2;
			}.carrito-contenedor .menu-proceso-compra .paso:before{right: -20px;z-index: 1;}
			.carrito-contenedor .menu-proceso-compra .paso:nth-child(2n+1):before,
			.carrito-contenedor .menu-proceso-compra .paso:nth-child(2n+1):after{border-left: 20px solid #0c63b3;}
			.carrito-contenedor .menu-proceso-compra .paso:nth-child(2n):before,
			.carrito-contenedor .menu-proceso-compra .paso:nth-child(2n):after{border-left: 20px solid #094ea4;}
			.carrito-contenedor .menu-proceso-compra .paso.activo:before,
			.carrito-contenedor .menu-proceso-compra .paso.activo:after{border-left: 20px solid #c1b700;}
			.carrito-contenedor .menu-proceso-compra .paso.final:before,
			.carrito-contenedor .menu-proceso-compra .paso.final:after{content:none;}

			.carrito-contenedor .menu-proceso-compra .paso:nth-child(2n+1){background-color:#0c63b3;}
			.carrito-contenedor .menu-proceso-compra .paso:nth-child(2n){background-color:#094ea4;}
			.carrito-contenedor .menu-proceso-compra .paso.activo{background-color:#c1b700;}
			.carrito-contenedor .menu-proceso-compra .paso>p{flex:1 0 auto;text-align:center;font-size:14pt;}
			.carrito-contenedor .menu-proceso-compra .paso>img{height:40px;width:auto;flex: 0 0 auto;position:relative;right:-20px;}
			.carrito-contenedor .menu-proceso-compra .paso>a{width:100%;color:#fff;text-decoration:none;display:flex;flex-flow:row wrap;align-items:center;}
			.carrito-contenedor .menu-proceso-compra .paso>a>p{flex:1 0 auto;text-align:center;font-size:14pt;}
			.carrito-contenedor .menu-proceso-compra .paso>a>img{height:40px;width:auto;flex: 0 0 auto;position:relative;right:-20px;}

			.carrito-contenedor .carrito-contenido{display: flex;flex-flow:row wrap;padding: 30px 20px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row{width: 50%;padding: 20px;}
            .carrito-contenedor .carrito-contenido .carrito-contenido-row .titulo{border-bottom: 1px solid #9e9d9d;padding-bottom:20px;margin-bottom:20px;}
            .carrito-contenedor .carrito-contenido .carrito-contenido-row .titulo .encabezado{font-size:24pt;font-weight:bold;margin-bottom:5px;}
            .carrito-contenedor .carrito-contenido .carrito-contenido-row .titulo .comentario{color:#0d6bb7;font-size:12pt;}
			
            .carrito-contenedor .carrito-contenido .opciones .opcion{padding-bottom:20px;}
            .carrito-contenedor .carrito-contenido .opciones .opcion:last-child{border-bottom-width: 0px;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-titulo{display:flex;flex-flow:row wrap;align-items:center;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-titulo:hover{cursor:pointer;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-titulo .icono{width:30px;height:30px;position:relative;border:1px solid #cfcfcf;border-radius:50%;flex: 0 0 auto;}
            .carrito-contenedor .carrito-contenido .opciones .opcion.activo .metodo-titulo .icono .centro{position:absolute;top:calc(50% - 25%);left:calc(50% - 25%);width:50%;height:50%;background-color:#0d6bb7;border-radius:50%;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-titulo .texto{flex:1 1 auto;padding-left:10px;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-titulo .texto p{font-size:14pt;font-weight:bold;}


            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-contenido{display:none;padding-top:20px;}
            .carrito-contenedor .carrito-contenido .opciones .opcion.activo .metodo-contenido{display:block;}
			
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-contenido .metodo-botones .continuar{text-align:center;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-contenido .metodo-botones .continuar input[type="submit"]{background-color: #0d6bb7;border-width: 0px !important;border-radius: 0px;display: flex;margin: 10px auto;width: max-content;color: #fff;padding: 15px 150px;font-weight: bold;font-size:14pt;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-contenido .metodo-botones .continuar input[type="submit"]:hover{cursor:pointer;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-contenido .metodo-botones .regresar{text-align:center;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-contenido .metodo-botones .regresar a{font-size:12pt;color: #777575;text-decoration:none;}
            .carrito-contenedor .carrito-contenido .opciones .opcion .metodo-contenido .metodo-botones .regresar a:hover{text-decoration:underline;}

			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2{background-color:#ec110b;color:#fff;padding: 120px 20px 120px 20px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .logo{text-align:center;border-bottom:1px solid #fff;padding-bottom: 50px;margin-bottom:50px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .logo > img{width:220px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .beneficios > p{padding:0px 50px;text-align:center;font-weight:bold;font-size:14pt;margin-bottom:50px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .beneficios .lista-beneficios{padding:0px 100px 0px 120px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio{display:flex;flex-flow:row nowrap;align-items:center;margin-bottom:30px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono{width:60px;flex: 0 0 auto;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono img{width:100%;display: block;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto{flex: 1 1 auto;padding-left:20px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto p{font-size: 16pt;width: 100%;}
			

		</style>

		<div class="value-proposal-box sombra-inferior">
			<div class="third-box boxed-width">
				<div class="value-proposal">
					<div class="item">
						<div class="contain">
							<i class="fas fa-box"></i><p><span>Entrega </span>grátis*</p>
						</div>
					</div>
					<div class="item">
						<div class="contain">
							<i class="fas fa-medal"></i><p><span>El mejor </span>precio</p>
						</div>
					</div>
					<div class="item">
						<div class="contain">
							<i class="fas fa-money-bill-wave"></i><p><span>Transacciones </span>segúras</p>
						</div>
					</div>
					<div class="item">
						<div class="contain">
							<i class="fas fa-comments"></i><p><span>Asesoría </span>profesional</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="carrito-contenedor boxed-width">
			<div class="title"><p>Carrito de compras</p></div>
            <div class="menu-proceso-compra">
				<div class="paso">
					<a href="<?=SERVERURL;?>carrito/"><p>Carrito de compras</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso">
                    <a href="<?=SERVERURL;?>login-compra/"><p>Iniciar sesión</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso">
					<a href="<?=SERVERURL;?>facturacion-y-envio/"><p>Facturación & envío</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso activo final">
					<p>Realiza el pago</p>
				</div>
			</div>
                
            <div class="carrito-contenido">
                <div class="carrito-contenido-row row-1">
                    <div class="titulo">
                        <p class="encabezado">Datos de pago</p>
                        <p class="comentario">Ingresa la información para la manera de pago seleccionada.</p>
                    </div>
                    <div class="metodo-pago">
                        <div class="opciones">
                            <div class="opcion activo">
                                <div class="metodo-titulo">
                                    <div class="icono">
                                        <div class="centro"></div>
                                    </div>
                                    <div class="texto">
                                        <p>Pago por cheque ó deposito bancario</p>
                                    </div>
                                </div>
                                <div class="metodo-contenido">
                                    <div class="metodo-elementos">
                                    aqui va el contenido
                                    </div>
                                    <div class="metodo-botones">
                                        <div class="continuar">
                                            <input type="submit" value="Continuar">
                                        </div>
                                        <div class="regresar">
                                            <a href="<?=SERVERURL?>facturacion-y-envio/">Regresar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="opcion">
                                <div class="metodo-titulo">
                                    <div class="icono">
                                        <div class="centro"></div>
                                    </div>
                                    <div class="texto">
                                        <p>Pago por VisaNet o Mastercard</p>
                                    </div>
                                </div>
                                <div class="metodo-contenido">
                                    <div class="metodo-elementos">
                                    aqui va el contenido
                                    </div>
                                    <div class="metodo-botones">
                                        <div class="continuar">
                                            <input type="submit" value="Continuar">
                                        </div>
                                        <div class="regresar">
                                            <a href="<?=SERVERURL?>facturacion-y-envio/">Regresar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="opcion">
                                <div class="metodo-titulo">
                                    <div class="icono">
                                        <div class="centro"></div>
                                    </div>
                                    <div class="texto">
                                        <p>Crédito empresas</p>
                                    </div>
                                </div>
                                <div class="metodo-contenido">
                                    <div class="metodo-elementos">
                                    aqui va el contenido
                                    </div>
                                    <div class="metodo-botones">
                                        <div class="continuar">
                                            <input type="submit" value="Continuar">
                                        </div>
                                        <div class="regresar">
                                            <a href="<?=SERVERURL?>facturacion-y-envio/">Regresar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carrito-contenido-row row-2">
                    <div class="logo">
                        <img src="<?php echo SERVERURL; ?>vistas/assets/img/logo.png" alt="Smart Office Solutions">
                    </div>
                    <div class="beneficios">
                        <p>Crea una cuenta en gosmartoffice.com para conseguir estos beneficios y muchos más:</p>
                        <div class="lista-beneficios">
                            <div class="beneficio">
                                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/garantia-login.png"></div>
                                <div class="texto"><p>Acceso a planes de protección extendida.</p></div>
                            </div>
                            <div class="beneficio">
                                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/soporte-login.png"></div>
                                <div class="texto"><p>Asesoría personalizada en todas tus compras.</p></div>
                            </div>
                            <div class="beneficio">
                                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/website-login.png"></div>
                                <div class="texto"><p>Información en línea de productos mejorada.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div id="pago" class="full-width">
                    <?php if (isset($_REQUEST['reason_code'])): ?>
                    <!-- Open Wrapper Content -->
                    <div id="wrapper-content" class="clearfix">
                        <div id="content-wrapper" class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>
                                        Resultado: <?php echo $_REQUEST['message']; ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>
                                        Decisión: <?php echo $_REQUEST['decision']; ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>
                                        Se ha enviado un correo con su confirmación
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>
                                        <a href="index.php">Continuar navegando...</a>
                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Close Wrapper Content -->
                    <?php elseif (!isset($_POST['access_key'])): ?>
                        <form role="form" name="formPago" id="formPago" method="post" action="">
                            <input type="hidden" name="access_key" value="<?php echo ACCESS_KEY ?>">
                            <input type="hidden" name="profile_id" value="<?php echo PROFILE_ID ?>">
                            <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
                            <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code,device_fingerprint_id">
                            <input type="hidden" name="unsigned_field_names" value="card_type,card_number,card_expiry_date,card_cvn,customer_ip_address">
                            <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
                            <input type="hidden" name="locale" value="en">
                            <input type="hidden" name="customer_ip_address" value="<?php echo $_SERVER["REMOTE_ADDR"];?>" />
                            <input type="hidden" name="device_fingerprint_id" value="" />
                            <input type="hidden" name="transaction_type" value="sale">
                            <input type="hidden" name="reference_number" value="<?php echo time();?>">
                            <input type="hidden" name="currency" value="GTQ">
                            <input type="hidden" name="payment_method" value="card">
                            <input type="hidden" name="bill_to_address_country" value="GT" />

                            <!-- CREDIT CARD FORM STARTS HERE -->
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table">
                                    <div class="row display-tr">
                                        <h3 class="panel-title ecwid-h3">Información del comprador</h3>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="bill_to_forename">Nombre</label>
                                                        <input type="text" class="form-control" id="bill_to_forename" name="bill_to_forename" placeholder="Nombre" autocomplete="off" required="" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="bill_to_surname">Apellido</label>
                                                        <input type="text" class="form-control" id="bill_to_surname" name="bill_to_surname" placeholder="Apellido" autocomplete="off" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="bill_to_email">Email</label>
                                                        <input type="email" class="form-control" id="bill_to_email" name="bill_to_email" placeholder="Email" autocomplete="off" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="bill_to_phone">Teléfono</label>
                                                        <input type="tel" class="form-control" id="bill_to_phone" name="bill_to_phone" placeholder="Teléfono" autocomplete="off" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="bill_to_address_line1">Dirección</label>
                                                        <input type="hidden" class="form-control" id="bill_to_address_line1" name="bill_to_address_line1" placeholder="Dirección" autocomplete="off" required="" value="<?php //$bill_to_address_line1; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="bill_to_address_state">Departamento</label>
                                                        <input type="text" class="form-control" id="bill_to_address_state" name="bill_to_address_state" placeholder="Departamento" autocomplete="off" required="">

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="bill_to_address_city">Municipio</label>
                                                        <input type="text" class="form-control" id="bill_to_address_city" name="bill_to_address_city" placeholder="Municipio" autocomplete="off" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="bill_to_address_postal_code">Código postal</label>
                                                        <input type="number" step="1" min="0" class="form-control" id="bill_to_address_postal_code" name="bill_to_address_postal_code" placeholder="01010" autocomplete="off" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="format_amount">TOTAL</label>
                                                        <input type="number" step="any" min="0" class="form-control" id="amount" name="amount" autocomplete="off" required="" placeholder="0.00">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="submit" value="Siguiente" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <img class="img-responsive pull-right" src="<?php echo base_url('assets/images/colafi2019-logo.jpg'); ?>" alt="logo" />
                                            <img class="img-responsive pull-right" src="https://ssl.comodo.com/images/trusted-site-seal.png" alt="Comodo Trusted Site Seal" width="113" height="59" style="border: 0px;">
                                            <img class="img-responsive pull-right" src="https://i76.imgup.net/accepted_c22e0.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CREDIT CARD FORM ENDS HERE -->
                        </form>
                        <?php else: ?>
                            <?php
                                include_once 'core/security.php';
                                /** Cybersource stuff */
                                $merchantId =  MERCHANT_ID;
                                $sessionId = time();
                                // DF TEST: 1snn5n9w, LIVE: k8vif92e
                                if (ENVIRONMENT == "development"){
                                    $orgId = "1snn5n9w";
                                    $postUrl = "https://testsecureacceptance.cybersource.com/silent/pay";
                                }else{
                                    $orgId = "k8vif92e";
                                    $postUrl = "https://secureacceptance.cybersource.com/silent/pay";
                                }

                                foreach($_REQUEST as $name => $value) {
                                    $params[$name] = $value;
                                }
                                $params['device_fingerprint_id'] = $sessionId;

                            ?>
                            <!-- Device fingerprint stuff -->
                            <p style="background:url('/sos/fp/clear.png?org_id=<?php echo $orgId; ?>&amp;session_id=<?php echo $merchantId; ?><?php echo $sessionId; ?>&amp;m=1')"></p>
                            <img src="/sos/fp/clear.png?org_id=<?php echo $orgId; ?>&amp;session_id=<?php echo $merchantId; ?><?php echo $sessionId; ?>&amp;m=2" alt="">
                            <object type="application/x-shockwave-flash" data="/sos/fp/fp.swf?org_id=<?php echo $orgId; ?>&amp;session_id=<?php echo $merchantId; ?><?php echo $sessionId; ?>" width="1" height="1" id="thm_fp">
                                <param name="movie"value="/sos//fp/fp.swf?org_id=<?php echo $orgId; ?>&amp;session_id=<?php echo $merchantId; ?><?php echo $sessionId; ?>" />
                                <div></div>
                            </object>
                            <script src="/sos/fp/tags.js?org_id=<?php echo $orgId; ?>&amp;session_id=<?php echo $merchantId; ?><?php echo $sessionId; ?>" type="text/javascript"> </script>
                            <noscript>
                                <iframe style="width: 100px; height: 100px; border: 0; position: absolute; top: -5000px;" src="/sos/fp/tags?org_id=<?php echo $orgId; ?>&amp;session_id=<?php echo $merchantId; ?><?php echo $sessionId; ?>" > </iframe>
                            </noscript>


                            <form role="form" name="confirmPago" id="confirmPago" method="post" action="<?php echo $postUrl;?>">
                                <?php
                                foreach($params as $name => $value) {
                                    echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
                                }
                                echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
                                ?>
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table">
                                        <div class="row display-tr">
                                            <h3 class="panel-title ecwid-h3">Información del comprador</h3>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_forename">Nombre</label>
                                                            <?php echo $params['bill_to_forename'];?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_surname">Apellido</label>
                                                            <?php echo $params['bill_to_surname'];?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_email">Email</label>
                                                            <?php echo $params['bill_to_email'];?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_phone">Teléfono</label>
                                                            <?php echo $params['bill_to_phone'];?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_address_line1">Dirección</label>
                                                            <?php echo $params['bill_to_address_line1'];?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_address_city">Municipio</label>
                                                            <?php echo $params['bill_to_address_city'];?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_address_state">Departamento</label>
                                                            <?php echo $params['bill_to_address_state'];?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="bill_to_address_city">Código postal</label>
                                                            <?php echo $params['bill_to_address_postal_code'];?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <img class="img-responsive pull-right" src="https://ssl.comodo.com/images/trusted-site-seal.png" alt="Comodo Trusted Site Seal" width="113" height="59" style="border: 0px;">
                                                <img class="img-responsive pull-right" src="https://i76.imgup.net/accepted_c22e0.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table">
                                        <div class="row display-tr">
                                            <h3 class="panel-title ecwid-h3">Tarjeta de cŕedito o débito</h3>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="card_number">Número de tarjeta</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="0000 0000 0000 0000" autocomplete="off" required="" autofocus maxlength="16">
                                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="card_cvn">CVV</label>
                                                            <input type="number" class="form-control" id="card_cvn" name="card_cvn" placeholder="CVV" autocomplete="off" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="card_type">Tipo de tarjeta</label>
                                                            <select id="card_type" name="card_type" class="custom-select form-control">
                                                                <option value="001">Visa</option>
                                                                <option value="002">Master Card</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="card_expiry_date">Fecha Exp.</label>
                                                            <select id="card_expiry_date" name="card_expiry_date" class="custom-select form-control">
                                                                <?php
                                                                for ($i = 0; $i <= 128; ++$i) {
                                                                    $time = strtotime(sprintf('+%d months', $i));
                                                                    $value = date('m-Y', $time);
                                                                    $label = date('F Y', $time);
                                                                    printf('<option value="%s">%s</option>', $value, $label);
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="ecwid-fieldLabel" for="format_amount">TOTAL</label>
                                                            <input type="number" class="form-control" id="amount" name="amount" autocomplete="off" required="" placeholder="0.00" readonly value="<?php echo $params['amount'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="html_element"></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="submit" value="Confirmar pago" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <img class="img-responsive pull-right" src="" alt="logo" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- CREDIT CARD FORM ENDS HERE -->
                            </form>
                        <?php endif; ?>
                </div>
		</div>
    </main>

<?php //else: ?>
    <!-- <script> window.location="<?//=SERVERURL?>facturacion-y-envio/" </script> -->
<?php //endif; ?>