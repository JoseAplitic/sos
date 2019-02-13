<?php
	if (isset($_COOKIE['usuario']) && isset($_COOKIE['clave']))
	{
		require_once "./controladores/loginControlador.php";
		$login = new loginControlador();
		echo $login->iniciar_sesion_cookies_controlador($_COOKIE['usuario'], $_COOKIE['clave']);
	}
	else
	{
		if(isset($_POST['usuario']) && isset($_POST['clave'])){
			require_once "./controladores/loginControlador.php";
			$login = new loginControlador();
			echo $login->iniciar_sesion_controlador();
		}
	}
?>

<style type="text/css">
body{
	height: 100vh;
	display: flex;
	flex-flow: column nowrap;
	justify-content: center;
	background: #f2f2f2;
	background: -moz-radial-gradient(center, ellipse cover, #f2f2f2 0%, #dbdbdb 50%, #b3b3b3 100%);
	background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #f2f2f2), color-stop(50%, #dbdbdb), color-stop(100%, #b3b3b3));
	background: -webkit-radial-gradient(center, ellipse cover, #f2f2f2 0%, #dbdbdb 50%, #b3b3b3 100%);
	background: -o-radial-gradient(center, ellipse cover, #f2f2f2 0%, #dbdbdb 50%, #b3b3b3 100%);
	background: -ms-radial-gradient(center, ellipse cover, #f2f2f2 0%, #dbdbdb 50%, #b3b3b3 100%);
	background: radial-gradient(ellipse at center, #f2f2f2 0%, #dbdbdb 50%, #b3b3b3 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#b3b3b3', GradientType=1 );
}
</style>
<div class="sufee-login d-flex align-content-center flex-wrap align-middle">
    <div class="container">
        <div class="login-content">
            <div class="login-form">
		        <div class="login-logo">
		            <img class="align-content" src="<?php echo SERVERURL; ?>vistas/assets/img/logo.png" alt="">
		        </div>
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Usuario o correo electrónico</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario o correo electrónico" required="">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="clave" class="form-control" placeholder="Contraseña" required="">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>