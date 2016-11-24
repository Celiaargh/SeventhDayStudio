<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="admin">
	

	<section class="login">
		<div class="login-header">
			<h1>Seventh Day Studio</h1>
			<p>Admin Login</p>
		</div>


		
		{!! Form::open (['url'=>'login','class'=>'adminlog']) !!}

			<div class="form-group" id="login-group">

				{!! Form::text('username',null,['placeholder'=>' Username'],['class'=>'form-control'],['id'=>'username']) !!}
			</div>

			<div class="form-group" id="login-group">
				
				{!! Form::text('password',null,['placeholder'=>' Password'],['class'=>'form-control'],['id'=>'password']) !!}
			</div>

			<div class="form-group" id="login-group">
				<input type="submit" value="LOGIN" class="form-control" id="login">
			</div>
		{!! Form::close() !!}
		
	</section>


</body>
</html>