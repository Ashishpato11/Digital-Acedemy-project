<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User: Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="shortcut icon" type="x-icon" href="{{asset('admin-assets/img/logo.png')}}">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  <link href="{{asset('/instruct-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/instruct-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/instruct-assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/instruct-assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('/instruct-assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('/instruct-assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('/instruct-assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  
  <link href="{{asset('/instruct-assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Digital Academy</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    @php
    $id = Auth::user()->id;
         $userData = App\Models\User::find($id);

   @endphp

   
    <nav class="header-nav ms-auto">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0 mb-4" href="#" data-bs-toggle="dropdown">
            <img height="45px" width="45px" src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/unnamed.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{$userData->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{$userData->name}}</h6>
              <span></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('user.profile')}}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('user.logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>

    </nav>
    <!-- End Icons Navigation -->

  </header><!-- End Header -->

  @include('user.layouts.sidebar')

  @yield('content')
  <!-- ======= Footer ======= -->
  
  <!-- Vendor JS Files -->
  <script src="{{asset('/instruct-assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('/instruct-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/instruct-assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('/instruct-assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('/instruct-assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('/instruct-assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('/instruct-assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('/instruct-assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
 
  <script src="{{asset('/instruct-assets/js/main.js')}}"></script>




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