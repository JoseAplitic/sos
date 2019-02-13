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
                        <h1>EDITAR USUARIO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li><a href="<?php echo SERVERURL; ?>usuarios/">Usuarios</a></li>
                            <li class="active">Editar Usuario</li>
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
						<strong class="card-title">Editar usuario</strong>
					</div>
					<div class="card-body">
						<?php if (isset($_POST['usuario-id-editar'])):
							$sql = $insAdmin->obtener_info_usuarios_controlador($_POST['usuario-id-editar']);
							if($sql->rowCount()>=1):
								$datos=$sql->fetch();
								$nombre = $datos['nombre'];
								$apellido = $datos['apellido'];
								$usuario = $datos['usuario'];
								$correo = $datos['correo'];
								$clave = $insAdmin->desencriptar($datos['clave']);
								?>
									<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
										<input type="hidden" name="usuario-id-editar" value="<?php echo $_POST['usuario-id-editar']; ?>">
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="usuario-nombre-editar" class=" form-control-label">Nombres *</label>
													<input id="usuario-nombre-editar" type="text" name="usuario-nombre-editar" placeholder="" class="form-control" value="<?php echo $nombre; ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="usuario-apellido-editar" class=" form-control-label">Apellidos *</label>
													<input id="usuario-apellido-editar" type="text" name="usuario-apellido-editar" placeholder="" class="form-control" value="<?php echo $apellido; ?>" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="usuario-usuario-editar" class=" form-control-label">Usuario *</label>
													<input id="usuario-usuario-editar" type="text" name="usuario-usuario-editar" placeholder="" class="form-control" value="<?php echo $usuario; ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="usuario-correo-editar" class=" form-control-label">Correo *</label>
													<input id="usuario-correo-editar" type="email" name="usuario-correo-editar" placeholder="" class="form-control" value="<?php echo $correo; ?>" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="usuario-contra1-editar" class=" form-control-label">Contraseña *</label>
													<input id="usuario-contra1-editar" type="password" name="usuario-contra1-editar" placeholder="" class="form-control" value="<?php echo $clave; ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="usuario-contra2-editar" class=" form-control-label">Repetir contraseña *</label>
													<input id="usuario-contra2-editar" type="password" name="usuario-contra2-editar" placeholder="" class="form-control" value="<?php echo $clave; ?>" required="">
												</div>
											</div>
										</div>
										<input class="btn btn-outline-info btn-block" type="submit" value="Guardar cambios" style="margin: 20px 0px;">
										<div class="RespuestaAjax"></div>
									</form>
							<?php else: ?>
								<p>Ha ocurrido un error al intentar cargar la información de este administrador</p>
								<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>usuarios/'">Ver todos los usuario</button>
							<?php endif ?>
						<?php else: ?>
							<p>No ha seleccionado ningun administrador para editar</p>
							<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>usuarios/'">Ver todos los usuario</button>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>