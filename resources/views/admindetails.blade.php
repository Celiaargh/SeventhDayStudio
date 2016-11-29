<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="admin-signup">
	

	<section class="signup">
		<div class="signup-header">
			<h1>Seventh Day Studio</h1>
			<p>Admin Details</p>
		</div>
			
		<div class="detail-container">

			<div class="details">
				<h3>Username:</h3>
				<div data-url="{!! url('users/'.$user->id) !!}"></div>

			</div>

			<div class="details">
				<h3>First Name:</h3>
				<div data-url="{!! url('users/'.$user->id) !!}"></div>

			</div>

			<div class="details">
				<h3>Last Name:</h3>
				<div data-url="{!! url('users/'.$user->id) !!}"></div>

			</div>	
		</div>
	
	<a href="">Edit Details</a>
	{{-- <a href="{{ url('users/'.Auth::user()->id.'/edit') }}">Edit Details</a> --}}
				
		
	
	</section>


</body>
</html>