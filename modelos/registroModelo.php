<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class registroModelo extends mainModel
	{

		protected function verificar_requisitos_password($password)
		{
			$correcto = false;
			if (strlen($password)>7)
			{
				$opcionales = 0;

				//Comprueba si hay minusculas
				if ($password !== strtoupper($password)) {$opcionales += 1;}

				//Comprueba si hay mayusculas
				if ($password !== strtolower($password)) {$opcionales += 1;}

				//Comprueba si hay numeros
				$numeros = array("0","1","2","3","4","5","6","7","8","9");
				$contieneNumero = false;
				foreach ($numeros as $numero)
				{
					if(strpos($password, $numero) == true)
					{
						$contieneNumero = true;
					}
				}
				if ($contieneNumero == true){$opcionales += 1;}

				//Comprueba si hay caracteres especiales
				$especiales = array("!", "\"", "#", "$", "%", "&", "'", "(", ")", "*", "+", ",", "-", ".", "/", ":", ";", "=", "?", "@", "[", "\\", "]", "^", "_", "`", "{", "|", "}", "~");
				$contieneEspecial = false;
				foreach ($especiales as $especial)
				{
					if(strpos($password, $especial) == true)
					{
						$contieneEspecial = true;
					}
				}
				if ($contieneEspecial == true){$opcionales += 1;}

				if ($opcionales>1)
				{
					$correcto = true;
				}
				else{$correcto = false;}
			}
			else{$correcto = false;}
			return $correcto;
		}

		protected function verificar_caracteres_password($password)
		{
			$correcto = true;
			
			//Comprueba si hay caracteres no permitidos
			$ilegales = array("<",">");
			foreach ($ilegales as $ilegal)
			{
				if(strpos($password, $ilegal) == true)
				{
					$correcto = false;
				}
			}

			return $correcto;
		}

		protected function agregar_cuenta_personal($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO clientes(nombre,apellido,correo,clave,fecha_registro) VALUES (:Nombre,:Apellidos,:Correo,:Clave,:Fecha);");
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellidos",$datos['Apellidos']);
			$sql->bindParam(":Correo",$datos['Correo']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->execute();
			return $sql;
		}

		protected function verificar_correo_usuario($correo){
			$sql=mainModel::conectar()->prepare("SELECT correo FROM clientes WHERE correo = :Correo");
			$sql->bindParam(":Correo",$correo);
			$sql->execute();
			return $sql;
		}

		protected function verificar_correo_empresas($correo){
			$sql=mainModel::conectar()->prepare("SELECT correo FROM empresas WHERE correo = :Correo");
			$sql->bindParam(":Correo",$correo);
			$sql->execute();
			return $sql;
		}

		protected function verificar_dpi_empresas($dpi){
			$sql=mainModel::conectar()->prepare("SELECT dpi FROM empresas WHERE dpi = :Dpi");
			$sql->bindParam(":Dpi",$dpi);
			$sql->execute();
			return $sql;
		}

		protected function verificar_nit_empresas($nit){
			$sql=mainModel::conectar()->prepare("SELECT nit FROM empresas WHERE nit = :Nit");
			$sql->bindParam(":Nit",$nit);
			$sql->execute();
			return $sql;
		}

		protected function verificar_institucion_empresas($institucion){
			$sql=mainModel::conectar()->prepare("SELECT institucion FROM empresas WHERE institucion = :Institucion");
			$sql->bindParam(":Institucion",$institucion);
			$sql->execute();
			return $sql;
		}

		protected function verificar_telefono_empresas($telefono){
			$sql=mainModel::conectar()->prepare("SELECT telefono FROM empresas WHERE telefono = :Telefono");
			$sql->bindParam(":Telefono",$telefono);
			$sql->execute();
			return $sql;
		}

		protected function agregar_cuenta_empresarial($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO empresas(nombre,apellido,dpi,institucion,nit,direccion,departamento,ciudad,telefono,correo,clave,fecha_registro) VALUES (:Nombre,:Apellido,:Dpi,:Institucion,:Nit,:Direccion,:Departamento,:Ciudad,:Telefono,:Correo,:Clave,:Fecha);");
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Dpi",$datos['Dpi']);
			$sql->bindParam(":Institucion",$datos['Institucion']);
			$sql->bindParam(":Nit",$datos['Nit']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Departamento",$datos['Departamento']);
			$sql->bindParam(":Ciudad",$datos['Ciudad']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Correo",$datos['Correo']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->execute();
			return $sql;
		}
        
	}