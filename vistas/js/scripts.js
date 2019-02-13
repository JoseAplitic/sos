$(document).ready(function(){
	var moreCategories = false;
	$(".home-element-1-more-cats").click(function(){
		event.preventDefault();
		if (moreCategories == false){
			$(this).children('a').children('i').children('span').text("Menos categorías");
			$(this).addClass('icon-open');
			$(this).children('ul').addClass("open");
			moreCategories = true;
		}
		else
		{
			$(this).children('a').children('i').children('span').text("Más categorías");
			$(this).removeClass('icon-open');
			$(this).children('ul').removeClass("open");
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
});