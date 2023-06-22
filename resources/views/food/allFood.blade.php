@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/foodMenu.css')}}">

@section('content')

<style>
    a.disabled {
        pointer-events: none;
        color: #ccc;
    }
</style>

<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_8 overlay" style="height: 70% !important;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Our Delicious Meals</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popular_places_area" style="padding-top: 55px;">
    <div class="container">
        <div class="row" style="width: 100%">
            <div style="margin-left: -150px;width: 20%; float:left"> 
                <div class="row">
                    <div class="col" style="border-right: 1px rgb(240, 240, 240) solid">
                        <div class="shop__sidebar">
                            <div class="sidebar__categories">
                                <img src="{{asset('img/GeniFood_v3.png')}}" alt="" style="width: 100%">
                            </div>
                            <div class="sidebar__categories">
                                <div class="section-title">
                                    <h4>Filter by Categories</h4>
                                </div>
                                <div class="categories__accordion">
                                    <div class="accordion" id="accordionExample">
                                        <a href="{{route('all_meals',['language'=>app()->getLocale()])}}">All Meals</a>
                                        @foreach ($categories as $category)
                                        <div class="card" style="background-color: #F8FAFD !important;">
                                            <a href="{{route('all_meals_category',['language'=>app()->getLocale(),'id'=>$category->id])}}">{{$category->title}}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 80%; margin-left: 30px; float: right; padding-left: 100px;"> 
                <div class="row">
                    @foreach ($foods as $food)
                        <div class="col-lg-4 col-md-6">
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
                                            <button style="width: 110px;font-size: 11px;
                                            margin-bottom: 10px;
                                            margin-left: 65px;" class="boxed-btn10" type="submit" >Select Option</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


