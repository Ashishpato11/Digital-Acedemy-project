@extends('Admin.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Content Header (Page header) -->


<section class="content-header">    
    <form action="/admin/course/section/{{ $sectionId }}/update" method="post" enctype="multipart/form-data">

      @csrf           
        @method('put')
    <div class="container-fluid my-2">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1>Edit Section</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.course.section.create', $courses->id) }}" class="btn btn-primary">Back</a>
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
            <div class="col-md-8">
                <div class="card mb-1">
                    <div class="card-body">                                
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $section->title ?? '' }}">
                                
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>                                                                        
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body">    
                        <div class="mb-1">
                            <label for="language">Course</label>
                            <input type="text" readonly class="form-control" name="course_title" value="{{ $courses->title }}">
                            <input type="hidden" name="course_id" value="{{ $courses->id }}">
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.course.section.create', $courses->id) }}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </div>
 </form>
<div>
    
</div>
<!-- /.card -->
</section>

<!-- /.content -->
@endsection
@section('custom js')
@endsection
