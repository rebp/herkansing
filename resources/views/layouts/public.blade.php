<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/bundle.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Document Title
	============================================= -->
	<title>@yield('title')</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="{{ route('home') }}" class="standard-logo" data-dark-logo="{{ url('/images/logo-dark.png') }}"><img src="{{ url('/images/logo.png') }}" alt=""></a>
						<a href="{{ route('home') }}" class="retina-logo" data-dark-logo="{{ url('/images/logo-dark@2x.png') }}"><img src="{{ url('/images/logo@2x.png') }}" alt=""></a>
					</div><!-- #logo end -->

                    @if (Auth::guest())
                        <!-- Primary Navigation
                        ============================================= -->
                        <nav id="primary-menu">

                            <ul>
                                <li><a href="{{ route('login') }}"><div>Login</div></a></li>
                                <li><a href="{{ route('register') }}"><div>Register</div></a></li>
							</ul>
							
							<!-- Top Search
							============================================= -->
							<div id="top-search">
								<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
								{!! Form::open(['action' => 'HomeController@search', 'method' => 'get', 'class' => 'nobottommargin']) !!}
									{!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Search Posts ...']) !!}								
								{!! Form::close() !!}
							</div><!-- #top-search end -->

                        </nav><!-- #primary-menu end -->
                    @else
                        <div id="top-account" class="dropdown">
                            <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->name }} <i class="icon-user"></i><i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <li><a href="{{ route('dashboard') }}"><i class="icon-dashboard"></i> Dashboard</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}"><i class="icon-signout"></i> Logout</a></li>
                            </ul>
                        </div>
                    @endif

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>@yield('title')</h1>
				<ol class="breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">@yield('title')</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		@yield('content')

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">


			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_full center nobottommargin">
						Rober Eduardo Bautista Prieto
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="{{ url('js/script.js') }}"></script>


</body>
</html>