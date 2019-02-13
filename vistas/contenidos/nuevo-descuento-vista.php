<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>NUEVO DESCUENTO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>descuentos/">Descuentos</a></li>
                            <li class="active">Nuevo descuento</li>
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
						<strong class="card-title">Agregar nuevo descuento</strong>
					</div>
					<div class="card-body">
						<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="descuento-nombre-nuevo" class="form-control-label">Nombre *</label>
										<input id="descuento-nombre-nuevo" type="text" name="descuento-nombre-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="descuento-descripcion-nuevo" class=" form-control-label">Descripción</label>
										<input id="descuento-descripcion-nuevo" type="text" name="descuento-descripcion-nuevo" placeholder="" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="descuento-tipo-nuevo" class=" form-control-label">Tipo *</label>
										<select id="descuento-tipo-nuevo" name="descuento-tipo-nuevo" data-placeholder="Elije una opción..." class="standardSelect" tabindex="1" required="">
											<option value="porcentaje">Porcentaje</option>
											<option value="fijo">Descuento fijo</option>
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
										<label for="descuento-visitantes-nuevo" class="form-control-label">Para visitantes *</label>
										<input id="descuento-visitantes-nuevo" type="number" min="0" value="0" step="any" name="descuento-visitantes-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label for="descuento-usuarios-nuevo" class="form-control-label">Para usuarios *</label>
										<input id="descuento-usuarios-nuevo" type="number" min="0" value="0" step="any" name="descuento-usuarios-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label for="descuento-empresas-nuevo" class="form-control-label">Para empresas *</label>
										<input id="descuento-empresas-nuevo" type="number" min="0" value="0" step="any" name="descuento-empresas-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="descuento-inicio-nuevo" class=" form-control-label">Inicio *</label>
										<input id="descuento-inicio-nuevo" type="date" name="descuento-inicio-nuevo" placeholder="" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="descuento-vencimiento-nuevo" class=" form-control-label">Vencimiento *</label>
										<input id="descuento-vencimiento-nuevo" type="date" name="descuento-vencimiento-nuevo" placeholder="" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="descuento-productos-nuevo" class=" form-control-label">Productos</label>
										<select id="descuento-productos-nuevo" multiple name="descuento-productos-nuevo[]" data-placeholder="Elije los productos..." class="standardSelect" tabindex="1">
											<?php echo $insAdmin->cargar_productos_controlador(); ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="descuento-categoria-nuevo" class=" form-control-label">Categorías</label>
										<select id="descuento-categoria-nuevo" multiple name="descuento-categorias-nuevo[]" data-placeholder="Elije las categorías..." class="standardSelect" tabindex="1">
											<?php echo $insAdmin->cargar_taxonomias_controlador("categoria"); ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="descuento-etiqueta-nuevo" class=" form-control-label">Etiquetas</label>
										<select id="descuento-etiqueta-nuevo" multiple name="descuento-etiquetas-nuevo[]" data-placeholder="Elije las etiquetas..." class="standardSelect" tabindex="1">
											<option value="" label="default"></option>
											<?php echo $insAdmin->cargar_taxonomias_controlador("etiqueta"); ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="descuento-atributo-nuevo" class=" form-control-label">Atributos</label>
										<select id="descuento-atributo-nuevo" name="descuento-atributos-nuevo[]" data-placeholder="Elije los atributos" multiple="" class="standardSelect" tabindex="-1">
											<option value="" label="default"></option>
											<?php echo $insAdmin->cargar_atributos_controlador(); ?>
										</select>
									</div>
								</div>
							</div>
							<input class="btn btn-outline-success btn-block" type="submit" value="Agregar nuevo producto" style="margin: 20px 0px;">
							<div class="RespuestaAjax"></div>
						</form>
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