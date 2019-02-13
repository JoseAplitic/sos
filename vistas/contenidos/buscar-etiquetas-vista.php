<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>BUSCAR ETIQUETAS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>productos/">Productos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>etiquetas/">Etiquetas</a></li>
                            <li class="active">Buscar Etiquetas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content">

	<!-- Menu etiquetas -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Opciones</strong>
						<small>Manejo de etiquetas</small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>etiquetas/'">Todas las etiquetas</button>
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo SERVERURL; ?>nueva-etiqueta/'">Agregar nueva</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-etiquetas/'">Buscar etiqueta</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
		require_once "./controladores/administradorControlador.php";
		$insAdmin= new administradorControlador();
	?>

	<!-- Formulario de busqueda -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">¿Qué etiqueta estas buscando?</strong>
					</div>
					<div class="card-body card-block">
						<form action="" method="POST" class="form-horizontal" autocomplete="off">
							<div class="row form-group">
								<div class="col col-md-12">
									<div class="input-group">
											<input type="text" id="input1-group2" name="busqueda_etiquetas" placeholder="Ingresa tu filtro" class="form-control"><div class="input-group-btn">
											<button class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		require_once "./controladores/administradorControlador.php";
		$insAdmin= new administradorControlador();
		if(isset($_POST['busqueda_etiquetas']))
		{
			unset($_SESSION['busqueda_etiquetas_cache']);
			$_SESSION['busqueda_etiquetas_cache']=$_POST['busqueda_etiquetas'];
		}
		if (isset($_SESSION['busqueda_etiquetas_cache'])):
			
	?>

	<!-- Lista de etiquetas -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Resultados de la busqueda</strong>
					</div>
					<div class="table-stats order-table ov-h">
						<?php 
							$pagina = explode("/", $_GET['views']);
							echo $insAdmin->paginador_etiquetas_controlador($pagina[1],100,$_SESSION['busqueda_etiquetas_cache']);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php endif; ?>
</div>

<div class="clearfix"></div>