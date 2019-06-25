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
				<div class="paso activo">
					<p>Facturación & envío</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png">
				</div>
				<div class="paso final">
					<a href="<?=SERVERURL;?>pago/"><p>Realiza el pago</p></a>
				</div>
			</div>

			<div class="formulario">
                    
			</div>
		</div>

    </main>

