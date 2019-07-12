<?php
    $datosRelaciones = array();
    $existenRelaciones = false;
    $productoRelaciones = $instanciaProducto->obtener_relaciones_producto($datosProducto['sku']);

    $categoria = 0;
    if (count($productoRelaciones)>0)
    {
        foreach ($productoRelaciones as $relacion)
        {
            if ($relacion['taxonomia']=="categoria")
            {
                $categoria = $relacion['id'];
            }
        }
    }

    $tipo = "";
    $id_usuario = "";
    if (isset($_COOKIE['user_tipo']))
    {
        $tipo = $_COOKIE['user_tipo'];
        $id_usuario = $_SESSION['user_id'];
    }
    else
    {
        $tipo = "invitado";
    }

    $textoDescuento = "";
    $precio = 0;
    $descuento = $instanciaProducto->obtener_descuentos_producto($datosProducto['sku'],$productoRelaciones,$datosProducto['precio'],$tipo);
    $precio = $datosProducto['precio'];
    $regla = $instanciaProducto->obtener_regla_precio($categoria, $tipo);
    if (count($descuento)>0)
    {
        $precioRegular = ($regla * $precio) + $precio;
        $precioRegular = number_format($precioRegular,2);
        $precio = $descuento['precio_final'];
        $precioCliente = ($regla * $precio) + $precio;
        $precioCliente = number_format($precioCliente,2);
        $ahorro = $precioRegular - $precioCliente;
        $ahorro = number_format($ahorro,2);

        $textoDescuento = '<div class="descuento">Precio Reg. Q'.$precioRegular.'. Ahorra Q'.$ahorro;
        if ($descuento['tipo']=="porcentaje")
        {
            $textoDescuento .= ' ('.$descuento['regla'].'% de descuento)';
        }
        elseif ($descuento['tipo']=="fijo")
        {
            $porcentaje = ($ahorro/$precioRegular)*100;
            $porcentaje = number_format($porcentaje,0);
            $textoDescuento .= ' ('.$porcentaje.'% de descuento)';
        }
        $textoDescuento .= '</div>';
        $precio = $descuento['precio_final'];
    }
    $precio = ($regla * $precio) + $precio;
    $precio = number_format($precio,2);
?>

