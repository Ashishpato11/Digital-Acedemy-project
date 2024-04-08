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

    <!-- Map -->
    <link href='../../../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

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

   @include('front.home.index')

   @include('front.home.products')

   @include('front.home.about')

    @include('front.home.instructor')

    @include('front.home.testimonial')
   


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
    <!-- Map -->
    <script src='../../../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Theme JS -->
    <script src="{{asset('home-assets/js/theme.min.js')}}"></script>
    
    <script>
          var preloader = document.getElementById('loading');
          function myFunction(){
            preloader.style.display = 'none';
          }

    </script>

</body>


</html>
