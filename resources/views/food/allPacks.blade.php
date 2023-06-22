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
        <div class="single_slider  d-flex align-items-center slider_bg_12 overlay" style="height: 70% !important;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popular_places_area" style="padding-top: 55px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Our Packs</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($packs as $pack)
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{Storage::url($pack->image)}}" alt="">
                        </div>
                        <div class="place_info" style="text-align: center;>
                            <a href="{{route('packDetail',['language'=>app()->getLocale(),'slug'=>$pack->slug])}}"><h3>{{$pack->title}}</h3></a>
                        </div>
                        <div class="hide" style="padding-left: 35%;padding-bottom: 14px;"> 
                            <a href="{{route('packDetail',['language'=>app()->getLocale(),'slug'=>$pack->slug])}}">                                            
                                <button style="width: 110px;font-size: 11px;" class="boxed-btn10" type="submit" >More Details</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


