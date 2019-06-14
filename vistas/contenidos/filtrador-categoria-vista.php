<style>
    main{background-color:#f5f5f5;}
    .breadcumb{background-color: #f5f5f5;color:#404040;font-size: 12pt;font-weight: bold;}
    .breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;padding: 10px 20px;}
    .breadcumb a{text-decoration: none;color: #404040;}
    .breadcumb a:hover{color: #ff110b;}
    .breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
    .breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
    .breadcumb ol li:last-child:after{display: none;}
    .filtrador-subheader{padding:50px 0px 150px 0px;color:#fff;}
    .filtrador-subheader .contenido{padding:0px 20px;}
    .filtrador{margin-top:-100px;background-color:#fff;padding:20px;min-height:150px;display:flex;flex-flow:row wrap;justify-content:space-between;}
    .filtrador .sidebar{width:calc(25% - 10px);}
    .filtrador .productos{width:calc(75% - 10px);}

    .filtrador .categories-menu-icon{width: 100%;border: 1px solid #d2d2d2;margin-bottom:20px;}
    .filtrador .categories-menu-icon > .title{background-color: #ff110b;padding: 15px;border-bottom: 1px solid #d2d2d2;color: #fff;display: flex;flex-flow: row wrap;align-items: center;}
    .filtrador .categories-menu-icon > .title .content-icon{display: flex;flex: 0;}
    .filtrador .categories-menu-icon > .title .content-icon .icon-title{width: 30px;}
    .filtrador .categories-menu-icon > .title .content-icon img{display: block;width: 100%;}
    .filtrador .categories-menu-icon > .title .content-text{display: flex;flex: 1;padding-left: 20px;font-size: 14pt;}
    .filtrador .categories-menu-icon .menu-departamentos::-webkit-scrollbar-track{background-color: #b1b1b1;}
    .filtrador .categories-menu-icon .menu-departamentos::-webkit-scrollbar{width: 3px;background-color: #b1b1b1;}
    .filtrador .categories-menu-icon .menu-departamentos::-webkit-scrollbar-thumb{background-color: #ff110b;border-radius: 1px;}
    .filtrador .categories-menu-icon .menu-departamentos ul{list-style: none;}
    .filtrador .categories-menu-icon .menu-departamentos ul li{border-bottom: 1px solid #d2d2d2;display: block;}
    .filtrador .categories-menu-icon .menu-departamentos ul li:last-child{border-bottom-width: 0px;}
    .filtrador .categories-menu-icon .menu-departamentos ul li a{color:#4d4d4d;text-decoration: none;width: 100%;}
    .filtrador .categories-menu-icon .menu-departamentos ul li a:hover{color:#ff110b;}
    .filtrador .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item{display: flex;flex-flow: row wrap;align-items: center;padding: 15px;}
    .filtrador .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .img-content{display: flex;flex: 0;}
    .filtrador .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .img-content .img{width: 40px;}
    .filtrador .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .img-content .img img{width: 100%;display: block;}
    .filtrador .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .texto{display: flex;flex: 1;}
    .filtrador .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .texto p{padding: 0px 25px 0px 20px;font-size: 18px;font-weight: normal;position: relative;width: 100%;}
    .filtrador .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .texto p i{color: #ff110b;font-size: 18px;position: absolute;top: calc(50% - 9px);right: 10px;}

    .filtrador .sidebar .widget{margin-bottom:20px;}
    .filtrador .sidebar .widget .titulo{border:1px solid #d2d2d2;background-color:#afabac;padding:10px 20px;}
    .filtrador .sidebar .widget .titulo p{font-size:12pt;line-height:12pt;font-weight:bold;text-transform:uppercase;}
    .filtrador .sidebar .widget .contenido{border:1px solid #d2d2d2;border-top-width:0;padding:10px 20px;font-size:12pt;line-height:1.2;}
    .filtrador .sidebar .widget .contenido ul{list-style:none;}
    .filtrador .sidebar .widget .contenido ul li{margin-bottom:10px;}
    .filtrador .sidebar .widget .contenido ul li a{display:block;text-decoration:none;color:#000;}
    .filtrador .sidebar .widget .contenido ul li a:hover{text-decoration:underline;}
    .filtrador .sidebar .widget .contenido ul li a .filtro{display:flex;flex-flow:row wrap;align-items:center;}
    .filtrador .sidebar .widget .contenido ul li a .filtro .icono{flex:0 0 auto;width:20px;height:20px;background-image:url(<?php echo SERVERURL; ?>vistas/assets/img/filtro-uncheck.png);background-size:cover;}
    .filtrador .sidebar .widget .contenido ul li a:hover .filtro .icono{background-image:url(<?php echo SERVERURL; ?>vistas/assets/img/filtro-check.png);}
    .filtrador .sidebar .widget .contenido ul li a .filtro .icono.seleccionado{background-image:url(<?php echo SERVERURL; ?>vistas/assets/img/filtro-check.png) !important;}
    .filtrador .sidebar .widget .contenido ul li a .filtro .icono.deseleccionar{background-image:url(<?php echo SERVERURL; ?>vistas/assets/img/filtro-nocheck.png) !important;}
    .filtrador .sidebar .widget .contenido ul li a .filtro .filtro-desc{flex:1 0 auto;padding-left:10px;}
</style>
<?php
    require_once "./controladores/filtroCategoriaControlador.php";
    $instanciaFiltro = new filtroCategoriaControlador();
?>
<main class="full-width">
    <div class="breadcumb full-width">
        <div class="contenido boxed-width">
            <ol class="breadcrumb">
				<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
                <?php echo $instanciaFiltro->obtener_jerarquia_categoria($infoCat['id']); ?>
			</ol>
        </div>
    </div>
    <div class="filtrador-subheader full-width" style="background-image: url(<?php echo SERVERURL; ?>vistas/assets/img/pagina-categoria.jpg);">
        <div class="contenido boxed-width">
            <h2><?php echo $infoCat['nombre']; ?></h2>
            <p><?php echo $infoCat['descripcion']; ?></p>
        </div>
    </div>
    <div class="filtrador boxed-width">
        <div class="sidebar">
            <?php
            $filtroMarca = false;
            $idMarca = "";
            $nombreMarca = "";
            $subcategorias = $instanciaCategorias->obtener_subcategorias_controlador($infoCat['id']);
            if ($subcategorias->rowCount()>0): ?>
            <div class="categories-menu-icon">
                <div class="title">
                    <div class="content-icon">
                        <div class="icon-title">
                            <?php
                                $iconTitleAlt = "";
                                $iconTitleUrl = "";
                                $imagen =  $instanciaMedios->obtener_info_medio_controlador($infoCat['icono2']);
                                if ($imagen->rowCount()>0) {
                                    $infoIconTitle=$imagen->fetch();
                                    $iconTitleAlt = $infoIconTitle['titulo'];
                                    $iconTitleUrl = $infoIconTitle['url'];
                                }
                            ?>
                            <img src="<?php echo $iconTitleUrl; ?>" alt="<?php echo $iconTitleAlt; ?>">
                        </div>
                    </div>
                    <div class="content-text">
                        <p>DEPARTAMENTOS</p>
                    </div>
                </div>
                <div class="menu-departamentos">
                    <ul>
                        <?php 
                                $subcat = $subcategorias->fetchAll();
                                sort($subcat);
                                $lista = "";
                                foreach($subcat as $subcategoria)
                                {
                                    $iconTitleAlt = "";
                                    $iconTitleUrl = "";
                                    $medio=mediosControlador::obtener_info_medio_controlador($subcategoria['icono']);
                                    if ($medio->rowCount()>0) {
                                        $infoIconTitle=$medio->fetch();
                                        $iconTitleAlt = $infoIconTitle['titulo'];
                                        $iconTitleUrl = $infoIconTitle['url'];
                                    }
                                    $lista .= '
                                        <li>
                                            <a href="'.SERVERURL.'categorias/'.$subcategoria['slug'].'/">
                                                <div class="menu-departamentos-item">
                                                    <div class="img-content">
                                                        <div class="img">
                                                            <img src="'.$iconTitleUrl.'" alt="'.$iconTitleAlt.'">
                                                        </div>
                                                    </div>
                                                    <div class="texto">
                                                        <p>'.$subcategoria['nombre'].'<i class="fas fa-chevron-right"></i></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    ';
                                }
                                echo $lista;
                            ?>
                    </ul>
                </div>
            
            </div>
            <?php endif; ?>
            
            
            <?php
                $marca = "";
                $precio_min =  -1;
                $precio_max = -1;
                $pagina = "";
                foreach ($url as $atributo)
                {
                    $dato = explode("-", $atributo);
                    if($dato[0]=="marca")
                    {
                        $marca = $dato[1];
                    }
                    else if($dato[0]=="precioMin")
                    {
                        $precio_min = $dato[1];
                    }
                    else if($dato[0]=="precioMax")
                    {
                        $precio_max = $dato[1];
                    }
                    else if($dato[0]=="pagina")
                    {
                        $pagina = $dato[1];
                    }
                }
                $todosLosProductos = $instanciaFiltro->obtener_todos_los_productos_controlador($infoCat['id']);
            ?>
            <?php
            if (count($todosLosProductos["Productos"])>0):
            $url_precio = SERVERURL.$url[0]."/".$url[1]."/";
            $url_precio_marca = "";
            $url_precio_pagina = "";
            $url_precio_clase = "";
            foreach ($url as $atributo)
            {
                $dato = explode("-", $atributo);
                if($dato[0]=="marca")
                {
                    $url_precio_marca = "marca-".$dato[1]."/";
                    //echo $url_precio_marca; -----ESTOY TRABAJANDO ACA
                }
                else if($dato[0]=="pagina")
                {
                    $url_precio_pagina = "pagina-".$dato[1]."/";
                }
            }
            if(count($todosLosProductos["Marcas"])>0):
                $precio_min_imp = "";
                $precio_max_imp = "";
                if($precio_min>=0)
                {
                    $precio_min_imp = "precioMin-".$precio_min."/";
                }
                if($precio_max>=0)
                {
                    $precio_max_imp = "precioMax-".$precio_max."/";
                }
            ?>
            <div class="widget">
                <div class="titulo">
                    <p>Marcas</p>
                </div>
                <div class="contenido">
                    <ul>
                        <?php
                        foreach ($todosLosProductos["Marcas"] as $catEncontradas)
                        {
                            if($catEncontradas["slug"]==$marca)
                            {
                                $filtroMarca = true;
                                $idMarca = $catEncontradas["id"];
                                $nombreMarca = $catEncontradas["nombre"];
                            }
                        }
                        if($filtroMarca == true):
                        ?>
                        <li>
                            <a href="<?php echo $url_precio.$precio_min_imp.$precio_max_imp.$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <div class="icono deseleccionar">
                                    </div>
                                    <div class="filtro-desc">
                                        <p><?php echo $nombreMarca; ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php else: ?>
                            <?php foreach ($todosLosProductos["Marcas"] as $catEncontradas):?>
                            <li>
                                <a href="<?php echo $url_precio."marca-".$catEncontradas["slug"]."/".$precio_min_imp.$precio_max_imp.$url_precio_pagina; ?>">
                                    <div class="filtro">
                                        <div class="icono">
                                        </div>
                                        <div class="filtro-desc">
                                            <p><?php echo $catEncontradas["nombre"]; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <div class="widget">
                <div class="titulo">
                    <p>Precio</p>
                </div>
                <div class="contenido">
                    <ul>
                        <li>
                            <a href="<?php echo $url_precio.$url_precio_marca."precioMin-0/precioMax-100/".$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <?php
                                        if($precio_min >= 0 && $precio_min <= 100 && $precio_max >= 0 && $precio_max <= 100)
                                        {
                                            $url_precio_clase = " seleccionado";
                                        }
                                    ?>
                                    <div class="icono <?php echo $url_precio_clase; $url_precio_clase=""; ?>">
                                    </div>
                                    <div class="filtro-desc">
                                        <p>Menos de Q100</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $url_precio.$url_precio_marca."precioMin-100/precioMax-200/".$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <?php
                                        if($precio_min >= 100 && $precio_min <= 200 && $precio_max >= 100 && $precio_max <= 200)
                                        {
                                            $url_precio_clase = " seleccionado";
                                        }
                                    ?>
                                    <div class="icono <?php echo $url_precio_clase; $url_precio_clase=""; ?>">
                                    </div>
                                    <div class="filtro-desc">
                                        <p>Q100 - Q199.99</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $url_precio.$url_precio_marca."precioMin-200/precioMax-500/".$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <?php
                                        if($precio_min >= 200 && $precio_min <= 500 && $precio_max >= 200 && $precio_max <= 500)
                                        {
                                            $url_precio_clase = " seleccionado";
                                        }
                                    ?>
                                    <div class="icono <?php echo $url_precio_clase; $url_precio_clase=""; ?>">
                                    </div>
                                    <div class="filtro-desc">
                                        <p>Q200 - Q499.99</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $url_precio.$url_precio_marca."precioMin-500/precioMax-1000/".$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <?php
                                        if($precio_min >= 500 && $precio_min <= 1000 && $precio_max >= 500 && $precio_max <= 1000)
                                        {
                                            $url_precio_clase = " seleccionado";
                                        }
                                    ?>
                                    <div class="icono <?php echo $url_precio_clase; $url_precio_clase=""; ?>">
                                    </div>
                                    <div class="filtro-desc">
                                        <p>Q500 - Q999.99</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $url_precio.$url_precio_marca."precioMin-1000/precioMax-5000/".$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <?php
                                        if($precio_min >= 1000 && $precio_min <= 5000 && $precio_max >= 1000 && $precio_max <= 5000)
                                        {
                                            $url_precio_clase = " seleccionado";
                                        }
                                    ?>
                                    <div class="icono <?php echo $url_precio_clase; $url_precio_clase=""; ?>">
                                    </div>
                                    <div class="filtro-desc">
                                        <p>Q1000 - Q4999.99</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $url_precio.$url_precio_marca."precioMin-5000/precioMax-10000/".$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <?php
                                        if($precio_min >= 5000 && $precio_min <= 10000 && $precio_max >= 1000 && $precio_max <= 10000)
                                        {
                                            $url_precio_clase = " seleccionado";
                                        }
                                    ?>
                                    <div class="icono <?php echo $url_precio_clase; $url_precio_clase=""; ?>">
                                    </div>
                                    <div class="filtro-desc">
                                        <p>Q5000 - Q9999.99</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $url_precio.$url_precio_marca."precioMin-10000/".$url_precio_pagina; ?>">
                                <div class="filtro">
                                    <?php
                                        if($precio_min >= 10000)
                                        {
                                            $url_precio_clase = " seleccionado";
                                        }
                                    ?>
                                    <div class="icono <?php echo $url_precio_clase; $url_precio_clase=""; ?>">
                                    </div>
                                    <div class="filtro-desc">
                                        <p>Q10000+</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="productos">
            <?php
                if($filtroMarca == true)
                {
                    $todosLosProductos = filtroCategoriaControlador::obtener_productos_filtro_marca_controlador($idMarca, $todosLosProductos["Productos"]);
                }
                $NumeroProductos = count($todosLosProductos);
                echo $NumeroProductos . "<hr>";
            ?>
            <div class="paginador">
                <ol>
                    <li><a href="#">Ant</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Sig</a></li>
                </ol>
            </div>
            <div class="lista-productos">
                <?php
                    echo "<hr>";
                    print_r($todosLosProductos["Productos"]);
                    echo "<hr>";
                    print_r($todosLosProductos["Marcas"]);
                    echo "<hr>";
                ?>
            </div>
            <div class="paginador">
                <ol>
                    <li><a href="#">Ant</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Sig</a></li>
                </ol>
            </div>
        </div>
    </div>
</main>