<style type="text/css">

    main{
        background-color: #f5f5f5;
    }

    .breadcumb{background-color: #fff;color:#404040;font-size: 12pt;font-weight: bold;}
    .breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;}
    .breadcumb a{text-decoration: none;color: #9e9d9d;}
    .breadcumb a:hover{color: #ff110b;}.breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
    .breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
    .breadcumb ol li:last-child:after{display: none;}

    .show img{}
    .small-img {width: 100%;height: 70px;margin-top: 10px;position: relative;}
    .small-img .icon-left, .small-img .icon-right {width: 12px;height: 24px;cursor: pointer;position: absolute;top: 0;bottom: 0;margin: auto 0;z-index:1;}
    .small-img .icon-left {transform: rotate(180deg)}
    .small-img .icon-right { right: 0; }
    .small-img .icon-left:hover, .small-img .icon-right:hover { opacity: .5; }
    .small-container {width: 100%;height: 70px;overflow: hidden;position: absolute;left: 0;right: 0;margin: 0 auto;padding:0px 25px;}
    .small-container div {width: 800%;position: relative;}
    .small-container .show-small-img {display:block;width:70px;height:auto;margin-right: 6px;cursor: pointer;float: left;border: 1px solid #dddddd;}
    .small-container .show-small-img:last-of-type { margin-right: 0; }

    .producto-contenedor{background-color:#fff;padding: 20px;}
    .producto-contenedor .titulo{margin-top:40px;margin-bottom:10px;}
    .producto-contenedor .titulo h2{color:#1a1818;line-height:1.2;font-size:24pt;font-weight:bold;}
    .producto-contenedor .titulo p{color:#9e9d9d;line-height:1.2;font-size:12pt;}
    .producto-contenedor .logo-marca a{display:block;width:40px;}
    .producto-contenedor .logo-marca a img{display:block;width:100%;}
    .producto-contenedor .separador{width:100%;height:1px;background-color:#e2e1e1;margin:10px 0px;}
    .producto-contenedor .row{display:flex;flex-flow:row wrap;margin-bottom:30px;}
    .producto-contenedor .row .column{width:50%;}
    .producto-contenedor .row .column.detalles{padding-left:20px;}
    .producto-contenedor .row .column.detalles>div{margin-bottom:10px;}
    .producto-contenedor .row .column.detalles .precio{color:#ec110b;font-size:28pt;font-weight:bold;}
    .producto-contenedor .row .column.detalles .descuento{color:#9e9d9d;}
    .producto-contenedor .row .column.detalles .calificacion{margin-top: 10px}
    .producto-descripcion-divisor{border-bottom:1px solid #e2e1e1;margin: 20px 0px;}
    .producto-contenedor .row .column.detalles .agregar-carrito{background-color:#f2f2f2;padding:20px;margin-top:20px;}
    .producto-contenedor .row .column.detalles .agregar-carrito button{display:block;background-color:#ffe000;color:#1a1818;padding:10px 75px;border-width: 0px;margin:0px auto;border-radius:3px;}
    .producto-contenedor .row .column.detalles .agregar-carrito button:hover{outline:0px;background-color:#f7d900;cursor:pointer;}
    .producto-contenedor .row .column.detalles .agregar-carrito button:focus{outline:0px;background-color:#f2d501;}
    .producto-contenedor .row .column.detalles .agregar-carrito button img{width:25px;}
    .producto-contenedor .row .column.detalles .agregar-carrito button span{text-transform:uppercase;font-weight:bolder;margin-left:10px;position: relative;top: -5px;font-size: 12pt;}

    .detalles-tabs{margin-bottom:20px;}
    .detalles-tabs #tabs ul{display:flex;flex-flow:row wrap;list-style:none;border: 1px solid #dcdcdc;width:max-content;margin-bottom:-1px;}
    .detalles-tabs #tabs ul li{text-transform:uppercase;background-color:#ababab;border-right: 1px solid #dcdcdc;padding:20px;color:#fff;font-weight:bold;}
    .detalles-tabs #tabs ul li:last-child{border-right-width:0px;}
    .detalles-tabs #tabs ul li:hover{cursor:pointer;}
    .detalles-tabs #tabs ul li.selected{background-color:#ec110b;}
    .detalles-tabs #tabs > div{padding:20px;border: 1px solid #dcdcdc;}
    .detalles-tabs #tabs > div .calificacion{padding-bottom:10px;border-bottom:1px solid #d5d5d5}
    .detalles-tabs #tabs > div .estrellas{margin-top:10px;}
    .detalles-tabs #tabs > div .justificacion{padding-top:20px;}

    .yellow{color: #ffbe00;}
    .gray{color: #6b6b6b;}

    .zoom {display:block;width: 100%;height: auto;border: 1px solid #dddddd;}
    .zoom:hover {cursor:zoom-in;}
    .zoom img{display:block;width:100%;}
    .zoom:after {content:'';display:block;width:32px;height:32px;position:absolute;bottom:10px;right:10px;background:url(<?php echo SERVERURL; ?>vistas/assets/img/zoom-icon.png);background-size: cover;}
    .zoomImg{background:#fff;}

    .productos-relacionados{width: 100%;border: 1px solid #d2d2d2;display: flex;flex-flow: column nowrap;}
    .productos-relacionados > .title{background-color: #ffeae9;padding: 17px 15px;border-bottom: 1px solid #d2d2d2;color: #000;flex: 0 0;}
    .productos-relacionados > .title p{font-size: 18px;text-transform: uppercase;font-weight: bold;}
    .productos-relacionados .relacionados-items{flex: 1 0;display: flex;flex-flow: column nowrap;justify-content: center;}
    .productos-relacionados .relacionados-items .relacionados-slideshow{padding: 0px 50px;position: relative;}
    .productos-relacionados .relacionados-items .relacionados-slideshow > a{position: absolute;top: calc(50% - 24px);color: #ff110b;font-size: 48px;-webkit-transition: color 0.3s;transition: color 0.3s;}
    .productos-relacionados .relacionados-items .relacionados-slideshow > a:hover{color: #d00d08;-webkit-transition: color 0.3s;transition: color 0.3s;}
    .productos-relacionados .relacionados-items .relacionados-slideshow > #prev{left: 10px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow > #next{right: 10px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product{padding: 10px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-image{margin-bottom: 20px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-image img{width: 100%;display: block;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description{color: #000;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .title{margin-bottom: 10px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .rated{margin-bottom: 10px;display: flex;flex-flow: row wrap;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .rated i{margin-right: 5px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .rated i:last-child{margin-right: 0px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .title a{color: #000;text-decoration: none;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .title a:hover{color: #ec110b;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .price{display: flex;flex-flow: row wrap;align-items:flex-start;font-weight: bold;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .price .currency,
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .price .units{font-size: 32px;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .price .decimals{font-size: 16px;line-height: 1.55;}
    .productos-relacionados .relacionados-items .relacionados-slideshow .relacionados-item .product .product-description .legend{font-size: 14px;font-weight: bold;}
</style>

<main>

    <div class="producto-contenedor boxed-width">

        <div class="breadcumb">
            <div class="content">
                <ol class="breadcrumb">
                    <li><a href="<?php echo SERVERURL; ?>">Home</a></li>
                    <?php
                        if ($categoria>0)
                        {
                            echo $instanciaProducto->obtener_jerarquia_categoria($categoria);
                        }
                    ?>
                </ol>
            </div>
        </div>

        <div class="titulo">
            <h2><?php echo $datosProducto['nombre']; ?></h2>
            <p>
                <?php
                    if ($datosProducto['mpn']!="")
                    {
                        echo " Número de parte: ".$datosProducto['mpn'];
                    }
                ?>
            </p>
        </div>

        <?php
            if (count($productoRelaciones)>0)
            {
                foreach ($productoRelaciones as $relacion)
                {
                    if ($relacion['taxonomia']=="marca" && $relacion['icono']>0)
                    {
                        $infoMedio=$instanciaProducto->obtener_info_medio($relacion['icono']);
                        if($infoMedio->rowCount()>0)
                        {
                            $medio = $infoMedio->fetch();
                            echo '<div class="logo-marca"><a href="'.SERVERURL.'marcas/'.$relacion['slug'].'/"><img src="'.$medio['url'].'" alt="'.$medio['titulo'].'"></a></div>';
                        }
                    }
                }
            }
        ?>

        <div class="separador"></div>

        <div class="row">
            <div class="column galeria">
                <span class='zoom' id='imagen-producto'>
                    <img src='<?php echo PRODUCTOSURL.$datosProducto['sku'].'.jpg'; ?>' id='show-img'  alt='<?php echo $datosProducto['nombre']; ?>'/>
                </span>
                <div class="small-img">
                    <img src="<?php echo SERVERURL; ?>vistas/assets/img/chevron.png" class="icon-left" id="prev-img">
                    <div class="small-container">
                        <div id="small-img-roll">
                            <img src="<?php echo PRODUCTOSURL.$datosProducto['sku'].'.jpg'; ?>" class="show-small-img" alt="<?php echo $datosProducto['nombre']; ?>">
                            <?php
                                echo $instanciaProducto->obtener_galeria_producto($datosProducto['sku']);
                            ?>
                        </div>
                    </div>
                    <img src="<?php echo SERVERURL; ?>vistas/assets/img/chevron.png" class="icon-right" id="next-img">
                </div>
            </div>
            <div class="column detalles">
                <div class="precio">
                    <p>Q <?php echo $precio; ?></p>
                </div>
                <?php

                    echo $textoDescuento;

                    if ($datosProducto['calificacion']>0)
                    {
                        echo '<div class="calificacion">';
                        $yellow = $datosProducto['calificacion'];
                        $gray = 5 - $datosProducto['calificacion'];
                        for ($i=1; $i <= $yellow; $i++)
                        { 
                            echo '<i class="fas fa-star yellow"></i>';
                        }
                        for ($i=1; $i <= $gray; $i++)
                        { 
                            echo '<i class="fas fa-star gray"></i>';
                        }
                        echo '</div>';
                    }
                ?>
                <div class="producto-descripcion-divisor"></div>
                <div class="agregar-carrito">
                    <form id="agregarCarrito" action="<?php echo SERVERURL; ?>ajax/carritoAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="accion" value="agregar">
                        <input type="hidden" name="tipo_usuario" value="<?php echo $tipo; ?>">
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                        <input type="hidden" name="producto" value="<?php echo $datosProducto['sku']; ?>">
                        <button type="submit" form="agregarCarrito" value="Submit"><img src="<?php echo SERVERURL; ?>vistas/assets/img/carrito-boton.png" alt="Agregar al carrito"><span>Agregar al carrito</span></button>
                        <div class="RespuestaAjax"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="detalles-tabs">
            <div id='tabs'>
                <ul>
                    <li>Descripción general</li>
                    <li>Especificaciones</li>
                    <?php if ($datosProducto['calificacion']>0){echo "<li>Evaluación Smart</li>";} ?>
                </ul>

                <div>
                    <?php echo $datosProducto['descripcion']; ?>
                </div>

                <div>
                    <?php echo $datosProducto['especificaciones']; ?>
                </div>
                
                <?php
                    if ($datosProducto['calificacion']>0)
                    {
                        echo '<div>';
                        echo '<div class="calificacion"><p>Calificación:</p>';
                        $yellow = $datosProducto['calificacion'];
                        $gray = 5 - $datosProducto['calificacion'];
                        echo '<div class="estrellas">';
                        for ($i=1; $i <= $yellow; $i++)
                        { 
                            echo '<i class="fas fa-star yellow"></i>';
                        }
                        for ($i=1; $i <= $gray; $i++)
                        { 
                            echo '<i class="fas fa-star gray"></i>';
                        }
                        echo '</div></div>';
                        echo '<div class="justificacion">'.$datosProducto['justificacion'].'</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        <?php
            $relacionados = $instanciaProducto->obtener_relacionados_producto($datosProducto['sku'],$productoRelaciones);
            if(count($relacionados)>0):
                require_once "./controladores/cargarListaProductosControlador.php";
                $instanciaCargarProductos = new cargarListaProductosControlador();
        ?>
        <div class="productos-relacionados">
            <div class="title">
                <p>Productos relacionados</p>
            </div>
            <div class="relacionados-items">
                <div class="relacionados-slideshow">
                    <?php 
                        $productosRelacionados = $instanciaCargarProductos->cargar_lista_productos($relacionados);
                        foreach ($productosRelacionados as $imprimir)
                        {
                            $rated="";
                            if ($imprimir['calificacion']>0)
                            {
                                $rated .= '<div class="rated">';
                                $yellow = $imprimir['calificacion'];
                                $gray = 5 - $imprimir['calificacion'];
                                for ($i=1; $i <= $yellow; $i++)
                                { 
                                    $rated .= '<i class="fas fa-star yellow"></i>';
                                }
                                for ($i=1; $i <= $gray; $i++)
                                { 
                                    $rated .= '<i class="fas fa-star gray"></i>';
                                }
                                $rated .= '</div>';
                            }
                            $precioRelacionado = $instanciaCargarProductos->obtener_precio_producto($imprimir['sku'],$tipo,$imprimir['precio']);
                            $separar = explode(".",$precioRelacionado);
                            $unidades = $separar[0];
                            $decimales = $separar[1];
                            echo '<div class="relacionados-item">
                                    <div class="product">
                                        <div class="product-image">
                                            <a href="'.SERVERURL.'producto/'.$imprimir['slug'].'/"><img src="'.PRODUCTOSURL.$imprimir['sku'].'.jpg" alt="'.$imprimir['nombre'].'"></a>
                                        </div>
                                        <div class="product-description">
                                            <div class="title"><a href="'.SERVERURL.'producto/'.$imprimir['slug'].'/"><h3>'.$imprimir['nombre'].'</h3></a></div>
                                            '.$rated.'
                                            <div class="price">
                                                <p class="currency">Q.</p>
                                                <p class="units">'.$unidades.'.</p>
                                                <p class="decimals">'.$decimales.'</p>
                                            </div>
                                            <div class="legend">
                                                <p>Precio de contado</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

</main>

<script src="<?php echo SERVERURL; ?>vistas/js/jquery.zoom.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/js/jquery.tabs.js"></script>
<script>
    $('#imagen-producto').zoom({ on:'click', magnify: 2 });

    $('.show-small-img:first-of-type').css({'border': 'solid 1px #ec110b', 'padding': '2px'})
    $('.show-small-img:first-of-type').attr('alt', '<?php echo $datosProducto['nombre']; ?>').siblings().removeAttr('alt')
    $('.show-small-img').click(function () {
    $('#show-img').attr('src', $(this).attr('src'))
    $('.zoomImg').attr('src', $(this).attr('src'))
    $(this).attr('alt', '<?php echo $datosProducto['nombre']; ?>').siblings().removeAttr('alt')
    $(this).css({'border': 'solid 1px #ec110b', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
    if ($('#small-img-roll').children().length > 4) {
        if ($(this).index() >= 3 && $(this).index() < $('#small-img-roll').children().length - 1){
        $('#small-img-roll').css('left', -($(this).index() - 2) * 76 + 'px')
        } else if ($(this).index() == $('#small-img-roll').children().length - 1) {
        $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
        } else {
        $('#small-img-roll').css('left', '0')
        }
    }
    })

    $('#next-img').click(function (){
    $('#show-img').attr('src', $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").next().attr('src'))
    $('.zoomImg').attr('src', $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").next().attr('src'))
    $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").next().css({'border': 'solid 1px #ec110b', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
    $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").next().attr('alt', '<?php echo $datosProducto['nombre']; ?>').siblings().removeAttr('alt')
    if ($('#small-img-roll').children().length > 4) {
        if ($(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() >= 3 && $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() < $('#small-img-roll').children().length - 1){
        $('#small-img-roll').css('left', -($(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() - 2) * 76 + 'px')
        } else if ($(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() == $('#small-img-roll').children().length - 1) {
        $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
        } else {
        $('#small-img-roll').css('left', '0')
        }
    }
    })

    $('#prev-img').click(function (){
    $('#show-img').attr('src', $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").prev().attr('src'))
    $('.zoomImg').attr('src', $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").prev().attr('src'))
    $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").prev().css({'border': 'solid 1px #ec110b', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
    $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").prev().attr('alt', '<?php echo $datosProducto['nombre']; ?>').siblings().removeAttr('alt')
    if ($('#small-img-roll').children().length > 4) {
        if ($(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() >= 3 && $(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() < $('#small-img-roll').children().length - 1){
        $('#small-img-roll').css('left', -($(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() - 2) * 76 + 'px')
        } else if ($(".show-small-img[alt='<?php echo $datosProducto['nombre']; ?>']").index() == $('#small-img-roll').children().length - 1) {
        $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
        } else {
        $('#small-img-roll').css('left', '0')
        }
    }
    });

    $(document).ready( function() {
        tabify( '#tabs' );
    });
    
</script>