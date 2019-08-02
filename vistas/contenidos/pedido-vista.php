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

        .pedido-detalle-contenedor .titulo{padding: 30px 20px 20px 20px;}
        .pedido-detalle-contenedor .titulo h3{font-size: 24pt;}

        .pedido-detalle-contenedor .menu-nav-cuenta{padding: 0px 20px;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav{background-color: #f5f5f5;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul{list-style: none;display:flex;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul li{background-color:#f3c7c6;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul li a{color:#000;text-decoration:none;padding: 20px 40px;display:inline-block;border-right: 1px solid #f5f5f5;font-size:12pt;}
        .pedido-detalle-contenedor .menu-nav-cuenta nav ul li.activo{background-color:#ec110b;color:#fff;padding: 20px 40px;font-size:12pt;}

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
    
    <div class="pedido-detalle-contenedor boxed-width">
        <div class="titulo">
            <h3>Información de Cuenta</h3>
        </div>
        <div class="menu-nav-cuenta">
            <nav>
                <ul>
                    <li><a href="<?=SERVERURL?>cuenta/">Mi cuenta</a></li>
                    <li><a href="<?=SERVERURL?>pedidos/">Mis Pedidos</a></li>
                    <li class="activo">Pedido: E12122019-2</li>
                </ul>
            </nav>
        </div>

    </div>

</main>