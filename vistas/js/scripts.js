$(document).ready(function(){
	var moreCategories = false;
	$("#more-cats").click(function(){
		event.preventDefault();
		if (moreCategories == false){
			$(this).children('i').children('span').text("Menos categorías");
			$(this).parent('li').addClass('icon-open');
			$(this).parent('li').children('ul').addClass("open");
			moreCategories = true;
		}
		else
		{
			$(this).children('i').children('span').text("Más categorías");
			$(this).parent('li').removeClass('icon-open');
			$(this).parent('li').children('ul').removeClass("open");
			moreCategories = false;
		}
	});

	$("#slides").slidesjs({
		width: 1200,
		height: 324,
		navigation: false,
		pagination: false,
		play: {
			active: false,
			effect: "slide",
			interval: 5000,
			auto: true,
		}
	});

	$('.brands-slideshow').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 7,
		slidesToScroll: 1,
		autoplay: false,
		dots: false,
		prevArrow: '<a href="#" id="prev"><i class="fas fa-chevron-left"></i></a>',
		nextArrow: '<a href="#" id="next"><i class="fas fa-chevron-right"></i></a>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		]
	});

	$('.news-slideshow').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: false,
		dots: false,
		prevArrow: '<a href="#" id="prev"><i class="fas fa-chevron-left"></i></a>',
		nextArrow: '<a href="#" id="next"><i class="fas fa-chevron-right"></i></a>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		]
	});

	$('.relacionados-slideshow').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: false,
		dots: false,
		prevArrow: '<a href="#" id="prev"><i class="fas fa-chevron-left"></i></a>',
		nextArrow: '<a href="#" id="next"><i class="fas fa-chevron-right"></i></a>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		}
		]
	});

	$('.categories-slideshow').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: false,
		dots: false,
		prevArrow: '<a href="#" id="prev"><i class="fas fa-chevron-left"></i></a>',
		nextArrow: '<a href="#" id="next"><i class="fas fa-chevron-right"></i></a>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		]
	});

	$("#slides-custom-view").slidesjs({
		width: 1200,
		height: 561,
		navigation: false,
		pagination: false,
		play: {
			active: false,
			effect: "slide",
			interval: 5000,
			auto: true,
		}
	});
	
	$('.customview-brands-slideshow').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: false,
		dots: false,
		prevArrow: '<a href="#" id="prev"><i class="fas fa-chevron-left"></i></a>',
		nextArrow: '<a href="#" id="next"><i class="fas fa-chevron-right"></i></a>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		]
	});

	$('.FormularioAjax').submit(function(e){
        e.preventDefault();

        var form=$(this);

        var tipo=form.attr('data-form');
        var accion=form.attr('action');
        var metodo=form.attr('method');
        var respuesta=form.children('.RespuestaAjax');

        var msjError="Ha ocurrido un error.";
		var formdata = new FormData(this);
		
		$.ajax({
			type: metodo,
			url: accion,
			data: formdata ? formdata : form.serialize(),
			cache: false,
			contentType: false,
			processData: false,
			xhr: function(){
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
				  if (evt.lengthComputable) {
						var percentComplete = evt.loaded / evt.total;
						percentComplete = parseInt(percentComplete * 100);
					if(percentComplete<100){
						respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
					}else{
						respuesta.html('<p class="text-center"></p>');
					}
				  }
				}, false);
				return xhr;
			},
			success: function (data) {
				respuesta.html(data);
			},
			error: function() {
				respuesta.html(msjError);
			}
		});

	});

	$.ajaxChimp.translations.es = {
		'submit': 'Enviando...',
		0: 'Te hemos enviado un email de confirmación',
		1: 'Por favor, introduzca un valor',
		2: 'Una dirección de correo electrónico debe contener una sola @',
		3: 'La parte de dominio de la dirección de correo electrónico no es válida (la parte después de la @:)',
		4: 'La parte de usuario de la dirección de correo electrónico no es válida (la parte antes de la @:)',
		5: 'Esta dirección de correo electrónico se ve falso o no válido. Por favor, introduce una dirección de correo electrónico real'
	}
	
	$('#SuscripcionMailChimp').ajaxChimp({
		url: 'https://gosmartoffice.us20.list-manage.com/subscribe/post?u=7e62a596c71c11db2d6a21b58&amp;id=b85c4ea629',
		language: 'es'
	});
});