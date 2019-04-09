<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class headerModelo extends mainModel
	{

		protected function cargar_categorias_destacadas_modelo(){
			$sql=mainModel::conectar()->prepare("SELECT * FROM vistas WHERE vista = 'header';");
			$sql->execute();
			return $sql;
        }

        protected function obtener_info_categoria_modelo($id)
        {
            $sql=mainModel::conectar()->prepare("SELECT nombre, slug FROM taxonomias WHERE id = :Id;");
            $sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
        }

        protected function obtener_info_marca_modelo($id)
        {
            $sql=mainModel::conectar()->prepare("SELECT nombre, slug, icono FROM taxonomias WHERE id = :Id;");
            $sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
        }

        protected function obtener_info_medio_modelo($id)
        {
            $sql=mainModel::conectar()->prepare("SELECT titulo, url FROM medios WHERE id = :Id;");
            $sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
        }

		protected function cargar_categorias_superiores_modelo(){
			$sql=mainModel::conectar()->prepare("SELECT nombre, slug, icono FROM taxonomias WHERE taxonomia = 'categoria' AND (padre = 0 OR padre = NULL) ORDER BY nombre ASC;");
			$sql->execute();
			return $sql;
        }
        
	}