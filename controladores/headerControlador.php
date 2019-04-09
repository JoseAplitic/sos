<?php
	if($peticionAjax){
		require_once "../modelos/headerModelo.php";
	}else{
		require_once "./modelos/headerModelo.php";
	}

	class headerControlador extends headerModelo
	{
        public function cargar_categorias_destacadas_controlador()
		{
            $lista = "";
			$categorias=headerModelo::cargar_categorias_destacadas_modelo();
			if ($categorias->rowCount() > 0)
			{
                $datos = $categorias->fetch();
                $datos = json_decode($datos['contenido'], true);
                $datos = $datos['categorias'];
                foreach($datos as $rows)
			    {
                    $infoCat=headerModelo::obtener_info_categoria_modelo($rows);

                    if($infoCat->rowCount()>0)
                    {
                        $info = $infoCat->fetch();
                        $lista.='<li><a href="'.SERVERURL.'categorias/'.$info['slug'].'/">'.$info['nombre'].'</a></li>';
                    }
                }
            }

            return $lista;
        }
        
        public function cargar_marcas_controlador()
		{
            $lista = "";
			$categorias=headerModelo::cargar_categorias_destacadas_modelo();
			if ($categorias->rowCount() > 0)
			{
                $datos = $categorias->fetch();
                $datos = json_decode($datos['contenido'], true);
                $datos = $datos['marcas'];
                foreach($datos as $rows)
			    {
                    $infoCat=headerModelo::obtener_info_marca_modelo($rows);

                    if($infoCat->rowCount()>0)
                    {
                        $info = $infoCat->fetch();
                        $lista.='<div class="brand"><a href="'.SERVERURL.'marcas/'.$info['slug'].'/">';
                        if ($info['icono']>0)
                        {
                            $infoMedio=headerModelo::obtener_info_medio_modelo($info['icono']);
                            if($infoMedio->rowCount()>0)
                            {
                                $medio = $infoMedio->fetch();
                                $lista.='<img src="'.$medio['url'].'" alt="'.$medio['titulo'].'">';
                            }
                        }
                        $lista.='<h3>'.$info['nombre'].'</h3></a></div>';
                    }
                }
            }

            return $lista;
		}
        
        public function cargar_categorias_controlador()
		{
            $lista = "";
			$categorias=headerModelo::cargar_categorias_superiores_modelo();
			if ($categorias->rowCount() > 0)
			{
                $datos = $categorias->fetchAll();
                foreach($datos as $rows)
			    {
                    $lista.='<div class="detail-item"><a href="'.SERVERURL.'categorias/'.$rows['slug'].'/">';
                    if ($rows['icono']>0)
                    {
                        $infoMedio=headerModelo::obtener_info_medio_modelo($rows['icono']);
                        if($infoMedio->rowCount()>0)
                        {
                            $medio = $infoMedio->fetch();
                            $lista.='<img src="'.$medio['url'].'" alt="'.$medio['titulo'].'">';
                        }
                    }
                    $lista.='<span>'.$rows['nombre'].'</span></a></div>';
                }
            }

            return $lista;
		}
    }