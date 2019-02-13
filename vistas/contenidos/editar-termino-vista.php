<?php 
	require_once "./controladores/administradorControlador.php";
	$insAdmin= new administradorControlador();
	
	$url = explode("/", $_GET['views']);
	$atributo =  $insAdmin->obtener_info_taxonomia_controlador($_POST['termino-padre-editar']);

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
                        <h1>EDITAR TÉRMINO DE <?php echo strtoupper($datos['nombre']); ?></h1>
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
                            <li class="active">Editar Término</li>
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
						<small>Manejo de terminos de <?php echo $datos['nombre']; ?></small>
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

	<!-- Editar Usuario -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Editar término de <?php echo $datos['nombre']; ?></strong>
					</div>
					<div class="card-body">
						<?php if (isset($_POST['termino-id-editar'])):
							$sql = $insAdmin->obtener_info_taxonomia_controlador($_POST['termino-id-editar']);
							if($sql->rowCount()>=1):
								$datos_termino=$sql->fetch();
								$termino_id = $datos_termino['id'];
								$termino_nombre = $datos_termino['nombre'];
								$termino_slug = $datos_termino['slug'];
								$termino_descripcion = $datos_termino['descripcion'];
						?>
						<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<input type="hidden" name="termino-id-editar" value="<?php echo $termino_id; ?>">
								<div class="col-6">
									<div class="form-group">
										<label for="entrada-titulo" class="form-control-label">Nombre *</label>
										<input id="entrada-titulo" type="text" name="termino-nombre-editar" placeholder="" class="form-control" value="<?php echo $termino_nombre; ?>" required="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="entrada-slug" class=" form-control-label">Slug *</label>
										<input id="entrada-slug" type="text" name="termino-slug-editar" placeholder="" class="form-control" value="<?php echo $termino_slug; ?>" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="termino-descripcion-editar" class=" form-control-label">Descripción</label>
										<input id="termino-descripcion-editar" type="text" name="termino-descripcion-editar" placeholder="" class="form-control" value="<?php echo $termino_descripcion; ?>" >
									</div>
								</div>
							</div>
							<input type="hidden" name="termino-padre-editar" value="<?php echo $datos['id']; ?>">
							<input class="btn btn-outline-info btn-block" type="submit" value="Guardar cambios" style="margin: 20px 0px;">
							<div class="RespuestaAjax"></div>
						</form>
						<?php else: ?>
								<p>Ha ocurrido un error al intentar cargar la información de este administrador</p>
								<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>etiquetas/'">Ver todos los usuario</button>
							<?php endif ?>
						<?php else: ?>
							<p>No ha seleccionado ningun administardor para editar</p>
							<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>etiquetas/'">Ver todos los usuario</button>
						<?php endif ?>
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