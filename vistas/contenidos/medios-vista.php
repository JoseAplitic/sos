<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>MEDIOS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li class="active">Medios</li>
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
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>medios/'">Todos los medios</button>
						<button id="boton-agregar-medio" type="button" class="btn btn-success" role="link">Agregar nuevo</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-medios/'">Buscar medio</button>
						<div id="area-agregar-medio" style="display:none;padding-top:20px;">
							<div class="row">
								<div class="col-12">
									<h3 style="margin-bottom: 20px;">Agregar nuevo medio</h3>
								</div>
							</div>
							<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="medio-titulo-nuevo" class="form-control-label">Título *</label>
											<input id="medio-titulo-nuevo" type="text" name="medio-titulo-nuevo" placeholder="" class="form-control" required="">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="imagen-input" class="form-control-label">Imagen *</label>
											<div>
												<label class="subir-archivo btn btn-info">
													<i class="far fa-image"></i> Seleccionar archivo
													<input type="hidden" name="MAX_FILE_SIZE" value="16777216" />
													<input type="file" name="medio-imagen-nuevo" accept=".jpg, .png, .jpeg, .gif" required="">
												</label>
											</div>
										</div>
									</div>
								</div>
								<input class="btn btn-outline-success btn-block" type="submit" value="Agregar nuevo medio" style="margin: 0px 0px 20px 0px;">
								<div class="RespuestaAjax"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Lista de usuarios -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Todos los medios</strong>
					</div>
					<div class="card-body">
						<div class="table-stats order-table ov-h">
							<?php 
								$pagina = explode("/", $_GET['views']);
								echo $insAdmin->paginador_medios_controlador($pagina[1],12,"");
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>