 <!-- HERO
    ================================================== -->
    <section class="py-13 pt-xl-14 mt-n13 pb-lg-12 bg-cover position-relative" style="background-color:#d4edf5;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-5 order-md-2" data-aos="fade-in">

                    <!-- Image -->
                    <img src="{{asset('home-assets/img/illustrations/illustration-5.svg')}}" class="img-fluid ms-xl-n11 mw-md-174 mb-6 mb-md-0" alt="...">

                </div>

                <div class="col-12 col-md-7 col-lg-7 order-md-1">
                    <!-- Heading -->
                    <h1 class="display-2 text-gradient-1 text-capitalize" data-aos="fade-left" data-aos-duration="150">
                        Learn on your <span class="fw-bold">Schedule</span>
                    </h1>

                    <!-- Text -->
                    <p class="lead pe-md-8 pe-xl-12 text-capitalize" data-aos="fade-up" data-aos-duration="200">
                        Technology is bringing a massive wave of evolution on learning things in different ways.
                    </p>

                    <!-- Buttons -->
                    {{-- <a href="" class="btn btn-tangerine btn-wide rounded-lg mb-4 mb-md-0 me-md-5 text-w" data-aos="fade-up" data-aos-duration="200">GET STARTED</a> --}}
                    <a href="{{route('auth.login')}}" class="btn btn-wide btn-slide slide-primary shadow mb-4 mb-md-0 me-md-5" data-aos-duration="200" data-aos="fade-up">GET STARTED</a>
                    <a href="/front/shop" class="btn btn-gigas btn-wide rounded-lg d-none d-lg-inline-block" data-aos="fade-up" data-aos-duration="200">VIEW COURSES</a>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
        <!-- Shape -->
        <div class="d-none d-wd-block shape shape-blur shape-left shape-fluid-y svg-shim text-white">
            <svg viewBox="0 0 310 800" fill="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px">
            	<path fill="currentColor" d="M193,0H0v800h310c-64.6,0-117-52.4-117-117V0z"/>
            </svg>

        </div>
    </section>