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
    if (isset($_COOKIE['user_tipo']))
    {
        $tipo = $_COOKIE['user_tipo'];
    }
    else
    {
        $tipo = "invitado";
    }

    $precio = 0;
    $regla = $instanciaProducto->obtener_regla_precio($categoria, $tipo);
    $precio = ($regla * $datosProducto['precio']) + $datosProducto['precio'];
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

    .show {width: 100%;height: auto;border: 1px solid #dddddd;}
    .show img{display:block;width:100%;}
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
    .producto-contenedor .row .column.detalles>div{margin-bottom:20px;}
    .producto-contenedor .row .column.detalles .precio{color:#ec110b;font-size:28pt;font-weight:bold;}

    .detalles-tabs #tabs ul{display:flex;flex-flow:row wrap;list-style:none;border: 1px solid #dcdcdc;width:max-content;margin-bottom:-1px;}
    .detalles-tabs #tabs ul li{text-transform:uppercase;background-color:#ababab;border-right: 1px solid #dcdcdc;padding:20px;color:#fff;font-weight:bold;}
    .detalles-tabs #tabs ul li:last-child{border-right-width:0px;}
    .detalles-tabs #tabs ul li:hover{cursor:pointer;}
    .detalles-tabs #tabs ul li.selected{background-color:#ec110b;}
    .detalles-tabs #tabs div{padding:20px;border: 1px solid #dcdcdc;}
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
            <p>SKU: <?php echo $datosProducto['sku']; ?> Número de parte: <?php echo $datosProducto['mpn']; ?></p>
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
                <div class="show" href="<?php echo PRODUCTOSURL.$datosProducto['sku'].'.jpg'; ?>">
                    <img src="<?php echo PRODUCTOSURL.$datosProducto['sku'].'.jpg'; ?>" id="show-img" alt="<?php echo $datosProducto['nombre']; ?>">
                </div>
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
                <div class="calificacion"></div>
                <div class="agregar-carrito">
                    
                </div>
            </div>
        </div>

        <div class="detalles-tabs">
            <div id='tabs'>
                <ul>
                    <li>Descripción general</li>
                    <li>Especificaciones</li>
                    <li>Garantía</li>
                    <li>Reseñas</li>
                </ul>

                <div>
                    <?php echo $datosProducto['descripcion']; ?>
                </div>

                <div>
                    <?php echo $datosProducto['especificaciones']; ?>
                </div>

                <div>
                    Garantía
                </div>

                <div>
                    Reseñas
                </div>
            </div>
        </div>

    </div>

</main>

<script src="<?php echo SERVERURL; ?>vistas/js/zoom-image.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/js/jquery.tabs.js"></script>
<script>
    $('.show').zoomImage();

    $('.show-small-img:first-of-type').css({'border': 'solid 1px #ec110b', 'padding': '2px'})
    $('.show-small-img:first-of-type').attr('alt', 'now').siblings().removeAttr('alt')
    $('.show-small-img').click(function () {
    $('#show-img').attr('src', $(this).attr('src'))
    $('#big-img').attr('src', $(this).attr('src'))
    $(this).attr('alt', 'now').siblings().removeAttr('alt')
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
    $('#show-img').attr('src', $(".show-small-img[alt='now']").next().attr('src'))
    $('#big-img').attr('src', $(".show-small-img[alt='now']").next().attr('src'))
    $(".show-small-img[alt='now']").next().css({'border': 'solid 1px #ec110b', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
    $(".show-small-img[alt='now']").next().attr('alt', 'now').siblings().removeAttr('alt')
    if ($('#small-img-roll').children().length > 4) {
        if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
        $('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
        } else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
        $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
        } else {
        $('#small-img-roll').css('left', '0')
        }
    }
    })

    $('#prev-img').click(function (){
    $('#show-img').attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
    $('#big-img').attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
    $(".show-small-img[alt='now']").prev().css({'border': 'solid 1px #ec110b', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
    $(".show-small-img[alt='now']").prev().attr('alt', 'now').siblings().removeAttr('alt')
    if ($('#small-img-roll').children().length > 4) {
        if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
        $('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
        } else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
        $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
        } else {
        $('#small-img-roll').css('left', '0')
        }
    }
    })

    $(document).ready( function() {
        tabify( '#tabs' );
    });
</script>