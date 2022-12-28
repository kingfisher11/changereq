<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>e-Maklumbalas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('test/fonts/material-design-iconic-font/css/material-design-iconic-font.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('test/css/style.css')}}">
	</head>
	<body>
        <!-- header -->
        hi

    @yield('content')  

		<script src="test/js/jquery-3.3.1.min.js"></script>

		<!-- JQUERY STEP -->
		<script src="test/js/jquery.steps.js"></script>

		<script src="test/js/main.js"></script>
<!-- Template created and distributed by Colorlib -->
@yield('scripts')
</body>
</html>