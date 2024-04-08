
    <!-- INSTRUCTORS
    ================================================== -->
    <section class="pt-5 pb-9 py-md-11 bg-white">
        <div class="container">
            <div class="text-center mb-4 mb-md-7 text-capitalize" data-aos="fade-up">
                <h1 class="mb-1">Top Rating Instructors</h1>
                <p class="font-size-lg mb-0">Discover your perfect program in our courses.</p>
            </div>
           
            <div class="mx-n3 mx-md-n4" data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "left", "wrapAround": true, "imagesLoaded": true}'>
                @if (getInstructor()->isNotEmpty())
                    @foreach (getInstructor() as $instructor )
                <div class="col-6 col-md-4 col-lg-3 text-center py-5 text-md-left px-3 px-md-4" data-aos="fade-up" data-aos-delay="50">
                    <div class="card rounded-lg border shadow p-2 lift">
                        <!-- Image -->
                        <div class="card-zoom position-relative" style="max-width: 250px;">
                            <div class="card-float card-hover right-0 left-0 bottom-0 mb-4">
                                <ul class="nav mx-n4 justify-content-center">
                                    <li class="nav-item px-4">
                                        <a href="{{$instructor->facebook}}" target="blank" class="d-block text-white">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item px-4">
                                        <a href="#"target="blank" class="d-block text-white">
                                            <i class="fab fa-twitter">{{$instructor->twiter}}</i>
                                        </a>
                                    </li>
                                    <li class="nav-item px-4">
                                        <a href="#" target="blank" class="d-block text-white">
                                            <i class="fab fa-instagram">{{$instructor->instagram}}</i>
                                        </a>
                                    </li>
                                    <li class="nav-item px-4">
                                        <a href="#" target="blank" class="d-block text-white">
                                            <i class="fab fa-linkedin-in">{{$instructor->linkdin}}</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <a href="/front/singleinstructor/{{$instructor->id}}" class="card-img sk-thumbnail img-ratio-4 card-hover-overlay d-block"> <img src="/upload/instruct_images/{{$instructor->photo}}" class="card-img-top"  height="200px" width="150px"></a>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-3 pt-4 pb-1">
                            <a href="#" class="d-block"><h5 class="mb-0">{{$instructor->name}}</h5></a>
                            <span class="font-size-d-sm">{{$instructor->skill}}</span>
                        </div>
                    </div>
                </div>
               
                @endforeach
                @endif
                
                    </div>
                </div>
            </div>
        </div>
    </section>