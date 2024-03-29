<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class filtroCategoriaModelo extends mainModel
	{
		
		protected function obtener_productos_por_categoria_modelo($id){
			$sql=mainModel::conectar()->prepare("SELECT sku FROM relaciones WHERE id_taxonomia=:Id");
			$sql->bindParam(":Id",$id);
			$sql->execute();
			return $sql;
		}

		protected function obtener_productos_relaciones_modelo($productos)
		{
			$condicional = "";
			$conteo = 0;
			foreach ($productos as $producto)
			{
				if($conteo > 0)
				{
					$condicional .="OR ";
				}
				$condicional .= "sku = '".$producto['sku']."' ";
				$conteo++;
			}
			$sql=mainModel::conectar()->prepare("SELECT id_taxonomia FROM relaciones WHERE $condicional");
			$sql->execute();
			return $sql;
		}

		protected function obtener_marcas_de_relaciones_modelo($relaciones)
		{
			$condicional = "";
			$conteo = 0;
			foreach ($relaciones as $relacion)
			{
				if ($conteo > 0)
				{
					$condicional .="OR ";
				}
				$condicional .= "id = '".$relacion['id_taxonomia']."' ";
				$conteo++;
			}
			$sql=mainModel::conectar()->prepare("SELECT id, nombre, slug FROM taxonomias WHERE ($condicional) AND taxonomia = 'marca'");
			$sql->execute();
			return $sql;
		}
		
		protected function obtener_subcategorias_categoria_modelo($padre)
		{
			$sql=mainModel::conectar()->prepare("SELECT id FROM taxonomias WHERE padre = :Padre AND taxonomia = 'categoria'");
			$sql->bindParam(":Padre",$padre);
			$sql->execute();
			return $sql;
		}

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

		protected function verificar_relacion_marca_modelo($marca, $producto)
		{
			$sql=mainModel::conectar()->prepare("SELECT sku FROM relaciones WHERE sku=:Sku AND id_taxonomia=:Id");
			$sql->bindParam(":Sku",$producto);
			$sql->bindParam(":Id",$marca);
			$sql->execute();
			return $sql;
		}

		protected function obtener_relacionados_modelo($sku, $relacion){
			$sql=mainModel::conectar()->prepare("SELECT sku FROM relaciones WHERE id_taxonomia = :Relacion AND sku!=:Sku");
			$sql->bindParam(":Relacion",$relacion);
			$sql->bindParam(":Sku",$sku);
			$sql->execute();
			return $sql;
		}
	}