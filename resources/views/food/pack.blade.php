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
        <div class="row" style="width: 100%">
            <div style="margin-left: -100px;width: 20%; float:left"> 
                <div class="row">
                    <div class="col" style="border-right: 1px rgb(240, 240, 240) solid">
                        <div class="shop__sidebar">
                            <div class="sidebar__categories">
                                <img src="{{asset('img/GeniFood_v3.png')}}" alt="" style="width: 100%">
                            </div>
                            <div class="row">
                                <h4>Subscribe now for: {{$pack->price}} MAD</h4>
                            </div>
                            <form action={{route('storePack',app()->getLocale())}} method="post" enctype="multipart/form-data"  class="probootstrap-form">
                                {{ csrf_field() }}
                                @include('inc.alert')
                                <input type="text" name="id" value="{{$pack->id}}" hidden>
                                <div class="row">
                                    <div class="col-lg col-md">
                                        <div class="mt-10">
                                            <input type="text" name="first_name" placeholder="First Name"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                                                    class="single-input-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg col-md">
                                        <div class="mt-10">
                                            <input type="text" name="last_name" placeholder="Last Name"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                                                class="single-input-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg col-md">
                                        <div class="mt-10">
                                            <input type="text" name="phone" placeholder="Phone Number"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required
                                            class="single-input-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg col-md">
                                        <div class="mt-10">
                                            <input type="email" name="EMAIL" placeholder="Email address"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail address'" required
                                                class="single-input-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mt-10">
                                            <textarea class="single-textarea single-input-primary" name="Address" placeholder="Address" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Address'" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="mt-10">
                                        <div class="submit_btn">
                                            <button class="boxed-btn4" type="submit">Send Request</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 80%; margin-left: 30px; float: right;">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb_70">
                            <h3>{{$pack->title}}</h3>
                        </div>
                        <div class="section_title text-center mb_70">
                            <p>{{$pack->description}}</p>
                        </div>
                    </div>
                </div> 
                <div class="so-widget-madang_mealplan_widget so-widget-madang_mealplan_widget-default-d75171398898-2470">
                    <section class=" accelerated-weight-loss program-box block select-menu-block">
                        <div class="food-tab wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="container">
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach ($days as $day)
                                    <li role="presentation" class="">
                                        <a href="#accelerated-weight-loss{{$day->title}}" role="tab" data-toggle="tab" class="txhcolor brhcolor">
                                            Day {{$day->title}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-description">
                            <div class="container">
                                <div class="tab-content">
                                    @foreach ($days as $day)
                                    <div role="tabpanel" class="tab-pane fade" id="accelerated-weight-loss{{$day->title}}">
                                        <div class="food-listing-group">
                                            @if ($day->breakfast !=null)
                                            <div class="food-listing-row ">
                                                <div class="food-image">
                                                    <a data-toggle="lightbox" class="lightbox">
                                                        <figure>
                                                            <img width="192" height="132" src="{{Storage::url($day->breakfast->food->image)}}" class="img-responsive" alt="" loading="lazy" sizes="(max-width: 192px) 100vw, 192px">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="food-type">
                                                    <h5>
                                                        <a data-toggle="lightbox" class="lightbox txcolor" href="#">
                                                            Breakfast
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="food-ingredients"> 
                                                    {{$day->breakfast->food->title}}
                                                </div>
                                                <div class="food-category"> 
                                                    <a href="" class="btn bghcolor brhcolor ftag">
                                                        {{$day->breakfast->food->category->title}}
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            @if ($day->lunch !=null)
                                            <div class="food-listing-row ">
                                                <div class="food-image">
                                                    <a data-toggle="lightbox" class="lightbox">
                                                        <figure>
                                                            <img width="192" height="132" src="{{Storage::url($day->lunch->food->image)}}" class="img-responsive" alt="" loading="lazy" sizes="(max-width: 192px) 100vw, 192px">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="food-type">
                                                    <h5>
                                                        <a data-toggle="lightbox" class="lightbox txcolor" href="#">
                                                            Lunch
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="food-ingredients"> 
                                                    {{$day->lunch->food->title}}
                                                </div>
                                                <div class="food-category"> 
                                                    <a href="" class="btn bghcolor brhcolor ftag">
                                                        {{$day->lunch->food->category->title}}
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            @if ($day->dinner !=null)
                                            <div class="food-listing-row ">
                                                <div class="food-image">
                                                    <a data-toggle="lightbox" class="lightbox">
                                                        <figure>
                                                            <img width="192" height="132" src="{{Storage::url($day->dinner->food->image)}}" class="img-responsive" alt="" loading="lazy" sizes="(max-width: 192px) 100vw, 192px">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="food-type">
                                                    <h5>
                                                        <a data-toggle="lightbox" class="lightbox txcolor" href="#">
                                                            Dinner
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="food-ingredients"> 
                                                    {{$day->dinner->food->title}}
                                                </div>
                                                <div class="food-category"> 
                                                    <a href="" class="btn bghcolor brhcolor ftag">
                                                        {{$day->dinner->food->category->title}}
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection



