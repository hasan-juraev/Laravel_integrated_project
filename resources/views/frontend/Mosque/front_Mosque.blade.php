@extends('frontend.main_master')

    @section('title')
        Mosque | {{config('app.name')}}
       
    @endsection

  
    @php
    Session::forget('message');
    $all_news =  App\Models\Mosques::latest()->limit(8)->get();
    @endphp

    <!-- banner section -->
    @section('banner')   

  
        <div class="container1">
            <h1>Mosque</h1>
          
            <div class="box-1">
                <div style="width: 70%;" class="box1-1"><img src="{{asset('frontend/upload/image 5.png') }}" alt="image">
                </div>
                <div class="box2-1">
                  
                    <div class="box3-chilid1">
                        <div class="boxtextmosque">
                            <h1>Mosques and Prayer Rooms in South Korea</h1><br>
                            <p>There are 25 mosques and few other islamic centers in South Korea spread in different
                                places
                                ranging from Seoul, Busan
                                and some other places. Please note that non muslims are allowed you to enter the
                                compound to
                                visit the mosque. Just
                                please be sure to bring modest clothes, and women, please cover your heads during the
                                visit.
                            </p>
                            
                        </div>
                    </div>
                    <a href="{{ route('mosque.search') }}"><button id="nearestm"> Search nearest mosque </button></a>
                </div>
            </div>
        </div>
             
    @endsection
    <!-- banner section ended -->

@section('main')   
<div class="Box-2">
    <div class="grid-container">
       
        @foreach($all_news as $news)

            <div class="grid-box">
                <center><a class="link-hover-change-color" href="{{ route('frontend.blog.details', $news->id) }}">{{ $news->name }}</a></center>
                <div class="grid-items" style="background-image: url( {{asset('frontend/upload/mosque_df.jpg') }} );">
                  
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