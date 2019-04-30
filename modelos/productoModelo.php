<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class productoModelo extends mainModel
	{
		
		protected function obtener_relaciones_modelo($sku){
			$sql=mainModel::conectar()->prepare("SELECT id_taxonomia FROM relaciones WHERE sku=:Sku");
			$sql->bindParam(":Sku",$sku);
			$sql->execute();
			return $sql;
		}

		protected function obtener_info_relacion_modelo($id){
			$sql=mainModel::conectar()->prepare("SELECT id, nombre, slug, taxonomia, padre, icono FROM taxonomias WHERE id=:Id");
			$sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}
		
		protected function obtener_galeria_modelo($sku){
			$sql=mainModel::conectar()->prepare("SELECT medio FROM galerias WHERE producto=:Sku");
			$sql->bindParam(":Sku",$sku);
			$sql->execute();
			return $sql;
		}
		
		protected function obtener_info_medio_modelo($id){
			$sql=mainModel::conectar()->prepare("SELECT titulo, url FROM medios WHERE id=:Id");
			$sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}
		
		protected function obtener_regla_modelo($categoria, $tipo){
			$sql=mainModel::conectar()->prepare("SELECT $tipo FROM reglas WHERE id_categoria=:Id");
			$sql->bindParam(":Id",$categoria);
			$sql->execute();
			return $sql;
		}
	}