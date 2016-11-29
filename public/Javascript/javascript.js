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


	//------------------------edit in place

		// [] selects all divs with "data-editable"
			//i is for index and el is the element in the index
	 $('[data-editable]').each(function(i,el){

	 		var url = $(el).data('url');

	 		var options = {
	 			type:"textarea", //makes edit box a text area and not a input
	 			submit:"OK", //creates submit button with OK value
	 			cssclass:"editable",
	 			submitdata:{ 
	 				_method:'PUT', //put request to update info
	 				_token:$('#token').text(),  //selects security token without it server wont accept your form
	 				column:$(el).data('editable'), //tells the server what column to update
	 			} 
	 		};

	 		$(el).editable(url,options);
	 });

	 //------------------------WYSIWYG

	
	$(document).on('DOMNodeInserted', function(e){

		if($(e.target).hasClass('editable')){

			tinymce.init({  //initilise the plugin telling it which input 
				selector:'.editable textarea'
			}); 
		}
	});


});


	//Geo Location---------------------------------
	function initMap(){

		if(navigator.geolocation){

			navigator.geolocation.getCurrentPosition(function(position){

				var myLocation ={
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};

				var map = new google.maps.Map(document.getElementById('location'),{
					zoom: 16,
					center: myLocation
				});	

				var marker = new google.maps.Marker({
					position: myLocation,
					map: map
				});


				//directions

				var myDestination = {
					lat:-36.860125,
		 			lng:174.754012
				};

				var request = {
					origin: myLocation,
		 			destination: myDestination,
		 			travelMode: google.maps.TravelMode.DRIVING
				}

				var directionsService = new google.maps.DirectionsService();
				directionsService.route(request,function(result,status){

					if(status == google.maps.DirectionsStatus.OK){


						var directionsDisplay = new google.maps.DirectionsRenderer({map:map});
						directionsDisplay.setDirections(result);
					}
				});


			});
		}
	}

	