<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class carritoPaginaModelo extends mainModel
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
        
	}