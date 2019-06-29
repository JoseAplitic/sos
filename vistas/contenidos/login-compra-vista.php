<?php

if ($loginUsuario)
{
	echo '<script> window.location="'.SERVERURL.'facturacion-y-envio/" </script>';
}

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

			.carrito-contenedor{background-color:#fff;}
			.carrito-contenedor .registro-contenido{display: flex;flex-flow:row wrap;padding: 30px 20px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row{width: 50%;padding: 20px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .title{padding:10px;border-bottom:1px solid #9e9d9d;margin-bottom:20px;padding-bottom:15px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .title h4{color: #1a1818;font-size:24pt;font-weight:bold;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .title a{color:#0d6bb7;font-size:12pt;text-decoration:none;font-weight:bold;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .title a:hover{text-decoration:underline;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content{padding:10px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content > p:nth-child(1), .carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form label{color: #000;font-size:14pt;font-weight:bold;margin-bottom:5px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content > p:nth-child(2){color:#a19fa0;margin-bottom: 30px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form label{display: block;width: 100%;margin-bottom:5px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input{display: block;width: 100%;border: 1px solid #c9c9c9;outline:0px !important;border-radius:4px;padding:10px;font-size:12pt;margin-bottom:20px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input:focus{border-color:#ec110b;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .requisitos-password{color:#636363;font-size:11pt;line-height:1.2;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .requisitos-password ul{padding-left: 15px;margin-bottom: 15px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .advertencia{margin-top:10px;color:#a19fa0;margin-bottom:20px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .olvido-password a{color:#0d6bb7;text-decoration:none;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .olvido-password a:hover{text-decoration:underline;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > input{display:inline;width:max-content;margin-right:10px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > label{display:inline;width:max-content;color:#0d6bb7;font-size: 12pt;font-weight:normal;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > input:hover, .carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > label:hover{cursor:pointer;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input[type="submit"]{
				background-color: #0d6bb7;border-width: 0px !important;border-radius:0px;display:flex;margin:20px auto;width:max-content;color:#fff;padding:15px 150px;font-weight:bold;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input[type="submit"]:hover{cursor:pointer;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro{text-align:center;margin-top: 15px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro a{color:#777575;text-decoration:none;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro a:hover{text-decoration:underline;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .RespuestaAjax{padding: 20px 0px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content .visitar-registro{margin-bottom:10px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content .visitar-registro a{display:block;background-color:#f0f0f0;color:#100f0f;text-decoration:none;text-align:center;font-size:12pt;padding: 20px;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-ms-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-1 .content .visitar-registro a:hover{background-color:#e3e3e3;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-ms-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}

			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2{background-color:#f58885;color:#fff;padding: 120px 20px 120px 20px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .logo{text-align:center;border-bottom:1px solid #fff;padding-bottom: 50px;margin-bottom:50px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .logo > img{width:220px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios > p{padding:0px 50px;text-align:center;font-weight:bold;font-size:14pt;margin-bottom:50px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios{padding:0px 100px 0px 120px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio{display:flex;flex-flow:row nowrap;align-items:center;margin-bottom:30px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono{width:60px;flex: 0 0 auto;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono img{width:100%;display: block;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto{flex: 1 1 auto;padding-left:20px;}
			.carrito-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto p{font-size: 16pt;width: 100%;}
			
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
				<div class="paso activo">
					<p>Iniciar sesión</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png">
				</div>
				<div class="paso">
					<a href="<?=SERVERURL;?>facturacion-y-envio/"><p>Facturación & envío</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso final">
					<a href="<?=SERVERURL;?>pago/"><p>Realiza el pago</p></a>
				</div>
			</div>
            <div class="registro-contenido">
				<div class="registro-contenido-row row-1">
					<div class="title">
						<h4>Inicia tu sesión</h4>
					</div>
					<div class="content">
						<form action="<?php echo SERVERURL; ?>ajax/loginAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							
							<input type="hidden" name="carrito">

							<label for="correo">Correo electrónico</label>
							<input id="correo" type="text" name="correo" class="FormularioAjaxCampo" required="">
							
							<label for="password">Contraseña</label>
							<input id="password" type="password" name="password" class="FormularioAjaxCampo" required="">

							<div class="advertencia">
								<p>Al continuar, aceptas nuestros Términos y condiciones, y nuestra Política de privacidad.</p>
							</div>

							<div class="olvido-password">
								<a href="#">¿Olvidaste tu contraseña? Reiniciala</a>
							</div>
							
							<input class="boton-registro" type="submit" value="Ingresar">
							<div class="RespuestaAjax"></div>

						</form>

						<div class="visitar-registro">
							<a href="<?php echo SERVERURL; ?>registro/">¿No tienes una cuenta? Crea una.</a>
						</div>

						<div class="visitar-registro">
							<a href="<?php echo SERVERURL; ?>facturacion-y-envio/">Continuar sin cuenta...</a>
						</div>
					</div>
				</div>
				<div class="registro-contenido-row row-2">
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

