<?php
	if($peticionAjax){
		require_once "../modelos/productoModelo.php";
	}else{
		require_once "./modelos/productoModelo.php";
	}

	class productoControlador extends productoModelo
	{

		public function obtener_info_producto($slug)
		{
			$sql=mainModel::conectar()->prepare("SELECT * FROM productos WHERE slug=:Slug");
			$sql->bindParam(":Slug",$slug);
			$sql->execute();
			return $sql;
		}

		public function obtener_relaciones_producto($sku)
		{
			$relacionesProducto = array();
			$relaciones = productoModelo::obtener_relaciones_modelo($sku);
			foreach ($relaciones as $relacion)
			{
				$relacionInfo = productoModelo::obtener_info_relacion_modelo($relacion['id_taxonomia']);
				if ($relacionInfo->rowCount() > 0)
				{
					$relacionInfo = $relacionInfo->fetch();
					array_push($relacionesProducto, $relacionInfo);
				}
			}
			return $relacionesProducto;
		}

		public function obtener_info_medio($id)
        {
            $sql=mainModel::conectar()->prepare("SELECT titulo, url FROM medios WHERE id = :Id;");
            $sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}

		public function obtener_galeria_producto($sku)
		{
			$lista = "";
			$imagenesGaleria = productoModelo::obtener_galeria_modelo($sku);
			foreach ($imagenesGaleria as $imagen)
			{
				$infoImagen = productoModelo::obtener_info_medio_modelo($imagen['medio']);
				if ($infoImagen->rowCount()>0)
				{
					$infoImagen = $infoImagen->fetch();
					$lista .= '<img src="'.$infoImagen['url'].'" class="show-small-img" alt="'.$infoImagen['titulo'].'">';
				}
			}
			return $lista;
		}

		public function obtener_jerarquia_categoria($id)
		{
			$lista = "";
			$categoria = $id;
			$continuar = true;
			while ($continuar == true)
			{
				$infoCategoria = productoModelo::obtener_info_relacion_modelo($categoria);
				if ($infoCategoria->rowCount()>0)
				{
					$infoCategoria = $infoCategoria->fetch();
					$lista = '<li><a href="'.SERVERURL.'categorias/'.$infoCategoria['slug'].'/">'.$infoCategoria['nombre'].'</a></li>'.$lista;
					$continuar = false;
					if ($infoCategoria['padre']>0)
					{
						$categoria = $infoCategoria['padre'];
						$continuar = true;
					}
				}
			}
			return $lista;
		}
		
		public function obtener_regla_precio($categoria, $tipo)
		{
			$regla = 0;
			$tipoUsuario = "regla_visitantes";

			if ($tipo == "invitado"){$tipoUsuario = "regla_visitantes";}
			elseif ($tipo == "personal"){$tipoUsuario = "regla_usuarios";}
			elseif ($tipo == "empresarial") {$tipoUsuario = "regla_empresas";}
			else {$tipoUsuario = "regla_visitantes";}

			$datosRegla = productoModelo::obtener_regla_modelo($categoria, $tipoUsuario);
			if ($datosRegla->rowCount()>0)
			{
				$datosRegla = $datosRegla->fetch();
				$regla = $datosRegla[$tipoUsuario];
			}
			return $regla;
		}

	}