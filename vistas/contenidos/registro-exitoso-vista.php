	<?php		
		if ($loginUsuario == false)
		{
			echo '<script> window.location="'.SERVERURL.'" </script>';
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

			.registro-exitoso-contenedor{background-color:#fff;}
			.registro-exitoso-contenedor .registro-exitoso-contenido{padding: 100px 150px;}
			.registro-exitoso-contenedor .registro-exitoso-contenido .icono{text-align:center;margin-bottom:30px;}
			.registro-exitoso-contenedor .registro-exitoso-contenido .icono img{display:inline-block;width:200px;}
			.registro-exitoso-contenedor .registro-exitoso-contenido .texto{text-align:center;}
			.registro-exitoso-contenedor .registro-exitoso-contenido .texto h4{font-size: 18pt;font-weight:bold;color: #000000;margin-bottom: 20px;}
			.registro-exitoso-contenedor .registro-exitoso-contenido .texto p{font-size: 14pt;color: #000000;margin-bottom: 20px;}
			.registro-exitoso-contenedor .registro-exitoso-contenido .texto a{font-size: 14pt;color: #0d6bb7;margin-bottom: 20px;text-decoration:none;}
			.registro-exitoso-contenedor .registro-exitoso-contenido .texto a:hover{text-decoration:underline;}
			
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

		<div class="registro-exitoso-contenedor boxed-width">
			<div class="registro-exitoso-contenido">
				<div class="icono">
					<img src="<?php echo SERVERURL; ?>vistas/assets/img/check.png">
				</div>
				<div class="texto">
					<h4>¡Te has registrado con éxito en GoSmartOffice.com!</h4>
					<p>Ahora puede usar GoSmartOffice.com para todas sus compras y obtener una garantía del 100%.<br/>Le reembolsaremos si su pedido no llega o es sustancialmente diferente de lo que se describió.</p>
					<a href="<?php echo SERVERURL; ?>">¡Ház clic aqui para continuar comprando!</a>
				</div>
			</div>
		</div>
		

    </main>