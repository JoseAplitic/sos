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

		public function obtener_categorias_marca_controlador($id){
			
			$lista = "";

			$productos=marcasModelo::obtener_productos_marca_modelo($id);

			if($productos->rowCount()>0)
			{
				$productos = $productos->fetchAll();
				$categorias = marcasModelo::obtener_categorias_padre_modelo($id);
				if ($categorias->rowCount()>0)
				{
					$hayCategorias = false;
					$listaCategorias = array();
					$categorias = $categorias->fetchAll();
					foreach ($productos as $producto){
						$relaciones = marcasModelo::obtener_relaciones_producto_modelo($producto['sku'], $id);
						if ($relaciones->rowCount()>0)
						{
							$relaciones = $relaciones->fetchAll();
							foreach ($relaciones as $relacion)
							{
								foreach ($categorias as $categoria) {
									if ($relacion['id_taxonomia'] == $categoria['id'])
									{
										$hayCategorias = true;
										$iconTitleAlt = "";
										$iconTitleUrl = "";
										$medio=mediosControlador::obtener_info_medio_controlador($categoria['icono']);
										if ($medio->rowCount()>0) {
											$infoIconTitle=$medio->fetch();
											$iconTitleAlt = $infoIconTitle['titulo'];
											$iconTitleUrl = $infoIconTitle['url'];
										}
										$insertar = [
											"Slug"=>$categoria['slug'],
											"Nombre"=>$categoria['nombre'],
											"Src"=>$iconTitleUrl,
											"Alt"=>$iconTitleAlt
										];
										array_push($listaCategorias, $insertar);
									}
								}
							}
						}
					}
					if ($hayCategorias == false) {
						$lista .=  '<li>
										<div class="texto">
											<p style="padding: 20px;"><i class="fas fa-times" style="margin-right: 5px;"></i>No se han encontrado departamentos que contengan productos de esta marca</p>
										</div>
									</li>';
					}
					else {
						sort($listaCategorias);
						foreach ($listaCategorias as $categoria)
						{
							$lista .= '
										<li>
											<a href="'.SERVERURL.'categorias/'.$categoria['Slug'].'/" class="fas">
												<img src="'.$categoria['Src'].'" alt="'.$categoria['Alt'].'">
												<span>'.$categoria['Nombre'].'</span>
											</a>
										</li>
									';
						}
					}
				}
				else {
					$lista .=  '<li>
									<div class="texto">
										<p style="padding: 20px;"><i class="fas fa-times" style="margin-right: 5px;"></i>No se han encontrado departamentos que contengan productos de esta marca</p>
									</div>
								</li>';
				}
			}
			else {
				$lista .=  '<li>
								<div class="texto">
									<p style="padding: 20px;"><i class="fas fa-times" style="margin-right: 5px;"></i>No se han encontrado departamentos que contengan productos de esta marca</p>
								</div>
							</li>';
			}

			return $lista;
		}

	}