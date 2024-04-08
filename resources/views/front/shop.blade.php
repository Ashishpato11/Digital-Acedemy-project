<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/upload/logo.png">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;family=Lora:wght@400;700&amp;family=Montserrat:wght@400;500;600;700&amp;family=Nunito:wght@400;700&amp;display=swap" rel="stylesheet">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('home-assets/fonts/fontawesome/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/aos/dist/aos.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/flickity-fade/flickity-fade.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/flickity/dist/flickity.min.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/highlightjs/styles/vs2015.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/jarallax/dist/jarallax.css')}}">
    <link rel="stylesheet" href="{{asset('home-assets/libs/quill/dist/quill.core.css')}}" />

    <link rel="stylesheet" href="{{asset('home-assets/css/ion.rangeSlider.min.css')}}" />
    <!-- Map -->
    {{-- <link href='../../../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' /> --}}


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('home-assets/css/theme.min.css')}}">

    <title>Digital Academy</title>
   <style>
     #loading{
        position: fixed;
        width: 100%;
        height:100vh;
        background:  hsl(0, 0%, 96%) 
        url('/upload/spinnervlll.gif')
        no-repeat center;
        z-index: 999999 ;
     }   
     .link a {
    text-decoration: none;
    color: rgb(0, 0, 0);
   
}

.link a:hover {
   
    transition:all ease 1s;
    font-size: large;
    color: rgb(81, 169, 224);
    font-weight: bold;
}

.link a.selected {
    color: rgb(81, 169, 224);
    font-weight: bold; /* You can customize the style for the selected category */
}
.button{
    border-radius: 40px;
    float: right;
    border: 2px solid rgb(81, 169, 224);

}     
.button:hover{
    transition:all ease 1s;
    font-size: 1.05rem;
    color: white;
    background-color: rgb(81, 169, 224);
    
    
}
     
   </style>
