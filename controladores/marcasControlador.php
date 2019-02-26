<?php
	if($peticionAjax){
		require_once "../modelos/marcasModelo.php";
	}else{
		require_once "./modelos/marcasModelo.php";
	}

	class marcasControlador extends marcasModelo
	{

		public function obtener_info_marca_id_controlador($id){
			$marca = mainModel::conectar()->prepare("SELECT nombre, slug, padre, icono, icono2, color FROM taxonomias WHERE taxonomia = 'marca' AND id = :Id");
			$marca->bindParam(":Id",$id);
			$marca->execute();
			return $marca;
		}

		public function obtener_info_marca_controlador($slug){
			$cat = mainModel::conectar()->prepare("SELECT * FROM taxonomias WHERE taxonomia = 'marca' AND slug = :Slug");
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

	}