<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>EDITAR ATRIBUTO</h1>
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
                            <li class="active">Editar Atributo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
	require_once "./controladores/administradorControlador.php";
	$insAdmin= new administradorControlador();
?>

<div class="content">

	<!-- Menu atributos -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Opciones</strong>
						<small>Manejo de atributos</small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>atributos/'">Todos los atributos</button>
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo SERVERURL; ?>nuevo-atributo/'">Agregar nuevo</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-atributos/'">Buscar atributo</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Editar etiqueta</strong>
					</div>
					<div class="card-body">
						<?php if (isset($_POST['atributo-id-editar'])):
							$sql = $insAdmin->obtener_info_taxonomia_controlador($_POST['atributo-id-editar']);
							if($sql->rowCount()>=1):
								$datos=$sql->fetch();
								$nombre = $datos['nombre'];
								$slug = $datos['slug'];
								$descripcion = $datos['descripcion'];
								?>
									<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
										<input type="hidden" name="atributo-id-editar" value="<?php echo $_POST['atributo-id-editar']; ?>">
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="entrada-titulo" class="form-control-label">Nombre *</label>
													<input id="entrada-titulo" type="text" name="atributo-nombre-editar" placeholder="" class="form-control" value="<?php echo $nombre; ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="entrada-slug" class=" form-control-label">Slug *</label>
													<input id="entrada-slug" type="text" name="atributo-slug-editar" placeholder="" class="form-control" value="<?php echo $slug; ?>" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="atributo-descripcion-editar" class=" form-control-label">Descripción</label>
													<input id="atributo-descripcion-editar" type="text" name="atributo-descripcion-editar" placeholder="" value="<?php echo $descripcion; ?>" class="form-control">
												</div>
											</div>
										</div>
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