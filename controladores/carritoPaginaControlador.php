<?php
	if($peticionAjax){
		require_once "../modelos/carritoPaginaModelo.php";
	}else{
		require_once "./modelos/carritoPaginaModelo.php";
	}

	class carritoPaginaControlador extends carritoPaginaModelo
	{

        public function cargar_carrito($tipo_usuario, $id_usuario)
        {
            $total = 0;
            $imprimir_total = true;
            $respuesta = '<div class="carrito-items">
                            <div class="row cabecera">
                                <div class="column w60 texto-left"><p>Producto</p></div>
                                <div class="column w20"><p>Precio</p></div>
                                <div class="column w20"><p>Cantidad</p></div>
                                <div class="column w20"><p>Sub-total</p></div>
                            </div>
                            <div class="carrito-items">';
            if ($tipo_usuario=="personal")
            {
                $productos = carritoPaginaModelo::cargar_carrito_personal($id_usuario);
                $id_usuario = mainModel::encryption($id_usuario);
                if($productos->rowCount()>0)
                {
                    $lista = array();
                    $productos = $productos->fetchAll();
                    foreach ($productos as $producto)
                    {
                        array_push($lista, $producto['sku']);
                    }
                    $peticionAjax = false;
                    require_once "./controladores/cargarListaProductosControlador.php";
                    $instanciaCargarProductos = new cargarListaProductosControlador();
                    $infoProductos = $instanciaCargarProductos->cargar_lista_productos($lista);
                    foreach ($infoProductos as $producto)
                    {
                        $precio = $instanciaCargarProductos->obtener_precio_producto($producto['sku'],$tipo_usuario,$producto['precio']);
                        $precio = number_format($precio,2);
                        $cantidad = 0;
                        foreach ($productos as $item)
                        {
                            if($item['sku'] == $producto['sku'])
                            {
                                $cantidad = $item['cantidad'];
                            }
                        }
                        $subtotal = $precio * $cantidad;
                        $total = $total + $subtotal;
                        $subtotal = number_format($subtotal,2);
                        $respuesta .= 
                            '<div class="row item">
                                <div class="column producto w60">
                                    <div class="imagen">
                                        <a href="'.SERVERURL.'producto/'.$producto['slug'].'/">
                                            <img src="'.PRODUCTOSURL.$producto['sku'].'.jpg" alt="'.$producto['nombre'].'">
                                        </a>
                                    </div>
                                    <div class="texto">
                                        <a href="'.SERVERURL.'producto/'.$producto['slug'].'/">
                                            <h3 class="nombre">'.$producto['nombre'].'</h3>
                                            
                                        </a>
                                    </div>
                                </div>
                                <div class="column precio w20"><p>Q'.$precio.'</p></div>
                                <div class="column cantidad w20">
                                    <form id="actualizarCarrito" action="'.SERVERURL.'ajax/carritoAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" name="accion" value="actualizar">
                                        <input type="hidden" name="tipo_usuario" value="'.$tipo_usuario.'">
                                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                        <input type="hidden" name="producto" value="'.$producto['sku'].'">
                                        <input type="number" name="cantidad" required="" value="'.$cantidad.'" min="1" step="1">
                                        <div class="RespuestaAjax"></div>
                                    </form>
                                    <form id="borrarCarrito" action="'.SERVERURL.'ajax/carritoAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" name="accion" value="borrar">
                                        <input type="hidden" name="tipo_usuario" value="'.$tipo_usuario.'">
                                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                        <input type="hidden" name="producto" value="'.$producto['sku'].'">
                                        <input type="submit" value="Eliminar">
                                        <div class="RespuestaAjax"></div>
                                    </form>
                                </div>
                                <div class="column subtotal w20"><p>Q'.$subtotal.'</p></div>
                            </div>';
                    }
                }
                else
                {
                    $respuesta .= '<style>
                                            .carrito-vacio{text-align:center;margin-top:20px;}
                                            .carrito-vacio p{font-size: 18pt;font-weight:bold;line-height:1.2;margin-bottom:20px;}
                                            .carrito-vacio a{font-size: 14pt;background-color:#0d6bb7;color:#fff;text-decoration:none;padding:10px 20px;}
                                        </style>
                                        <div class="carrito-vacio">
                                            <p>¡No hay productos en tu carrito!</p>
                                            <a href="'.SERVERURL.'">Volver a la tienda</a>
                                        </div>';
                    $imprimir_total = false;
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                $productos = carritoPaginaModelo::cargar_carrito_empresarial($id_usuario);
                $id_usuario = mainModel::encryption($id_usuario);
                if($productos->rowCount()>0)
                {
                    $lista = array();
                    $productos = $productos->fetchAll();
                    foreach ($productos as $producto)
                    {
                        array_push($lista, $producto['sku']);
                    }
                    $peticionAjax = false;
                    require_once "./controladores/cargarListaProductosControlador.php";
                    $instanciaCargarProductos = new cargarListaProductosControlador();
                    $infoProductos = $instanciaCargarProductos->cargar_lista_productos($lista);
                    foreach ($infoProductos as $producto)
                    {
                        $precio = $instanciaCargarProductos->obtener_precio_producto($producto['sku'],$tipo_usuario,$producto['precio']);
                        $precio = number_format($precio,2);
                        $cantidad = 0;
                        foreach ($productos as $item)
                        {
                            if($item['sku'] == $producto['sku'])
                            {
                                $cantidad = $item['cantidad'];
                            }
                        }
                        $subtotal = $precio * $cantidad;
                        $total = $total + $subtotal;
                        $subtotal = number_format($subtotal,2);
                        $respuesta .= 
                            '<div class="row item">
                                <div class="column producto w60">
                                    <div class="imagen">
                                        <a href="'.SERVERURL.'producto/'.$producto['slug'].'/">
                                            <img src="'.PRODUCTOSURL.$producto['sku'].'.jpg" alt="'.$producto['nombre'].'">
                                        </a>
                                    </div>
                                    <div class="texto">
                                        <a href="'.SERVERURL.'producto/'.$producto['slug'].'/">
                                            <h3 class="nombre">'.$producto['nombre'].'</h3>
                                            
                                        </a>
                                    </div>
                                </div>
                                <div class="column precio w20"><p>Q'.$precio.'</p></div>
                                <div class="column cantidad w20">
                                    <form id="actualizarCarrito" action="'.SERVERURL.'ajax/carritoAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" name="accion" value="actualizar">
                                        <input type="hidden" name="tipo_usuario" value="'.$tipo_usuario.'">
                                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                        <input type="hidden" name="producto" value="'.$producto['sku'].'">
                                        <input type="number" name="cantidad" required="" value="'.$cantidad.'" min="1" step="1">
                                        <div class="RespuestaAjax"></div>
                                    </form>
                                    <form id="borrarCarrito" action="'.SERVERURL.'ajax/carritoAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" name="accion" value="borrar">
                                        <input type="hidden" name="tipo_usuario" value="'.$tipo_usuario.'">
                                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                        <input type="hidden" name="producto" value="'.$producto['sku'].'">
                                        <input type="submit" value="Eliminar">
                                        <div class="RespuestaAjax"></div>
                                    </form>
                                </div>
                                <div class="column subtotal w20"><p>Q'.$subtotal.'</p></div>
                            </div>';
                    }
                }
                else
                {
                    $respuesta .= '<style>
                                            .carrito-vacio{text-align:center;margin-top:20px;}
                                            .carrito-vacio p{font-size: 18pt;font-weight:bold;line-height:1.2;margin-bottom:20px;}
                                            .carrito-vacio a{font-size: 14pt;background-color:#0d6bb7;color:#fff;text-decoration:none;padding:10px 20px;}
                                        </style>
                                        <div class="carrito-vacio">
                                            <p>¡No hay productos en tu carrito!</p>
                                            <a href="'.SERVERURL.'">Volver a la tienda</a>
                                        </div>';
                    $imprimir_total = false;
                }
            }
            elseif($tipo_usuario=="invitado")
            {
                if (isset($_COOKIE['user_carrito']))
                {
                    $carrito = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                    $productos = array();
                    foreach ($carrito as $item)
                    {
                        array_push($productos, $item['Producto']);
                    }
                    $peticionAjax = false;
                    require_once "./controladores/cargarListaProductosControlador.php";
                    $instanciaCargarProductos = new cargarListaProductosControlador();
                    $infoProductos = $instanciaCargarProductos->cargar_lista_productos($productos);
                    foreach ($infoProductos as $producto)
                    {
                        $precio = $instanciaCargarProductos->obtener_precio_producto($producto['sku'],$tipo_usuario,$producto['precio']);
                        $precio = number_format($precio,2);
                        $cantidad = 0;
                        foreach ($carrito as $item)
                        {
                            if($item['Producto'] == $producto['sku'])
                            {
                                $cantidad = $item['Cantidad'];
                            }
                        }
                        $subtotal = $precio * $cantidad;
                        $total = $total + $subtotal;
                        $subtotal = number_format($subtotal,2);
                        $respuesta .= 
                            '<div class="row item">
                                <div class="column producto w60">
                                    <div class="imagen">
                                        <a href="'.SERVERURL.'producto/'.$producto['slug'].'/">
                                            <img src="'.PRODUCTOSURL.$producto['sku'].'.jpg" alt="'.$producto['nombre'].'">
                                        </a>
                                    </div>
                                    <div class="texto">
                                        <a href="'.SERVERURL.'producto/'.$producto['slug'].'/">
                                            <h3 class="nombre">'.$producto['nombre'].'</h3>
                                            
                                        </a>
                                    </div>
                                </div>
                                <div class="column precio w20"><p>Q'.$precio.'</p></div>
                                <div class="column cantidad w20">
                                    <form id="actualizarCarrito" action="'.SERVERURL.'ajax/carritoAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" name="accion" value="actualizar">
                                        <input type="hidden" name="tipo_usuario" value="'.$tipo_usuario.'">
                                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                        <input type="hidden" name="producto" value="'.$producto['sku'].'">
                                        <input type="number" name="cantidad" required="" value="'.$cantidad.'" min="1" step="1">
                                        <div class="RespuestaAjax"></div>
                                    </form>
                                    <form id="borrarCarrito" action="'.SERVERURL.'ajax/carritoAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" name="accion" value="borrar">
                                        <input type="hidden" name="tipo_usuario" value="'.$tipo_usuario.'">
                                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                        <input type="hidden" name="producto" value="'.$producto['sku'].'">
                                        <input type="submit" value="Eliminar">
                                        <div class="RespuestaAjax"></div>
                                    </form>
                                </div>
                                <div class="column subtotal w20"><p>Q'.$subtotal.'</p></div>
                            </div>';
                    }
                    if(count($carrito)<1)
                    {
                        $respuesta .= '<style>
                                            .carrito-vacio{text-align:center;margin-top:20px;}
                                            .carrito-vacio p{font-size: 18pt;font-weight:bold;line-height:1.2;margin-bottom:20px;}
                                            .carrito-vacio a{font-size: 14pt;background-color:#0d6bb7;color:#fff;text-decoration:none;padding:10px 20px;}
                                        </style>
                                        <div class="carrito-vacio">
                                            <p>¡No hay productos en tu carrito!</p>
                                            <a href="'.SERVERURL.'">Volver a la tienda</a>
                                        </div>';
                        $imprimir_total = false;
                    }
                }
                else
                {
                    $respuesta .= '<style>
                                        .carrito-vacio{text-align:center;margin-top:20px;}
                                        .carrito-vacio p{font-size: 18pt;font-weight:bold;line-height:1.2;margin-bottom:20px;}
                                        .carrito-vacio a{font-size: 14pt;background-color:#0d6bb7;color:#fff;text-decoration:none;padding:10px 20px;}
                                    </style>
                                    <div class="carrito-vacio">
                                        <p>¡No hay productos en tu carrito!</p>
                                        <a href="'.SERVERURL.'">Volver a la tienda</a>
                                    </div>';
                    $imprimir_total = false;
                }
                
            }
            else
            {
                $respuesta .= '<style>
                                    .carrito-vacio{text-align:center;margin-top:20px;}
                                    .carrito-vacio p{font-size: 18pt;font-weight:bold;line-height:1.2;margin-bottom:20px;}
                                    .carrito-vacio a{font-size: 14pt;background-color:#0d6bb7;color:#fff;text-decoration:none;padding:10px 20px;}
                                </style>
                                <div class="carrito-vacio">
                                    <p>¡Ha ocurrido un error!</p>
                                    <a href="'.SERVERURL.'">Volver a la tienda</a>
                                </div>';
            }
            if($imprimir_total == true)
            {
                $total = number_format($total,2);
                $enlaceCarrito = "";
                $textoCarrito = "";
                if (isset($_COOKIE['user_tipo']))
                {
                    $enlaceCarrito = SERVERURL.'facturacion-y-envio/';
                    $textoCarrito = 'Finalizar Compra';
                }
                else
                {
                    $enlaceCarrito = SERVERURL.'login-compra/';
                    $textoCarrito = 'Iniciar Sesión';
                }
                $respuesta .= '
                                </div>
                                <div class="total-contenedor">
                                    <div class="total">
                                        <div class="texto-total"><p>Gran Total:</p></div>
                                        <div class="numero-total"><p>Q'.$total.'</p></div>
                                        <div class="enlace"><a href="'.$enlaceCarrito.'">'.$textoCarrito.'</a></div>
                                    </div>
                                </div>
                            </div>';
            }
            return $respuesta;
        }
        
    }