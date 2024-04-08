@extends('Instructor.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div id="main" class="main">

    <div class="pagetitle">
            <h1>Edit Section</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Course</li>
                <li class="breadcrumb-item">Edit Section</li>
                </ol>
            </nav>
      
    </div><!-- End Page Title -->
    
    <section class="section">
        <form action="/instructor/course/section/{{ $sectionId }}/update" method="post" enctype="multipart/form-data">
            @csrf           
              @method('put')
            <div class="row">
                 <div class="col-md-8">
                        <div class="card">
                        <div class="card-body">
                        <div class="col-md-12 mt-2">
                        <div class="mb-2">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $section->title ?? '' }}">
                                
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror 
                        </div>
                        </div>

                
                        </div>
                    </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a type="button" href="{{ route('instructor.course.list') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>

                <div class="col-md-4">     
                <div class="card mb-3">
                <div class="card-body">	
                    <div class="mb-3">
                        <label for="language" class="fw-bold mt-2">Course</label>

                        <input type="text" readonly class="form-control" name="course_title" value="{{ $courses->title }}">
                        <input type="hidden" name="course_id" value="{{ $courses->id }}">
                        
                       
                    </div>
                </div>
                
                </div>                                 
                </div>
            
            </div>
        </form>
        <hr>
        
      
    </section>
    

</div>


@endsection
