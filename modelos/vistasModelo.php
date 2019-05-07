<?php 
	class vistasModelo{
		protected function obtener_vistas_modelo($vistas){
			$listaBlanca=
			[
				"inicio", "producto", "categorias", "marcas", "login", "registro", "registro-empresarial", "registro-exitoso", "carrito"
			];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-vista.php")){
					$contenido="./vistas/contenidos/".$vistas."-vista.php";
				}else{
					$contenido="login";
				}
			}
			elseif($vistas=="index"){
				$contenido="./vistas/contenidos/inicio-vista.php";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}