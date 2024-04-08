@extends('Instructor.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div id="main" class="main">

    <div class="pagetitle">
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <h1>Courses</h1>
            <a href="{{ route('instructor.course.create') }}" class="btn btn-primary">Add New Courses</a>
        </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Courses</li>
          
        </ol>
      </nav>
      
    </div><!-- End Page Title -->
    
    <section class="section">
  
        <div class="row">
            <form action="" method="get" class="d-flex justify-content-between align-items-center">
                <div class="card-tools">
                    <button type="button" onclick="window.location.href='{{ route("instructor.course.list") }}'" class="btn btn-outline-primary btn-sm">Reset</button>
                </div>
                <div class="card-tools" style="width: 250px;">
                    <div class="input-group">
                        <input value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
          <div class="mt-2">
            <div class="card">
              <div class="card-body">
               
    
                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <tr>
                            <th width="60">ID</th>
                            <th width="80"></th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>lesson</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                           
                        </tr>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td> <img src="/upload/course/{{ $course->thumbnail }}" height="50px" width="50px" ></td>
                        <td><a href="/front/singlecourse/{{ $course->id }}" class="text-dark">{{ $course->title }}</a></td>
                        <td>${{ $course->price }}</td>
                        <td>{{ $course->category->title }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="/instructor/course/section/create/{{ $course->id }}">Add Seciton</a></li>
                                  <li><a class="dropdown-item" href="#">Add Lesson</a></li>
                                  
                                </ul>
                              </div>
                        </td>
                        {{-- <td>
                            @if ($course->user) 
                                {{ $course->user->name }}
                            @else
                               
                            @endif </td>		
                        <td></td>									 --}}
                        <td>
                            @if($course->status == 1)
                            <button type="text" class="btn btn-success">Approved</button>
                           
                            @else
                            <button type="text" class="btn btn-danger">Unpproved</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('instructor.course.edit', $course->id) }}">
                                <button class="btn btn-outline-primary btn-sm">Edit</button>
                            </a>
                            <a href="/instructor/course/{{ $course->id }}/delete" class="text-danger w-4 h-4 mr-1">
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>	
                <!-- End Table with hoverable rows -->
    
              </div>
            </div>
    
            
    
          </div>
        </div>
      </section>
   

</div>

@endsection
