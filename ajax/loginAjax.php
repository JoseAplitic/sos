<?php
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	session_start(['name'=>'adminsoswebstore']);
	session_destroy();
	setcookie('usuario','',time()-3600,'/');
	setcookie('clave','',time()-3600,'/');
	echo "true";
