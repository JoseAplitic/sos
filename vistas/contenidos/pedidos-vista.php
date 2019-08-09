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

        .pedido-contenedor{background-color: #fff;}

        .pedido-contenedor .titulo{padding: 30px 20px 20px 20px;}
        .pedido-contenedor .titulo h3{font-size: 24pt;}

        .pedido-contenedor .menu-nav-cuenta{padding: 0px 20px;}
        .pedido-contenedor .menu-nav-cuenta nav{background-color: #f5f5f5;}
        .pedido-contenedor .menu-nav-cuenta nav ul{list-style: none;display:flex;}
        .pedido-contenedor .menu-nav-cuenta nav ul li{background-color:#f3c7c6;}
        .pedido-contenedor .menu-nav-cuenta nav ul li a{color:#000;text-decoration:none;padding: 20px 40px;display:inline-block;border-right: 1px solid #f5f5f5;font-size:12pt;}
        .pedido-contenedor .menu-nav-cuenta nav ul li.activo{background-color:#ec110b;}
        .pedido-contenedor .menu-nav-cuenta nav ul li.activo a{color:#fff;}

        .contenedor-pedidos{padding: 20px;}
        .buscador-pedidos{padding:20px;background-color:#f5f5f5;margin-bottom:30px;}
        .titulo-buscar{font-size:18pt;margin-bottom:10px;}
        .row-form{display:flex;flex-flow:row wrap;align-items:flex-end;}
        .column-form{padding:10px;}
        .column-form.w60{width:60%;}
        .column-form.w40{width:40%;}
        .column-form.w35{width:35%;}
        .column-form.w30{width:30%;}
        .column-form input{display: block;width: 100%;border: 1px solid #c9c9c9;outline:0px !important;border-radius:4px;padding:10px;font-size:12pt;}
        .column-form input:focus{border-color:#ec110b;}
        .column-form label{display:block;color:#0d6bb7;font-size: 14pt;font-weight:normal;margin-bottom:10px;}
        .column-form input[type="submit"]{background-color: #0d6bb7;border-width: 0px !important;border-radius:0px;width:100%;color:#fff;padding:10px;font-weight:bold;}
        .column-form input[type="submit"]:hover{cursor:pointer;}

        .contenedor-pedidos .lista-pedidos{margin-bottom: 30px;}
        .contenedor-pedidos .lista-pedidos .row{display:flex;flex-flow:row nowrap;align-items:center;border-bottom:1px solid #b2b2b2;}
        .contenedor-pedidos .lista-pedidos .row .w40{width:40%;}
        .contenedor-pedidos .lista-pedidos .row .w30{width:30%;}
        .contenedor-pedidos .lista-pedidos .row.cabecera{padding:10px 20px;}
        .contenedor-pedidos .lista-pedidos .row.cabecera div p{text-align:center;color: #000;font-size:14pt;}
        .contenedor-pedidos .lista-pedidos .row.cabecera div.texto-left p{text-align:left;}
        
        .contenedor-pedidos .lista-pedidos .row.item{padding:20px 10px;}
        .contenedor-pedidos .lista-pedidos .row.item .column > p{text-align:center;font-weight:bold;font-size:14pt;}
        .contenedor-pedidos .lista-pedidos .row.item .pedido{display:flex;flex-flow:row nowrap;align-items:center;}
        .contenedor-pedidos .lista-pedidos .row.item .pedido a{text-decoration:none;display:block;font-size:14pt;font-weight:normal;color:#000;}
        .contenedor-pedidos .lista-pedidos .row.item .pedido a:hover{color:#ec110b;}

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
    
    <div class="pedido-contenedor boxed-width">
        <div class="titulo">
            <h3>Mis pedidos</h3>
        </div>
        <div class="menu-nav-cuenta">
            <nav>
                <ul>
                    <li><a href="<?=SERVERURL?>cuenta/">Mi cuenta</a></li>
                    <li class="activo"><a href="<?=SERVERURL?>pedidos/">Mis Pedidos</a></li>
                </ul>
            </nav>
        </div>
        <div class="contenedor-pedidos">
            <div class="buscador-pedidos">
                <p class="titulo-buscar">Buscar pedido</p>
                <?php if ($loginUsuario == true): ?>
                    <form action="" method="POST">
                        <div class="row-form">
                            <div class="column-form w60">
                                <label for="filtro">Filtro</label>
                                <input id="filtro" type="text" name="filtro" placeholder="Ingresa un filtro (Código de pedido ó fecha: año-mes-día)" required="">
                            </div>
                            <div class="column-form w40">
                                <input type="submit" value="Buscar">
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <form action="" method="POST">
                        <div class="row-form">
                            <div class="column-form w35">
                                <label for="correo">Correo electrónico</label>
                                <input id="correo" type="text" name="correo" placeholder="Ingresa tu correo electrónico" required="">
                            </div>
                            <div class="column-form w35">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" type="text" name="telefono" placeholder="Ingresa tu teléfono" required="">
                            </div>
                            <div class="column-form w30">
                                <input type="submit" value="Buscar">
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <div class="lista-pedidos">
                <?php
                    require_once "./controladores/pedidosControlador.php";
                    $cargarPedidos = new pedidosControlador();
                    echo $cargarPedidos::cargar_pedidos($tipo, $id_usuario);
                ?>
            </div>
        </div>

    </div>

</main>