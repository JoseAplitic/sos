<?php
	if($peticionAjax){
		require_once "../modelos/homeModelo.php";
	}else{
		require_once "./modelos/homeModelo.php";
	}

	class homeControlador extends homeModelo
	{
        public function cargar_datos_home_controlador()
		{
            $datos = array();
			$categorias=homeModelo::cargar_datos_home_modelo();
			if ($categorias->rowCount() > 0)
			{
                $datos = $categorias->fetch();
                $datos = json_decode($datos['contenido'], true);
            }

            return $datos;
        }

        public function cargar_info_medio_controlador($id)
        {
            $imagen = "";
            $infoMedio=homeModelo::obtener_info_medio_modelo($id);
            if($infoMedio->rowCount()>0)
            {
                $medio = $infoMedio->fetch();
                $imagen='<img src="'.$medio['url'].'" style="display: block;" alt="'.$medio['titulo'].'">';
            }
            return $imagen;
        }

        
        public function cargar_categorias_controlador()
		{
            $lista = "";
			$categorias=homeModelo::cargar_categorias_superiores_modelo();
			if ($categorias->rowCount() > 0)
			{
                $datos = $categorias->fetchAll();
                $contador = 0;
                $cerrar = false;
                foreach($datos as $rows)
			    {
                    $contador += 1;
                    if ($contador == 11)
                    {
                        $lista.= '<li class="home-element-1-more-cats"><a id="more-cats" href="#" class="fas"><i class="fas fa-bars"><span>Más categorías</span></i></a>
                        <ul class="close">';
                        $cerrar = true;
                    }
                    $lista.='<li><a href="'.SERVERURL.'categorias/'.$rows['slug'].'/" class="fas">';
                    if ($rows['icono']>0)
                    {
                        $infoMedio=homeModelo::obtener_info_medio_modelo($rows['icono']);
                        if($infoMedio->rowCount()>0)
                        {
                            $medio = $infoMedio->fetch();
                            $lista.='<img src="'.$medio['url'].'" alt="'.$medio['titulo'].'">';
                        }
                    }
                    $lista.='<span>'.$rows['nombre'].'</span></a></li>';
                }
                if ($cerrar == true)
                {
                    $lista.= '</ul></li>';
                }
            }

            return $lista;
		}
        
        public function cargar_categorias_slider_controlador()
		{
            $lista = "";
			$categorias=homeModelo::cargar_categorias_superiores_slider_modelo();
			if ($categorias->rowCount() > 0)
			{
                $datos = $categorias->fetchAll();
                foreach($datos as $rows)
			    {
                    $lista.='
					<div class="categories-item"><div class="categorie"><a href="'.SERVERURL.'categorias/'.$rows['slug'].'/">';
                    if ($rows['icono2']>0)
                    {
                        $infoMedio=homeModelo::obtener_info_medio_modelo($rows['icono2']);
                        if($infoMedio->rowCount()>0)
                        {
                            $medio = $infoMedio->fetch();
                            $lista.='<img src="'.$medio['url'].'" alt="'.$medio['titulo'].'">';
                        }
                    }
                    $lista.='<h3>'.$rows['nombre'].'</h3></a></div></div>';
                }
            }

            return $lista;
        }
        
    }