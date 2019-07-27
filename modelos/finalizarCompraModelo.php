<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class finalizarCompraModelo extends mainModel
	{

		protected function obtener_datos_pedido_personal($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT facturacion_nit, facturacion_nombre, facturacion_direccion, entrega_nombre, entrega_apellidos, entrega_correo, entrega_telefono, entrega_direccion_1, entrega_departamento, entrega_municipio, entrega_codigo_postal, entrega_observaciones, pedido_monto FROM clientes WHERE id = :Id;");
			$sql->bindParam(":Id", $cliente);
			$sql->execute();
			return $sql;
		}

		protected function obtener_datos_pedido_empresarial($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT nit, institucion, direccion, entrega_nombre, entrega_apellidos, entrega_correo, entrega_telefono, entrega_direccion_1, entrega_departamento, entrega_municipio, entrega_codigo_postal, entrega_observaciones, pedido_monto FROM empresas WHERE id = :Id;");
			$sql->bindParam(":Id", $cliente);
			$sql->execute();
			return $sql;
		}

		protected function guardar_pedido_personal($cliente, $datosPedido)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO pedidos_clientes (id_cliente, factura_nit, factura_nombre, factura_direccion, entrega_nombre, entrega_apellidos, entrega_correo, entrega_telefono, entrega_direccion, entrega_departamento, entrega_municipio, entrega_codigo_postal, entrega_observaciones, metodo_pago, monto, fecha) VALUES (:id_cliente, :factura_nit, :factura_nombre, :factura_direccion, :entrega_nombre, :entrega_apellidos, :entrega_correo, :entrega_telefono, :entrega_direccion, :entrega_departamento, :entrega_municipio, :entrega_codigo_postal, :entrega_observaciones, :metodo_pago, :monto, :fecha);");
			$sql->bindParam(":id_cliente", $cliente);
			$sql->bindParam(":factura_nit", $datosPedido["Nit"]);
			$sql->bindParam(":factura_nombre", $datosPedido["NombreFactura"]);
			$sql->bindParam(":factura_direccion", $datosPedido["DireccionFactura"]);
			$sql->bindParam(":entrega_nombre", $datosPedido["Nombre"]);
			$sql->bindParam(":entrega_apellidos", $datosPedido["Apellidos"]);
			$sql->bindParam(":entrega_correo", $datosPedido["Correo"]);
			$sql->bindParam(":entrega_telefono", $datosPedido["Telefono"]);
			$sql->bindParam(":entrega_direccion", $datosPedido["Direccion"]);
			$sql->bindParam(":entrega_departamento", $datosPedido["Departamento"]);
			$sql->bindParam(":entrega_municipio", $datosPedido["Municipio"]);
			$sql->bindParam(":entrega_codigo_postal", $datosPedido["Postal"]);
			$sql->bindParam(":entrega_observaciones", $datosPedido["Observaciones"]);
			$sql->bindParam(":metodo_pago",$datosPedido['Metodo']);
			$sql->bindParam(":monto",$datosPedido['Monto']);
			$sql->bindParam(":fecha", $datosPedido["Fecha"]);
			$sql->execute();
			return $sql;
		}

		protected function guardar_pedido_empresarial($cliente, $datosPedido)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO pedidos_empresas (id_cliente, factura_nit, factura_nombre, factura_direccion, entrega_nombre, entrega_apellidos, entrega_correo, entrega_telefono, entrega_direccion, entrega_departamento, entrega_municipio, entrega_codigo_postal, entrega_observaciones, metodo_pago, monto, fecha) VALUES (:id_cliente, :factura_nit, :factura_nombre, :factura_direccion, :entrega_nombre, :entrega_apellidos, :entrega_correo, :entrega_telefono, :entrega_direccion, :entrega_departamento, :entrega_municipio, :entrega_codigo_postal, :entrega_observaciones, :metodo_pago, :monto, :fecha);");
			$sql->bindParam(":id_cliente", $cliente);
			$sql->bindParam(":factura_nit", $datosPedido["Nit"]);
			$sql->bindParam(":factura_nombre", $datosPedido["NombreFactura"]);
			$sql->bindParam(":factura_direccion", $datosPedido["DireccionFactura"]);
			$sql->bindParam(":entrega_nombre", $datosPedido["Nombre"]);
			$sql->bindParam(":entrega_apellidos", $datosPedido["Apellidos"]);
			$sql->bindParam(":entrega_correo", $datosPedido["Correo"]);
			$sql->bindParam(":entrega_telefono", $datosPedido["Telefono"]);
			$sql->bindParam(":entrega_direccion", $datosPedido["Direccion"]);
			$sql->bindParam(":entrega_departamento", $datosPedido["Departamento"]);
			$sql->bindParam(":entrega_municipio", $datosPedido["Municipio"]);
			$sql->bindParam(":entrega_codigo_postal", $datosPedido["Postal"]);
			$sql->bindParam(":entrega_observaciones", $datosPedido["Observaciones"]);
			$sql->bindParam(":metodo_pago",$datosPedido['Metodo']);
			$sql->bindParam(":monto",$datosPedido['Monto']);
			$sql->bindParam(":fecha", $datosPedido["Fecha"]);
			$sql->execute();
			return $sql;
		}

		protected function guardar_pedido_invitado($datosPedido)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO pedidos_visitantes (factura_nit, factura_nombre, factura_direccion, entrega_nombre, entrega_apellidos, entrega_correo, entrega_telefono, entrega_direccion, entrega_departamento, entrega_municipio, entrega_codigo_postal, entrega_observaciones, metodo_pago, monto, fecha) VALUES (:factura_nit, :factura_nombre, :factura_direccion, :entrega_nombre, :entrega_apellidos, :entrega_correo, :entrega_telefono, :entrega_direccion, :entrega_departamento, :entrega_municipio, :entrega_codigo_postal, :entrega_observaciones, :metodo_pago, :monto, :fecha);");
			$sql->bindParam(":factura_nit", $datosPedido["Nit"]);
			$sql->bindParam(":factura_nombre", $datosPedido["NombreFactura"]);
			$sql->bindParam(":factura_direccion", $datosPedido["DireccionFactura"]);
			$sql->bindParam(":entrega_nombre", $datosPedido["Nombre"]);
			$sql->bindParam(":entrega_apellidos", $datosPedido["Apellidos"]);
			$sql->bindParam(":entrega_correo", $datosPedido["Correo"]);
			$sql->bindParam(":entrega_telefono", $datosPedido["Telefono"]);
			$sql->bindParam(":entrega_direccion", $datosPedido["Direccion"]);
			$sql->bindParam(":entrega_departamento", $datosPedido["Departamento"]);
			$sql->bindParam(":entrega_municipio", $datosPedido["Municipio"]);
			$sql->bindParam(":entrega_codigo_postal", $datosPedido["Postal"]);
			$sql->bindParam(":entrega_observaciones", $datosPedido["Observaciones"]);
			$sql->bindParam(":metodo_pago",$datosPedido['Metodo']);
			$sql->bindParam(":monto",$datosPedido['Monto']);
			$sql->bindParam(":fecha", $datosPedido["Fecha"]);
			$sql->execute();
			return $sql;
		}

		protected function llenar_pedido_personal($id_pedido, $sku, $cantidad, $costo)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO detalles_compras_clientes (id_pedido, producto, cantidad, costo) VALUES (:id_pedido, :producto, :cantidad, :costo);");
			$sql->bindParam(":id_pedido", $id_pedido);
			$sql->bindParam(":producto", $sku);
			$sql->bindParam(":cantidad", $cantidad);
			$sql->bindParam(":costo", $costo);
			$sql->execute();
			return $sql;
		}

		protected function llenar_pedido_empresarial($id_pedido, $sku, $cantidad, $costo)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO detalles_compras_empresas (id_pedido, producto, cantidad, costo) VALUES (:id_pedido, :producto, :cantidad, :costo);");
			$sql->bindParam(":id_pedido", $id_pedido);
			$sql->bindParam(":producto", $sku);
			$sql->bindParam(":cantidad", $cantidad);
			$sql->bindParam(":costo", $costo);
			$sql->execute();
			return $sql;
		}

		protected function llenar_pedido_invitado($id_pedido, $sku, $cantidad, $costo)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO detalles_compras_visitantes (id_pedido, producto, cantidad, costo) VALUES (:id_pedido, :producto, :cantidad, :costo);");
			$sql->bindParam(":id_pedido", $id_pedido);
			$sql->bindParam(":producto", $sku);
			$sql->bindParam(":cantidad", $cantidad);
			$sql->bindParam(":costo", $costo);
			$sql->execute();
			return $sql;
		}

		protected function obtener_id_pedido_personal()
		{
			$sql=mainModel::conectar()->prepare("SELECT MAX(id) AS id FROM pedidos_clientes");
			$sql->execute();
			return $sql;
		}

		protected function obtener_id_pedido_empresarial()
		{
			$sql=mainModel::conectar()->prepare("SELECT MAX(id) AS id FROM pedidos_empresas");
			$sql->execute();
			return $sql;
		}

		protected function obtener_id_pedido_invitado()
		{
			$sql=mainModel::conectar()->prepare("SELECT MAX(id) AS id FROM pedidos_visitantes");
			$sql->execute();
			return $sql;
		}

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

		protected function vaciar_carrito_personal($id_cliente)
		{
			$sql=mainModel::conectar()->prepare("DELETE FROM carrito_personal WHERE id_cliente = :Id;");
			$sql->bindParam(":Id", $id_cliente);
			$sql->execute();
			return $sql;
		}

		protected function vaciar_carrito_empresarial($id_cliente)
		{
			$sql=mainModel::conectar()->prepare("DELETE FROM carrito_empresarial WHERE id_cliente = :Id;");
			$sql->bindParam(":Id", $id_cliente);
			$sql->execute();
			return $sql;
		}

		protected function vaciar_carrito_invitado()
		{
			echo '<script>document.cookie = "user_carrito=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";</script>';
		}
		
		protected function obtener_precio_producto($sku)
		{
			$sql=mainModel::conectar()->prepare("SELECT precio FROM productos WHERE sku = :Sku;");
			$sql->bindParam(":Sku", $sku);
			$sql->execute();
			return $sql;
		}
        
	}