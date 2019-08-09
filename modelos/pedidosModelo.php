<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class pedidosModelo extends mainModel
	{

		protected function cargar_pedidos_personal($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT id, monto, fecha FROM pedidos_clientes WHERE id_cliente = :IC ORDER BY fecha DESC, id DESC");
			$sql->bindParam(":IC",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function cargar_pedidos_empresarial($cliente)
		{
			$sql=mainModel::conectar()->prepare("SELECT id, monto, fecha FROM pedidos_empresas WHERE id_cliente = :IC ORDER BY fecha DESC, id DESC");
			$sql->bindParam(":IC",$cliente);
			$sql->execute();
			return $sql;
		}

		protected function buscar_pedidos_personal($cliente, $filtro)
		{
			$codigoPedido = explode("-", $filtro);
			if(isset($codigoPedido[1]))
			{
				$codigoPedido = $codigoPedido[1];
			}
			else
			{
				$codigoPedido = "";
			}
			$sql=mainModel::conectar()->prepare("SELECT id, monto, fecha FROM pedidos_clientes WHERE id_cliente = :IC AND (fecha = :Fecha OR id = :Id) ORDER BY fecha DESC, id DESC");
			$sql->bindParam(":IC",$cliente);
			$sql->bindParam(":Fecha",$filtro);
			$sql->bindParam(":Id",$codigoPedido);
			$sql->execute();
			return $sql;
		}

		protected function buscar_pedidos_empresarial($cliente, $filtro)
		{
			$codigoPedido = explode("-", $filtro);
			if(isset($codigoPedido[1]))
			{
				$codigoPedido = $codigoPedido[1];
			}
			else
			{
				$codigoPedido = "";
			}
			$sql=mainModel::conectar()->prepare("SELECT id, monto, fecha FROM pedidos_empresas WHERE id_cliente = :IC AND (fecha = :Fecha OR id = :Id) ORDER BY fecha DESC, id DESC");
			$sql->bindParam(":IC",$cliente);
			$sql->bindParam(":Fecha",$filtro);
			$sql->bindParam(":Id",$codigoPedido);
			$sql->execute();
			return $sql;
		}

		protected function buscar_pedidos_invitado($correo, $telefono)
		{
			$sql=mainModel::conectar()->prepare("SELECT id, monto, fecha FROM pedidos_visitantes WHERE entrega_correo = :EC AND entrega_telefono = :ET ORDER BY fecha DESC, id DESC");
			$sql->bindParam(":EC",$correo);
			$sql->bindParam(":ET",$telefono);
			$sql->execute();
			return $sql;
		}
        
	}