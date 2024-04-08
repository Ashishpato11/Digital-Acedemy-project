@extends('Instructor.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div id="main" class="main">

    <div class="pagetitle">
            <h1>Add Section</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Course</li>
                <li class="breadcrumb-item">Add Section</li>
                </ol>
            </nav>
      
    </div><!-- End Page Title -->
    
    <section class="section">
        <form action="{{ route('instructor.course.section.store') }}" method="post" enctype="multipart/form-data">
            @csrf	
            <div class="row">
                 <div class="col-md-8">
                        <div class="card">
                        <div class="card-body">
                        <div class="col-md-12 mt-2">
                        <div class="mb-2">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control" name="title" id="">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        
                        @enderror
                        </div>
                        </div>

                
                        </div>
                    </div>

                                <button type="submit" class="btn btn-primary">Create</button>
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
        <h1>Section</h1>
        <div class="card-body table-responsive p-0">                                
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th width="20">ID</th>
                        <th>Title</th>
                        <th width="5">Lessons</th>
                        
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($courses->sections as $section)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $section->title }}</td>
                            <td>
                                <a href=""><button class="btn btn-outline-success btn-sm">
                                    Add lesson</button></a>
                            </td>
                            <td>
                                <a href="{{ route('instructor.course.section.edit', $section->id) }}">
                                    <button class="btn btn-outline-primary btn-sm">Edit</button>
                                </a>
                                <!-- Add the section ID to the delete route if necessary -->
                                <a href="{{ route('instructor.course.section.delete', $section->id) }}" class="text-danger w-4 h-4 mr-1">
                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>                                        
        </div>
      
    </section>
    

</div>


@endsection
