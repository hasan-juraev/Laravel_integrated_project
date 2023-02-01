@extends('frontend.main_master')

    <!-- Language schools -->
    @php
        $results = DB::table('education')
        ->where('education_type', '=','Language school')
        ->orderBy('created_at','desc')
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

            $all_education = App\Models\Education::latest()->limit(4)->get();
        @endphp 


        
        <div class="container">
            <h1 class="Education-text">Education</h1>

            <h3 class="Education-child">Top Universities in Korea</h3>

            <div class="Box-1">
                @foreach($latest5_edu as $univ)
                <div class="grid-item"><a href="">
                        <img src="{{ asset($univ->image_url) }}" alt="image-top"></a>
                    <span class="icon-1-text"><img src="{{ asset('frontend/upload/location-icon.svg') }}" alt="image-icon">
                        <span> {{ $univ->region }} </span>
                    </span>
                    <p> {{ $univ->name }} </p>
                </div>
                @endforeach
                
            </div>
            
        </div>


        
    @endsection
    <!-- banner section ended -->

@section('main')   

    @section('title')
        Education | {{config('app.name')}}
    @endsection


   <!-- Menu-2 -->
   <div>
        <div class="container-2">

            <div class="wrapper">

                <h1 class="Libraries">Language Schools</h1>

                <div class="Box-2">
                
                    <div class="hero-mini1">
                        <img src="{{ asset('frontend/upload/center-big.png') }}" alt="image">
                        <span class="icon-1-text"><img src="{{ asset('frontend/upload/location-icon.svg') }}" alt="img">
                            <span>USA</span>
                        </span>
                        <p>Massachusetts Institute of Technology (MIT)</p>
                    </div>

                    <div class="hero-mini2">

                        @foreach($results as $res)
                        <div class="grid-item"><img src="{{ asset($res->image_url)}}" alt="language-shool">
                            <span class="icon-1-text">
                                <img src="{{ asset('frontend/upload/location-icon.svg') }}" alt="icon">
                                <span>{{ $res->region }}</span>
                            </span>
                            <p>{{ $res->name }}</p>
                        </div>
                        @endforeach

                        
                        
                    </div>
                </div>
               
            </div>

        </div>
    </div>

    <!-- menu-3 -->
    <div class="container-3">

        <div class="wrapper">

            <h1 class="Libraries">Latest Updated</h1>
            <div class="Box-3">

                @foreach($all_education as $edu)
                <div class="grid-item">
                   
                    <img src="{{ asset($edu->image_url)}}" alt="image">
                    <span class="icon-1-text"><img src="{{ asset('frontend/upload/location-icon.svg') }}" alt="icon">
                        <span>{{ $res->region }}</span>
                    </span>
                    <p>{{ $res->name }}</p>
                </div>
                @endforeach
                
            </div>
        </div>

    </div>


    <!-- footer  start -->
    <div class="widith-100"></div>
@endsection