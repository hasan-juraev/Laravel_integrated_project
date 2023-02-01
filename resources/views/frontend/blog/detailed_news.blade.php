@extends('frontend.main_master')

@section('title')
    News | {{config('app.name')}}
@endsection
    <!-- banner section -->
    @section('banner')
       
      

        <div class="center-text">
            <h1> {{ $blog_details->title }} </h1>            
        </div>
        <div class="center-text"><h3 class="newscateory"> {{ $blog_details['category']['blog_category'] }} </h3></div>

        

        <div class="Hero">
            <div class="container-single-page">

                <div class="chilid-box1">
                    <img src="{{ asset($blog_details->image) }}" alt="image">
                </div>
               
                <div class="box-2-single-page">

                    <div class="box2-chilid1">
                        <div>              
                           
                        </div>                       
                    </div>


                    <div class="box2-chilid2">

                        <div class="box-2chilid1-img">
                            @foreach($all_blogs as $single_news)
                            <div>
                                <img style="width: 60px;" src="{{asset($single_news->image) }}" alt="image">
                            </div>
                            @endforeach
                        </div>

                        <div class="box-2chilid1-text">

                            @foreach($all_blogs as $single_news)
                            <a class="link-hover-change-color"  href="{{ route('frontend.blog.details', $single_news->id) }}">
                                <div>
                                <p>{{ $single_news->title }} </p>
                                <p>{{ $single_news['category']['blog_category'] }}</p>
                                </div>
                            </a>
                            @endforeach

                        </div>
                    </div>
                </div>
                
            </div>
            <div class="posted-at">Posted: {{ $blog_details->created_at->diffForHumans() }} </div>

        </div>
     
    @endsection
    <!-- banner section ended -->

@section('main')   

   
    <div class="menu-2">
        <div class="conatainer-2">
            <div class="container-h1">
                <h3> About {{ $blog_details->title }} </h3>
            </div>
            <p class="menu-text-p">
                {!! $blog_details->blog_description !!}
                      <!-- tags -->
        <span class="tags">Tags: {{ $blog_details->blog_tags }} </span>
            </p>
        </div>
        
  
    </div>
    <div class="widith-100">
    </div>



@endsection