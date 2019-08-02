<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class cuentaModelo extends mainModel
	{

		protected function cargar_cuenta_personal($id)
		{
			$sql=mainModel::conectar()->prepare("SELECT nombre, apellido, facturacion_nit, facturacion_nombre, facturacion_direccion, entrega_nombre, entrega_apellidos, entrega_correo, entrega_telefono, entrega_direccion_1, entrega_departamento, entrega_municipio, entrega_codigo_postal FROM clientes WHERE id = :Id;");
			$sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}

		protected function actualizar_cuenta_personal()
		{
			$sql=mainModel::conectar()->prepare("UPDATE clientes SET nombre = :nombre, apellido = :apellido, facturacion_nit = :fNit, facturacion_nombre = :fNombre, facturacion_direccion = :fDireccion, entrega_nombre = :eNombre, entrega_apellidos = :eApellidos, entrega_correo = :eCorreo, entrega_telefono = :eTelefono, entrega_direccion_1 = :eDireccion, entrega_departamento = :eDepartamento, entrega_municipio = :eMunicipio, entrega_codigo_postal = :ePostal WHERE id = :Id;");
			$sql->bindParam(":nombre",$_POST['nombre']);
			$sql->bindParam(":apellido",$_POST['apellidos']);
			$sql->bindParam(":fNit",$_POST['nit-facturacion']);
			$sql->bindParam(":fNombre",$_POST['nombre-facturacion']);
			$sql->bindParam(":fDireccion",$_POST['direccion-facturacion']);
			$sql->bindParam(":eNombre",$_POST['nombre-entrega']);
			$sql->bindParam(":eApellidos",$_POST['apellidos-entrega']);
			$sql->bindParam(":eCorreo",$_POST['correo-entrega']);
			$sql->bindParam(":eTelefono",$_POST['telefono-entrega']);
			$sql->bindParam(":eDireccion",$_POST['direccion-entrega']);
			$sql->bindParam(":eDepartamento",$_POST['departamento-entrega']);
			$sql->bindParam(":eMunicipio",$_POST['municipio-entrega']);
			$sql->bindParam(":ePostal",$_POST['postal-entrega']);
			$id = mainModel::decryption($_POST['id']);
			$sql->bindParam(":Id", $id);
			$sql->execute();
			return $sql;
		}

		protected function cargar_cuenta_empresarial($id)
		{
			$sql=mainModel::conectar()->prepare("SELECT nombre, apellido, dpi, institucion, nit, direccion, departamento, ciudad, telefono, entrega_nombre, entrega_apellidos, entrega_correo, entrega_telefono, entrega_direccion_1, entrega_departamento, entrega_municipio, entrega_codigo_postal FROM empresas WHERE id = :Id;");
			$sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}

		protected function actualizar_cuenta_empresarial()
		{
			$sql=mainModel::conectar()->prepare("UPDATE empresas SET nombre = :nombre, apellido = :apellido, dpi = :dpi, institucion = :institucion, nit = :nit, direccion = :direccion, departamento = :departamento, ciudad = :ciudad, telefono = :telefono, entrega_nombre = :eNombre, entrega_apellidos = :eApellidos, entrega_correo = :eCorreo, entrega_telefono = :eTelefono, entrega_direccion_1 = :eDireccion, entrega_departamento = :eDepartamento, entrega_municipio = :eMunicipio, entrega_codigo_postal = :ePostal WHERE id = :Id;");
			$sql->bindParam(":nombre",$_POST['nombre']);
			$sql->bindParam(":apellido",$_POST['apellidos']);
			$sql->bindParam(":dpi",$_POST['dpi-empresa']);
			$sql->bindParam(":institucion",$_POST['institucion-empresa']);
			$sql->bindParam(":nit",$_POST['nit-empresa']);
			$sql->bindParam(":direccion",$_POST['direccion-empresa']);
			$sql->bindParam(":departamento",$_POST['departamento-empresa']);
			$sql->bindParam(":ciudad",$_POST['ciudad-empresa']);
			$sql->bindParam(":telefono",$_POST['telefono-empresa']);
			$sql->bindParam(":eNombre",$_POST['nombre-entrega']);
			$sql->bindParam(":eApellidos",$_POST['apellidos-entrega']);
			$sql->bindParam(":eCorreo",$_POST['correo-entrega']);
			$sql->bindParam(":eTelefono",$_POST['telefono-entrega']);
			$sql->bindParam(":eDireccion",$_POST['direccion-entrega']);
			$sql->bindParam(":eDepartamento",$_POST['departamento-entrega']);
			$sql->bindParam(":eMunicipio",$_POST['municipio-entrega']);
			$sql->bindParam(":ePostal",$_POST['postal-entrega']);
			$id = mainModel::decryption($_POST['id']);
			$sql->bindParam(":Id", $id);
			$sql->execute();
			return $sql;
		}
        
	}