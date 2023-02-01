@extends('frontend.main_master')

    @section('title')
        Housing | {{config('app.name')}}
    @endsection

  
    @php
        $featured_places = DB::table('entertainments')
        ->where('isKnown', '=','well-known')
        ->orderBy('created_at','desc')->limit(3)
        ->get();
        
        $attractions = DB::table('entertainments')
        ->where('entertainment_category', '=','Attraction')
        ->orderBy('created_at','desc')->limit(2)
        ->get();

        $latest5_edu =  DB::table('education')
        ->where('education_type', '=','University')
        ->orderBy('created_at','desc')
        ->get();

        $entertainments = App\Models\Entertainment::latest()->limit(4)->get();
    @endphp

    <!-- banner section -->
    @section('banner')
        <!-- Top universities -->
        <h1 class="Text-center1">House renting</h1>

        <div class="Hero-Renting">      
        <div class="Renting-imgtext">
            <h1>Help you find your smart apartment</h1>
        </div>
        </div>

   
    @endsection
    <!-- banner section ended -->

@section('main')   

  <!-- menu 2 -->
  <div class="Hero-2">
    <h1>Top 5 websites</h1>
    <div class="Box-2-housing">

      <div class="menubox2-1">
        <h2>Zigbang</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. A ornare amet pretium velit arcu vitae eu. Pretium
          eu, tortor
          ornare malesuada vitae in. Iaculis lacinia maecenas tempor nec et euismod nec. Egestas fermentum adipiscing
          donec non
          aliquam nunc, hendrerit habitant risus.</p>
        <h2>www.zigbang.com</h2>
      </div>

      <div class="menubox2-2">
        <a href="https://www.zigbang.com/"> <img src="{{asset('frontend/upload/RENTING.png/Zigbang.png') }}" alt="image"></a>
      </div>

    </div>
  </div>

    <div class="Hero-3">
        <div class="Box-3-housing">
            <div class="menubox3-1">
                 <a href="https://www.zigbang.com/"><img src="{{asset('frontend/upload/RENTING.png/Dabang.png') }}" alt="image"></a>
            </div>
            
            <div class="menubox3-2">
                <h2>Dabang</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. A ornare amet pretium velit arcu vitae eu. Pretium
                eu, tortor
                ornare malesuada vitae in. Iaculis lacinia maecenas tempor nec et euismod nec. Egestas fermentum adipiscing
                donec non
                aliquam nunc, hendrerit habitant risus.</p>
                <h2>www.dabangapp.com</h2>
            </div>
        </div>
    </div>

  <div class="Hero-4">
    <div class="Box-4-housing">
      <div class="menubox4-1">
        <h2>Peter Pan</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. A ornare amet pretium velit arcu vitae eu. Pretium
          eu, tortor
          ornare malesuada vitae in. Iaculis lacinia maecenas tempor nec et euismod nec. Egestas fermentum adipiscing
          donec non
          aliquam nunc, hendrerit habitant risus.</p>
        <h2>www.peterpanz.com</h2>
      
       
      </div>
      <div class="menubox4-2">
         <a href="www.peterpanz.com"><img src="{{asset('frontend/upload/RENTING.png/Peter Pan.png') }}" alt="image"></a>
      </div>
    </div>
  </div>

  <div class="Hero-5">
    <div class="Box-5-housing">
      <div class="menubox5-1">
         <a href="https://land.naver.com/"><img src="{{asset('frontend/upload/RENTING.png/Naver Real Estate.png') }}" alt="image"></a>
      </div>
      <div class="menubox5-2">
        <h2>Naver Real Estate</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. A ornare amet pretium velit arcu vitae eu. Pretium
          eu, tortor
          ornare malesuada vitae in. Iaculis lacinia maecenas tempor nec et euismod nec. Egestas fermentum adipiscing
          donec non
          aliquam nunc, hendrerit habitant risus.
        </p>
        <h2>land.naver.com</h2>
      </div>
    </div>
  </div>

  <div class="Hero-6">
    <div class="Box-6-housing">
      <div class="menubox6-1">
        <h2>Han Bang</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. A ornare amet pretium velit arcu vitae eu. Pretium
          eu, tortor
          ornare malesuada vitae in. Iaculis lacinia maecenas tempor nec et euismod nec. Egestas fermentum adipiscing
          donec non
          aliquam nunc, hendrerit habitant risus.</p>
        <h2>  karhanbang.com</h2>
      </div>
      <div class="menubox6-2">
         <a href="http://karhanbang.com/main/"><img src="{{asset('frontend/upload/RENTING.png/Han Bang.png') }}" alt="image"></a>
      </div>
    </div>
  </div>

  <div class="widith-100">
  </div>


@endsection