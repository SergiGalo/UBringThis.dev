<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>UBringThis - @yield('page_title')</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- JQuery -->
		<script src="/js/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='//fonts.googleapis.com/css?family=Amiko' rel='stylesheet'>
		<link href='//fonts.googleapis.com/css?family=Allerta' rel='stylesheet'>

		<!-- UBringThis! CSS -->
		<link rel="stylesheet" href="/css/ubringthis.css">

	</head>
	<body>

		<div class="container-fluid nav-bar">
		<div class="row">

			@include('layouts.navbar')

		</div>
		</div>

		<div class="container content">
		<div class="row">

			<div class="col-md-3 side-bar">

				@section('sidebar')

					@show

			</div>

			<div class="col-md-9 content">

				@yield('content')

			</div>

		</div>
		</div>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<script type="text/javascript" src="{{ URL::asset('js/ubringthis.js') }}"></script>

	</body>
</html>
