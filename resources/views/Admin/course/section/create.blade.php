@extends('Admin.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Content Header (Page header) -->


<section class="content-header">    
    <form action="{{ route('admin.course.section.store') }}" method="post" enctype="multipart/form-data">
        @csrf           
    <div class="container-fluid my-2">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1>Add Section</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.course.list') }}" class="btn btn-primary">Back</a>
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
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title">
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
                            <label for="course">Course</label>
                            <input type="text" readonly class="form-control" name="course_title" value="{{ $courses->title }}">
                            <input type="hidden" name="course_id" value="{{ $courses->id }}">
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.course.list') }}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </div>
 </form>
<div>
    <h2>Sections</h2>
    <div class="card-body table-responsive p-0">                                
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th width="20">ID</th>
                    <th>Title</th>
                     <th width="20">Lesson</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($courses->sections as $section)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $section->title }}</td>
                        <td>
                            <a href=""> <button class="btn btn-outline-success btn-sm">Add Lesson</button></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.course.section.edit', $section->id) }}">
                                <button class="btn btn-outline-primary btn-sm">Edit</button>
                            </a>
                            <!-- Add the section ID to the delete route if necessary -->
                            <a href="{{ route('admin.course.section.delete', $section->id) }}" class="text-danger w-4 h-4 mr-1">
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>                                        
    </div>
</div>
<!-- /.card -->
</section>

<!-- /.content -->
@endsection
@section('custom js')
@endsection
