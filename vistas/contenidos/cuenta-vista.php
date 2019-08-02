<?php 
if ($loginUsuario == true):
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
    require_once "./controladores/cuentaControlador.php";
    $instanciaCuenta = new cuentaControlador();
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

            .cuenta-contenedor{background-color: #fff;}

            .cuenta-contenedor .titulo{padding: 30px 20px 20px 20px;}
            .cuenta-contenedor .titulo h3{font-size: 24pt;}

            .cuenta-contenedor .menu-nav-cuenta{padding: 0px 20px;}
            .cuenta-contenedor .menu-nav-cuenta nav{background-color: #f5f5f5;}
            .cuenta-contenedor .menu-nav-cuenta nav ul{list-style: none;display:flex;}
            .cuenta-contenedor .menu-nav-cuenta nav ul li{background-color:#f3c7c6;}
            .cuenta-contenedor .menu-nav-cuenta nav ul li a{color:#000;text-decoration:none;padding: 20px 40px;display:inline-block;border-right: 1px solid #f5f5f5;font-size:12pt;}
            .cuenta-contenedor .menu-nav-cuenta nav ul li.activo{background-color:#ec110b;}
            .cuenta-contenedor .menu-nav-cuenta nav ul li.activo a{color:#fff;}

            .cuenta-contenedor .cuenta-rows{display: flex;flex-flow:row wrap;padding: 30px 20px;}

            .cuenta-contenedor .cuenta-rows .cuenta-row-1{padding: 20px;width: 50%;}

            .cuenta-contenedor .cuenta-rows .cuenta-row-2{background-color:#ec110b;color:#fff;padding: 120px 20px 120px 20px;width: 50%;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .logo{text-align:center;border-bottom:1px solid #fff;padding-bottom: 50px;margin-bottom:50px;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .logo > img{width:220px;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .beneficios > p{padding:0px 50px;text-align:center;font-weight:bold;font-size:14pt;margin-bottom:50px;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .beneficios .lista-beneficios{padding:0px 100px 0px 120px;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .beneficios .lista-beneficios .beneficio{display:flex;flex-flow:row nowrap;align-items:center;margin-bottom:30px;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .beneficios .lista-beneficios .beneficio .icono{width:60px;flex: 0 0 auto;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .beneficios .lista-beneficios .beneficio .icono img{width:100%;display: block;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .beneficios .lista-beneficios .beneficio .texto{flex: 1 1 auto;padding-left:20px;}
			.cuenta-contenedor .cuenta-rows .cuenta-row-2 > .beneficios .lista-beneficios .beneficio .texto p{font-size: 16pt;width: 100%;}

            .cuenta-contenedor .titulo-grupo{border-bottom:2px solid #9e9d9d;display:block;margin: 20px 0px 20px 0px;font-size:16pt;text-transform:uppercase;font-weight:bold;}

            .cuenta-contenedor form label{display: block;width: 100%;margin-bottom:5px;}
            .cuenta-contenedor form input{display: block;width: 100%;border: 1px solid #c9c9c9;outline:0px !important;border-radius:4px;padding:10px;font-size:12pt;margin-bottom:10px;}
            .cuenta-contenedor form input:focus{border-color:#ec110b;}
            .cuenta-contenedor form input[type="submit"]{background-color: #0d6bb7;border-width: 0px !important;border-radius:0px;display:flex;margin:20px auto;width:max-content;color:#fff;padding:15px 100px;font-weight:bold;}
            .cuenta-contenedor form input[type="submit"]:hover{cursor:pointer;}
            .cuenta-contenedor form .RespuestaAjax{padding: 20px 0px;}
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
        
        <div class="cuenta-contenedor boxed-width">
            <div class="titulo">
                <h3>Información de Cuenta</h3>
            </div>
            <div class="menu-nav-cuenta">
                <nav>
                    <ul>
                        <li class="activo"><a href="<?=SERVERURL?>cuenta/">Mi cuenta</a></li>
                        <li><a href="<?=SERVERURL?>pedidos/">Mis Pedidos</a></li>
                    </ul>
                </nav>
            </div>

            <div class="cuenta-rows">
                <div class="cuenta-row-1">
                    <?php
                    if($tipo == "personal"):
                        $cliente = $instanciaCuenta->cargar_cuenta_personal($id_usuario);
                        $cliente = $cliente->fetch();
                    ?>
                        <form action="<?php echo SERVERURL; ?>ajax/actualizarCuentaAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="individual" value="individual">
                            <input type="hidden" name="id" value="<?=mainModel::encryption($id_usuario)?>">
                            <span class="titulo-grupo">Datos de la cuenta</span>
                            <label for="nombre">Nombre *</label>
                            <input id="nombre" type="text" name="nombre" required="" value="<?=$cliente['nombre']?>">
                            <label for="apellidos">Apellidos *</label>
                            <input id="apellidos" type="text" name="apellidos" required="" value="<?=$cliente['apellido']?>">

                            <span class="titulo-grupo">Datos de facturación</span>
                            <label for="nit-facturacion">Nit</label>
                            <input id="nit-facturacion" type="text" name="nit-facturacion" value="<?=$cliente['facturacion_nit']?>">
                            <label for="nombre-facturacion">Nombre</label>
                            <input id="nombre-facturacion" type="text" name="nombre-facturacion" value="<?=$cliente['facturacion_nombre']?>">
                            <label for="direccion-facturacion">Dirección</label>
                            <input id="direccion-facturacion" type="text" name="direccion-facturacion" value="<?=$cliente['facturacion_direccion']?>">

                            <span class="titulo-grupo">Datos de entrega</span>
                            <label for="nombre-entrega">Nombre</label>
                            <input id="nombre-entrega" type="text" name="nombre-entrega" value="<?=$cliente['entrega_nombre']?>">
                            <label for="apellidos-entrega">Apellidos</label>
                            <input id="apellidos-entrega" type="text" name="apellidos-entrega" value="<?=$cliente['entrega_apellidos']?>">
                            <label for="correo-entrega">Correo electrónico</label>
                            <input id="correo-entrega" type="email" name="correo-entrega" value="<?=$cliente['entrega_correo']?>">
                            <label for="telefono-entrega">Teléfono</label>
                            <input id="telefono-entrega" type="text" name="telefono-entrega" value="<?=$cliente['entrega_telefono']?>">
                            <label for="direccion-entrega">Dirección</label>
                            <input id="direccion-entrega" type="text" name="direccion-entrega" value="<?=$cliente['entrega_direccion_1']?>">
                            <label for="departamento-entrega">Departamento</label>
                            <input id="departamento-entrega" type="text" name="departamento-entrega" value="<?=$cliente['entrega_departamento']?>">
                            <label for="municipio-entrega">Municipio</label>
                            <input id="municipio-entrega" type="text" name="municipio-entrega" value="<?=$cliente['entrega_municipio']?>">
                            <label for="postal-entrega">Código postal</label>
                            <input id="postal-entrega" type="text" name="postal-entrega" value="<?=$cliente['entrega_codigo_postal']?>">

                            <input type="submit" value="Actualizar información">
                            <div class="RespuestaAjax"></div>
                        </form>
                    <?php
                    elseif($tipo == "empresarial"):
                        $cliente = $instanciaCuenta->cargar_cuenta_empresarial($id_usuario);
                        $cliente = $cliente->fetch();
                    ?>
                        <form action="<?php echo SERVERURL; ?>ajax/actualizarCuentaAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="empresarial" value="empresarial">
                            <input type="hidden" name="id" value="<?=mainModel::encryption($id_usuario)?>">
                            <span class="titulo-grupo">Datos de la cuenta</span>
                            <label for="nombre">Nombre *</label>
                            <input id="nombre" type="text" name="nombre" required="" value="<?=$cliente['nombre']?>">
                            <label for="apellidos">Apellidos *</label>
                            <input id="apellidos" type="text" name="apellidos" required="" value="<?=$cliente['apellido']?>">
                            <label for="dpi-empresa">DPI *</label>
                            <input id="dpi-empresa" type="text" name="dpi-empresa" required="" value="<?=$cliente['dpi']?>">
                            <label for="institucion-empresa">Compañía / institución *</label>
                            <input id="institucion-empresa" type="text" name="institucion-empresa" required="" value="<?=$cliente['institucion']?>">
                            <label for="nit-empresa">NIT *</label>
                            <input id="nit-empresa" type="text" name="nit-empresa" required="" value="<?=$cliente['nit']?>">
                            <label for="direccion-empresa">Dirección *</label>
                            <input id="direccion-empresa" type="text" name="direccion-empresa" required="" value="<?=$cliente['direccion']?>">
                            <label for="departamento-empresa">Departamento *</label>
                            <input id="departamento-empresa" type="text" name="departamento-empresa" required="" value="<?=$cliente['departamento']?>">
                            <label for="ciudad-empresa">Cidudad *</label>
                            <input id="ciudad-empresa" type="text" name="ciudad-empresa" required="" value="<?=$cliente['ciudad']?>">
                            <label for="telefono-empresa">Teléfono *</label>
                            <input id="telefono-empresa" type="text" name="telefono-empresa" required="" value="<?=$cliente['telefono']?>">

                            <span class="titulo-grupo">Datos de entrega</span>
                            <label for="nombre-entrega">Nombre</label>
                            <input id="nombre-entrega" type="text" name="nombre-entrega" value="<?=$cliente['entrega_nombre']?>">
                            <label for="apellidos-entrega">Apellidos</label>
                            <input id="apellidos-entrega" type="text" name="apellidos-entrega" value="<?=$cliente['entrega_apellidos']?>">
                            <label for="correo-entrega">Correo electrónico</label>
                            <input id="correo-entrega" type="email" name="correo-entrega" value="<?=$cliente['entrega_correo']?>">
                            <label for="telefono-entrega">Teléfono</label>
                            <input id="telefono-entrega" type="text" name="telefono-entrega" value="<?=$cliente['entrega_telefono']?>">
                            <label for="direccion-entrega">Dirección</label>
                            <input id="direccion-entrega" type="text" name="direccion-entrega" value="<?=$cliente['entrega_direccion_1']?>">
                            <label for="departamento-entrega">Departamento</label>
                            <input id="departamento-entrega" type="text" name="departamento-entrega" value="<?=$cliente['entrega_departamento']?>">
                            <label for="municipio-entrega">Municipio</label>
                            <input id="municipio-entrega" type="text" name="municipio-entrega" value="<?=$cliente['entrega_municipio']?>">
                            <label for="postal-entrega">Código postal</label>
                            <input id="postal-entrega" type="text" name="postal-entrega" value="<?=$cliente['entrega_codigo_postal']?>">

                            <input type="submit" value="Actualizar información">
                            <div class="RespuestaAjax"></div>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="cuenta-row-2">
                    <div class="logo">
                        <img src="<?php echo SERVERURL; ?>vistas/assets/img/logo.png" alt="Smart Office Solutions">
                    </div>
                    <div class="beneficios">
                        <p>Crea una cuenta en gosmartoffice.com para conseguir estos beneficios y muchos más:</p>
                        <div class="lista-beneficios">
                            <div class="beneficio">
                                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/garantia.png"></div>
                                <div class="texto"><p>Acceso a planes de protección extendida.</p></div>
                            </div>
                            <div class="beneficio">
                                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/soporte.png"></div>
                                <div class="texto"><p>Asesoría personalizada en todas tus compras.</p></div>
                            </div>
                            <div class="beneficio">
                                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/website.png"></div>
                                <div class="texto"><p>Información en línea de productos mejorada.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php
    else:
        echo '<script> window.location="'.SERVERURL.'login/" </script>';
    endif;
?>