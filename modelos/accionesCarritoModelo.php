<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class accionesCarritoModelo extends mainModel
	{

		protected function actualizar_carrito_personal($cliente, $producto, $cantidad)
		{
			$sql=mainModel::conectar()->prepare("UPDATE carrito_personal SET cantidad = :Cantidad WHERE id_cliente = :Cliente AND sku = :Producto");
			$sql->bindParam(":Cantidad",$cantidad);
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function borrar_carrito_personal($cliente, $producto)
		{
			$sql=mainModel::conectar()->prepare("DELETE FROM carrito_personal WHERE id_cliente = :Cliente AND sku = :Producto");
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function actualizar_carrito_empresarial($cliente, $producto, $cantidad)
		{
			$sql=mainModel::conectar()->prepare("UPDATE carrito_empresarial SET cantidad = :Cantidad WHERE id_cliente = :Cliente AND sku = :Producto");
			$sql->bindParam(":Cantidad",$cantidad);
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}

		protected function borrar_carrito_empresarial($cliente, $producto)
		{
			$sql=mainModel::conectar()->prepare("DELETE FROM carrito_empresarial WHERE id_cliente = :Cliente AND sku = :Producto");
			$sql->bindParam(":Cliente",$cliente);
			$sql->bindParam(":Producto",$producto);
			$sql->execute();
			return $sql;
		}
        
	}