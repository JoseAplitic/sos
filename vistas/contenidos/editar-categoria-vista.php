<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>EDITAR CATEGORÍA</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>productos/">Productos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>categorias/">Categorias</a></li>
                            <li class="active">Editar categoría</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">

	<!-- Menu categorias -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Opciones</strong>
						<small>Manejo de categorías</small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>categorias/'">Todas las categorias</button>
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo SERVERURL; ?>nueva-categoria/'">Agregar categoría</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-categorias/'">Buscar categoría</button>
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
						<strong class="card-title">Editar categoría</strong>
					</div>
					<div class="card-body">
						<?php if (isset($_POST['categoria-id-editar'])):
							$sql = $insAdmin->obtener_info_taxonomia_controlador($_POST['categoria-id-editar']);
							if($sql->rowCount()>=1):
								$datos=$sql->fetch();
								$nombre = $datos['nombre'];
								$slug = $datos['slug'];
								$descripcion = $datos['descripcion'];
								$padre = $datos['padre'];
								$icono = $datos['icono'];
								$mostrar_imagen = false;
								$mostrar_url = "";
								?>
						<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<input type="hidden" name="categoria-id-editar" value="<?php echo $_POST['categoria-id-editar']; ?>">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="entrada-titulo" class="form-control-label">Nombre *</label>
										<input id="entrada-titulo" type="text" name="categoria-nombre-editar" placeholder="" class="form-control" value="<?php echo $nombre; ?>" required="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="entrada-slug" class=" form-control-label">Slug *</label>
										<input id="entrada-slug" type="text" name="categoria-slug-editar" placeholder="" class="form-control" value="<?php echo $slug; ?>" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="categoria-descripcion-editar" class=" form-control-label">Descripción</label>
										<input id="categoria-descripcion-editar" type="text" name="categoria-descripcion-editar" placeholder="" value="<?php echo $descripcion; ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="categoria-padre-editar" class=" form-control-label">Categoría superior</label>
										<select id="categoria-padre-editar" name="categoria-padre-editar" data-placeholder="Elije una categoria..." class="standardSelect" tabindex="1">
										<?php if($padre > 0): ?>
											 <?php
												$categoriaPadre = $insAdmin->obtener_info_taxonomia_controlador($padre); 
												if($categoriaPadre->rowCount()>=1):
													$datosCategoriaPadre=$categoriaPadre->fetch();
													$padreId = $datosCategoriaPadre['id'];
													$padreNombre = $datosCategoriaPadre['nombre'];
												?>
													<option value="<?php echo $padreId; ?>" label="default"><?php echo $padreNombre; ?></option>
													<option value="">Ninguna</option>
													<?php echo $insAdmin->cargar_taxonomias_editar2_controlador("categoria", $_POST['categoria-id-editar'], $padre); ?>
												<?php else: ?>
													<option value="" label="default">Ninguna</option>
													<?php echo $insAdmin->cargar_taxonomias_editar_controlador("categoria", $_POST['categoria-id-editar']); ?>
												<?php endif; ?>
										<?php else: ?>
											<option value="" label="default">Ninguna</option>
											<?php echo $insAdmin->cargar_taxonomias_editar_controlador("categoria", $_POST['categoria-id-editar']); ?>
										<?php endif; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<p style="margin-top: 10px;"><strong>Reglas de precios</strong></p>
								</div>
								<?php 
									$reglas = $insAdmin->obtener_reglas_controlador($_POST['categoria-id-editar']); 
									if($reglas->rowCount()>=1):
										$datosReglas=$reglas->fetch();
								?>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="categoria-visitantes-editar" class="form-control-label">Para visitantes *</label>
										<input id="categoria-visitantes-editar" type="number" min="0" value="<?php echo $datosReglas['regla_visitantes']; ?>" step="any" name="categoria-visitantes-editar" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="categoria-usuarios-editar" class="form-control-label">Para usuarios registrados *</label>
										<input id="categoria-usuarios-editar" type="number" min="0" value="<?php echo $datosReglas['regla_usuarios']; ?>" step="any" name="categoria-usuarios-editar" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="categoria-empresas-editar" class="form-control-label">Para empresas *</label>
										<input id="categoria-empresas-editar" type="number" min="0" value="<?php echo $datosReglas['regla_empresas']; ?>" step="any" name="categoria-empresas-editar" placeholder="" class="form-control" required="">
									</div>
								</div>
									<?php else: ?>
								<div class="col-12">
									<p style="margin-top: 10px;">Ocurio un error al cargar las reglas</p>
								</div>
									<?php endif; ?>
							</div>
							<div class="row">
								<div class="col-9">
									<div class="form-group">
										<label for="categoria-icono-editar" class=" form-control-label">Icono</label>
										<select id="categoria-icono-editar" name="categoria-icono-editar" data-placeholder="Elije un icono..." class="standardSelect" tabindex="1">
										<?php if($icono > 0): ?>
												<?php
												$categoriaIcono = $insAdmin->obtener_info_medios_controlador($icono); 
												if($categoriaIcono->rowCount()>=1):
													$datosCategoriaIcono=$categoriaIcono->fetch();
													$iconoId = $datosCategoriaIcono['id'];
													$iconoTitulo = $datosCategoriaIcono['titulo'];
													$iconoUrl = $datosCategoriaIcono['url'];
													$mostrar_imagen = true;
													$mostrar_url = $iconoUrl;
												?>
													<option value="<?php echo $iconoId; ?>" label="default"  data-url-image="<?php echo $iconoUrl; ?>"><?php echo $iconoTitulo;?></option>
													<option value="" data-url-image="">Ninguno</option>
													<?php echo $insAdmin->cargar_medios_editar_controlador($icono); ?>
												<?php else: ?>
													<option value="" label="default" data-url-image="">Ninguno</option>
													<?php echo $insAdmin->cargar_medios_controlador($icono); ?>
												<?php endif; ?>
										<?php else: ?>
											<option value="" label="default" data-url-image="">Ninguno</option>
											<?php echo $insAdmin->cargar_medios_controlador($icono); ?>
										<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<?php if ($mostrar_imagen == true): ?>
										<img id="imagen-cambiar" src="<?php echo $mostrar_url; ?>" class="sombra">
									<?php else: ?>
										<img id="imagen-cambiar" src="" class="sombra">
									<?php endif; ?>
								</div>
							</div>
							<input class="btn btn-outline-info btn-block" type="submit" value="Guardar cambios" style="margin: 20px 0px;">
							<div class="RespuestaAjax"></div>
						</form>
							<?php else: ?>
								<p>Ha ocurrido un error al intentar cargar la información de esta categoria</p>
								<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>categorias/'">Ver todas las categorías</button>
							<?php endif ?>
						<?php else: ?>
							<p>No ha seleccionado ningún categoría para editar</p>
							<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>categorias/'">Ver todas las categorías</button>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Vaya, no se ha encontrado nada!",
			width: "100%",
			height: "200px"
        });
    });
</script>