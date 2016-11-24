<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seventh Day Studio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/buttons-min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.css">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

	<header>
		<nav class="menu">
			<button class="fold"><i class="fa fa-bars" aria-hidden="true"></i></button>
			<ul class="nav-hide no-hide">
				<li><a href="{{url('/users/create')}}">New Admin</a></li>
				<li><a href="">Edit Admin Details</a></li>
				<li><a href="{{url('logout')}}">Logout</a></li>
			</ul>
		</nav>
		<h1>Seventh Day Studio Admin</h1>
	</header>

	<main>
		<section class="welcome">

			<div class="welcome-photo">
				<div class="wphoto"></div>
				<div class="wphoto"></div>
				<div class="wphoto"></div>
			</div>
		
			<div class="welcome-container">
				<div class="welcometitle">
			
					{!!App\Models\Content::find(1)->content!!}
				</div>

			
				<div class="welcomeabout">
					{!!App\Models\Content::find(2)->content!!}

				</div>
			</div>
		</section>

		<section class="artists">
			
			<div class="artinfo">
				<h1>Artists</h1>
				<p>
					our talented and harding working artists who you'll surely love.
				</p>
			</div>
				
				

			<div class="portraitframe">

				<div class="triblock">
					<h1>{!!App\Models\Content::find(3)->content!!}</h1>
				</div>
				<div class="tri-drop">
					<div class="tri tattoo-img"></div>
					<div class="stripe"></div> 
					<div class="social-media">
						<a href="https://www.instagram.com/tritoan_seventhday/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="https://www.facebook.com/tritoanlyink/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
					</div>
					{!!App\Models\Content::find(4)->content!!}
				
				</div>
				
				<div class="staff-about">
			
				@foreach($artists as $artist)
					<div class="staff-container">
						<div class="aname" data-state="close">
							<h1>{{$artist->name}} // <i class="fa fa-chevron-down"></i> </h1>
						</div>
						<div class="drop-down">
							<div class="drop-down-content">
								<div class="{{$artist->photo}} tattoo-img"></div>
								<div class="stripe"></div> 
								<div class="social-media">
									<a href="{{$artist->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
									<a href="https://www.facebook.com/tritoanlyink/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
								</div>
								
								{{$artist->description}}
								
							</div>
						</div>
					</div>
				@endforeach
				
			</div>
		</section>

		<section class="gallery-frame">
			
			<div class="gallery-info">
				<h1>Gallery</h1>
				<p>
					Heres some of our amazing works from our stunning artists here at Seventh Day Studio.
				</p>
			</div>

			<div class="swiper-container">
        		<div class="swiper-wrapper">
        		@foreach(App\Models\Image::where('imageable_type','gallery')->get() as $image)
	            	<div class="swiper-slide"><img src="{{url('assets/images/'.$image->url)}}" alt=""></div>
	            @endforeach
	            
        	</div>
		       
		        <div class="swiper-pagination"></div>
		    </div>
		</section>

		<section class="FAQ">
			<div class="answered">
				<h1>FAQ</h1>
			
			<?php

			$firstFour = '';
			$theRest = '';

			foreach($faqs as $index=>$faq){

				if($index<4){
					$firstFour .= '<div class="Question">
							<h3>'.$faq->question.'</h3>
							<p>
								'.$faq->answer.'
							</p>
						</div>';

				}else{

					$theRest .= '<div class="Question">
							<h3>'.$faq->question.'</h3>
							<p>
								'.$faq->answer.'
							</p>
						</div>';

				}
			}
			?>
				


				{!! $firstFour!!}
					
				<div class="faq-cont" data-state="close"><i class="fa fa-chevron-down"></i></div>
				
				<div class="faq-drop-down">
					{!! $theRest!!}
				</div>

			</div>
		</section>
	
		

		<section class="contact">
			<h1>Contact Us</h1>
			<p>Interested? Feel free to message us about your inqueries here!</p>

			<div class="contact-info">

		 		<div class="address">
		 			{!!App\Models\Content::find(5)->content!!}
		
		 		</div>

		 		<div class="opening-times">
		 			{!!App\Models\Content::find(6)->content!!}
		 		
		 		</div>

				<div class="phone">
					{!!App\Models\Content::find(7)->content!!}
				
				</div>
			</div>

			{!! Form::open(['url'=>'front'])!!}
				<div class="form-group">
					{{Form::label('firstname','First Name')}}
					{!! Form::text('firstname',null,['class'=>'form-control'],['id'=>'firstname'],['name'=>'firstname']) !!}
				</div>

				<div class="form-group">
					{{Form::label('lastname','Last Name')}}
					
					{!! Form::text('lastname',null,['class'=>'form-control'],['id'=>'lastname'],['name'=>'lastname']) !!}
					
				</div>

				<div class="form-group">
					{{Form::label('email','Email')}}

					{!! Form::text('email',null,['class'=>'form-control'],['id'=>'email'],['name'=>'email']) !!}
				
				</div>

				<div class="form-group">
					{{Form::label('pref-artist','Preferred Artist')}}

					{!! Form::select('pref-artist',['None'=>'Please Select','1'=>'Tritoan Ly','2'=>'Jasper Andres', '3'=>'Hannah Nova','4'=>'Minnie Faselow','5'=>'Phoebe Hunter'],null,['class'=>'form-control']) !!}
				</div>
				
				<div class="form-group">
					{{Form::label('message','Message')}}
					{!! Form::textarea('content',null,['class'=>'form-control']) !!}
					
				</div>
				
				<div class="form-group">
					<input type="submit" value="Submit" class="form-control" id="submit">
				</div>
			{!! Form::close() !!}
		
			
		</section>
	</main>

	<section class="Map">

		<div id="location"></div>
	</section>

	<footer>
		<p><i class="fa fa-copyright" aria-hidden="true"></i> Seventh Day Studio 2016</p>
	</footer>
	
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg6g9B1DEre7nVpANwgJpGXFo1urUeIm4&callback=initMap"
        async defer></script>
	<script src="{{asset('Javascript/javascript.js')}}"></script>
</body>
</html>