<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>EDITAR DESCUENTO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>descuentos/">Descuentos</a></li>
                            <li class="active">Editar Descuento</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">

	<!-- Menu usuarios -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Opciones</strong>
						<small>Manejo de descuentos</small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>descuentos/'">Todos los descuentos</button>
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo SERVERURL; ?>nuevo-descuento/'">Agregar nuevo</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-descuentos/'">Buscar descuentos</button>
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
						<strong class="card-title">Editar descuento</strong>
					</div>
					<div class="card-body">
						<?php if (isset($_POST['descuento-id-editar'])):
							$sql = $insAdmin->obtener_info_descuentos_controlador($_POST['descuento-id-editar']);
							if($sql->rowCount()>=1):
								$datos=$sql->fetch();
								$id = $datos['id'];
								$nombre = $datos['nombre'];
								$descripcion = $datos['descripcion'];
								$tipo_descuento = $datos['tipo_descuento'];
								$regla_visitantes = $datos['regla_visitantes'];
								$regla_usuarios = $datos['regla_usuarios'];
								$regla_empresas = $datos['regla_empresas'];
								$inicio = $datos['inicio'];
								$vencimiento = $datos['vencimiento'];
								?>
									<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
										<input type="hidden" name="descuento-id-editar" value="<?php echo $id; ?>">
										<?php $relaciones =  $insAdmin->cargar_relaciones_descuentos_controlador($id); ?>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="descuento-nombre-editar" class="form-control-label">Nombre *</label>
													<input id="descuento-nombre-editar" type="text" name="descuento-nombre-editar" placeholder="" class="form-control" required="" value="<?php echo $nombre; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="descuento-descripcion-editar" class=" form-control-label">Descripción</label>
													<input id="descuento-descripcion-editar" type="text" name="descuento-descripcion-editar" placeholder="" class="form-control" value="<?php echo $descripcion; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="descuento-tipo-editar" class=" form-control-label">Tipo *</label>
													<select id="descuento-tipo-editar" name="descuento-tipo-editar" data-placeholder="Elije una opción..." class="standardSelect" tabindex="1" required="">
														<?php if($tipo_descuento == "porcentaje"): ?>
															<option value="porcentaje" selected="">Porcentaje</option>
															<option value="fijo">Descuento fijo</option>
														<?php else: ?>
															<option value="porcentaje">Porcentaje</option>
															<option value="fijo" selected="">Descuento fijo</option>
														<?php endif; ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<p style="margin-top: 10px;"><strong>Descuentos</strong></p>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label for="descuento-visitantes-editar" class="form-control-label">Para visitantes *</label>
													<input id="descuento-visitantes-editar" type="number" min="0" value="<?php echo $regla_visitantes; ?>" step="any" name="descuento-visitantes-editar" placeholder="" class="form-control" required="">
												</div>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label for="descuento-usuarios-editar" class="form-control-label">Para usuarios *</label>
													<input id="descuento-usuarios-editar" type="number" min="0" value="<?php echo $regla_usuarios; ?>" step="any" name="descuento-usuarios-editar" placeholder="" class="form-control" required="">
												</div>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label for="descuento-empresas-editar" class="form-control-label">Para empresas *</label>
													<input id="descuento-empresas-editar" type="number" min="0" value="<?php echo $regla_empresas; ?>" step="any" name="descuento-empresas-editar" placeholder="" class="form-control" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="descuento-inicio-editar" class=" form-control-label">Inicio *</label>
													<input id="descuento-inicio-editar" type="date" name="descuento-inicio-editar" placeholder="" class="form-control" value="<?php echo $inicio; ?>" min="<?php echo date("Y-m-d"); ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="descuento-vencimiento-editar" class=" form-control-label">Vencimiento *</label>
													<input id="descuento-vencimiento-editar" type="date" name="descuento-vencimiento-editar" placeholder="" class="form-control" value="<?php echo $vencimiento; ?>" min="<?php echo date("Y-m-d"); ?>" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="descuento-productos-editar" class=" form-control-label">Productos</label>
													<select id="descuento-productos-editar" multiple name="descuento-productos-editar[]" data-placeholder="Elije los productos..." class="standardSelect" tabindex="1">
														<?php
															echo $insAdmin->relaciones_productos_descuentos_controlador($relaciones);
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="descuento-categoria-editar" class=" form-control-label">Categorías</label>
													<select id="descuento-categoria-editar" multiple name="descuento-categorias-editar[]" data-placeholder="Elije las categorías..." class="standardSelect" tabindex="1">
														<?php
															echo $insAdmin->relaciones_categorias_descuentos_controlador($relaciones);
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="descuento-etiqueta-editar" class=" form-control-label">Etiquetas</label>
													<select id="descuento-etiqueta-editar" multiple name="descuento-etiquetas-editar[]" data-placeholder="Elije las etiquetas..." class="standardSelect" tabindex="1">
														<?php
															echo $insAdmin->relaciones_etiquetas_descuentos_controlador($relaciones);
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="descuento-atributo-editar" class=" form-control-label">Atributos</label>
													<select id="descuento-atributo-editar" name="descuento-atributos-editar[]" data-placeholder="Elije los atributos" multiple="" class="standardSelect" tabindex="-1">
														<?php
															echo $insAdmin->relaciones_atributos_descuentos_controlador($relaciones);
														?>
													</select>
												</div>
											</div>
										</div>
										<input class="btn btn-outline-info btn-block" type="submit" value="Guardar cambios" style="margin: 20px 0px;">
										<div class="RespuestaAjax"></div>
									</form>
							<?php else: ?>
								<p>Ha ocurrido un error al intentar cargar la información de este descuento</p>
								<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>descuentos/'">Ver todos los descuentos</button>
							<?php endif ?>
						<?php else: ?>
							<p>No ha seleccionado ningun descuento para editar</p>
							<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>descuentos/'">Ver todos los descuentos</button>
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