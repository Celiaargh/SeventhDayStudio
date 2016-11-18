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
		<h1>Seventh Day Studio</h1>
		<p>Admin Login</p>

		<form class="adminlog" action="#">

			<div class="form-group" id="login-group">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input class="form-control" type="text" id="username" name="username" placeholder="Username" >
			</div>

			<div class="form-group" id="login-group">
				<i class="fa fa-lock"></i>
				<input class="form-control" type="text" id="password" name="password" placeholder="Password">
			</div>

			<div class="form-group" id="login-group">
				<input type="submit" value="Submit" class="form-control" id="submit">
			</div>
		</form>
	</section>


</body>
</html>