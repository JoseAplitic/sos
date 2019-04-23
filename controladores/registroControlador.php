<?php
	if($peticionAjax){
		require_once "../modelos/registroModelo.php";
	}else{
		require_once "./modelos/registroModelo.php";
	}

	class registroControlador extends registroModelo
	{

        public function registro_personal()
        {
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $apellidos=mainModel::limpiar_cadena($_POST['apellidos']);
            $correo=mainModel::limpiar_cadena($_POST['correo']);
            $password=mainModel::limpiar_cadena($_POST['password']);
            $passwordConf=mainModel::limpiar_cadena($_POST['passwordConf']);
            
            if (registroModelo::verificar_requisitos_password($password)==true)
            {
                if (registroModelo::verificar_caracteres_password($password)==true)
                {
                    if ($password==$passwordConf)
                    {
                        if (registroModelo::verificar_correo_usuario($correo)->rowCount()>0)
                        {
                            echo "El correo que ingresaste ya esta registrado.";
                        }
                        else
                        {
                            if(isset($_POST['terminos']))
                            {
                                $fecha=date("d/m/Y");
                                $clave=mainModel::encryption($password);
                                $dataAC=[
                                    "Nombre"=>$nombre,
                                    "Apellidos"=>$apellidos,
                                    "Correo"=>$correo,
                                    "Clave"=>$clave,
                                    "Fecha"=>$fecha
                                ];
                                $guardarCuenta=registroModelo::agregar_cuenta_personal($dataAC);
                                if($guardarCuenta->rowCount()>=1)
                                {
                                    echo "Registro realizado";
                                }
                                else
                                {
                                    echo "¡Ha ocurrido un error! Intenta más tarde por favor.";
                                }
                            }
                            else {
                                echo "Debes aceptar los términos y condiciones y aviso de privacidad.";
                            }
                        }
                    }
                    else {
                        echo "Las contraseñas no coinciden.";
                    }
                }
                else {
                    echo "La contraseña contiene caracteres no permitidos.";
                }
            }
            else {
                echo "La contraseña no cumple los requisitos de seguridad.";
            }
        }

        public function registro_empresarial(){}
        
    }