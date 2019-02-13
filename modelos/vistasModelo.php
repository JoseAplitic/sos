<?php 
	class vistasModelo{
		protected function obtener_vistas_modelo($vistas){
			$listaBlanca=
			[
				"inicio",
				"usuarios","nuevo-usuario","buscar-usuarios","perfil-usuario","editar-usuario",
				"productos","buscar-productos","nuevo-producto","editar-producto",
				"categorias","buscar-categorias","nueva-categoria","editar-categoria",
				"atributos","buscar-atributos","nuevo-atributo","editar-atributo",
				"terminos","nuevo-termino","editar-termino",
				"etiquetas","buscar-etiquetas","nueva-etiqueta","editar-etiqueta",
				"descuentos","buscar-descuentos","nuevo-descuento","editar-descuento",
				"medios","editar-medio","buscar-medios"
			];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-vista.php")){
					$contenido="./vistas/contenidos/".$vistas."-vista.php";
				}else{
					$contenido="login";
				}
			}elseif($vistas=="login"){
				$contenido="login";
			}elseif($vistas=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}