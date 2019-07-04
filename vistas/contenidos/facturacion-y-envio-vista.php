<?php
/*
*/
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

require_once "./controladores/cargarInfoCarritoControlador.php";
$instanciaCargarInfoCarrito = new cargarInfoCarritoControlador();
$hayCarrito = $instanciaCargarInfoCarrito->verificar_carrito_controlador($tipo, $id_usuario);
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

			.datos-contenedor{background-color:#fff;padding: 30px 20px;}
			.datos-contenedor .title{font-size:24pt;font-weight:bold;margin-bottom:30px;}
			.datos-contenedor .menu-proceso-compra{margin-bottom:30px;display:flex;flex-flow:row wrap;align-items:center;}
			.datos-contenedor .menu-proceso-compra .paso{width:25%;display:flex;flex-flow:row nowrap;align-items:center;padding:10px 20px;height:60px;color:#fff;position:relative;}

			.datos-contenedor .menu-proceso-compra .paso:after{content: " ";position: absolute;display: block;width: 0;height: 0;}
			.datos-contenedor .menu-proceso-compra .paso:before, .datos-contenedor .menu-proceso-compra .paso:after{border-bottom: 30px solid transparent;border-top: 30px solid transparent;top:0px;}
			.datos-contenedor .menu-proceso-compra .paso:after{right: -20px;z-index: 2;}
			.datos-contenedor .menu-proceso-compra .paso:before{right: -20px;z-index: 1;}
			.datos-contenedor .menu-proceso-compra .paso:nth-child(2n+1):before,
			.datos-contenedor .menu-proceso-compra .paso:nth-child(2n+1):after{border-left: 20px solid #0c63b3;}
			.datos-contenedor .menu-proceso-compra .paso:nth-child(2n):before,
			.datos-contenedor .menu-proceso-compra .paso:nth-child(2n):after{border-left: 20px solid #094ea4;}
			.datos-contenedor .menu-proceso-compra .paso.activo:before,
			.datos-contenedor .menu-proceso-compra .paso.activo:after{border-left: 20px solid #c1b700;}
			.datos-contenedor .menu-proceso-compra .paso.final:before,
			.datos-contenedor .menu-proceso-compra .paso.final:after{content:none;}

			.datos-contenedor .menu-proceso-compra .paso:nth-child(2n+1){background-color:#0c63b3;}
			.datos-contenedor .menu-proceso-compra .paso:nth-child(2n){background-color:#094ea4;}
			.datos-contenedor .menu-proceso-compra .paso.activo{background-color:#c1b700;}
			.datos-contenedor .menu-proceso-compra .paso>p{flex:1 0 auto;text-align:center;font-size:14pt;}
			.datos-contenedor .menu-proceso-compra .paso>img{height:40px;width:auto;flex: 0 0 auto;position:relative;right:-20px;}
			.datos-contenedor .menu-proceso-compra .paso>a{width:100%;color:#fff;text-decoration:none;display:flex;flex-flow:row wrap;align-items:center;}
			.datos-contenedor .menu-proceso-compra .paso>a>p{flex:1 0 auto;text-align:center;font-size:14pt;}
			.datos-contenedor .menu-proceso-compra .paso>a>img{height:40px;width:auto;flex: 0 0 auto;position:relative;right:-20px;}

			.datos-contenedor{background-color:#fff;}
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

		<div class="datos-contenedor boxed-width">
			<div class="title"><p>Carrito de compras</p></div>
			<div class="menu-proceso-compra">
				<div class="paso">
					<a href="<?=SERVERURL;?>carrito/"><p>Carrito de compras</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso">
                    <a href="<?=SERVERURL;?>login-compra/"><p>Iniciar sesión</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso activo">
					<p>Facturación & envío</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png">
				</div>
				<div class="paso final">
					<a href="<?=SERVERURL;?>pago/"><p>Realiza el pago</p></a>
				</div>
			</div>
			<?php if($hayCarrito):
				$datosCliente = $instanciaCargarInfoCarrito->cargar_datos_usuario_controlador($tipo, $id_usuario);
				?>
				<style>
					.datos-contenedor .datos-contenido{display: flex;flex-flow:row wrap;}
					.datos-contenedor .datos-contenido .datos-contenido-row{width: 50%;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-1{padding-right: 20px;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-2{padding-left: 20px;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-3{margin:30px 0px;width:100%;}
					.datos-contenedor .datos-contenido .datos-contenido-row .titulo{border-bottom: 1px solid #9e9d9d;padding-bottom:20px;margin-bottom:20px;}
					.datos-contenedor .datos-contenido .datos-contenido-row .titulo .encabezado{font-size:24pt;font-weight:bold;margin-bottom:5px;}
					.datos-contenedor .datos-contenido .datos-contenido-row .titulo .comentario{color:#0d6bb7;font-size:12pt;}
					.datos-contenedor .datos-contenido .datos-contenido-row .instruccion{margin-bottom:20px;}
					.datos-contenedor .datos-contenido .datos-contenido-row .instruccion .encabezado{font-size:14pt;font-weight:bold;margin-bottom:5px;}
					.datos-contenedor .datos-contenido .datos-contenido-row .instruccion .comentario{color:#a4a2a3;font-size:12pt;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario label{display:block;font-size:14pt;font-weight:bold;margin-bottom:5px;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario input{display:block;width:100%;font-size:14pt;margin-bottom:10px;padding:10px;border-radius:5px;border: 1px solid #c9c9c9;outline:0;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario input:focus{border-color: #ec110b;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario textarea{display:block;width:100%;font-size:14pt;margin-bottom:10px;padding:10px;border-radius:5px;border: 1px solid #c9c9c9;outline:0;height:120px;resize: none;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario textarea:focus{border-color: #ec110b;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario .form-dos-columnas{display:flex;flex-flow:row wrap;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario .form-dos-columnas .form-columna{width:50%;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario .form-dos-columnas .form-columna-1{padding-right:10px;}
					.datos-contenedor .datos-contenido .datos-contenido-row .formulario .form-dos-columnas .form-columna-2{padding-left:10px;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-3 .continuar{text-align:center;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-3 .continuar input[type="submit"]{background-color: #0d6bb7;border-width: 0px !important;border-radius: 0px;display: flex;margin: 10px auto;width: max-content;color: #fff;padding: 15px 150px;font-weight: bold;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-3 .continuar input[type="submit"]:hover{cursor:pointer;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-3 .regresar{text-align:center;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-3 .regresar a{font-size:12pt;color: #777575;text-decoration:none;}
					.datos-contenedor .datos-contenido .datos-contenido-row.row-3 .regresar a:hover{text-decoration:underline;}
				</style>
				<form action="<?=SERVERURL?>pago/" method="POST">
					<div class="datos-contenido">
						<div class="datos-contenido-row row-1">
							<div class="titulo">
								<p class="encabezado">Datos de Facturación</p>
								<p class="comentario">Ingresa tus datos contables para poder envíarte tu factura con tu pedido.</p>
							</div>
							<div class="instruccion">
								<p class="encabezado">Ingresa la siguiente información:</p>
								<p class="comentario">*Campos requeridos</p>
							</div>
							<div class="formulario">
								<?php
									$readonly="";
									if($tipo == "empresarial")
									{
										$readonly = "readonly";
									}
								?>
								<label for="nit">NIT *</label>
								<input id="nit" name="nit" type="text" value="<?=$datosCliente["Nit"]?>" required="" <?=$readonly?>>
								<label for="nombre-factura">Nombre en la factura *</label>
								<input id="nombre-factura" name="nombre-factura" type="text" value="<?=$datosCliente["NombreFactura"]?>" required="" <?=$readonly?>>
								<label for="direccion-factura">Dirección *</label>
								<input id="direccion-factura" name="direccion-factura" type="text" value="<?=$datosCliente["DireccionFactura"]?>" required="" <?=$readonly?>>
							</div>
						</div>
						<div class="datos-contenido-row row-2">
							<div class="titulo">
								<p class="encabezado">Dirección de Entrega</p>
								<p class="comentario">Te estaremos enviando tu pedido a la dirección que nos indiques.</p>
							</div>
							<div class="instruccion">
								<p class="encabezado">Ingresa la siguiente información:</p>
								<p class="comentario">*Campos requeridos</p>
							</div>
							<div class="formulario">
								<label for="nombre">Nombre *</label>
								<input id="nombre" name="nombre" type="text" value="<?=$datosCliente["Nombre"]?>" required="">
								<label for="apellidos">Apellidos *</label>
								<input id="apellidos" name="apellidos" type="text" value="<?=$datosCliente["Apellidos"]?>" required="">
								<label for="correo">Correo electrónico *</label>
								<input id="correo" name="correo" type="text" value="<?=$datosCliente["Correo"]?>" required="">
								<label for="telefono">Teléfono *</label>
								<input id="telefono" name="telefono" type="text" value="<?=$datosCliente["Telefono"]?>" required="">
								<label for="direccion-linea-1">Dirección *</label>
								<input id="direccion-linea-1" name="direccion-linea-1" type="text" value="<?=$datosCliente["Direccion1"]?>" required="">
								<input id="direccion-linea-2" name="direccion-linea-2" type="text" value="<?=$datosCliente["Direccion2"]?>" required="">
								<label for="pais">País *</label>
								<input id="pais" name="pais" type="text" value="<?=$datosCliente["Pais"]?>" required="">
								<label for="departamento">Departamento *</label>
								<input id="departamento" name="departamento" type="text" value="<?=$datosCliente["Departamento"]?>" required="">
								<div class="form-dos-columnas">
									<div class="form-columna form-columna-1">
										<label for="municipio">Municipio *</label>
										<input id="municipio" name="municipio" type="text" value="<?=$datosCliente["Municipio"]?>" required="">
									</div>
									<div class="form-columna form-columna-2">
										<label for="postal">Código postal *</label>
										<input id="postal" name="postal" type="text" value="<?=$datosCliente["Postal"]?>" required="">
									</div>
								</div>
								<label for="observaciones">Observaciones</label>
								<textarea id="observaciones" name="observaciones"></textarea>
							</div>
						</div>
						<div class="datos-contenido-row row-3">
							<div class="continuar">
								<input type="submit" value="Continuar">
							</div>
							<div class="regresar">
								<a href="<?=SERVERURL?>carrito/">Regresar</a>
							</div>
						</div>
					</div>
				</form>
			<?php else: ?>
				<style>
					.carrito-vacio{text-align:center;}
					.carrito-vacio p{font-size: 18pt;font-weight:bold;line-height:1.2;margin-bottom:20px;}
					.carrito-vacio a{font-size: 14pt;background-color:#0d6bb7;color:#fff;text-decoration:none;padding:10px 20px;}
				</style>
				<div class="carrito-vacio">
					<p>¡No hay productos en tu carrito!</p>
					<a href="<?=SERVERURL?>">Volver a la tienda</a>
				</div>
			<?php endif;?>
		</div>

    </main>

