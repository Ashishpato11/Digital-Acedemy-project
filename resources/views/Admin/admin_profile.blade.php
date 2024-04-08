@extends('Admin.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<main id="main" class="main">
<div class="row ">
  <!-- left wrapper start -->
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card rounded mt-4 ml-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <div>
                <img class="rounded-circle" width="75px" height="75px" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/unnamed.jpg')}}" alt="profile">
                <span class="h4 ms-3 text-dark ml-4">{{$profileData->name}}</span>
              </div>
            </div>
            
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
              <p class="text-muted">{{$profileData->username}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$profileData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted">{{$profileData->phone}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{$profileData->address}}</p>
            </div>
           
          </div>
        </div>
      </div>
        <div class="col-md-7 grid-margin stretch-card">
          <div class="card mt-4">
            <div class="card-body">

              <h6 class="card-title "><strong>Update-Admin Profile</strong> </h6>
               <br>
              <form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data" class="forms-sample">
                @csrf
                <div class="mb-3 mt-2">
                  <label for="exampleInputUsername1" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}" >
                </div>

                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->name}}" >
                </div>

                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Email</label>
                  <input type="text" readonly="readonly" class="form-control" name="email" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->email}}" >
                </div>

                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->phone}}" >
                </div>

                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->address}}" >
                </div>
                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Photo</label>
                  <input type="file" class="form-control" name="photo" id="image" >
                </div>
                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label"></label>
                  <img width="100px" height="100px" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/unnamed.jpg')}}" alt="Profile" id="showImage" class="rounded-circle">

                </div>

      

                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                
              </form>

            </div>
          </div>
      
</div>
<script type="text/javascript">
  $(document).ready(function(){
   $('#image').change(function(e){
     var reader = new FileReader();
     reader.onload = function(e){
       $('#showImage').attr('src',e.target.result);
     }
     reader.readAsDataURL(e.target.files['0']);
   });
  });
</script>
@endsection
@section('custom js')
@endsection

