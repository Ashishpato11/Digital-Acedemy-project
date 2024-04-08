<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Digital Academy:: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('/admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
		<link rel="shortcut icon" type="x-icon" href="{{asset('/upload/logo.png')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('/admin-assets/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('/admin-assets/plugins/summernote/summernote.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin-assets/plugins/dropzone/dropzone.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/plugins/select2/css/select2.min.css')}}">
		
		<link rel="stylesheet" href="{{asset('/admin-assets/css/custom.css')}}">
		
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
		
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  href="/" type="button">
							Website
						</a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>
				  
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					
              @php
				 $id = Auth::user()->id;
              $profileData = App\Models\User::find($id);

			  @endphp
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/unnamed.jpg')}}" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong>{{Auth::guard('web')->user()->name}}</strong></h4>
							<div class="mb-3">{{Auth::guard('web')->user()->email}}</div>
							<div class="dropdown-divider"></div>
							<a href="{{route('admin.profile')}}" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> Edit Profile								
							</a>
							<div class="dropdown-divider"></div>
							<a href="{{route('admin.change.password')}}" class="dropdown-item">
								<i class="fas fa-lock mr-2"></i> Change Password
							</a>
							<div class="dropdown-divider"></div>
							<a href="{{route('admin.logout')}}" class="dropdown-item text-danger">
								<i class="fas fa-sign-out-alt mr-2"></i> Logout							
							</a>							
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			@include('Admin.layouts.sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				 @yield('content')
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
		
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('/admin-assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('/admin-assets/js/adminlte.min.js')}}"></script>
		<script src="{{asset('/admin-assets/plugins/summernote/summernote.min.js')}}"></script>
		<script src="{{asset('/admin-assets/plugins/select2/js/select2.min.js')}}"></script>
		
        <script src="{{asset('/admin-assets/plugins/dropzone/dropzone.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="js/demo.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		<script>
		 @if(Session::has('message'))
		 var type = "{{ Session::get('alert-type','info') }}"
		 switch(type){
			case 'info':
			toastr.info(" {{ Session::get('message') }} ");
			break;
		
			case 'success':
			toastr.success(" {{ Session::get('message') }} ");
			break;
		
			case 'warning':
			toastr.warning(" {{ Session::get('message') }} ");
			break;
		
			case 'error':
			toastr.error(" {{ Session::get('message') }} ");
			break; 
		 }
		 @endif 
		</script>
 @yield('custom js')

	</body>
</html>