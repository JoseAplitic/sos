<?php
	if($peticionAjax){
		require_once "../modelos/cargarInfoCarritoModelo.php";
	}else{
		require_once "./modelos/cargarInfoCarritoModelo.php";
	}

	class cargarInfoCarritoControlador extends cargarInfoCarritoModelo
	{

        public function guardar_datos_usuario_controlador($tipo_usuario, $id_usuario, $datosCliente)
        {
            if ($tipo_usuario=="personal")
            {
                cargarInfoCarritoModelo::guardar_datos_usuario_personal($id_usuario, $datosCliente);
            }
            elseif ($tipo_usuario=="empresarial")
            {
                cargarInfoCarritoModelo::guardar_datos_usuario_empresarial($id_usuario, $datosCliente);
            }
        }

        public function verificar_carrito_controlador($tipo_usuario, $id_usuario)
        {
            $hayCarrito = false;
            if ($tipo_usuario=="personal")
            {
                $productos = cargarInfoCarritoModelo::cargar_carrito_personal($id_usuario);
                if($productos->rowCount()>0)
                {
                    $hayCarrito = true;
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                $productos = cargarInfoCarritoModelo::cargar_carrito_empresarial($id_usuario);
                if($productos->rowCount()>0)
                {
                    $hayCarrito = true;
                }
            }
            elseif($tipo_usuario=="invitado")
            {
                if (isset($_COOKIE['user_carrito']))
                {
                    $carrito = unserialize($_COOKIE['user_carrito'], ["allowed_classes" => false]);
                    if(count($carrito)>0)
                    {
                        $hayCarrito = true;
                    }
                }
                
            }
            return $hayCarrito;
        }

        public function cargar_datos_usuario_controlador($tipo_usuario, $id_usuario)
        {
            $datosCliente = [
                "Nit" => "",
                "NombreFactura" => "",
                "DireccionFactura" => "",
                "Nombre" => "",
                "Apellidos" => "",
                "Correo" => "",
                "Telefono" => "",
                "Direccion1" => "",
                "Departamento" => "",
                "Municipio" => "",
                "Postal" => ""
            ];
            if ($tipo_usuario=="personal")
            {
                $datos = cargarInfoCarritoModelo::cargar_datos_usuario_personal($id_usuario);
                if($datos->rowCount()>0)
                {
                    $datosGuardados = $datos->fetch();
                    $datosCliente["Nit"] = $datosGuardados["facturacion_nit"];
                    $datosCliente["NombreFactura"] = $datosGuardados["facturacion_nombre"];
                    $datosCliente["DireccionFactura"] = $datosGuardados["facturacion_direccion"];
                    $datosCliente["Nombre"] = $datosGuardados["entrega_nombre"];
                    $datosCliente["Apellidos"] = $datosGuardados["entrega_apellidos"];
                    $datosCliente["Correo"] = $datosGuardados["entrega_correo"];
                    $datosCliente["Telefono"] = $datosGuardados["entrega_telefono"];
                    $datosCliente["Direccion1"] = $datosGuardados["entrega_direccion_1"];
                    $datosCliente["Departamento"] = $datosGuardados["entrega_departamento"];
                    $datosCliente["Municipio"] = $datosGuardados["entrega_municipio"];
                    $datosCliente["Postal"] = $datosGuardados["entrega_codigo_postal"];
                }
            }
            elseif ($tipo_usuario=="empresarial")
            {
                $datos = cargarInfoCarritoModelo::cargar_datos_usuario_empresarial($id_usuario);
                if($datos->rowCount()>0)
                {
                    $datosGuardados = $datos->fetch();
                    $datosCliente["Nit"] = $datosGuardados["nit"];
                    $datosCliente["NombreFactura"] = $datosGuardados["institucion"];
                    $datosCliente["DireccionFactura"] = $datosGuardados["direccion"];
                    $datosCliente["Nombre"] = $datosGuardados["entrega_nombre"];
                    $datosCliente["Apellidos"] = $datosGuardados["entrega_apellidos"];
                    $datosCliente["Correo"] = $datosGuardados["entrega_correo"];
                    $datosCliente["Telefono"] = $datosGuardados["entrega_telefono"];
                    $datosCliente["Direccion1"] = $datosGuardados["entrega_direccion_1"];
                    $datosCliente["Departamento"] = $datosGuardados["entrega_departamento"];
                    $datosCliente["Municipio"] = $datosGuardados["entrega_municipio"];
                    $datosCliente["Postal"] = $datosGuardados["entrega_codigo_postal"];
                }
            }
            return $datosCliente;
        }

        public function cargar_total_carrito($tipo_usuario, $id_usuario)
        {
            $total = 0;
            if ($tipo_usuario=="personal")
            {
                $productos = cargarInfoCarritoModelo::cargar_carrito_personal($id_usuario);
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
                                            <p class="sku">'.$producto['sku'].'</p>
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
            }
            elseif ($tipo_usuario=="empresarial")
            {
                $productos = cargarInfoCarritoModelo::cargar_carrito_empresarial($id_usuario);
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
                                            <p class="sku">'.$producto['sku'].'</p>
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
                                            <p class="sku">'.$producto['sku'].'</p>
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
            }
            $total = number_format($total,2);
            return $total;
        }
        
    }