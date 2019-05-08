<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class cargarListaProductosModelo extends mainModel
	{
		
		protected function obtener_info_producto_modelo($sku){
			$sql=mainModel::conectar()->prepare("SELECT nombre, slug, precio, calificacion FROM productos WHERE sku=:Sku");
			$sql->bindParam(":Sku",$sku);
			$sql->execute();
			return $sql;
		}

	}