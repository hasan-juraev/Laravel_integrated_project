@extends('frontend.main_master')

    <!-- banner section -->
    @section('banner')

        @php
            $latest_5 =  App\Models\Blogs::latest()->limit(5)->get();
        @endphp     
        <div class="Container">
                <div class="Hero-1">
                    <div class="Hero-Box1" style="background-image: url({{asset('frontend/upload/news-big1.png') }});">
                        <div class="Box-chilid">
                            <div class="chilid-box1">
                                <button>World</button>
                            </div>
                            <div class="chilid-box2">
                                <p>Sydney, capital of New South Wales and one of Australia's largest cities, is best known for its harbourfront Sydney Opera House, with a distinctive sail-like design</p>
                            </div>
                        </div>
                    </div>
                    <div class="Hero-Box2">
                        <h3>Latest news</h3>
                        <div class="widith"></div>
                        <div class="Text-box">
                            @foreach($latest_5 as $latest)
                            <div class="text-chilid1">
                                <div class="text-soat">
                                    <img src="{{ asset('frontend/upload/soat.svg') }}" alt="image-clock">
                                    <p>{{ $latest->created_at->diffForHumans() }}</p>
                                </div>
                                <a class="link-hover-change-color"  href="{{ route('frontend.blog.details', $latest->id) }}"> {{ $latest->title }} </a>
                            </div>
                            @endforeach


                        </div>
                        
                    </div>
                </div>
            </div>

    @endsection
    <!-- banner section ended -->

@section('main')   

    @section('title')
        News | {{config('app.name')}}
    @endsection

<div class="Box-2">
    <div class="grid-container">
        @foreach($all_news as $news)

            <div class="grid-box">
                <div class="grid-items" style="background-image: url( {{asset($news->image) }} );">
                    <div class="btn-box">
                        <button class="btn-soat">{{ $news['category']['blog_category'] }}</button>
                    </div>
                </div>
                <div class=" grid-text text-chilid1 ">
                    <div class="text-soat">
                        <img src="{{ asset('frontend/upload/soat.svg') }}" alt="">
                        <p>{{ $news->created_at->diffForHumans() }}</p>
                    </div>
                    <a class="link-hover-change-color" href="{{ route('frontend.blog.details', $news->id) }}">{{ $news->title }}</a>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <div class="widith-100">
</div>

@endsection