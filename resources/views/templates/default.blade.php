<!DOCTYPE html>

<html lang= 'en'>
	<head>
		<meta charset= 'UTF-8'>
		<title>TutorBuddy</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="text.js" type="text/javascript"></script>

		<meta name="google-signin-client_id" content="http://358717372810-177j8rou1dijsq6l3s2tdu66fnpmnqd7.apps.googleusercontent.com/">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<!-- Include the plugin's CSS and JS: -->
		<script"text/javascript""js/bootstrap-multiselect.js"></script>
		<link"stylesheet""css/bootstrap-multiselect.css""text/css"/>

	

	</head>
	<body>
		@include('templates.partials.navigation')
		<div class= 'container'>
			@include('templates.partials.alerts')
			@yield('content')
		</div>

	</body>
	</html>