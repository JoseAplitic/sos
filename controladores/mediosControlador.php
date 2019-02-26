<?php
	if($peticionAjax){
		require_once "../modelos/mediosModelo.php";
	}else{
		require_once "./modelos/mediosModelo.php";
	}

	class mediosControlador extends mediosModelo
	{

		public function obtener_url_medio_controlador($id){
			$vista = mainModel::conectar()->prepare("SELECT url FROM medios WHERE id = :Id");
			$vista->bindParam(":Id",$id);
			$vista->execute();
			return $vista;
		}

		public function obtener_info_medio_controlador($id){
			$vista = mainModel::conectar()->prepare("SELECT titulo, url FROM medios WHERE id = :Id");
			$vista->bindParam(":Id",$id);
			$vista->execute();
			return $vista;
		}


	}