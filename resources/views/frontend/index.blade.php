@extends('frontend.main_master')

@php
    $news_home =  App\Models\Blogs::latest()->limit(8)->get();
    $education =  App\Models\Education::latest()->limit(8)->get();
@endphp

@section('banner')
<div class="Text-box">
    <div class="text-center1">
    <h1>Haksenguz</h1>
    </div>
    <div class="text-center2">
    <p>Haksenguz provides local information about news, education, entertainment, mosque, halal restaurants, and housing. Find information related to living in South Korea in a easy way! </p>
    </div>
    <div class="text-center1"> <button>Learn more</button></div>
</div>
@endsection

@section('main')

    @section('title')
    Home | {{config('app.name')}}
    @endsection

  

    <main class="Container">
        <div class="Box-2">
        <div class="grid-item1"><img src="{{ asset('frontend/upload/center-big.png') }}" alt="image"></div>
        <div class="grid-item1">
            <div class="Box-text1">
            <h1>Who are we ?</h1>
            </div>
            <div class="Box-text1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel in bibendum nisl, mauris viverra.
                Auctor libero mi
                vestibulum cursues duis. Sed orci purus amet gravida tellus egestas. Tortor dolor nibh consectetur
                faucibus
                ullamcorper.</p>
            </div> <br>
            <div class="Box-text1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel in bibendum nisl, mauris viverra.
                Auctor
                libero mi
                vestibulum cursus tellus et.</p>
            </div>
        </div>
        </div>
    </main>

    
<!-- menu-3 -->
<h2 class="home-sub-title">News</h2>
<div class="Box-2">
        
    <div class="grid-container">
          
        @foreach($news_home as $news)

            <div class="grid-box">
                <div class="grid-items" style="background-image: url({{asset($news->image) }});">
                    <div class="btn-box">
                        <button class="btn-soat">{{ $news['category']['blog_category'] }}</button>
                    </div>
                </div>
                <div class=" grid-text text-chilid1 ">
                    <div class="text-soat">
                        <img src="{{ asset('frontend/upload/soat.svg') }}" alt="">
                        <p>{{ $news->created_at->diffForHumans() }}</p>
                    </div>
                    <p>{{ $news->title }}</p>
                </div>
            </div>

        @endforeach
    </div>
</div>

<h2 class="home-sub-title">Education</h2>
<div class="Box-2">
        
    <div class="grid-container">
          
        @foreach($education as $edu)

            <div class="grid-box">
                <div class="grid-items" style="background-image: url({{asset($edu->image_url) }});">
                    <div class="btn-box">
                        <button class="btn-soat">{{ $edu->education_type }}</button>
                    </div>
                </div>
                <div class=" grid-text text-chilid1 ">
                    <div class="text-soat">
                        <img src="{{ asset('frontend/upload/soat.svg') }}" alt="">
                        <p>{{ $edu->created_at->diffForHumans() }}</p>
                    </div>
                    <p>{{ $edu->title }}</p>
                </div>
            </div>

        @endforeach
    </div>
</div>    

    <div class="widith-100">
    </div>

@endsection