	<?php		
		if ($loginUsuario)
		{
			echo '<script> window.location="'.SERVERURL.'" </script>';
		}
	?>
	
	<main class="full-width">

		
		<style type="text/css">

			main{
				background-color: #f5f5f5;
			}

			.breadcumb{background-color: #fff;color:#404040;font-size: 12pt;font-weight: bold;}
			.breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;padding: 20px 20px;}
			.breadcumb a{text-decoration: none;color: #404040;}
			.breadcumb a:hover{color: #ff110b;}.breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
			.breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
			.breadcumb ol li:last-child:after{display: none;}

			.registro-contenedor{background-color:#fff;}
			.registro-contenedor .registro-contenido{display: flex;flex-flow:row wrap;padding: 30px 20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row{width: 50%;padding: 20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title{padding:10px;border-bottom:1px solid #9e9d9d;margin-bottom:20px;padding-bottom:15px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title h4{color: #1a1818;font-size:24pt;font-weight:bold;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title a{color:#0d6bb7;font-size:12pt;text-decoration:none;font-weight:bold;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title a:hover{text-decoration:underline;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content{padding:10px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content > p:nth-child(1), .registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form label{color: #000;font-size:14pt;font-weight:bold;margin-bottom:5px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content > p:nth-child(2){color:#a19fa0;margin-bottom: 30px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form label{display: block;width: 100%;margin-bottom:5px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input{display: block;width: 100%;border: 1px solid #c9c9c9;outline:0px !important;border-radius:4px;padding:10px;font-size:12pt;margin-bottom:20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input:focus{border-color:#ec110b;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .requisitos-password{color:#636363;font-size:11pt;line-height:1.2;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .requisitos-password ul{padding-left: 15px;margin-bottom: 15px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .advertencia{margin-top:10px;color:#a19fa0;margin-bottom:20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .olvido-password a{color:#0d6bb7;text-decoration:none;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .olvido-password a:hover{text-decoration:underline;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > input{display:inline;width:max-content;margin-right:10px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > label{display:inline;width:max-content;color:#0d6bb7;font-size: 12pt;font-weight:normal;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > input:hover, .registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > label:hover{cursor:pointer;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input[type="submit"]{
				background-color: #0d6bb7;border-width: 0px !important;border-radius:0px;display:flex;margin:50px auto;width:max-content;color:#fff;padding:15px 150px;font-weight:bold;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input[type="submit"]:hover{cursor:pointer;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro{text-align:center;margin-top: 15px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro a{color:#777575;text-decoration:none;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro a:hover{text-decoration:underline;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .RespuestaAjax{padding: 20px 0px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content .visitar-registro a{display:block;background-color:#f0f0f0;color:#100f0f;text-decoration:none;text-align:center;font-size:12pt;padding: 20px;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-ms-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content .visitar-registro a:hover{background-color:#e3e3e3;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-ms-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}

			.registro-contenedor .registro-contenido .registro-contenido-row.row-2{background-color:#ec110b;color:#fff;padding: 120px 20px 120px 20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .logo{text-align:center;border-bottom:1px solid #fff;padding-bottom: 50px;margin-bottom:50px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .logo > img{width:220px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios > p{padding:0px 50px;text-align:center;font-weight:bold;font-size:14pt;margin-bottom:50px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios{padding:0px 100px 0px 120px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio{display:flex;flex-flow:row nowrap;align-items:center;margin-bottom:30px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono{width:60px;flex: 0 0 auto;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono img{width:100%;display: block;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto{flex: 1 1 auto;padding-left:20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto p{font-size: 16pt;width: 100%;}

		</style>

		<div class="registro-contenedor boxed-width">

			<div class="breadcumb">
				<div class="content">
					<ol class="breadcrumb">
						<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
						<li>Login</li>
						<li class="active">Ingreso</li>
					</ol>
				</div>
			</div>
			
			<div class="registro-contenido">
				<div class="registro-contenido-row row-1">
					<div class="title">
						<h4>Inicia tu sesión</h4>
					</div>
					<div class="content">
						<form action="<?php echo SERVERURL; ?>ajax/loginAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							
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
								<div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/garantia.png"></div>
								<div class="texto"><p>Acceso a planes de protección extendida.</p></div>
							</div>
							<div class="beneficio">
								<div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/soporte.png"></div>
								<div class="texto"><p>Asesoría personalizada en todas tus compras.</p></div>
							</div>
							<div class="beneficio">
								<div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/website.png"></div>
								<div class="texto"><p>Información en línea de productos mejorada.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

    </main>