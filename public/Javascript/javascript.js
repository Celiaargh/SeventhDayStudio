$(function(){

	//Hamburger Menu------------------------

	var isOpen = false;

	$('.fold').on('click',function(){
	
		if (isOpen == false){

			$('.nav-hide').animate({top:"0em"},500);

			isOpen = true;
		}else{

			$('.nav-hide').animate({top:"-20em"},500);

			isOpen = false;
		}
	});

	//Aritsts Accordian--------------------

	$('.drop-down').hide();

	$('.aname').on('click',function(){

		var state = $(this).data('state');

		if(state == 'close'){
			
			$(this).next().slideDown(function(){
				
			});

			$(this).data('state','open');

		}else{

			$(this).next().slideUp(function(){

			});

			$(this).data('state','close');
		}
	});

	//Image Slider--------------------
	 var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30,
        loop: true
    });

	//FAQ Accordian--------------------

	$('.faq-drop-down').hide();

	$('.faq-cont').on('click',function(){

		var state = $(this).data('state');

		if(state == 'close'){
			
			$(this).next().slideDown(function(){
				
			});

			$(this).data('state','open');

		}else{

			$(this).next().slideUp(function(){

			});

			$(this).data('state','close');
		}
	});

	//Menu clicky thing for mobile------------------

	$('[data-target]').on('click',function(e){
		e.preventDefault();



		var target = $(this).data('target');

		var positionTop = $(target).offset().top;

		console.log(positionTop);

		$('body,html').animate({scrollTop:positionTop}, 500);

		
		$('.nav-hide').animate({top:"-20em"}, 500);
	});

});

	