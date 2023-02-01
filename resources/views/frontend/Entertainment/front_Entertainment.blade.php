@extends('frontend.main_master')

    @section('title')
        Entertainment | {{config('app.name')}}
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
    @endphp

    <!-- banner section -->
    @section('banner')
        <!-- Top universities -->
        @php
            $latest5_edu =  DB::table('education')
            ->where('education_type', '=','University')
            ->orderBy('created_at','desc')
            ->get();

            $entertainments = App\Models\Entertainment::latest()->limit(4)->get();
        @endphp 


        <div class="Box-1-entertainment">
            <div class="Enter-Img">
                <div>
                    <h1 class="text-bigh1">Entertainment</h1>
                    <h4>Travel, explore deals, thing to do in Korea</h4>
                </div>
            </div>
            <div class="box-1-2">
                <div class="chilidbox1-2-1"></div>
                <div class="chilidbox1-2-2"><img src="../photo/image 2.png" alt=""></div>
            </div>
        </div>

        <div class="box-2">
            <div class="item-1">
                <div>
                    <img src="{{ asset('frontend/upload/Frame.svg') }}" alt="icon">
                </div>
                <div class="text-1">
                    <p>Attraction</p>
                    <p>tickets</p>
                </div>
            </div>
            
        </div>        
    @endsection
    <!-- banner section ended -->

@section('main')   

<div class="conatiner-3">
        <h1>Famous Places</h1>
       
        <div class="box-3">
        @foreach($entertainments as $ents)
            <div class="item3">
                <img src="{{ asset($ents->image_url) }}" alt="big">
                <div class="menu-3text1">
                    <h4>{{ $ents->entertainment_type}}</h4>
                    <p>{{ $ents->entertainment_title}}</p>
                </div>
            </div>           
            @endforeach
        </div>
    

        <div class="btn-end top-end ">
            <button>More</button>
        </div>
</div>

<div class="container-4">
    <h1>Attractions</h1>
    <div class="box-4">
        @foreach($attractions as $attr)
       
        <div class="box-4-1" style="background-image:
        linear-gradient(180deg, rgba(23, 60, 255, 0) 66.67%, rgba(3, 32, 132, 0.87) 89.58%),
        url('{{ $attr->image_url }}');">
            <h2> {{ $attr->entertainment_title }} </h2>
        </div>
      @endforeach
    </div>

    <div class="box-4mini">
        <div class="box-4">
            @foreach($featured_places as $famous)
            <div class="boxmin-4-1" style="background-image:
        linear-gradient(180deg, rgba(23, 60, 255, 0) 66.67%, rgba(3, 32, 132, 0.87) 89.58%),
        url('{{ $famous->image_url }}');">
                <h2>{{ $famous-> entertainment_title }}</h2>
            </div>
            @endforeach
          

        </div>
    </div>
    <div class="btn-end">
        <button>More</button>
    </div>
</div>
<!-- footer  start -->
<div class="widith-100"></div>


@endsection