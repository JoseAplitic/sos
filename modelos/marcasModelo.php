<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class marcasModelo extends mainModel
	{
		
		protected function obtener_productos_marca_modelo($id)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM relaciones WHERE id_taxonomia = :Id");
			$sql->bindParam(':Id',$id);
			$sql->execute();
			return $sql;
		}

		protected function obtener_categorias_padre_modelo(){
			$sql=mainModel::conectar()->prepare("SELECT id, nombre, slug, icono FROM taxonomias WHERE taxonomia = 'categoria' AND (padre = 0 OR padre = NULL) ORDER BY nombre ASC;");
			$sql->execute();
			return $sql;
		}
		
		protected function obtener_relaciones_producto_modelo($sku,$id){
			$sql=mainModel::conectar()->prepare("SELECT * FROM relaciones WHERE sku = :Sku AND id_taxonomia != :Id;");
			$sql->bindParam(':Sku',$sku);
			$sql->bindParam(':Id',$id);
			$sql->execute();
			return $sql;
		}
		
	}