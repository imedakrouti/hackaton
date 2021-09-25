<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
        <title>@yield('title')</title>
        <!-- Title -->

                @include('layouts.adminPanel.head')

	</head>

	<body class="main-body app sidebar-mini dark-theme">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('admin_panel/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

			<!-- main-sidebar -->
			@include('layouts.adminPanel.main-sidebar')
			<!-- main-sidebar -->

			<!-- main-content -->
			<div class="main-content app-content">

				<!-- main-header -->
                @include('layouts.adminPanel.main-header')
				<!-- /main-header -->
            
				<!-- container -->
				<div class="container-fluid">

					<!-- breadcrumb -->
					@yield('breadcrumb')
					<!-- /breadcrumb -->

					@yield('content')
				</div>
				<!-- /Container -->
			</div>
			<!-- /main-content -->

			<!-- Sidebar-right-->

			@include('layouts.adminPanel.sidebar-right')

			<!--/Sidebar-right-->

			<!-- Message Modal -->
            @include('layouts.adminPanel.chatmodel')
			<!-- Message Modal -->
			
			<!-- Footer opened -->
			@include('layouts.adminPanel.footer')
			<!-- Footer closed -->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
        
        @include('layouts.adminPanel.footerscript')
	</body>
</html>