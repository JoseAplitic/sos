<div class="breadcrumbs animated fadeIn">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>MI PERFIL</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo SERVERURL; ?>inicio/">Escritorio</a></li>
                            <li class="active">Mi perfil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">

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
						<strong class="card-title">Editar mi perfil</strong>
					</div>
					<div class="card-body">
						<?php if (isset($_SESSION['id'])):
							$sql = $insAdmin->obtener_info_perfil_controlador($_SESSION['id']);
							if($sql->rowCount()>=1):
								$datos=$sql->fetch();
								$nombre = $datos['nombre'];
								$apellido = $datos['apellido'];
								$usuario = $datos['usuario'];
								$correo = $datos['correo'];
								$clave = $insAdmin->desencriptar($datos['clave']);
								?>
									<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
										<input type="hidden" name="usuario-id-editar-perfil" value="<?php echo $_SESSION['id']; ?>">
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="company" class=" form-control-label">Nombres *</label>
													<input type="text" name="usuario-nombre-editar-perfil" placeholder="" class="form-control" value="<?php echo $nombre; ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="company" class=" form-control-label">Apellidos *</label>
													<input type="text" name="usuario-apellido-editar-perfil" placeholder="" class="form-control" value="<?php echo $apellido; ?>" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="company" class=" form-control-label">Usuario *</label>
													<input type="text" name="usuario-usuario-editar-perfil" placeholder="" class="form-control" value="<?php echo $usuario; ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="company" class=" form-control-label">Correo *</label>
													<input type="email" name="usuario-correo-editar-perfil" placeholder="" class="form-control" value="<?php echo $correo; ?>" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="company" class=" form-control-label">Contraseña *</label>
													<input type="password" name="usuario-contra1-editar-perfil" placeholder="" class="form-control" value="<?php echo $clave; ?>" required="">
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="company" class=" form-control-label">Repetir contraseña *</label>
													<input type="password" name="usuario-contra2-editar-perfil" placeholder="" class="form-control" value="<?php echo $clave; ?>" required="">
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
							<p>Ha ocurrido un error al intentar recuperar tu información</p>
							<button type="button" class="btn btn-primary" role="link" onclick="window.location='<?php echo SERVERURL; ?>'">Ir a escritorio</button>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>