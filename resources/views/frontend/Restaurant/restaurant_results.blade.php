@extends('frontend.main_master')

    @section('title')
        Restaurant | {{config('app.name')}}
       
    @endsection

  
    <!-- banner section -->
    @section('banner')   

  
        <div class="container1">
            <h1>Restaurant</h1>
          
            <div class="box-1">
                <div style="width: 70%;" class="box1-1"><img src="{{asset('frontend/upload/restaur.jpg') }}" alt="image">
                </div>
                <div class="box2-1">
                  
                    <div class="box3-chilid1">
                        <div class="boxtextmosque">
                            <h1>Restaurants in South Korea</h1><br>
                            <p>Itaewon is undoubtedly the go-to place for foreigners in South Korea. This district is a tourist hotspot that throws off an international vibe, thanks to its many restaurants, pubs, and shops of different cultures. Be it American, European, or Chinese, Itaewon’s got plentiful foodie finds for those who want a taste of home. Explore Itaewon’s diverse dining scene and add these restaurants to your where-to-eat list in Korea!
                            </p>
                            
                        </div>
                    </div>
                    <a href="{{ route('mosque.search') }}"><button id="nearestm"> Search nearest restaurant </button></a>
                </div>
            </div>
        </div>
             
    @endsection
    <!-- banner section ended -->

@section('main')   
<div class="Box-2">
    <div class="grid-container">
       
        @foreach($result as $news)

            <div class="grid-box">
                <center><a class="link-hover-change-color" href="{{ route('frontend.blog.details', $news->id) }}">{{ $news->name }}</a></center>
                <div class="grid-items" style="background-image: url( {{asset('frontend/upload/restaurant-min.jpeg') }} );">
                  
                </div>
                <div class=" grid-text text-chilid1 ">
                  
                    

                    <p ><span class="sub-info"> Phone:</span> @if($news->phone) {{ $news->phone }} @else Not available @endif </p>

                    <p ><span class="sub-info"> Address:</span> @if($news->address) {{!! Str::limit($news->address, 50) !!} @else Not available @endif </p>

                     <a  href="{{ $news->address_link }}"><span class="sub-info"> Show on map </span></a>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <div class="widith-100">
</div>
  





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
var x = document.getElementById("demo");


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);

   

  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
  
}




</script>




@endsection