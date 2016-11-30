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
				<li><a data-target=".header" href="">Home</a></li>
				<li><a data-target=".welcome" href="">Welcome</a></li>
				<li><a data-target=".artists" href="">Artists</a></li>
				<li><a data-target=".FAQ" href="">FAQ</a></li>
				<li><a data-target=".gallery-frame" href="">Gallery</a></li>
				<li><a data-target=".contact" href="">Contact</a></li>
			</ul>
		</nav>
		<h1>Seventh Day Studio</h1>
	</header>

	<main>
		
		<section class="admin-info">
			<h1>Admin Panel</h1>
			<p>To edit any section you must be logged in. Click on the text to edit or click the links provided</p>

			<div class="admin-links">
				<li><a href="{{url('/users/create')}}">New Admin</a></li>
				<li><a href="{{url('users/details')}}">Admin Details</a></li>
				<li><a href="{{url('logout')}}">Logout</a></li>
			</div>
		</section>

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

			
				<div class="welcomeabout" data-editable="content" data-url="{!!url('contents/2')!!}">
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
				<div class="Edit-Artists">
					<a href="">Add an Artist</a>
				</div>
			</div>
				
				

			<div class="portraitframe">

				<div class="triblock" data-editable="content" data-url="{!!url('contents/3')!!}">
					{!!App\Models\Content::find(3)->content!!}
				</div>
				<div class="tri-drop">
					<img src="assets/images/trifull.jpg" alt="" class="tattoo-img">
					<div class="stripe"></div> 
					<div class="social-media">
						<a href="https://www.instagram.com/tritoan_seventhday/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="https://www.facebook.com/tritoanlyink/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
					</div>
					<div class="" data-editable="content" data-url="{!!url('contents/4')!!}" >
						{!!App\Models\Content::find(4)->content!!}
					</div>
				
				</div>
				
				<div class="staff-about">
			
				@foreach($artists as $artist)
					<div class="staff-container">
						<div class="aname" data-state="close">
							<h1>{{$artist->name}} // <i class="fa fa-chevron-down"></i> </h1>
						</div>
						<div class="drop-down">
							<div class="drop-down-content">
								<img src="{{url('assets/images/'.$artist->photo)}}" alt="" class="tattoo-img">
								<div class="stripe"></div> 
								<div class="social-media">
									<a href="{{$artist->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
									<a href="https://www.facebook.com/tritoanlyink/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
								</div>
								<div data-editable="description" data-url="{!!url('artist/'.$artist->id)!!}">
									{!!$artist->description!!}
								</div>
								
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
	            	<div class="swiper-slide"><img src="{!!url('assets/images/'.$image->url)!!}" alt=""></div>
	            @endforeach
	            
        	</div>
		       
		        <div class="swiper-pagination"></div>
		    </div>
		</section>

		<section class="FAQ">
			<div class="answered">

				<h1>FAQ</h1>
				<div class="Edit-Faq">
					<p>Click on text to edit each question and answer</p>
					<p><a href="{{url('newfaq')}}">Add a faq</a></p>
				</div>
			
			<?php

			$firstFour = '';
			$theRest = '';

			foreach($faqs as $index=>$faq){

				if($index<4){
					$firstFour .= '<div class="Question">
							<div data-editable="question" data-url="'.url('faq/'.$faq->id).'">
								<h3>'.$faq->question.'</h3>
							</div>

							<div data-editable="answer" data-url="'.url('faq/'.$faq->id).'">
								<p>
									'.$faq->answer.'
								</p>
							</div>
							
							
						
							
						</div>';

				}else{

					$theRest .= '<div class="Question">
							<div data-editable="question" data-url="'.url('faq/'.$faq->id).'">
								<h3>'.$faq->question.'</h3>
							</div>

							<div data-editable="answer" data-url="'.url('faq/'.$faq->id).'">
								<p>
									'.$faq->answer.'
								</p>
							</div>
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

		 		<div class="address" data-editable="content" data-url="{!!url('contents/5')!!}">
		 			{!!App\Models\Content::find(5)->content!!}
		
		 		</div>

		 		<div class="opening-times" data-editable="content" data-url="{!!url('contents/6')!!}">
		 			{!!App\Models\Content::find(6)->content!!}
		 		
		 		</div>

				<div class="phone" data-editable="content" data-url="{!!url('contents/7')!!}">
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
	
	<div id="token" >{{csrf_token()}}</div>
	<div id="public" >{{url('/')}}</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.js"></script>
	<script src="http://www.appelsiini.net/download/jquery.jeditable.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg6g9B1DEre7nVpANwgJpGXFo1urUeIm4&callback=initMap"
        async defer></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="{{asset('Javascript/javascript.js')}}"></script>
</body>
</html>