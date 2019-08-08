<?php
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
?>
<main class="full-width">
    <style>
        main{
            background-color: #f5f5f5;
        }

        .sombra-inferior{
            -webkit-box-shadow: 0px 2px 4px 0px #e5e5e5;
            -moz-box-shadow: 0px 2px 4px 0px #e5e5e5;
            box-shadow: 0px 2px 4px 0px #e5e5e5;
            position:relative;
            z-index: 1;
        }

        .value-proposal-box .value-proposal{
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
            align-items: center;
            padding: 20px 0px;
        }
        .value-proposal-box .value-proposal .item{
            width: 25%;
            border-right: 1px dashed #646162;
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
        }
        .value-proposal-box .value-proposal .item .contain{
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            width: 80%;
        }
        .value-proposal-box .value-proposal .item:last-child{
            border-right-width: 0px;
        }
        .value-proposal-box .value-proposal .item i{color: #a91410;margin-right: 10px;font-size: 24px;}
        .value-proposal-box .value-proposal .item p{font-size: 18px;font-weight: lighter;}
        .value-proposal-box .value-proposal .item p span{font-weight: bold;}

        .pedido-detalle-contenedor{background-color: #fff;}

        .pedido-detalle-contenedor > .titulo{padding: 30px 20px 20px 20px;}
        .pedido-detalle-contenedor > .titulo h3{font-size: 24pt;}

        .pedido-detalle-contenedor .menu-nav-cuenta{padding: 0px 20px;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav{background-color: #f5f5f5;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul{list-style: none;display:flex;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul li{background-color:#f3c7c6;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul li a{color:#000;text-decoration:none;padding: 20px 40px;display:inline-block;border-right: 1px solid #f5f5f5;font-size:12pt;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul li.activo{background-color:#ec110b;color:#fff;padding: 20px 40px;font-size:12pt;}

        .pedido-detalle-contenedor .desc-pedido{padding: 20px;}
        .pedido-detalle-contenedor .desc-pedido .fecha{margin-bottom: 20px;font-size:18pt;}
        .pedido-detalle-contenedor .desc-pedido .fila{display: flex;flex-flow: row wrap;margin-bottom:20px;}
        .pedido-detalle-contenedor .desc-pedido .fila .columna{width:50%;padding-right:30px;}
        .pedido-detalle-contenedor .desc-pedido .fila .columna:last-child{padding-right:0px;}
        .pedido-detalle-contenedor .desc-pedido .fila .columna-full{width:100%;}
        .pedido-detalle-contenedor .desc-pedido .titulo{border-bottom: 2px solid #3b3b3b;margin-bottom: 15px;}
        .pedido-detalle-contenedor .desc-pedido .titulo h4{margin-bottom: 5px;font-size:18pt;font-weight:bold;line-height: 1;text-transform:uppercase;}
        .pedido-detalle-contenedor .desc-pedido .detalles p{margin-bottom: 10px;font-size:14pt;}

        .pedido-detalle-contenedor .carrito-items{margin-bottom: 30px;}
        .pedido-detalle-contenedor .carrito-items .row{display:flex;flex-flow:row nowrap;align-items:center;border-bottom:1px solid #b2b2b2;}
        .pedido-detalle-contenedor .carrito-items .row .w60{width:60%;}
        .pedido-detalle-contenedor .carrito-items .row .w20{width:20%;}
        .pedido-detalle-contenedor .carrito-items .row.cabecera{padding:10px 20px;}
        .pedido-detalle-contenedor .carrito-items .row.cabecera div p{text-align:center;color: #000;font-size:14pt;}
        .pedido-detalle-contenedor .carrito-items .row.cabecera div.texto-left p{text-align:left;}
        
        .pedido-detalle-contenedor .carrito-items .row.item{padding:10px 10px;}
        .pedido-detalle-contenedor .carrito-items .row.item .column > p{text-align:center;font-weight:bold;font-size:14pt;}
        .pedido-detalle-contenedor .carrito-items .row.item .column.cantidad{display:flex;flex-flow:column wrap;align-items:center;justify-content:center;}
        .pedido-detalle-contenedor .carrito-items .row.item .producto{display:flex;flex-flow:row nowrap;align-items:center;}
        .pedido-detalle-contenedor .carrito-items .row.item .producto .imagen{width:100px;flex: 0 0 auto;}
        .pedido-detalle-contenedor .carrito-items .row.item .producto .imagen img{width:100%;display:block;}
        .pedido-detalle-contenedor .carrito-items .row.item .producto .texto{flex: 1 1 auto;padding-left:20px;}
        .pedido-detalle-contenedor .carrito-items .row.item .producto .texto a{text-decoration:none;}
        .pedido-detalle-contenedor .carrito-items .row.item .producto .texto a:hover .nombre{color:#ec110b;}
        .pedido-detalle-contenedor .carrito-items .row.item .producto .texto a .nombre{display:block;font-size:14pt;font-weight:normal;color:#000;margin-bottom:5px;}
        
        .pedido-detalle-contenedor .total-contenedor{display:flex;flex-flow:row nowrap;justify-content:flex-end;margin-top: 20px;}
        .pedido-detalle-contenedor .total-contenedor .total{width:40%;background-color:#f5f5f5;border:1px solid #c9c9c9;padding:20px 30px;display:flex;flex-flow:row wrap;align-items:center;}
        .pedido-detalle-contenedor .total-contenedor .total .texto-total,.pedido-detalle-contenedor .total-contenedor .total .numero-total{width:50%;font-size:18pt;font-weight:bold;}
        .pedido-detalle-contenedor .total-contenedor .total .numero-total{text-align:right;}

        .error-pedido{text-align:center;margin-top:20px;}
        .error-pedido p{font-size: 18pt;font-weight:bold;line-height:1.2;margin-bottom:20px;}
        .error-pedido a{font-size: 14pt;background-color:#0d6bb7;color:#fff;text-decoration:none;padding:10px 20px;}
    </style>

    <div class="value-proposal-box sombra-inferior">
        <div class="third-box boxed-width">
            <div class="value-proposal">
                <div class="item">
                    <div class="contain">
                        <i class="fas fa-box"></i><p><span>Entrega </span>grátis*</p>
                    </div>
                </div>
                <div class="item">
                    <div class="contain">
                        <i class="fas fa-medal"></i><p><span>El mejor </span>precio</p>
                    </div>
                </div>
                <div class="item">
                    <div class="contain">
                        <i class="fas fa-money-bill-wave"></i><p><span>Transacciones </span>segúras</p>
                    </div>
                </div>
                <div class="item">
                    <div class="contain">
                        <i class="fas fa-comments"></i><p><span>Asesoría </span>profesional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
        $pedido = "";
        $url = explode("/", $_GET['views']);
        if (isset($url[1]))
        {
            $pedido = $url[1];
        }
    ?>
    
    <div class="pedido-detalle-contenedor boxed-width">
        <div class="titulo">
            <h3>Detalles de Pedido</h3>
        </div>
        <div class="menu-nav-cuenta">
            <nav>
                <ul>
                    <li><a href="<?=SERVERURL?>cuenta/">Mi cuenta</a></li>
                    <li><a href="<?=SERVERURL?>pedidos/">Mis Pedidos</a></li>
                    <li class="activo">Pedido: <?=$pedido?></li>
                </ul>
            </nav>
        </div>
        <div class="desc-pedido">
            <?php
                require_once "./controladores/pedidoControlador.php";
                $cargarPedido = new pedidoControlador();
                echo $cargarPedido::cargar_pedido($pedido, $tipo, $id_usuario);
            ?>
        </div>

    </div>

</main>