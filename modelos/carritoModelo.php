<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class carritoModelo extends mainModel
	{

		protected function verificar_producto_carrito_personal($cliente, $producto)
		{
			$sql=mainModel::conectar()->prepare("SELECT cantidad FROM carrito_personal WHERE id_cliente = :Cliente AND sku = :Producto");
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function agregar_producto_carrito_personal($cliente, $producto)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO carrito_personal(id_cliente,sku,cantidad) VALUES (:Cliente,:Producto,'1');");
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function actualizar_producto_carrito_personal($cliente, $producto, $cantidad)
		{
			$sql=mainModel::conectar()->prepare("UPDATE carrito_personal SET cantidad=:Cantidad WHERE id_cliente=:Cliente AND sku = :Producto;");
			$sql->bindParam(":Cantidad",$cantidad);
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function verificar_producto_carrito_empresarial($cliente, $producto)
		{
			$sql=mainModel::conectar()->prepare("SELECT cantidad FROM carrito_empresarial WHERE id_cliente = :Cliente AND sku = :Producto");
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function agregar_producto_carrito_empresarial($cliente, $producto)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO carrito_empresarial(id_cliente,sku,cantidad) VALUES (:Cliente,:Producto,'1');");
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function actualizar_producto_carrito_empresarial($cliente, $producto, $cantidad)
		{
			$sql=mainModel::conectar()->prepare("UPDATE carrito_empresarial SET cantidad=:Cantidad WHERE id_cliente=:Cliente AND sku = :Producto;");
			$sql->bindParam(":Cantidad",$cantidad);
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}
        
	}