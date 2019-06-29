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
                            if (registroModelo::verificar_correo_empresas($correo)->rowCount()>0)
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
                                        $peticionAjax = true;
                                        require_once "../controladores/loginControlador.php";
                                        $login = new loginControlador();
                                        echo $login->iniciar_sesion_automatica_registro_controlador($correo, $password, "personal", "registro-exitoso/");
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

        public function registro_empresarial()
        {
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $apellidos=mainModel::limpiar_cadena($_POST['apellidos']);
            $dpi=mainModel::limpiar_cadena($_POST['dpi']);
            $institucion=mainModel::limpiar_cadena($_POST['institucion']);
            $nit=mainModel::limpiar_cadena($_POST['nit']);
            $direccion=mainModel::limpiar_cadena($_POST['direccion']);
            $departamento=mainModel::limpiar_cadena($_POST['departamento']);
            $ciudad=mainModel::limpiar_cadena($_POST['ciudad']);
            $telefono=mainModel::limpiar_cadena($_POST['telefono']);
            $correo=mainModel::limpiar_cadena($_POST['correo']);
            $correoConf=mainModel::limpiar_cadena($_POST['correoConf']);
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
                            if (registroModelo::verificar_correo_empresas($correo)->rowCount()>0)
                            {
                                echo "El correo que ingresaste ya esta registrado.";
                            }
                            else
                            {
                                if(isset($_POST['terminos']))
                                {
                                    if ($correo == $correoConf)
                                    {
                                        if (registroModelo::verificar_dpi_empresas($dpi)->rowCount()>0)
                                        {
                                            echo "El DPI que ingresaste ya esta registrado.";
                                        }
                                        else
                                        {
                                            if (registroModelo::verificar_nit_empresas($nit)->rowCount()>0)
                                            {
                                                echo "El nit que ingresaste ya esta registrado.";
                                            }
                                            else
                                            {
                                                if (registroModelo::verificar_institucion_empresas($institucion)->rowCount()>0)
                                                {
                                                    echo "El nombre de la compañía/institución que ingresaste ya esta registrado.";
                                                }
                                                else
                                                {
                                                    if (registroModelo::verificar_telefono_empresas($telefono)->rowCount()>0)
                                                    {
                                                        echo "El teléfono que ingresaste ya esta registrado.";
                                                    }
                                                    else
                                                    {
                                                        $fecha=date("d/m/Y");
                                                        $clave=mainModel::encryption($password);
                                                        $dataAC=[
                                                            "Nombre"=>$nombre,
                                                            "Apellido"=>$apellidos,
                                                            "Dpi"=>$dpi,
                                                            "Institucion"=>$institucion,
                                                            "Nit"=>$nit,
                                                            "Direccion"=>$direccion,
                                                            "Departamento"=>$departamento,
                                                            "Ciudad"=>$ciudad,
                                                            "Telefono"=>$telefono,
                                                            "Correo"=>$correo,
                                                            "Clave"=>$clave,
                                                            "Fecha"=>$fecha
                                                        ];
                                                        $guardarCuenta=registroModelo::agregar_cuenta_empresarial($dataAC);
                                                        if($guardarCuenta->rowCount()>=1)
                                                        {                                                       
                                                            $peticionAjax = true;
                                                            require_once "../controladores/loginControlador.php";
                                                            $login = new loginControlador();
                                                            echo $login->iniciar_sesion_automatica_registro_controlador($correo, $password, "empresarial", "registro-exitoso/");
                                                        }
                                                        else
                                                        {
                                                            echo "¡Ha ocurrido un error! Intenta más tarde por favor.";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "Los correos no coinciden.";

                                    }
                                }
                                else {
                                    echo "Debes aceptar los términos y condiciones y aviso de privacidad.";
                                }
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
        
    }