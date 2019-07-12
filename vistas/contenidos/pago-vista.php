
<?php
if(isset($_POST["nit"]) && isset($_POST["nombre-factura"]) && isset($_POST["direccion-factura"]) && isset($_POST["bill_to_forename"]) && isset($_POST["bill_to_surname"]) && isset($_POST["bill_to_email"]) && isset($_POST["bill_to_phone"]) && isset($_POST["bill_to_address_line1"]) && isset($_POST["bill_to_address_state"]) && isset($_POST["bill_to_address_city"]) && isset($_POST["bill_to_address_postal_code"]) && isset($_POST["observaciones"])):
    
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

    $datosPedidoCliente = [
        "Nit" => $_POST["nit"],
        "NombreFactura" => $_POST["nombre-factura"],
        "DireccionFactura" => $_POST["direccion-factura"],
        "Nombre" => $_POST["bill_to_forename"],
        "Apellidos" => $_POST["bill_to_surname"],
        "Correo" => $_POST["bill_to_email"],
        "Telefono" => $_POST["bill_to_phone"],
        "Direccion1" => $_POST["bill_to_address_line1"],
        "Departamento" => $_POST["bill_to_address_state"],
        "Municipio" => $_POST["bill_to_address_city"],
        "Postal" => $_POST["bill_to_address_postal_code"],
        "Observaciones" => $_POST["observaciones"]
    ];
    require_once "./controladores/cargarInfoCarritoControlador.php";
    $instanciaCargarInfoCarrito = new cargarInfoCarritoControlador();
    $instanciaCargarInfoCarrito->guardar_datos_usuario_controlador($tipo, $id_usuario, $datosPedidoCliente);
    /*
    */
    ini_set('display_errors', 1);
    error_reporting(E_ALL);          
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

			.carrito-contenedor .carrito-contenido{display: flex;flex-flow:row wrap;padding: 0px 20px 30px 20px;}
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
			
            .carrito-contenedor .carrito-contenido .carrito-contenido-row.row-1 .regresar{margin-bottom:10px;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-1 .regresar a{display:block;background-color:#f0f0f0;color:#100f0f;text-decoration:none;text-align:center;font-size:12pt;padding: 20px;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-ms-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}
			.carrito-contenedor .carrito-contenido .carrito-contenido-row.row-1 .regresar a:hover{background-color:#e3e3e3;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-ms-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}

            .cheques{background-color: #f0f0f0;padding:20px;}
            .cheques .titular{font-size:12pt;font-weight:bold;margin-bottom:10px;}
            .cheques .contenido{font-size:12pt;line-height:1.2;}

            .form-dos-columnas{display:flex;flex-flow:row wrap;}
            .form-dos-columnas .form-columna{width:50%;}
            .form-dos-columnas .form-columna-1{padding-right:10px;}
            .form-dos-columnas .form-columna-2{padding-left:10px;}

            .metodo-pago .opciones .opcion form label{display:block;font-size:14pt;font-weight:bold;margin-bottom:5px;}
            .metodo-pago .opciones .opcion form input{display:block;width:100%;font-size:14pt;margin-bottom:20px;padding:10px;border-radius:5px;border: 1px solid #c9c9c9;outline:0;}
            .metodo-pago .opciones .opcion form input:focus{border-color: #ec110b;}
            .metodo-pago .opciones .opcion form select{display:block;width:100%;font-size:14pt;margin-bottom:20px;padding:10px;border-radius:5px;border: 1px solid #c9c9c9;outline:0;}
            .metodo-pago .opciones .opcion form select:focus{border-color: #ec110b;}
            .metodo-pago .opciones .opcion form textarea{display:block;width:100%;font-size:14pt;margin-bottom:10px;padding:10px;border-radius:5px;border: 1px solid #c9c9c9;outline:0;height:120px;resize: none;}
            .metodo-pago .opciones .opcion form textarea:focus{border-color: #ec110b;}

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
                                        <div class="cheques">
                                            <p class="titular">Cheques depositar a nombre de: Smart Office Solutions</p>
                                            <p class="contenido">
                                                - Banrural No. 3118013733<br>
                                                - Banco Industrial No. 1720051323<br>
                                                - G&T Continental No. 048-0001526-3<br>
                                                - BAM No. 30-4018489-8<br>
                                                - Inter Banco No. 1402-00102-9<br>
                                                - BAC No. 90-041479-8<br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="metodo-botones">
                                        <div class="continuar">
                                            <input type="submit" value="Continuar">
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
                                    <form role="form" name="confirmPago" id="confirmPago" method="post" action="<?php echo $postUrl;?>">
                                        <div class="metodo-elementos">
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
                                                <?php
                                                foreach($params as $name => $value) {
                                                    echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
                                                }
                                                echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
                                                ?>
                                                <label class="ecwid-fieldLabel" for="card_type">Tipo de tarjeta *</label>
                                                <select id="card_type" name="card_type" class="custom-select form-control" required="">
                                                    <option value="001">Visa</option>
                                                    <option value="002">Master Card</option>
                                                </select>

                                                <label class="ecwid-fieldLabel" for="card_number">Número de tarjeta *</label>
                                                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="0000 0000 0000 0000" autocomplete="off" required="" autofocus maxlength="16">
                                                
                                                <div class="form-dos-columnas">
                                                    <div class="form-columna form-columna-1">
                                                        <label class="ecwid-fieldLabel" for="card_cvn">CVV *</label>
                                                        <input type="number" class="form-control" id="card_cvn" name="card_cvn" placeholder="CVV" autocomplete="off" required="">
                                                    </div>
                                                    <div class="form-columna form-columna-2">
                                                        <label class="ecwid-fieldLabel" for="card_expiry_date">Fecha Exp. *</label>
                                                        <select id="card_expiry_date" name="card_expiry_date" class="custom-select form-control" required="">
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
                                        </div>
                                        <div class="metodo-botones">
                                            <div class="continuar">
                                                <input type="submit" value="Continuar">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php if ($tipo=="empresarial"): ?>
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
                                            <p>Continua para que tu pedido sea procesado.</p>
                                        </div>
                                        <div class="metodo-botones">
                                            <div class="continuar">
                                                <input type="submit" value="Continuar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>                    
                    <div class="regresar">
                        <a href="<?=SERVERURL?>facturacion-y-envio/">Regresar</a>
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
		</div>
    </main>

<?php else: ?>
    <script> window.location="<?=SERVERURL?>facturacion-y-envio/" </script>
<?php endif; ?>