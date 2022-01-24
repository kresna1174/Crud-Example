<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('assets/build/styles/ltr-core.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/build/styles/ltr-vendor.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
	<link href="{{ asset('assets/build/styles/style.css') }}" rel="stylesheet">
	@stack('styles')
	<title>@yield('title', 'Title') | {{ config('app.name') }} </title>
</head>

<body class="theme-light preload-active">
	<!-- BEGIN Preload -->
	<div class="preload">
		<div class="preload-message">
			<!-- BEGIN Spinner -->
			<div class="spinner-border text-primary"></div>
			<!-- END Spinner -->
			<span class="preload-text">Please wait...</span>
		</div>
	</div>
	<!-- END Preload -->
	<!-- BEGIN Page Holder -->
	<div class="holder">
		<!-- BEGIN Page Wrapper -->
		<div class="wrapper">
			<!-- BEGIN Header -->
			@include('layouts.header')
			<!-- END Header -->
			<!-- BEGIN Page Content -->
			@include('layouts.container')
			<!-- END Page Content -->
			<!-- BEGIN Footer -->
			@include('layouts.footer')
			<!-- END Footer -->
		</div>
		<!-- END Page Wrapper -->
	</div>
	<!-- END Page Holder -->
	<!-- BEGIN Scroll To Top -->
	<div class="scrolltop">
		<button class="btn btn-info btn-icon btn-lg">
			<i class="fa fa-angle-up"></i>
		</button>
	</div>
	<!-- END Scroll To Top -->
	<!-- BEGIN Sidemenu -->
	<div class="sidemenu sidemenu-wide sidemenu-left" id="sidemenu-navigation">
		<div class="sidemenu-header">
			<h3 class="sidemenu-title">Navigation</h3>
			<div class="sidemenu-addon">
				<button class="btn btn-label-danger btn-icon" data-dismiss="sidemenu">
					<i class="fa fa-times"></i>
				</button>
			</div>
		</div>
		<div class="sidemenu-body px-0" data-simplebar="data-simplebar">
			<!-- BEGIN Menu -->
			<div class="menu">
				<div class="menu-item">
					<a href="../ltr/index.html" data-menu-path="/ltr/index.html" class="menu-item-link">
						<div class="menu-item-icon">
							<i class="fa fa-desktop"></i>
						</div>
						<span class="menu-item-text">Dashboard</span>
						<div class="menu-item-addon">
							<span class="badge badge-success">New</span>
						</div>
					</a>
				</div>
				<!-- BEGIN Menu Section -->
				<div class="menu-section">
					<h2 class="menu-section-text">Elements</h2>
				</div>
				<!-- END Menu Section -->
				<div class="menu-item">
					<button class="menu-item-link menu-item-toggle">
						<div class="menu-item-icon">
							<i class="fa fa-palette"></i>
						</div>
						<span class="menu-item-text">Base</span>
						<div class="menu-item-addon">
							<i class="menu-item-caret caret"></i>
						</div>
					</button>
					<!-- BEGIN Menu Submenu -->
					<div class="menu-submenu">
						<div class="menu-item">
							<a href="../ltr/elements/base/accordion.html" data-menu-path="/ltr/elements/base/accordion.html" class="menu-item-link">
								<i class="menu-item-bullet"></i>
								<span class="menu-item-text">Accordion</span>
							</a>
						</div>
						<div class="menu-item">
							<a href="../ltr/elements/base/alert.html" data-menu-path="/ltr/elements/base/alert.html" class="menu-item-link">
								<i class="menu-item-bullet"></i>
								<span class="menu-item-text">Alert</span>
							</a>
						</div>
					</div>
					<!-- END Menu Submenu -->
				</div>
			</div>
			<!-- END Menu -->
		</div>
		<button class="btn btn-label-danger m-2">Log out</button>
	</div>
	<!-- END Sidemenu -->
	<!-- BEGIN Float Button -->
	<div class="float-btn float-btn-right">
		<button class="btn btn-flat-primary btn-icon" id="theme-toggle" data-toggle="tooltip" data-placement="right" title="Change theme">
			<i class="fa fa-moon"></i>
		</button>
	</div>
	<!-- END Float Button -->
	<script type="text/javascript" src="{{ asset('assets/build/scripts/mandatory.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/build/scripts/core.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/build/scripts/vendor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/app/home.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/bootbox/bootbox.all.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/jquery-number/jquery.number.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/bluid.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/toastr.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	@stack('scripts')
</body>

</html>
