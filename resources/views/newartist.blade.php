<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin New Artist</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="admin-signup">
	

	<section class="signup">
		<div class="signup-header">
			<h1>Seventh Day Studio</h1>
			<p>New Artist</p>
		</div>

		{!! Form::open (['url'=>'artist','class'=>'admin-signup','files'=>true]) !!}

			<div class="form-group" id="signup-group">

					{!! Form::text('name',null,['placeholder'=>'Name'],['class'=>'Form-Control']) !!}
			</div>

			<div class="form-group" id="signup-group">
					{!! Form::textarea('description',null,['placeholder'=>'Description'],['class'=>'Form-Control'])!!}
			</div>

			<div class="form-group" id="signup-group">	
					<p>Photo must be 700x210px</p>
					{!! Form::file('artist_photo');!!}
			</div>


			<div class="form-group" id="signup-group">
				<input type="submit" value="SUBMIT" class="form-control" id="submit">
			</div>
		{!! Form::close() !!}
	
	</section>


</body>
</html>