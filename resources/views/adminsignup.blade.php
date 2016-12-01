<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin New User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="admin-signup">
	

	<section class="signup">
		<div class="signup-header">
			<h1>Seventh Day Studio</h1>
			<p>New User</p>
		</div>

		{!! Form::open (['url'=>'users','class'=>'admin-signup']) !!}

			<div class="form-group" id="signup-group">
					{!! Form::text('username',null,['placeholder'=>' Username'],['class'=>'form-control'],['id'=>'username']) !!}
					<p class="error">{{ $errors->first('username')}}</p>
			</div>

			<div class="form-group" id="signup-group">
					{!! Form::text('first_name',null,['placeholder'=>' First Name'],['class'=>'form-control'],['id'=>'firstname']) !!}
					<p class="error">{{ $errors->first('first_name')}}</p>
			</div>

			<div class="form-group" id="signup-group">

					{!! Form::text('last_name',null,['placeholder'=>' Last Name'],['class'=>'form-control'],['id'=>'lastname']) !!}
					<p class="error">{{ $errors->first('last_name')}}</p>
			</div>

			<div class="form-group" id="signup-group">

				{!! Form::password('password',['placeholder'=>' Password'],['class'=>'form-control'],['id'=>'password']) !!}
				<p class="error">{{ $errors->first('password')}}</p>
			</div>

			<div class="form-group" id="signup-group">
				<input type="submit" value="SUBMIT" class="form-control" id="submit">
			</div>
		{!! Form::close() !!}
	
	</section>


</body>
</html>