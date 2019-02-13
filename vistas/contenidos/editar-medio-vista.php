<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>EDITAR MEDIOS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>medios/">Medios</a></li>
                            <li class="active">Editar Medio</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">

	<!-- Menu medios -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Opciones</strong>
						<small>Manejo de medios</small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo SERVERURL; ?>medios/'">Regresar a medios</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-medios/'">Buscar medio</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
		require_once "./controladores/administradorControlador.php";
		$insAdmin= new administradorControlador();
	?>

	<!-- Lista de usuarios -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Editar medio</strong>
					</div>
					<div class="card-body">
						<?php if (isset($_POST['medio-id-editar'])):
							$sql = $insAdmin->obtener_info_medios_controlador($_POST['medio-id-editar']);
							if($sql->rowCount()>=1):
								$datos=$sql->fetch();
								$titulo = $datos['titulo'];
								$url = $datos['url'];
								$fecha = $datos['fecha'];
								?>
									<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
										<input type="hidden" name="medio-id-editar" value="<?php echo $_POST['medio-id-editar']; ?>">
										<div class="row">
											<div class="col-lg-6">
												<img src="<?php echo $url; ?>" class="sombra" style="margin-bottom: 20px;">
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="medio-titulo-editar" class=" form-control-label">Título *</label>
													<input id="medio-titulo-editar" type="text" name="medio-titulo-editar" placeholder="" class="form-control" value="<?php echo $titulo; ?>" required="">
												</div>
												<p><b>Url:</b> <?php echo $url; ?></p>
												<p><b>Fecha:</b> <?php echo $fecha; ?></p>
											</div>
										</div>
										<input class="btn btn-outline-info btn-block" type="submit" value="Guardar cambios" style="margin: 20px 0px;">
										<div class="RespuestaAjax"></div>
									</form>
							<?php else: ?>
								<p>Ha ocurrido un error al intentar cargar la información de este medio</p>
								<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>medios/'">Ver todos los medios</button>
							<?php endif ?>
						<?php else: ?>
							<p>No ha seleccionado ningun medio para editar</p>
							<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>medios/'">Ver todos los medios</button>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>