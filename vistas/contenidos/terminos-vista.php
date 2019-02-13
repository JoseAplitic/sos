<?php 
	require_once "./controladores/administradorControlador.php";
	$insAdmin= new administradorControlador();
	
	$url = explode("/", $_GET['views']);
	$atributo = $insAdmin->obtener_info_taxonomia_controlador($url[1]);

	if($atributo->rowCount()>=1){
		$datos=$atributo->fetch();
		if($datos['taxonomia']=='atributo'):
?>
<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>TÉRMINOS DE <?php echo strtoupper($datos['nombre']); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>productos/">Productos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>atributos/">Atributos</a></li>
                            <li class="active">Agregar Término</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">

	<!-- Menu terminos -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Opciones</strong>
						<small>Manejo de términos de <?php echo $datos['nombre']; ?></small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-danger" role="link" onclick="window.location='<?php echo SERVERURL; ?>atributos/'">Regresar a atributos</button>
						<?php $url_ver = SERVERURL."terminos/".$datos["id"]."/"; ?>
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo $url_ver; ?>'">Todos los terminos de <?php echo $datos['nombre']; ?></button>
						<?php $url_agregar = SERVERURL."nuevo-termino/".$datos["id"]."/"; ?>
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo $url_agregar; ?>'">Agregar nuevo</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Lista de terminos -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Todos los terminos de <?php echo $datos['nombre']; ?></strong>
					</div>
					<div class="card-body">
						<div class="table-stats order-table ov-h">
							<?php 
								$pagina = explode("/", $_GET['views']);
								echo $insAdmin->paginador_terminos_controlador($pagina[2],10,$datos["id"]);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="clearfix"></div>

<?php 
	else:
		$url_enviar = SERVERURL.'atributos/';
    	echo '<script>location.href="'.$url_enviar.'"</script>';	
	endif;
		}
	else{
		$url_enviar = SERVERURL.'atributos/';
    	echo '<script>location.href="'.$url_enviar.'"</script>';
	}
?>