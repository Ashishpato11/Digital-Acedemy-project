@extends('Instructor.layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Course</h1>
      <nav class="mt-2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Course</li>
          <li class="breadcrumb-item">Edit</li>
        </ol>
      </nav>
      
    </div><!-- End Page Title -->
    
    <section class="section">
        <form action="/instructor/course/{{$course->id}}/update" method="post" enctype="multipart/form-data">
            @csrf			
            @method('put')
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
                <div class="col-md-12 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control" name="title" id=""  value="{{$course->title}}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold ">Short-Description</label>
                        <textarea class="form-control" name="short_description" id="short_description" rows="3"> {{$course->short_description}}</textarea>
                        @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                        
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold ">Description</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="summernote" placeholder="Description">{{$course->description}}</textarea>
                        @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                        
                        @enderror
                    </div>
                  </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
               
                
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
            </div>
            <div class="card">
                <div class="card-body">
                   
                    <h2 class="h4 mb-3 fw-bold mt-2">Pricing</h2>								
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control mt-1" placeholder="Price"  value="{{$course->price}}">	
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                  
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="compare_price">Compare at Price</label>
                                <input type="text" name="compare_price" id="compare_price" class="form-control mt-1 " placeholder="Compare Price"  value="{{$course->compare_price}}">
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
                                    <label for="exampleFormControlTextarea1" class="form-label fw-bold mt-2">What You will Learn</label>
                                    <textarea name="outcomes" id="Outcomes" cols="30" rows="2" class="summernote" placeholder=""> {{$course->outcomes}}</textarea>
                                    @error('outcomes')
                                    <span class="text-danger">{{ $message }}</span>
                                      
                                    @enderror	
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="mb-3">
                                
                                    <label for="exampleFormControlTextarea1" class="form-label fw-bold">Requirement</label>
                                    <textarea class="form-control" name="requirements" id="exampleFormControlTextarea1" rows="3"> {{$course->requirements}}"</textarea>
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
                            <h2 class="h4 mb-3 fw-bold mt-2">Related Courses</h2>
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

                <button type="submit" class="btn btn-primary">Update</button>
                <a type="button" href="{{route('instructor.course.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>

        <div class="col-md-4">

            <div class="card">
                <div class="card-body">	
                    <h2 class="h4  mb-3 fw-bold mt-2">Course category</h2>
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control  mt-1">
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
                    <div class="mb-3 mt-2">
                        <label for="level" class="fw-bold ">Level</label>
                        <select name="level" id="level" class="form-control mt-1">
                            <option value="">Select The Level </option>
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
                        <label for="certificate" class="fw-bold mt-2">Certificate</label>
                        <select name="certificate" id="certificate" class="form-control mt-1">
                            <option value="">Select For Certificate </option>
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
                        <label for="language" class="fw-bold mt-2">Language</label>
                        <input type="text" name="language" id="language" class="form-control" value="{{$course->language}}" placeholder="language">
                        @error('language')
                        <span class="text-danger">{{ $message }}</span>
                          
                        @enderror
                       
                    </div>
                </div>
                
            </div>                                 
        </div>
        </div>
      </div>
    </form>
    </section>

</div>









<!-- /.content -->
<script type="text/javascript">
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
        
    $(document).ready(function(){
     $('#image').change(function(e){
       var reader = new FileReader();
       reader.onload = function(e){
         $('#showImage').attr('src',e.target.result);
       }
       reader.readAsDataURL(e.target.files['0']);
     });
    });

    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: '100px'
        });
       
       

    });
   
  </script>

<script>
     $(document).ready(function() {
        $('.related-course').select2({
            ajax: {
                url: '{{ route("instructor.course.getCourse") }}',
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: data.tags
                    };
                },
                cache: true
            },
            minimumInputLength: 3,
            tags: true,
            multiple: true,
        });
    });
      
 
</script>
@endsection
