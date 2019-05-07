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
		
		protected function verificar_descuento_modelo($item, $tipo)
		{
			$sql=mainModel::conectar()->prepare("SELECT id_descuento FROM descuentos_relaciones WHERE item=:Item AND tipo=:Tipo;");
			$sql->bindParam(":Item",$item);
			$sql->bindParam(":Tipo",$tipo);
			$sql->execute();
			return $sql;
		}

		protected function obtener_info_descuento_modelo($id, $tipo)
		{
			$sql=mainModel::conectar()->prepare("SELECT tipo_descuento, $tipo, inicio, vencimiento FROM descuentos WHERE id=:Id");
			$sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}
	}