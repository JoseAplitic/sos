<?php
	if($peticionAjax){
		require_once "../modelos/loginModelo.php";
	}else{
		require_once "./modelos/loginModelo.php";
	}

	class loginControlador extends loginModelo{

		public function iniciar_sesion_controlador()
		{
			$correo=mainModel::limpiar_cadena($_POST['correo']);
			$clave=mainModel::limpiar_cadena($_POST['password']);

			$clave=mainModel::encryption($clave);

			$datosLogin=[
				"Correo"=>$correo,
				"Clave"=>$clave
			];

			$datosCuenta=loginModelo::iniciar_sesion_persona_modelo($datosLogin);

				if($datosCuenta->rowCount()==1)
				{
					$row=$datosCuenta->fetch();
					session_start(['name'=>'usersoswebstore']);
					$_SESSION['user_id']=$row['id'];
					$_SESSION['user_nombre']=$row['nombre'];
					$_SESSION['user_apellido']=$row['apellido'];
					setcookie('user_correo',$row['correo'],time()+2629750,'/');
					setcookie('user_clave',$row['clave'],time()+2629750,'/');
					setcookie('user_tipo',"personal",time()+2629750,'/');
					return '<script> window.location="'.SERVERURL.'" </script>';
				}
				else
				{
					$datosCuenta=loginModelo::iniciar_sesion_empresa_modelo($datosLogin);

					if($datosCuenta->rowCount()==1)
					{
						$row=$datosCuenta->fetch();
						session_start(['name'=>'usersoswebstore']);
						$_SESSION['user_id']=$row['id'];
						$_SESSION['user_nombre']=$row['nombre'];
						$_SESSION['user_apellido']=$row['apellido'];
						setcookie('user_correo',$row['correo'],time()+2629750,'/');
						setcookie('user_clave',$row['clave'],time()+2629750,'/');
						setcookie('user_tipo',"empresarial",time()+2629750,'/');
						return '<script> window.location="'.SERVERURL.'" </script>';
					}
					else
					{
						echo "Correo o contraseña incorrecta.";
					}
				}
		}

		public function iniciar_sesion_automatica_controlador($correo, $contra, $tipo, $url)
		{

			$clave=mainModel::encryption($contra);

			$datosLogin=[
				"Correo"=>$correo,
				"Clave"=>$clave
			];

			if ($tipo == "personal")
			{
				$datosCuenta=loginModelo::iniciar_sesion_persona_modelo($datosLogin);

				if($datosCuenta->rowCount()==1)
				{
					$row=$datosCuenta->fetch();
					session_start(['name'=>'usersoswebstore']);
					$_SESSION['user_id']=$row['id'];
					$_SESSION['user_nombre']=$row['nombre'];
					$_SESSION['user_apellido']=$row['apellido'];
					setcookie('user_correo',$row['correo'],time()+2629750,'/');
					setcookie('user_clave',$row['clave'],time()+2629750,'/');
					setcookie('user_tipo',$tipo,time()+2629750,'/');
					return '<script> window.location="'.SERVERURL.$url.'" </script>';
				}
				else
				{
					session_start(['name'=>'usersoswebstore']);
					session_destroy();
					setcookie('usuario','',time()-3600,'/');
					setcookie('user_clave','',time()-3600,'/');
					setcookie('user_tipo','',time()-3600,'/');
				}
			}
			elseif ($tipo == "empresarial")
			{
				$datosCuenta=loginModelo::iniciar_sesion_empresa_modelo($datosLogin);

				if($datosCuenta->rowCount()==1)
				{
					$row=$datosCuenta->fetch();
					session_start(['name'=>'usersoswebstore']);
					$_SESSION['user_id']=$row['id'];
					$_SESSION['user_nombre']=$row['nombre'];
					$_SESSION['user_apellido']=$row['apellido'];
					setcookie('user_correo',$row['correo'],time()+2629750,'/');
					setcookie('user_clave',$row['clave'],time()+2629750,'/');
					setcookie('user_tipo',$tipo,time()+2629750,'/');
					return '<script> window.location="'.SERVERURL.$url.'" </script>';
				}
				else
				{
					session_start(['name'=>'usersoswebstore']);
					session_destroy();
					setcookie('usuario','',time()-3600,'/');
					setcookie('user_clave','',time()-3600,'/');
					setcookie('user_tipo','',time()-3600,'/');
				}
			}
			else
			{
				session_start(['name'=>'usersoswebstore']);
				session_destroy();
				setcookie('usuario','',time()-3600,'/');
				setcookie('user_clave','',time()-3600,'/');
				setcookie('user_tipo','',time()-3600,'/');
			}
		}

		public function verificar_sesion_controlador($correoCache, $claveCache, $tipoCache)
		{
			
			$correcto = false;

			$correo=mainModel::limpiar_cadena($correoCache);
			$clave=mainModel::limpiar_cadena($claveCache);
			$tipo=mainModel::limpiar_cadena($tipoCache);

			$datosLogin=[
				"Correo"=>$correo,
				"Clave"=>$clave
			];

			if ($tipo == "personal")
			{
				$datosCuenta=loginModelo::iniciar_sesion_persona_modelo($datosLogin);

				if($datosCuenta->rowCount()==1)
				{
					$row=$datosCuenta->fetch();
					session_start(['name'=>'usersoswebstore']);
					$_SESSION['user_id']=$row['id'];
					$_SESSION['user_nombre']=$row['nombre'];
					$_SESSION['user_apellido']=$row['apellido'];
					setcookie('user_correo',$row['correo'],time()+2629750,'/');
					setcookie('user_clave',$row['clave'],time()+2629750,'/');
					setcookie('user_tipo',"personal",time()+2629750,'/');
					$correcto = true;
				}
				else
				{
					session_start(['name'=>'usersoswebstore']);
					session_destroy();
					setcookie('usuario','',time()-3600,'/');
					setcookie('user_clave','',time()-3600,'/');
					setcookie('user_tipo','',time()-3600,'/');
					$correcto = false;
				}
			}
			elseif ($tipo == "empresarial")
			{
				$datosCuenta=loginModelo::iniciar_sesion_empresa_modelo($datosLogin);

				if($datosCuenta->rowCount()==1)
				{
					$row=$datosCuenta->fetch();
					session_start(['name'=>'usersoswebstore']);
					$_SESSION['user_id']=$row['id'];
					$_SESSION['user_nombre']=$row['nombre'];
					$_SESSION['user_apellido']=$row['apellido'];
					setcookie('user_correo',$row['correo'],time()+2629750,'/');
					setcookie('user_clave',$row['clave'],time()+2629750,'/');
					setcookie('user_tipo',"empresarial",time()+2629750,'/');
					$correcto = true;
				}
				else
				{
					session_start(['name'=>'usersoswebstore']);
					session_destroy();
					setcookie('usuario','',time()-3600,'/');
					setcookie('user_clave','',time()-3600,'/');
					setcookie('user_tipo','',time()-3600,'/');
					$correcto = false;
				}
			}
			else
			{
				session_start(['name'=>'usersoswebstore']);
				session_destroy();
				setcookie('usuario','',time()-3600,'/');
				setcookie('user_clave','',time()-3600,'/');
				setcookie('user_tipo','',time()-3600,'/');
				$correcto = false;
			}

			return $correcto;
		}
	}