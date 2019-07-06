<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class cargarInfoCarritoModelo extends mainModel
	{

		protected function cargar_carrito_personal($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT sku, cantidad FROM carrito_personal WHERE id_cliente = :Cliente");
			$sql->bindParam(":Cliente",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function cargar_carrito_empresarial($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT sku, cantidad FROM carrito_empresarial WHERE id_cliente = :Cliente");
			$sql->bindParam(":Cliente",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function cargar_datos_usuario_personal($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM clientes WHERE id = :Cliente");
			$sql->bindParam(":Cliente",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function cargar_datos_usuario_empresarial($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM empresas WHERE id = :Cliente");
			$sql->bindParam(":Cliente",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function guardar_datos_usuario_personal($cliente, $datosCliente)
		{
			$sql=mainModel::conectar()->prepare("UPDATE clientes set facturacion_nit = :Nit, facturacion_nombre = :NombreFactura, facturacion_direccion = :DireccionFactura, entrega_nombre = :Nombre, entrega_apellidos = :Apellidos, entrega_correo = :Correo, entrega_telefono = :Telefono, entrega_direccion_1 = :Direccion1, entrega_departamento = :Departamento, entrega_municipio = :Municipio, entrega_codigo_postal = :Postal WHERE id = :Cliente;");
			$sql->bindParam(":Nit", $datosCliente["Nit"]);
			$sql->bindParam(":NombreFactura", $datosCliente["NombreFactura"]);
			$sql->bindParam(":DireccionFactura", $datosCliente["DireccionFactura"]);
			$sql->bindParam(":Nombre", $datosCliente["Nombre"]);
			$sql->bindParam(":Apellidos", $datosCliente["Apellidos"]);
			$sql->bindParam(":Correo", $datosCliente["Correo"]);
			$sql->bindParam(":Telefono", $datosCliente["Telefono"]);
			$sql->bindParam(":Direccion1", $datosCliente["Direccion1"]);
			$sql->bindParam(":Departamento", $datosCliente["Departamento"]);
			$sql->bindParam(":Municipio", $datosCliente["Municipio"]);
			$sql->bindParam(":Postal", $datosCliente["Postal"]);
			$sql->bindParam(":Cliente",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function guardar_datos_usuario_empresarial($cliente, $datosCliente)
		{
			$sql=mainModel::conectar()->prepare("UPDATE empresas set entrega_nombre = :Nombre, entrega_apellidos = :Apellidos, entrega_correo = :Correo, entrega_telefono = :Telefono, entrega_direccion_1 = :Direccion1, entrega_departamento = :Departamento, entrega_municipio = :Municipio, entrega_codigo_postal = :Postal WHERE id = :Cliente;");
			$sql->bindParam(":Nombre", $datosCliente["Nombre"]);
			$sql->bindParam(":Apellidos", $datosCliente["Apellidos"]);
			$sql->bindParam(":Correo", $datosCliente["Correo"]);
			$sql->bindParam(":Telefono", $datosCliente["Telefono"]);
			$sql->bindParam(":Direccion1", $datosCliente["Direccion1"]);
			$sql->bindParam(":Departamento", $datosCliente["Departamento"]);
			$sql->bindParam(":Municipio", $datosCliente["Municipio"]);
			$sql->bindParam(":Postal", $datosCliente["Postal"]);
			$sql->bindParam(":Cliente",$cliente);
			$sql->execute();
			return $sql;
		}
        
	}