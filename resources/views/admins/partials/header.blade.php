<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ !empty($title) ? $title : 'Admin' }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/bower_components/Ionicons/css/ionicons.min.css">
    
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('/adminlte') }}/dist/css/rtl/AdminLTE.min.css">        
        <link rel="stylesheet" href="{{ asset('/adminlte') }}/dist/css/rtl/rtl.css">        
        <link rel="stylesheet" href="{{ asset('/adminlte') }}/dist/css/rtl/bootstrap-rtl.min.css">        
    @else
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/adminlte') }}/dist/css/AdminLTE.min.css">
    @endif
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('/adminlte') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<link rel="stylesheet" href="/noty/noty.css">

  @stack('css')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqQZukuqiPG12VkNYG0JWLf6jXa8bqPfU&libraries=places"
                type="text/javascript"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ asset('/adminlte') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>{{ !empty(settings()->site_name) ? str_limit(settings()->site_name, 1) : __('custom.site_name') }}</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>{{ !empty(settings()->site_name) ? settings()->site_name : __('custom.site_name') }}</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