</head>
<body onload="myFunction()">
  <div id="loading"></div>
   @include('front.home.header')

     <!-- PAGE TITLE
    ================================================== -->
    <header class="bg-white py-8 py-lg-12 position-relative mb-8" style="background-image: none;">
        <div class="container text-center py-xl-5">
            <h1 class="display-4 fw-semi-bold mb-0">All Courses</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-scroll justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-gray-800" href="#">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item text-gray-800 active" aria-current="page">
                        Courses
                    </li>
                </ol>
            </nav>
        </div>
        <!-- Img -->
        <img class="position-absolute position-center-y right-0 mw-300p mw-xl-450p me-md-6 d-none d-lg-block img-fluid" src="{{asset('/home-assets/img/illustrations/illustration-1.png')}}" alt="...">
    </header>


    <!-- CONTROL BAR
    ================================================== -->
    <div class="container mb-6 mb-xl-8 z-index-2">
        <div class="d-lg-flex align-items-center mb-6 mb-xl-0">
            <p class="mb-lg-0">We found <span class="text-dark">{{$course}} courses</span> available for you</p>
            <div class="ms-lg-auto d-lg-flex flex-wrap">
                <div class="mb-4 mb-lg-0 ms-lg-6">
                    <div class="border rounded d-flex align-items-center choices-label h-50p">
                        <span class="ps-5">Sort by:</span>
                        <select class="form-select form-select-sm text-dark border-0 ps-1 bg-transparent flex-grow-1 shadow-none dropdown-menu-end" name="sort" id="sort" data-choices>

                            <option   value="latest" {{($sort == 'latest') ? 'selected' : ''}}>New Courses</option>
                            <option  value="price_asc" {{($sort == 'price_asc') ? 'selected' : ''}}>Price Low to High</option>
                            <option  value="price_desc" {{($sort == 'price_desc') ? 'selected' : ''}}>Price High to low</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COURSE
    ================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 mb-5 mb-xl-0">
                <!-- SIDEBAR FILTER
                ================================================== -->
                <div class=" vertical-scroll" id="courseSidebar">
                    <div class="border rounded mb-6 bg-white">
                        <!-- Heading -->
                        <div id="coursefilter1">
                            <h4 class="mb-0">
                                <button class="p-6 text-dark fw-medium d-flex align-items-center collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#coursefiltercollapse1" aria-expanded="true" aria-controls="coursefiltercollapse1">
                                    Category
                                    <span class="ms-auto text-dark d-flex">
                                        <!-- Icon -->
                                        <svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="15" height="2" fill="currentColor"/>
                                        </svg>

                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 7H15V9H0V7Z" fill="currentColor"/>
                                            <path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
                                        </svg>

                                    </span>
                                </button>
                            </h4>
                        </div>

                        @if($categories->isNotEmpty())
                        <div id="coursefiltercollapse1" class="collapse show mt-n2 px-6 pb-6 " aria-labelledby="coursefilter1"       data-parent="#courseSidebar">
                            @foreach ( $categories as $cat )
                            <ul class="list-unstyled list-group ">
                                <li class="link" >
                                    <li class="link">
                                        <a href="{{ route('front.shop', ['categoryTitle' => $cat->title]) }}" class="{{ ($categorySelected == $cat->id) ? 'selected' : '' }}">
                                            <span class="category-title">{{ $cat->title }}</span>
                                            
                                        </a>
                                    </li>
                                    {{-- <a href="{{ route('front.shop', ['categoryTitle' => $cat->title]) }}" class="{{($categorySelected == $cat->id) ? 'text-primary' : ''}}">{{ $cat->title }}</a>
                                    <a href="{{ route('front.shop', ['categoryTitle' => $cat->title]) }}" style="{{ ($categorySelected == $cat->id) ? 'color:blue;' : '' }}">{{ $cat->title }}</a> --}}
                                </li>   
                                
                            </ul>
                            @endforeach
                        </div>
                          
                    </div>
                  
             
                    @endif

                    <div class="border rounded mb-6 bg-white">
                        <!-- Heading -->
                        <div id="coursefilter2">
                            <h4 class="mb-0">
                                <button class="p-6 text-dark fw-medium d-flex align-items-center collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#coursefiltercollapse2" aria-expanded="true" aria-controls="coursefiltercollapse2">
                                    Instructors
                                    <span class="ms-auto text-dark d-flex">
                                        <!-- Icon -->
                                        <svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="15" height="2" fill="currentColor"/>
                                        </svg>

                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 7H15V9H0V7Z" fill="currentColor"/>
                                            <path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
                                        </svg>

                                    </span>
                                </button>
                            </h4>
                        </div>
 
                        
                        @if ($instructors->isNotEmpty())
                        <div id="coursefiltercollapse2" class="collapse show mt-n2 px-6 pb-6" aria-labelledby="coursefilter2" data-parent="#courseSidebar">
                                @foreach ( $instructors as $instructor )
                                {{-- <ul class="list-unstyled list-group list-checkbox">
                                    <li class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="instructorCheckbox{{ $instructor->id }}" name="instructors[]" value="{{ $instructor->id }}">
                                        <label class="custom-control-label" for="instructorCheckbox{{ $instructor->id }}">{{ $instructor->name }}</label>
                                    </li>
                                </ul> --}}
                                <div class="form-check">
                                    <input {{(in_array($instructor->name , $instructorArray)) ? 'checked' : ''}} class="form-check-input instruct-label " type="checkbox" name ="instructor[]" value="{{$instructor->name}}" id="instructor-{{$instructor->name}}" >
                                    <label class="form-check-label" for="instructor-{{$instructor->name}}">
                                    {{$instructor->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endif
                    
                    </div>
                

                    <div class="border rounded mb-6 bg-white">
                        <!-- Heading -->
                        <div id="coursefilter3">
                            <h4 class="mb-0">
                                <button class="p-6 text-dark fw-medium d-flex align-items-center collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#coursefiltercollapse3" aria-expanded="true" aria-controls="coursefiltercollapse3">
                                    Price
                                    <span class="ms-auto text-dark d-flex">
                                        <!-- Icon -->
                                        <svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="15" height="2" fill="currentColor"/>
                                        </svg>

                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 7H15V9H0V7Z" fill="currentColor"/>
                                            <path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
                                        </svg>

                                    </span>
                                </button>
                            </h4>
                        </div>

                        <div id="coursefiltercollapse3" class="collapse show mt-n2 px-6 pb-6" aria-labelledby="coursefilter3" data-parent="#courseSidebar">
                            
                            <input type="text" class="js-range-slider" name="my_range" value="" />
                        </div>
                    </div>

                    {{-- <div class="border rounded mb-6 bg-white">
                        <!-- Heading -->
                        <div id="coursefilter4">
                            <h4 class="mb-0">
                                <button class="p-6 text-dark fw-medium d-flex align-items-center collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#coursefiltercollapse4" aria-expanded="true" aria-controls="coursefiltercollapse4">
                                    Level
                                    <span class="ms-auto text-dark d-flex">
                                        <!-- Icon -->
                                        <svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="15" height="2" fill="currentColor"/>
                                        </svg>

                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 7H15V9H0V7Z" fill="currentColor"/>
                                            <path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
                                        </svg>

                                    </span>
                                </button>
                            </h4>
                        </div>

                        <div id="coursefiltercollapse4" class="collapse show mt-n2 px-6 pb-6" aria-labelledby="coursefilter4" data-parent="#courseSidebar">
                            <ul class="list-unstyled list-group list-checkbox">
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="levelcustomcheck1">
                                    <label class="custom-control-label font-size-base" for="levelcustomcheck1">Beginner (03)</label>
                                </li>
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="levelcustomcheck2">
                                    <label class="custom-control-label font-size-base" for="levelcustomcheck2">Intermediate (15)</label>
                                </li>
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="levelcustomcheck3">
                                    <label class="custom-control-label font-size-base" for="levelcustomcheck3">Advanced (126)</label>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

    <a type="submit"  href="{{ route('front.shop') }}" class="btn btn-primary btn-block mb-10">Clear Filters</a>

                </div>

            </div>

            <div class="col-xl-9">
                <div class="row row-cols-md-2 row-cols-lg-3 mb-3 ">
                    @if ($courses->isNotEmpty())
            @foreach ($courses as $course )
                    <div class="col-md pb-4 pb-md-7">
                        <!-- Card -->
                        <div class="card border shadow p-2 lift sk-fade">
                            <!-- Image -->
                            <div class="card-zoom position-relative">
                                <a href="/front/singlecourse/{{$course->id}}" class="card-img sk-thumbnail img-ratio-3 d-block">
                                    <img class="rounded shadow-light-lg" src="/upload/course/{{$course->thumbnail}}" alt="...">
                                </a>

                                <span class="sk-fade-right badge-float bottom-0 right-0 mb-2 me-2">
                                    <del class="h5 mb-0 text-blue">${{$course->compare_price}}</del>
                                    <ins class="h5 mb-0 text-white">${{$course->price}}</ins>
                                </span>
                            </div>

                            <!-- Footer -->
                            <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                                <!-- Preheading -->
                                <a href="/front/singlecourse/{{$course->id}}"><span class="mb-1 d-inline-block text-gray-800">{{$course->category->title}}</span></a>
                                     <input class="button" type="submit" value="Add Cart">
                                <!-- Heading -->
                                <div class="position-relative">
                                    <a href="/front/singlecourse/{{$course->id}}" class="d-block stretched-link"><h5 class="">{{$course->title}}</h5></a>
                                   <span>Created By : {{$course->user->name}}</span>
                                    <div class="row mx-n2 align-items-end">
                                        <div class="col px-2">
                                            <ul class="nav mx-n3">
                                                <li class="nav-item px-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 d-flex text-secondary icon-uxs">
                                                            <!-- Icon -->
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M17.1947 7.06802L14.6315 7.9985C14.2476 7.31186 13.712 6.71921 13.0544 6.25992C12.8525 6.11877 12.6421 5.99365 12.4252 5.88303C13.0586 5.25955 13.452 4.39255 13.452 3.43521C13.452 1.54098 11.9124 -1.90735e-06 10.0197 -1.90735e-06C8.12714 -1.90735e-06 6.58738 1.54098 6.58738 3.43521C6.58738 4.39255 6.98075 5.25955 7.61414 5.88303C7.39731 5.99365 7.1869 6.11877 6.98502 6.25992C6.32752 6.71921 5.79178 7.31186 5.40787 7.9985L2.8447 7.06802C2.33612 6.88339 1.79688 7.26044 1.79688 7.80243V16.5178C1.79688 16.8465 2.00256 17.14 2.31155 17.2522L9.75312 19.9536C9.93073 20.018 10.1227 20.0128 10.2863 19.9536L17.7278 17.2522C18.0368 17.14 18.2425 16.8465 18.2425 16.5178V7.80243C18.2425 7.26135 17.704 6.88309 17.1947 7.06802ZM10.0197 1.5625C11.0507 1.5625 11.8895 2.40265 11.8895 3.43521C11.8895 4.46777 11.0507 5.30792 10.0197 5.30792C8.98866 5.30792 8.14988 4.46777 8.14988 3.43521C8.14988 2.40265 8.98866 1.5625 10.0197 1.5625ZM9.23844 18.1044L3.35938 15.9703V8.91724L9.23844 11.0513V18.1044ZM10.0197 9.67255L6.90644 8.54248C7.58164 7.51892 8.75184 6.87042 10.0197 6.87042C11.2875 6.87042 12.4577 7.51892 13.1329 8.54248L10.0197 9.67255ZM16.68 15.9703L10.8009 18.1044V11.0513L16.68 8.91724V15.9703Z" fill="currentColor"/>
                                                            </svg>

                                                        </div>
                                                        <div class="font-size-sm">5 lessons</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-auto px-2 text-right">
                                            <div class="star-rating mb-2 mb-lg-0">
                                                <div class="rating" style="width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                @endif
                </div>

                <!-- PAGINATION
                ================================================== -->
                <nav class="mb-11" aria-label="Page navigationa">
                    <ul class="pagination justify-content-center">
                        
                        {{ $courses->appends(request()->query())->links() }}
                       
                       
                    </ul>
                </nav>

            </div>
        </div>
    </div>


    </section>
     @include('front.home.footer')

     <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{asset('home-assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/aos/dist/aos.js')}}"></script>
    <script src="{{asset('home-assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/countup.js/dist/countUp.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/flickity/dist/flickity.pkgd.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/flickity-fade/flickity-fade.js')}}"></script>
    <script src="{{asset('home-assets/libs/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/isotope-layout/dist/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/jarallax/dist/jarallax.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/jarallax/dist/jarallax-video.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/jarallax/dist/jarallax-element.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/parallax-js/dist/parallax.min.j')}}s"></script>
    <script src="{{asset('home-assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/smooth-scroll/dist/smooth-scroll.min.js')}}"></script>
    <script src="{{asset('home-assets/libs/typed.js/lib/typed.min.js')}}"></script>
    <script src="{{asset('home-assets/js/ion.rangeSlider.min.js')}}"></script>
    
    {{-- <!-- Map -->
    <script src='../../../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script> --}}

    

    <!-- Theme JS -->
    <script src="{{asset('home-assets/js/theme.min.js')}}"></script>
    
    <script>
          var preloader = document.getElementById('loading');
          function myFunction(){
            preloader.style.display = 'none';
          }

rangeSlider = $(".js-range-slider").ionRangeSlider({
    type : "double",
    min : 0,
    max : 300,
    from: {{ ($priceMin) }},
    to: {{ ($priceMax) }},
    step : 10,
    
    skin : "round",
    max_postfix : "+",
    prefix : "$",
    onFinish : function () {
        apply_filters()
    }
});

  var slider = $(".js-range-slider").data("ionRangeSlider");


                $(".instruct-label").change(function(){
            apply_filters();  
        });

        $("#sort").change(function(){
            apply_filters();  
        });
        
//////////// instructor
        function apply_filters(){
            var instructors = [];
            $(".instruct-label").each(function(){
                if ($(this).is(":checked") == true){
                    instructors.push($(this).val());
                }
            });
            console.log(instructors.toString());  
            var url = '{{url()->current()}}?';
    ////price range
            url += '&price_min='+slider.result.from+'&price_max='+slider.result.to;
           
             if(instructors.length > 0) {

                url +='&instructor=' +instructors.toString()
             }

        ///// sorting
             url += '&sort='+$("#sort").val()
             

            window.location.href = url ;
        }
    </script>

</body>


</html>
