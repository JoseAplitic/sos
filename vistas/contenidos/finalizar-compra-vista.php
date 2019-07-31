	<?php
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
	?>
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

			.finalizar-compra-contenedor{background-color:#fff;padding-top:50px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido{padding: 20px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .icono{text-align:center;margin-bottom:30px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .icono img{display:inline-block;width:200px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .texto{text-align:center;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .texto h4{font-size: 18pt;font-weight:bold;color: #000000;margin-bottom: 20px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .texto p{font-size: 14pt;color: #000000;margin-bottom: 20px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .texto a{font-size: 14pt;color: #0d6bb7;margin-bottom: 20px;text-decoration:none;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .texto a:hover{text-decoration:underline;}

			.finalizar-compra-contenedor .finalizar-compra-contenido .continuar{text-align:center;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .continuar a{background-color: #0d6bb7;border-width: 0px !important;border-radius: 0px;display: flex;margin: 10px auto;width: max-content;color: #fff;padding: 15px 100px;font-size:14pt;font-weight: bold;text-decoration: none;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .continuar a:hover{cursor:pointer;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .pedido-exitoso{text-align:center;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .pedido-exitoso .noticia{font-size: 18pt;margin-bottom:30px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .icono{text-align:center;margin-bottom:30px;}
			.finalizar-compra-contenedor .finalizar-compra-contenido .icono img{display:inline-block;width:200px;}
			
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

		<div class="finalizar-compra-contenedor boxed-width">
			<div class="finalizar-compra-contenido">
				<?php
					require_once "./controladores/finalizarCompraControlador.php";
    				$instanciaFinalizarCompra = new finalizarCompraControlador();
				?>

				<?php if (isset($_REQUEST['reason_code'])): ?>
					<?php if($_REQUEST['reason_code'] == 100): ?>
						<?php
							$datosPedido = $instanciaFinalizarCompra->obtener_datos_pedido_controlador($tipo, $id_usuario);
							$pedidoId = $instanciaFinalizarCompra->guardar_pedido_controlador($tipo, $id_usuario, $datosPedido);
						?>
						<div class="pedido-exitoso">
							<div class="icono">
								<img src="<?php echo SERVERURL; ?>vistas/assets/img/check.png">
							</div>
							<p class="noticia">Tu pedido se ha procesado exitosamente.</p>
							<div class="continuar">
								<a href="<?=SERVERURL?>pedido/<?=$pedidoId;?>/">Ver detalles del pedido</a>
							</div>
						</div>
					<?php else: ?>
						<style>
							.pago-tarjeta-error{text-align:center;}
							.pago-tarjeta-error .noticia{font-size: 18pt;margin-bottom:10px;}
							.pago-tarjeta-error .noticia .noticia-detalle{font-size: 14pt;margin-bottom:5px;}
							.boton-regresar{text-align:center;margin-top:30px;}
							.boton-regresar a{text-decoration:none;background-color: #0d6bb7;margin: 10px auto;width: max-content;color: #fff;padding: 10px 100px;font-size:14pt;font-weight: bold;}
							.boton-regresar a:hover{cursor:pointer;}
						</style>
						<div class="pago-tarjeta-error">
							<p class="noticia">Ha ocurrido un error al procesar el pago con tu tarjeta, vuelve a intentarlo.</p>
							<p class="noticia-detalle"><b>Resultado: </b><?=$_REQUEST['message']?></p>
							<p class="noticia-detalle"><b>Decisión: </b><?=$_REQUEST['decision']?></p>
							<div class="boton-regresar">
								<a href="<?=SERVERURL?>facturacion-y-envio/">Volver a intentar</a>
							</div>
						</div>
					<?php endif; ?>
				<?php elseif (isset($_REQUEST['pago_cheque'])): ?>
					<?php
						date_default_timezone_set('UTC');
						$dia=date('Y-m-d');
						$datosPedido=[
							"Nit" => $_POST["nit"],
							"NombreFactura" => $_POST["nombre-factura"],
							"DireccionFactura" => $_POST["direccion-factura"],
							"Nombre" => $_POST["nombre"],
							"Apellidos" => $_POST["apellidos"],
							"Correo" => $_POST["correo"],
							"Telefono" => $_POST["telefono"],
							"Direccion" => $_POST["direccion"],
							"Departamento" => $_POST["departamento"],
							"Municipio" => $_POST["municipio"],
							"Postal" => $_POST["postal"],
							"Observaciones" => $_POST["observaciones"],
							"Monto" => $_POST["monto"],
							"Fecha" => $dia,
							"Metodo" => "cheque"
						];
						$pedidoId = $instanciaFinalizarCompra->guardar_pedido_controlador($tipo, $id_usuario, $datosPedido);
					?>
					<div class="pedido-exitoso">
						<div class="icono">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/check.png">
						</div>
						<p class="noticia">Tu pedido se ha procesado exitosamente.</p>
						<div class="continuar">
							<a href="<?=SERVERURL?>pedido/<?=$pedidoId;?>/">Ver detalles del pedido</a>
						</div>
					</div>
				<?php elseif (isset($_REQUEST['pago_credito'])): ?>
					<?php
						date_default_timezone_set('UTC');
						$dia=date('Y-m-d');
						$datosPedido=[
							"Nit" => $_POST["nit"],
							"NombreFactura" => $_POST["nombre-factura"],
							"DireccionFactura" => $_POST["direccion-factura"],
							"Nombre" => $_POST["nombre"],
							"Apellidos" => $_POST["apellidos"],
							"Correo" => $_POST["correo"],
							"Telefono" => $_POST["telefono"],
							"Direccion" => $_POST["direccion"],
							"Departamento" => $_POST["departamento"],
							"Municipio" => $_POST["municipio"],
							"Postal" => $_POST["postal"],
							"Observaciones" => $_POST["observaciones"],
							"Monto" => $_POST["monto"],
							"Fecha" => $dia,
							"Metodo" => "credito"
						];
						$pedidoId = $instanciaFinalizarCompra->guardar_pedido_controlador($tipo, $id_usuario, $datosPedido);
					?>
					<div class="pedido-exitoso">
						<div class="icono">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/check.png">
						</div>
						<p class="noticia">Tu pedido se ha procesado exitosamente.</p>
						<div class="continuar">
							<a href="<?=SERVERURL?>pedido/<?=$pedidoId;?>/">Ver detalles del pedido</a>
						</div>
					</div>
				<?php else: ?>
					<script> window.location="<?=SERVERURL?>facturacion-y-envio/" </script>
				<?php endif; ?>
			</div>
		</div>
		

    </main>