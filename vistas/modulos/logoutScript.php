<script>
	jQuery(document).ready(function($) {
		$('.btn-exit-system').on('click', function(e){
			e.preventDefault();
			swal({
			  	title: '¿Estás seguro?',
			  	text: "La sesión actual se cerrará y deberás iniciar sesión nuevamente para acceder al sistema",
			  	type: 'warning',
			  	showCancelButton: true,
			  	confirmButtonColor: '#03A9F4',
			  	cancelButtonColor: '#F44336',
			  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, cerrar',
			  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, cancelar'
			}).then(function () {
				$.ajax({
					url:'<?php echo SERVERURL; ?>ajax/loginAjax.php',
					success:function(data)
					{
						if(data=="true"){
							window.location.href="<?php echo SERVERURL; ?>";
						}else{
							swal(
								"Ocurrió un error inesperado",
								"No se pudo cerrar la sesión",
								"error"
							);
						}
					}

				});
			});
		});
	});
</script>