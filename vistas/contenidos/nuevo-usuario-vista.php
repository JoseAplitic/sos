<?php
if ($_SESSION['id'] != 1){
    $url = SERVERURL;
    echo '<script>location.href="'.$url.'"</script>';
}
?>
<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>AGREGAR USUARIO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>usuarios/">Usuarios</a></li>
                            <li class="active">Agregar Usuario</li>
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

	<!-- Menu usuarios -->
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>Opciones</strong>
						<small>Manejo de usuarios administradores</small>
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>usuarios/'">Todos los usuarios</button>
						<button type="button" class="btn btn-success" role="link" onclick="window.location='<?php echo SERVERURL; ?>nuevo-usuario/'">Agregar nuevo</button>
						<button type="button" class="btn btn-info" role="link" onclick="window.location='<?php echo SERVERURL; ?>buscar-usuarios/'">Buscar usuario</button>
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
						<strong class="card-title">Agregar nuevo usuario</strong>
					</div>
					<div class="card-body">
						<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="usuario-nombre-nuevo" class=" form-control-label">Nombres *</label>
										<input id="usuario-nombre-nuevo" type="text" name="usuario-nombre-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="usuario-apellido-nuevo" class=" form-control-label">Apellidos *</label>
										<input id="usuario-apellido-nuevo" type="text" name="usuario-apellido-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="usuario-usuario-nuevo" class=" form-control-label">Usuario *</label>
										<input id="usuario-usuario-nuevo" type="text" name="usuario-usuario-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="usuario-correo-nuevo" class=" form-control-label">Correo *</label>
										<input id="usuario-correo-nuevo" type="email" name="usuario-correo-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="usuario-contra1-nuevo" class=" form-control-label">Contraseña *</label>
										<input id="usuario-contra1-nuevo" type="password" name="usuario-contra1-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="usuario-contra2-nuevo" class=" form-control-label">Repetir contraseña *</label>
										<input id="usuario-contra2-nuevo" type="password" name="usuario-contra2-nuevo" placeholder="" class="form-control" required="">
									</div>
								</div>
							</div>
							<input class="btn btn-outline-success btn-block" type="submit" value="Agregar nuevo usuario" style="margin: 20px 0px;">
							<div class="RespuestaAjax"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>