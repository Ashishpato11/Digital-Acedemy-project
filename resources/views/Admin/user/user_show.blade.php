@extends('Admin.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
 
<div class="contaner">
  <div class="row justify-content-center">
    <div class="col-sm-5 mt-4">
      
      <div class="card p-4">
        <label class="text-center text-xl " for="">User Detail </label>
        <img src="/upload/user_images/{{$data->photo}}" class="rounded-circle" height="40%" width="30%">
          <div class="card-body ">
            <div class="row">
              <div class="col-lg-3 font-weight-bold col-md-4 label ">User Name</div>
              <div class="col-lg-9 col-md-8">{{$data->username}}</div>
            </div>
            <div class="row">
              <div class="col-lg-3 font-weight-bold col-md-4 label ">Full Name</div>
              <div class="col-lg-9 col-md-8">{{$data->name}}</div>
            </div>
  
            <div class="row">
              <div class="col-lg-3 font-weight-bold col-md-4 label">Email</div>
              <div class="col-lg-9 col-md-8">{{$data->email}}</div>
            </div>  
            <div class="row">
              <div class="col-lg-3 font-weight-bold col-md-4 label">Interest</div>
              <div class="col-lg-9 col-md-8">{{$data->interest}}</div>
            </div>
            <div class="row">
              <div class="col-lg-3 font-weight-bold col-md-4 label">Phone</div>
              <div class="col-lg-9 col-md-8">{{$data->phone}}</div>
            </div>
  
            <div class="row">
              <div class="col-lg-3 font-weight-bold col-md-4 label">Address</div>
              <div class="col-lg-9 col-md-8">{{$data->address}}</div>
            </div>
            <hr><span>Social Links : </span>
            <div class="">
              
               <a href="{{$data->instagram}}" target="blank" class="ml-2 text-dark text-xl"><i class="bi bi-instagram"></i></a>
              <a href="{{$data->facebook}}" target="blank" class="ml-2 text-dark text-xl"><i class="bi bi-facebook"></i></a>
              <a href="{{$data->twiter}}" target="blank" class="ml-2 text-dark text-xl"><i class="bi bi-twitter"></i></a>
              <a href="{{$data->linkdin}}" target="blank" class="ml-2 text-dark text-xl"><i class="bi bi-linkedin"></i></a>
            </div>
            
  
      </div>
      </div>
    </div>
  </div>
</div>

@endsection