<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>TODOS LOS PRODUCTOS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li class="active">Productos</li>
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
						<small>Manejo de productos</small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>productos/'">Todos los productos</button>
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo SERVERURL; ?>nuevo-producto/'">Agregar nuevo</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-productos/'">Buscar productos</button>
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
						<strong class="card-title">Editar producto</strong>
					</div>
					<div class="card-body">
						<?php if (isset($_POST['producto-sku-editar'])):
							$sql = $insAdmin->obtener_info_productos_controlador($_POST['producto-sku-editar']);
							if($sql->rowCount()>=1):
								$datos=$sql->fetch();
								$sku = $datos['sku'];
								$nombre = $datos['nombre'];
								$slug = $datos['slug'];
								$descripcion = $datos['descripcion'];
								$precio = $datos['precio'];
								$mpn = $datos['mpn'];
								$fabricante = $datos['fabricante'];
								$tipo = $datos['tipo'];
								$stock = $datos['stock'];
								$nuevo = $datos['nuevo'];
								$oferta = $datos['oferta'];
								$fecha = $datos['fecha'];
								?>
									<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
										<input type="hidden" name="producto-sku-original-editar" value="<?php echo $sku; ?>">
										<div class="custom-tab">
											<nav style="margin-bottom: 20px;">
												<div class="nav nav-tabs" id="nav-tab" role="tablist">
													<a class="nav-item nav-link active show" id="custom-nav-principal-tab" data-toggle="tab" href="#custom-nav-principal" role="tab" aria-controls="custom-nav-principal" aria-selected="true">Principal</a>
													<a class="nav-item nav-link" id="custom-nav-taxonomias-tab" data-toggle="tab" href="#custom-nav-taxonomias" role="tab" aria-controls="custom-nav-taxonomias" aria-selected="false">Taxonomías</a>
													<a class="nav-item nav-link" id="custom-nav-detalles-tab" data-toggle="tab" href="#custom-nav-detalles" role="tab" aria-controls="custom-nav-detalles" aria-selected="false">Más detalles</a>
												</div>
											</nav>
											<div class="tab-content pl-3 pt-2" id="nav-tabContent">
												<div class="tab-pane fade active show" id="custom-nav-principal" role="tabpanel" aria-labelledby="custom-nav-principal-tab">
												<?php $relaciones =  $insAdmin->cargar_relaciones_productos_controlador($sku); ?>
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="producto-categoria-editar" class=" form-control-label">Categoría *</label>
																<select id="producto-categoria-editar" name="producto-categoria-editar" data-placeholder="Elije una categoria..." class="standardSelect" tabindex="1" required="">
																	<?php
																		echo $insAdmin->cargar_taxonomias_categorias_productos_controlador($relaciones, "categoria");
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="producto-sku-editar" class=" form-control-label">SKU *</label>
																<input id="producto-sku-editar" type="text" name="producto-sku-editar" placeholder="" class="form-control" required="" value="<?php echo $sku; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-6">
															<div class="form-group">
																<label for="entrada-titulo" class="form-control-label">Nombre *</label>
																<input id="entrada-titulo" type="text" name="producto-nombre-editar" placeholder="" class="form-control" required="" value="<?php echo $nombre; ?>">
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<label for="entrada-slug" class=" form-control-label">Slug *</label>
																<input id="entrada-slug" type="text" name="producto-slug-editar" placeholder="" class="form-control" required="" value="<?php echo $slug; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="producto-descripcion-editar" class=" form-control-label">Descripción</label>
																<input id="producto-descripcion-editar" type="text" name="producto-descripcion-editar" placeholder="" class="form-control" value="<?php echo $descripcion; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-3">
															<div class="form-group">
																<label for="producto-precio-editar" class="form-control-label">Precio *</label>
																<input id="producto-precio-editar" type="number" min="0" value="<?php echo $precio; ?>" step="any" name="producto-precio-editar" placeholder="" class="form-control" required="">
															</div>
														</div>
														<div class="col-3">
															<div class="form-group">
																<label for="regla-visitantes" class="form-control-label">Visitantes</label>
																<input id="regla-visitantes" type="text" disabled="" class="form-control">
															</div>
														</div>
														<div class="col-3">
															<div class="form-group">
																<label for="regla-usuarios" class="form-control-label">Usuarios</label>
																<input id="regla-usuarios" type="text" disabled="" class="form-control">
															</div>
														</div>
														<div class="col-3">
															<div class="form-group">
																<label for="regla-empresas" class="form-control-label">Empresas</label>
																<input id="regla-empresas" type="text" disabled="" class="form-control">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-9">
															<div class="form-group">
																<label for="producto-imagenes-editar" class=" form-control-label">Imágenes para galería</label>
																<select id="producto-imagenes-editar" multiple name="producto-imagenes-editar[]" data-placeholder="Elije las imágenes..." class="standardSelect" tabindex="1">
																	<option value="" label="default"></option>
																	<?php
																		$imagenes =  $insAdmin->cargar_galeria_relaciones_productos_controlador($sku);
																		echo $insAdmin->cargar_medios_productos_controlador($imagenes);
																	?>
																</select>
															</div>
														</div>
														<div class="col-sm-3">
															<img id="imagen-cambiar" src="" class="sombra">
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="custom-nav-taxonomias" role="tabpanel" aria-labelledby="custom-nav-taxonomias-tab">
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="producto-etiqueta-editar" multiple class=" form-control-label">Etiquetas</label>
																<select id="producto-etiqueta-editar" multiple name="producto-etiqueta-editar[]" data-placeholder="Elije las etiquetas..." class="standardSelect" tabindex="1">
																	<option value="" label="default"></option>
																	<?php
																		echo $insAdmin->cargar_taxonomias_productos_controlador($relaciones, "etiqueta");
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="producto-atributo-editar" class=" form-control-label">Atributos</label>
																<select id="producto-atributo-editar" name="producto-atributo-editar[]" data-placeholder="Elije los atributos..." multiple="" class="standardSelect" tabindex="-1">
																	<option value="" label="default"></option>
																	<?php echo $insAdmin->cargar_atributos_productos_controlador($relaciones); ?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="custom-nav-detalles" role="tabpanel" aria-labelledby="custom-nav-detalles-tab">
													<div class="row">
														<div class="col-6">
															<div class="form-group">
																<label for="producto-mpn-editar" class=" form-control-label">MPN</label>
																<input id="producto-mpn-editar" type="text" name="producto-mpn-editar" placeholder="" class="form-control" value="<?php echo $mpn; ?>">
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<label for="producto-fabricante-editar" class=" form-control-label">Fabricante</label>
																<input id="producto-fabricante-editar" type="text" name="producto-fabricante-editar" placeholder="" class="form-control" value="<?php echo $fabricante; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-6">
															<div class="form-group">
																<label for="producto-tipo-editar" class=" form-control-label">Tipo</label>
																<input id="producto-tipo-editar" type="text" name="producto-tipo-editar" placeholder="" class="form-control" value="<?php echo $tipo; ?>">
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<label for="producto-stock-editar" class="form-control-label">Stock</label>
																<input id="producto-stock-editar" type="number" min="0" value="<?php echo $stock; ?>" step="any" name="producto-stock-editar" placeholder="" class="form-control">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-6">
															<div class="form-group">
																<label for="producto-editar-editar" class=" form-control-label">¿Nuevo?</label>
																<label class="container">SI
																	<input id="producto-nuevo-editar" name="producto-nuevo-editar" type="checkbox" <?php if($nuevo=="si"){echo 'checked=""';} ?>>
																	<span class="checkmark"></span>
																</label>
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<label for="producto-oferta-editar" class=" form-control-label">¿En oferta?</label>
																<label class="container">SI
																	<input id="producto-oferta-editar" name="producto-oferta-editar" type="checkbox" <?php if($oferta=="si"){echo 'checked=""';}?>>
																	<span class="checkmark"></span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<input class="btn btn-outline-info btn-block" type="submit" value="Guardar cambios" style="margin: 20px 0px;">
										<div class="RespuestaAjax"></div>
									</form>
							<?php else: ?>
								<p>Ha ocurrido un error al intentar cargar la información de este producto</p>
								<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>productos/'">Ver todos los productos</button>
							<?php endif ?>
						<?php else: ?>
							<p>No ha seleccionado ningun producto para editar</p>
							<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>productos/'">Ver todos los productos</button>
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
		
		function cargarPreciosAgregar()
		{
			var precio = parseFloat(jQuery('#producto-precio-editar').val());
			var precioV = parseFloat(jQuery('#producto-categoria-editar option:selected').attr('data-rv'));
			var precioU = parseFloat(jQuery('#producto-categoria-editar option:selected').attr('data-ru'));
			var precioE = parseFloat(jQuery('#producto-categoria-editar option:selected').attr('data-re'));
			precioV = (precio + ((precio*precioV)/100)).toFixed(2);
			precioU = (precio + ((precio*precioU)/100)).toFixed(2);
			precioE = (precio + ((precio*precioE)/100)).toFixed(2);
			jQuery('#regla-visitantes').val(precioV);
			jQuery('#regla-usuarios').val(precioU);
			jQuery('#regla-empresas').val(precioE);
		}
		jQuery('#producto-precio-editar').change(cargarPreciosAgregar);
		jQuery('#producto-categoria-editar').on('change',cargarPreciosAgregar);
		cargarPreciosAgregar();

        var url = jQuery('#producto-imagenes-editar option:selected',this).attr("data-url-image");
        jQuery('#imagen-cambiar').attr("src", url);

	});
</script>