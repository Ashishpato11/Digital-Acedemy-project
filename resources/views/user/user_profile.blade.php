@extends('user.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img width="100px" height="100px" src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/unnamed.jpg')}}" alt="Profile" class="rounded-circle">
              <h2>{{$userData->name}}</h2>
              <h3></h3>
              <hr>
              
              <div class="social-links ">
                <a href="" target="blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="" target="blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="" target="blank" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="" target="blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
  
                  <h5 class="card-title">Profile Details</h5>
                
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">User Name</div>
                    <div class="col-lg-9 col-md-8">{{$userData->username}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$userData->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$userData->email}}</div>
                  </div>

                  {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8">{{$profileData->gender}}</div>
                  </div> --}}
                 
                 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Interest</div>
                    <div class="col-lg-9 col-md-8">{{$userData->phone}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{$userData->phone}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{$userData->address}}</div>
                  </div>

                  
                 

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data" >
                    @csrf

                    <div class="mb-3">
                      <label for="exampleInputUsername1" class="form-label">Photo</label>
                      <input type="file" class="form-control" name="photo" id="image" >
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputUsername1" class="form-label"></label>
                      <img width="100px" height="100px" src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/unnamed.jpg')}}" alt="Profile" id="showImage" class="rounded-circle">

                    </div>
                    

                    <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User name</label>
                        <div class="col-md-8 col-lg-9">
                          <input  type="text" name="username" value="{{$userData->username}}" class="form-control" id="fullName" >
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control" id="name" name="name" value="{{$userData->name}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Email"  class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input  type="email" readonly="readonly" class="form-control" id="Email"name="email" value="{{$userData->email}}">
                        </div>
                      </div>
                      {{-- <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                        <div class="col-md-8 col-lg-9">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="{{$profileData->gender}}" id="flexRadioDefault1">

                              Male
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="{{$profileData->gender}}" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Female
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="{{$profileData->gender}}" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Others
                            </label>
                          </div>
                        </div>
                      </div> --}}

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Interest</label>
                        <div class="col-md-8 col-lg-9">
                          <input  type="text" class="form-control" id="interest" name="interest" value="{{$userData->interest}}">
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control" id="Address" name="address" value="{{$userData->address}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input  type="text" class="form-control" id="phone" name="phone" value="{{$userData->phone}}">
                        </div>
                      </div>
           
                   <hr> 
                      <h1>Social Profile</h1>
                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Facebook Url</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control" id="facebook" name="facebook" value="{{$userData->facebook}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twiter Url</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control" id="Twitter" name="twiter" value="{{$userData->twiter}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Instagram Url</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control" id="instagram" name="instagram" value="{{$userData->instagram}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Linkdin Url</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control" id="linkdin" name="linkdin" value="{{$userData->linkdin}}">
                      </div>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                 
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="{{route('user.update.password')}}">
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

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
                  
                  
                  

                </div>
                

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
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

       @if(Session::has('success'))
        toastr.options = {
             "closeButton":true,
             "progressBar" :true
        }
        toastr.success("{{ session ('success')}}")

        @elseif(Session::has('error'))
         toastr.options = {
             "closeButton":true,
             "progressBar" :true
         }
            toastr.error("{{ session ('error')}}")
        @endif

       
    </script>

@endsection
 