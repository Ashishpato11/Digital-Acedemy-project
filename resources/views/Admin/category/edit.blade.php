@extends('Admin.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.category.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">

        <form action="/admin/category/{{$category->id}}/update" method="post" id="categoryForm" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="card">
            <div class="card-body">								
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="title" value="{{$category->title}}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo" id="image" >
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label"></label>
                            <img width="100px" height="100px" src="{{ (!empty($category->photo)) ? url('upload/category/'.$category->photo) : url('upload/unnamed.jpg')}}" alt="Profile" id="showImage" class="rounded-circle">
          
                          </div>
                        
                    </div>	
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                            <option {{($category->status == 1 ) ? 'selected':'' }}value="1">Active</option>
                            <option {{($category->status == 0) ? 'selected':'' }} value="0">Block</option></select>	
                        </div>
                    </div>	
                    								
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary">Update</button>
            <a class="btn btn-outline-dark ml-3" href="{{route('admin.category.list')}}">Cancel</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
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
{{-- <script>
   $("#categoryForm").submit(function(event){
    event.preventDefault();
    var element = $(this);
    $.ajax({
        url:'{{route(category.store)}}',
        type: 'post',
        data: element.serializeArray(),
        dataType: 'json',
        success:fucntion(response){

        }, error: function(jqXHR, exception){
           console.log("something went wring");
        }
    })
   });
</script> --}}
@endsection
