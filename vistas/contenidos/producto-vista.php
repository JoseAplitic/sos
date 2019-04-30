<?php

    $url = explode("/", $_GET['views']);
    
    if (isset($url[1])) {
       require_once "./controladores/productoControlador.php";
       $instanciaProducto = new productoControlador();

       $producto = $instanciaProducto->obtener_info_producto($url[1]);

       if ($producto->rowCount() > 0)
       {
           $datosProducto = $producto->fetch();
           include "./vistas/contenidos/producto-encontrado-vista.php";
       }
       else
       {
           include "./vistas/contenidos/producto-404-vista.php";
       }
    }
    else
    {
        include "./vistas/contenidos/producto-404-vista.php";
    }
?>