@extends('Admin.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

              <h6 class="card-title "><strong>Admin Change Password</strong> </h6>
               <br>
              <form method="post" action="{{route('admin.update.password')}}" enctype="multipart/form-data" class="forms-sample">
                @csrf
                <div class="mb-3 mt-2">
                  <label for="exampleInputUsername1" class="form-label">Old Password</label>
                  <input type="password" class="form-control @error('old_password')is-Invalid @enderror" name="old_password" id="old_password" autocomplete="off" autocomplete="off">
                  @error('old_password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

                </div>
                <div class="mb-3 mt-2">
                  <label for="exampleInputUsername1" class="form-label">New Password</label>
                  <input type="password" class="form-control @error('new_password')is-Invalid @enderror" name="new_password" id="new_password" autocomplete="off" autocomplete="off">
                  @error('new_password')
                  <span class="text-danger">{{ $message }}</span>
                    
                  @enderror
                </div>
                <div class="mb-3 mt-2">
                  <label for="exampleInputUsername1" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control @error('confirm_password')is-Invalid @enderror" name="confirm_password" id="confirm_password" autocomplete="off" autocomplete="off">
                  @error('confirm_password')
                  <span class="text-danger">{{ $message }}</span>
                    
                  @enderror
                </div>
                
              
                <button type="submit" class="btn btn-primary me-2">Change Password</button>
                
              </form>

            </div>
          </div>
      
</div>
@endsection
@section('custom js')
@endsection

