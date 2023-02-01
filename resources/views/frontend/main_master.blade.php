<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/nabar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/education.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/Entertainment.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/House renting.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/cargo.css') }}">
    
    <link rel="stylesheet" href="{{ asset('frontend/css/single page.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mosque.css') }}">

     <!-- Toastr css -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
   
    

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

</head>
<body>
    
  

    <!-- header -->
    @include('frontend.body.header')    

    @yield('banner')
    
    @include('frontend.body.header_closing')    

    <!-- main content -->
    @yield('main')

    <!-- footer -->
    @include('frontend.body.footer')

    <!-- Javascript -->
    <script src="{{ asset('frontend/js/index.js') }}"></script>

    <!-- Toastr -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <script>
    @if(Session::has('message'))            
            var type = "{{ Session::get('alert-type','info') }}"

            switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break; 
            }
        @endif 
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);



        </script>

</body>
</html>