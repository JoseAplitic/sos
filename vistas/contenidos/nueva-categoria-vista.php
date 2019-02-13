<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>AGREGAR CATEGORÍA</h1>
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
                            <li class="active">Agregar categoría</li>
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

	<!-- Agregar usuario -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Agregar nueva categoría</strong>
					</div>
					<div class="card-body">
						<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="entrada-titulo" class="form-control-label">Nombre *</label>
										<input id="entrada-titulo" type="text" name="categoria-nombre-nueva" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="entrada-slug" class=" form-control-label">Slug *</label>
										<input id="entrada-slug" type="text" name="categoria-slug-nueva" placeholder="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="categoria-descripcion-nueva" class=" form-control-label">Descripción</label>
										<input id="categoria-descripcion-nueva" type="text" name="categoria-descripcion-nueva" placeholder="" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="categoria-padre-nueva" class=" form-control-label">Categoría superior</label>
										<select id="categoria-padre-nueva" name="categoria-padre-nueva" data-placeholder="Elije un icono..." class="standardSelect" tabindex="1">
											<option value="" label="default">Ninguna</option>
											<?php echo $insAdmin->cargar_taxonomias_controlador("categoria"); ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<p style="margin-top: 10px;"><strong>Reglas de precios</strong></p>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="categoria-visitantes-nueva" class="form-control-label">Para visitantes *</label>
										<input id="categoria-visitantes-nueva" type="number" min="0" value="0" step="any" name="categoria-visitantes-nueva" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="categoria-usuarios-nueva" class="form-control-label">Para usuarios registrados *</label>
										<input id="categoria-usuarios-nueva" type="number" min="0" value="0" step="any" name="categoria-usuarios-nueva" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="categoria-empresas-nueva" class="form-control-label">Para empresas *</label>
										<input id="categoria-empresas-nueva" type="number" min="0" value="0" step="any" name="categoria-empresas-nueva" placeholder="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-9">
									<div class="form-group">
										<label for="categoria-icono-nueva" class=" form-control-label">Icono</label>
										<select id="categoria-icono-nueva" name="categoria-icono-nueva" data-placeholder="Elije un icono..." class="standardSelect" tabindex="1">
											<option value="" label="default" data-url-image="">Ninguno</option>
											<?php echo $insAdmin->cargar_medios_controlador(); ?>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<img id="imagen-cambiar" src="" class="sombra">
								</div>
							</div>
							<input class="btn btn-outline-success btn-block" type="submit" value="Agregar nueva categoría" style="margin: 20px 0px;">
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