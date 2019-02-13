<?php
	if($peticionAjax){
		require_once "../modelos/loginModelo.php";
	}else{
		require_once "./modelos/loginModelo.php";
	}

	class loginControlador extends loginModelo{

		public function iniciar_sesion_controlador(){
			$usuario=mainModel::limpiar_cadena($_POST['usuario']);
			$clave=mainModel::limpiar_cadena($_POST['clave']);

			$clave=mainModel::encryption($clave);

			$datosLogin=[
				"Usuario"=>$usuario,
				"Clave"=>$clave
			];

			$datosCuenta=loginModelo::iniciar_sesion_modelo($datosLogin);

			if($datosCuenta->rowCount()==1)
			{
				$row=$datosCuenta->fetch();
				session_start(['name'=>'adminsoswebstore']);
				$_SESSION['id']=$row['id'];
				$_SESSION['nombre']=$row['nombre'];
				$_SESSION['apellido']=$row['apellido'];
				setcookie('usuario',$row['usuario'],time()+2629750,'/');
				setcookie('clave',$row['clave'],time()+2629750,'/');
				return $urlLocation='<script> window.location="'.SERVERURL.'inicio/" </script>';
			}
			else
			{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El nombre de usuario y contraseña no son correctos o su cuenta puede estar deshabilitada",
					"Tipo"=>"error"
				];
				return mainModel::sweet_alert($alerta);
			}
		}

		public function iniciar_sesion_cookies_controlador($usuario, $contra)
		{
			$datosLogin=[
				"Usuario"=>$usuario,
				"Clave"=>$contra
			];

			$datosCuenta=loginModelo::iniciar_sesion_modelo($datosLogin);

			if($datosCuenta->rowCount()==1)
			{
				$row=$datosCuenta->fetch();
				session_start(['name'=>'adminsoswebstore']);
				$_SESSION['id']=$row['id'];
				$_SESSION['nombre']=$row['nombre'];
				$_SESSION['apellido']=$row['apellido'];
				setcookie('usuario',$row['usuario'],time()+2629750,'/');
				setcookie('clave',$row['clave'],time()+2629750,'/');
				return $urlLocation='<script> window.location="'.SERVERURL.'inicio/" </script>';
			}
			else
			{
				session_start(['name'=>'adminsoswebstore']);
				session_destroy();
				setcookie('usuario','',time()-3600,'/');
				setcookie('clave','',time()-3600,'/');
			}
		}
		
	}