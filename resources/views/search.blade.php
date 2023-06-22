@extends('layouts.app')

@section('content')

    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_9 overlay" style="height: 300px !important;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3 style="color: #fff">Search For the Meal</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="form_area">
                        <h3>{!!__('welcome_page.search_title')!!}</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="search_wrap">
                        <form class="search_form" action={{route('search',app()->getLocale())}} method="get">
                            {{ csrf_field() }}
                            <div class="input_field">
                                <input type="text" placeholder="Type an ingredient" name="ingredient">
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit" >{!!__('welcome_page.search')!!}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title ">
                        <h3>Search Results with ingredient : {{$search}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            @if(count($foods) > 0)
                @foreach($foods as $food)
                <div class="col-lg-3 col-md-4">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{Storage::url($food->image)}}" alt="">
                        </div>
                        <div > 
                            <div class="place_info">
                                <a href="{{route('detailMeal',['language'=>app()->getLocale(),'slug'=>$food->slug])}}"><h6>{{$food->title}}</h6></a>
                                <h3>{{$food->price}} MAD</h3>
                            </div>
                        </div>
                        <div class="hide" style="width: 20%"> 
                            <div class="search_btn" style="padding-top: 20%;padding-right: 5%;">
                                <a href="{{route('detailMeal',['language'=>app()->getLocale(),'slug'=>$food->slug])}}">                                            
                                    <button style="
                                    margin-bottom: 10px;
                                    margin-left: 55px;" class="boxed-btn10" type="submit" >Select Option</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p style="color: red">{!!__('welcome_page.searchnotfound')!!}</p>
            @endif
            </div>
        </div>
    </div>
@endsection
