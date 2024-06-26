@extends('Admin.layouts.app')
@section('content')
<section class="content-header">					
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Dashboard</h1>
			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-6">							
				<div class="small-box card">
					<div class="inner text-center">
						<h3>{{$instructor}}</h3>
						<p>Total Instructor</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="instruct/instructor/list" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			
			<div class="col-lg-4 col-6">							
				<div class="small-box card">
					<div class="inner text-center">
						<h3>{{$user}}</h3>
						<p>Total User</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="user/user/list" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			
			<div class="col-lg-4 col-6">							
				<div class="small-box card">
					<div class="inner text-center">
						<h3>{{$course}}</h3>
						<p>Total Course</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="course/list" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			
			
			
		</div>
	</div>					
	<!-- /.card -->
</section>

@endsection
@section('custom js')
@endsection
