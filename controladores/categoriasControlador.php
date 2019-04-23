<?php
	if($peticionAjax){
		require_once "../modelos/categoriasModelo.php";
	}else{
		require_once "./modelos/categoriasModelo.php";
	}

	class categoriasControlador extends categoriasModelo
	{

		public function obtener_info_categoria_controlador($slug){
			$cat = mainModel::conectar()->prepare("SELECT * FROM taxonomias WHERE taxonomia = 'categoria' AND slug = :Slug");
			$cat->bindParam(":Slug",$slug);
			$cat->execute();
			return $cat;
		}

		public function obtener_info_vista_controlador($id){
			$vista = mainModel::conectar()->prepare("SELECT * FROM vistas_personalizadas WHERE id_taxonomia = :Id");
			$vista->bindParam(":Id",$id);
			$vista->execute();
			return $vista;
		}

		public function obtener_subcategorias_controlador($id){
			$sql=mainModel::conectar()->prepare("SELECT nombre,slug,icono FROM taxonomias WHERE taxonomia = 'categoria' AND padre = $id;");
			$sql->execute();
			return $sql;
		}
		
	}