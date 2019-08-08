<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class pedidoModelo extends mainModel
	{

		protected function cargar_pedido_personal($cliente, $pedido)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM pedidos_clientes WHERE id = :Id AND id_cliente = :IC");
			$sql->bindParam(":Id",$pedido);
			$sql->bindParam(":IC",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function cargar_pedido_empresarial($cliente, $pedido)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM pedidos_empresas WHERE id = :Id AND id_cliente = :IC");
			$sql->bindParam(":Id",$pedido);
			$sql->bindParam(":IC",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function cargar_pedido_invitado($pedido)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM pedidos_visitantes WHERE id = :Id");
			$sql->bindParam(":Id",$pedido);
			$sql->execute();
			return $sql;
		}

		protected function cargar_detalle_pedido_personal($pedido)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM detalles_compras_clientes WHERE id_pedido = :Id");
			$sql->bindParam(":Id",$pedido);
			$sql->execute();
			return $sql;
		}

		protected function cargar_detalle_pedido_empresarial($pedido)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM detalles_compras_empresas WHERE id_pedido = :Id");
			$sql->bindParam(":Id",$pedido);
			$sql->execute();
			return $sql;
		}

		protected function cargar_detalle_pedido_invitado($pedido)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM detalles_compras_visitantes WHERE id_pedido = :Id");
			$sql->bindParam(":Id",$pedido);
			$sql->execute();
			return $sql;
		}

		protected function cargar_nombre_producto($sku)
		{
			$sql=mainModel::conectar()->prepare("SELECT nombre, slug FROM productos WHERE sku = :Sku");
			$sql->bindParam(":Sku",$sku);
			$sql->execute();
			return $sql;
		}
        
	}