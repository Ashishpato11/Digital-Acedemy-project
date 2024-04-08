@extends('Admin.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Content Header (Page header) -->


<section class="content-header">	
    
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Courses</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.course.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<form action="/admin/course/{{$course->id}}/update" method="post" enctype="multipart/form-data">
    @csrf			
    @method('put')
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$course->title}}">
                                    @error('title')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Short-Description</label>
                                    <textarea class="form-control" name="short_description" id="short_description" rows="3">{{$course->short_description}}</textarea>
                                    @error('short_description')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                                </div>
                            </div>      
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description"  id="description" cols="30" rows="2" class="summernote" placeholder="Description" >{{$course->description}}</textarea>
                                    @error('description')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                                </div>
                            </div>                                            
                        </div>
                    </div>	                                                                      
                </div>
                <div class="card mb-3">
                    <div class="mb-3">
                        <h2 class="h4 mt-2 ml-2">Thumbnail</h2>
                        <input type="file" class="form-control" name="thumbnail" value="{{$course->thumbnail}}" id="image" >
                      </div>
                      
                    
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label"></label>
                        <img width="200px" height="200px" src="{{ (!empty($course->thumbnail)) ? url('upload/course/'.$course->thumbnail) : url('upload/unnamed.jpg')}}" alt="Profile" id="showImage" class="rounded-circle">
      
                      
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                          
                        @enderror
                    </div>		 
                                                                                           
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Pricing</h2>								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control" value="{{$course->price}}" placeholder="Price">	
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                      
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="compare_price">Compare at Price</label>
                                    <input type="text" name="compare_price" id="compare_price" value="{{$course->compare_price}}" class="form-control" placeholder="Compare Price">
                                    @error('compare_price')
                                    <span class="text-danger">{{ $message }}</span>
                                      
                                    @enderror
                                    <p class="text-muted mt-3">
                                        To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                    </p>	
                                </div>
                            </div>                                            
                        </div>
                    </div>	                                                                      
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">What You will Learn</label>
                                    <textarea name="outcomes" id="Outcomes" cols="30" rows="2" class="summernote" placeholder="">{{$course->outcomes}}</textarea>
                                    @error('outcomes')
                                    <span class="text-danger">{{ $message }}</span>
                                      
                                    @enderror	
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="mb-3">
                                
                                    <label for="exampleFormControlTextarea1" class="form-label">Requirement</label>
                                    <textarea class="form-control" name="requirements"id="exampleFormControlTextarea1" rows="3">{{$course->requirements}}</textarea>
                                    @error('requirement')
                                    <span class="text-danger">{{ $message }}</span>
                                      
                                    @enderror
                                   
                                </div>

                            </div>                                         
                        </div>
                    </div>	                                                                      
                </div>
                <div class="card mb-3">
                    <div class="card-body">							
                        <div class="row">
                            <h2 class="h4 mb-3">Related Courses</h2>
                            <div class="col-md-12">
                                <div class="mb-3">
                                        <select multiple class="related-course w-100" name="related_course[]" id="related_course">
                                        @if (!empty($relatedCourse))
                                        @foreach ($relatedCourse as $relCourse)
                                        <option selected value="{{$relCourse->id}}">{{$relCourse->title}}</option>
                                        @endforeach
                                        @endif
                                        </select>
                                </div>

                            </div>                                             
                        </div>
                    </div>	                                                                      
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">	
                        <h2 class="h4 mb-3">Course status</h2>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                            <option {{($course->status == 1 ) ? 'selected':'' }}value="1">Active</option>
                            <option {{($course->status == 0) ? 'selected':'' }} value="0">Block</option></select>	
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-body">	
                        <h2 class="h4  mb-3">Course category</h2>
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select The Category</option>
                            @if ($categories->isNotEmpty())
                              @foreach ($categories as $category )
                              <option {{($course->category_id == $category->id) ? 'selected':'' }} value="{{$category->id}}">{{$category->title}}</option>
                              @endforeach
                                
                            @endif
                                
                            
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                        </div>
                       
                    </div>
                </div> 
                <div class="card mb-3">
                    <div class="card-body">	
                        <h2 class="h4 mb-3">Instructor</h2>
                        <div class="mb-3">
                            <select name="user" id="user" class="form-control">
                                <option value="">Select Instructor</option>
                                @if ($instructor->isNotEmpty())
                                @foreach ($instructor as $instructor )
                                <option {{($course->user_id == $instructor->id) ? 'selected':'' }} value="{{$instructor->id}}">{{$instructor->name}}</option>
                                @endforeach
                                  
                              @endif
                            </select>
                            @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                        </div>
                    </div>
                </div> 
                <div class="card mb-3">
                    <div class="card-body">	
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option {{($course->level == 'Beginer') ? 'selected':'' }} value="Beginer">Beginer</option>
                                <option {{($course->level == 'Intermediate' ) ? 'selected':'' }} value="Intermediate">Intermediate</option>
                                <option {{($course->level == 'Advanced' ) ? 'selected':'' }} value="Advanced">Advanced</option>                                                   
                            </select>
                            @error('level')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                           
                        </div>
                    </div>
                    
                </div>     
                <div class="card mb-3">
                    <div class="card-body">	
                        <div class="mb-3">
                            <label for="certificate">Certificate</label>
                            <select name="certificate" id="certificate" class="form-control">
                                <option {{($course->certificate == 'Yes' ) ? 'selected':'' }} value="Yes">Yes</option>
                                <option {{($course->certificate == 'No' ) ? 'selected':'' }} value="No">No</option>
                                                                                   
                            </select>
                            @error('level')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                           
                        </div>
                    </div>
                    
                </div>     
                <div class="card mb-3">
                    <div class="card-body">	
                        <div class="mb-3">
                            <label for="language">Language</label>
                            <input type="text" name="language" id="language" value="{{$course->language}}" class="form-control" placeholder="language">
                            @error('language')
                            <span class="text-danger">{{ $message }}</span>
                              
                            @enderror
                           
                        </div>
                    </div>
                    
                </div>                              
            </div>
        </div>
        
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a type="button" href="{{route('admin.course.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </div>
</form>	
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
<script>
    $('.related-course').select2({
            ajax: {
                url: '{{ route("admin.course.getCourse")}}',
                dataType: 'json',
                tags: true,
                multiple: true,
                minimumInputLength: 3,
                processResults: function (data) {
                    return {
                        results: data.tags
                    };
                }
            }
}); 
    Dropzone.autoDiscover = false;    
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: '100px'
        });
       
       

    });
</script>
@endsection
