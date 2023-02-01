@extends('frontend.main_master')

    @section('title')
        Post Services | {{config('app.name')}}
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
        <div class="CargoText1">
            <h1>Cargo services</h1>
        </div>
        <div class="conatiner">
            <div class="item1">
                <img src="{{asset('frontend/upload/Cargo/Sms.png') }}" alt="image">
            </div>
            <div class="item2">
                <img src="{{asset('frontend/upload/Cargo/AirCargoo.png') }}" alt="image">
                <p>Air freight</p>
            </div>
            <div class="item2">
                <img src="{{asset('frontend/upload/Cargo/CemaCargo.png') }}" alt="image">
                <p>Ocean freight</p>
            </div>
        </div>
        <div class="conatinermin">
            <div class="item2">
                <img src="{{asset('frontend/upload/Cargo/RoadCargopng.png') }}" alt="image">
                <p>Road freight</p>
            </div>
            <div class="item2">
                <img src="{{asset('frontend/upload/Cargo/BigCarCargo.png') }}" alt="image">
                <p>Rail freight</p>
            </div>
        </div>


         
    @endsection
    <!-- banner section ended -->

@section('main')   

<div class="Box-2-cargo">
        <div class="CargoText2">
            <h1>
                Documents or Express Parcel
            </h1>
        </div>
        <div class="conatiner-2">
            <div class="menu2item1">
                <img src="{{asset('frontend/upload/Cargo/menu2Cargo.png') }}" alt="image">
            </div>
            <div class="menu2item2">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consectetur dui commodo, lorem id
                    adipiscing. Laoreet sit
                    turpis est quis nulla. Ut pellentesque velit cursus pellentesque rutrum mauris felis nulla. Erat mi
                    tincidunt pulvinar
                    mattis urna, porttitor nunc scelerisque pulvinar.Pellentesque velit cursus pellentesque rutrum
                    mauris felis nulla.
                </p>
            </div>
        </div>
        <div class="Contact">
            <div>
                <button class="btnContact">CONTACT US</button>
            </div>
        </div>
    </div>

    <div class="Container-3">
        <div class="CargoTetx3">
            <h1>Our partners</h1>
        </div>
        <div class="Box-3">
            <div class="Box3Item1">
                <img src="{{asset('frontend/upload/Cargo/CargoPochta1.png') }}" alt="image">
                <p>Bozor aka
                    Cargo</p>
            </div>
            <div class="Box3Item1">
                <img src="{{asset('frontend/upload/Cargo/CargoPochta2.png') }}" alt="image">
                <p>partnersGold express</p>
            </div>
            <div class="Box3Item1">
                <img src="{{asset('frontend/upload/Cargo/CargoPochta3.png') }}" alt="image">
                <p>Asia express</p>
            </div>
            <div class="Box3Item1">
                <img src="{{asset('frontend/upload/Cargo/CargoPochta4.png') }}" alt="image">
                <p>Express cargo</p>
            </div>
        </div>
    </div>
    <div class="widith-100"></div>

@endsection