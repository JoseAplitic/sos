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

			.carrito-contenedor .carrito-items{margin-bottom: 30px;}
			.carrito-contenedor .carrito-items .row{display:flex;flex-flow:row nowrap;align-items:center;border-bottom:1px solid #b2b2b2;}
			.carrito-contenedor .carrito-items .row .w60{width:60%;}
			.carrito-contenedor .carrito-items .row .w20{width:20%;}
			.carrito-contenedor .carrito-items .row.cabecera{padding:20px 20px;}
			.carrito-contenedor .carrito-items .row.cabecera div p{text-align:center;color: #000;font-size:14pt;}
			.carrito-contenedor .carrito-items .row.cabecera div.texto-left p{text-align:left;}
			
			.carrito-contenedor .carrito-items .row.item{padding:20px 10px;}
			.carrito-contenedor .carrito-items .row.item .column > p{text-align:center;font-weight:bold;font-size:14pt;}
			.carrito-contenedor .carrito-items .row.item .column.cantidad{display:flex;flex-flow:column wrap;align-items:center;justify-content:center;}
			.carrito-contenedor .carrito-items .row.item .column.cantidad form{display:block;}
			.carrito-contenedor .carrito-items .row.item .column.cantidad form input[type="number"]{width:90px;padding:7px;font-weight:bold;font-size:14pt;text-align:center;border:1px solid #c9c9c9;background-color:#f5f5f5;}
			.carrito-contenedor .carrito-items .row.item .column.cantidad form input:focus{outline:0px;border-color:#ec110b;}
			.carrito-contenedor .carrito-items .row.item .column.cantidad form input[type="submit"]{margin-top:5px;border-width:0px;background:transparent;color:#0d6bb7;}
			.carrito-contenedor .carrito-items .row.item .column.cantidad form input[type="submit"]:hover{text-decoration:underline;cursor:pointer;}
			.carrito-contenedor .carrito-items .row.item .producto{display:flex;flex-flow:row nowrap;align-items:center;}
			.carrito-contenedor .carrito-items .row.item .producto .imagen{width:100px;flex: 0 0 auto;}
			.carrito-contenedor .carrito-items .row.item .producto .imagen img{width:100%;display:block;}
			.carrito-contenedor .carrito-items .row.item .producto .texto{flex: 1 0 auto;padding-left:20px;}
			.carrito-contenedor .carrito-items .row.item .producto .texto a{text-decoration:none;}
			.carrito-contenedor .carrito-items .row.item .producto .texto a:hover .nombre{color:#ec110b;}
			.carrito-contenedor .carrito-items .row.item .producto .texto a:hover .sku{color:#ec110b;}
			.carrito-contenedor .carrito-items .row.item .producto .texto a .nombre{display:block;font-size:14pt;font-weight:normal;color:#000;margin-bottom:5px;}
			.carrito-contenedor .carrito-items .row.item .producto .texto a .sku{display:block;color:#7b7b7b;font-size:10pt;}
			
			.carrito-contenedor .total-contenedor{display:flex;flex-flow:row nowrap;justify-content:flex-end;}
			.carrito-contenedor .total-contenedor .total{width:40%;background-color:#f5f5f5;border:1px solid #c9c9c9;padding:20px 30px;display:flex;flex-flow:row wrap;align-items:center;}
			.carrito-contenedor .total-contenedor .total .texto-total,.carrito-contenedor .total-contenedor .total .numero-total{width:50%;font-size:18pt;font-weight:bold;}
			.carrito-contenedor .total-contenedor .total .numero-total{text-align:right;}
			.carrito-contenedor .total-contenedor .total .enlace{width:100%;margin-top:20px;}
			.carrito-contenedor .total-contenedor .total .enlace a{width:100%;display:block;background-color:#6cb819;font-size:18pt;font-weight:bold;color:#fff;text-decoration:none;padding:10px;text-align:center;}
			.carrito-contenedor .total-contenedor .total .enlace a:hover{background-color:#5fa116;}
			

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
				<div class="paso activo">
					<p>Carrito de compras</p>
					<img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png">
				</div>
				<div class="paso">
					<a href="#registro"><p>Iniciar sesión</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso">
					<a href="#registro"><p>Facturación & envío</p><img src="<?php echo SERVERURL; ?>vistas/assets/img/step-arrow.png"></a>
				</div>
				<div class="paso final">
					<a href="#registro"><p>Realiza el pago</p></a>
				</div>
			</div>
			<div id="carro" class="full-width">
				<?php
					require_once "./controladores/carritoPaginaControlador.php";
					$instanciaCargarCarrito = new carritoPaginaControlador();
					echo $instanciaCargarCarrito::cargar_carrito($tipo, $id_usuario);
				?>
			</div>
		</div>
		
		<script>
			$('input[type="number"]').change(function()
			{
				if($(this).val() > 0)
				{
					$(this).parent('form').submit();
				}
			});
			$('form').keypress(function(e)
			{
				if(e == 13)
				{
					$(this).children('input[type="number"]').blur();
					return false;
				}
			});
			$('input').keypress(function(e)
			{
				if(e.which == 13)
				{
					$(this).blur();
					return false;
				}
			});
		</script>
		

    </main>