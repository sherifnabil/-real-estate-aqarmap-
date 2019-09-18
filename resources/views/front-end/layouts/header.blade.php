
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>{{ !empty($title)  ? $title : ucwords(settings()->site_name)}}</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">




		@stack('css')
		
		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="/front-end/css/nouislider.min.css"/>
		
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="/front-end/css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="/front-end/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/front-end/css/slick.css" />
		<link type="text/css" rel="stylesheet" href="/front-end/css/slick-theme.css" />

		@if (app()->getLocale() == 'en')
			<!-- Custom stlylesheet -->
			<link type="text/css" rel="stylesheet" href="/front-end/css/style.css"/>

		@else
		<!-- Theme style -->
			<link type="text/css" rel="stylesheet" href="/front-end/css/style-rtl.css"/>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">

		@endif

		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>