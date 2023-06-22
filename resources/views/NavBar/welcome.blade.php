@extends('layouts.app')

@section('content')

<style>
    a.disabled {
        pointer-events: none;
        color: #ccc;
    }
</style>

<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Homemade With an Extra Pinch of Love</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3 style="margin-left: -150px !important; margin-right: 300px !important;">
                                Make Your Taste Buds Happy
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3 style="margin-bottom: 250px !important; font-size: 90px !important;">
                                Healthy Food Comes From Healthy Ingredients
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_4 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3 style="margin-right: 550px !important; margin-left: -100px !important;">
                                Freshness in <br> every bite
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- slider_area_end -->


<!-- where_togo_area_start  -->
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
                        {{--<div class="input_field">
                            <input type="text" placeholder="Where to go?" name="search">
                        </div>--}}
                        <div class="input_field">
                            <input type="text" placeholder="Type an ingredient" name="ingredient">
                        </div>
                        {{-- <div class="input_field">
                            <select name="type">
                                <option  value="all">Travel type</option>
                                 @foreach($typeSortie as $type)
                                 <option  value="{{$type->nom}}" >{{$type->nom}}</option>
                                 @endforeach
                            </select>
                        </div> --}}
                        <div class="search_btn">
                            <button class="boxed-btn4 " type="submit" >{!!__('welcome_page.search')!!}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- where_togo_area_end  -->

<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>{!!__('welcome_page.popular_meals')!!}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($foods as $food)
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
        </div>
        <div class="row">
            <div class="col">
                <div class="search_btn">
                    <a href="{{route('all_meals',['language'=>app()->getLocale()])}}">
                        <button style="float: right;" class="boxed-btn4 " type="submit" >{!!__('welcome_page.more')!!}</button>
                    </a>
                   
                </div>
            </div>
        </div>
    </div>
</div>


<!-- newletter_area_start  -->
<form action={{route('storeemail',app()->getLocale())}} method="post" enctype="multipart/form-data"  class="probootstrap-form">
    {{ csrf_field() }}
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4>{!!__('newsletter.title')!!}</h4>
                            <p>{!!__('newsletter.sentence')!!}</p>
                        </div>
                    </div>
                        <div class="col-lg-7">
                            <div class="mail_form">
                                <div class="row no-gutters">
                                    <div class="col-lg-9 col-md-8">
                                        <div class="newsletter_field">
                                            <input type="email" placeholder="Your mail" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="newsletter_btn">
                                            <button class="boxed-btn4 " type="submit" >{!!__('newsletter.subscribe')!!}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newletter_area_end  -->
</form>
<!-- popular_destination_area_start  -->
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>{!!__('welcome_page.available_tour')!!}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="https://savory.qodeinteractive.com/wp-content/uploads/2016/10/passepartout-slide1.jpg" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Healthy Ready Meal <a href="{{route('all_meals',app()->getLocale())}}">{!!__('welcome_page.place')!!}</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="{{asset('img/custom.jpeg')}}" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Customize Meal <a href="{{route('cutomize_meals',app()->getLocale())}}">{!!__('welcome_page.place')!!}</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="{{asset('img/pack.jpeg')}}" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Our Packs <a href="{{route('packs',app()->getLocale())}}">{!!__('welcome_page.place')!!}</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->



<div class="video_area video_bg overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video_wrap text-center">
                    <h3>{!!__('welcome_page.video_title')!!}</h3>
                    <div class="video_icon">
                        <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=r1OSDnCDoGQ">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="travel_variation_area">
    <!--<div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="{{asset('img/svg_icon/1.svg')}}" alt="">
                    </div>
                    <h3>{!!__('welcome_page.comfortable_journey')!!}</h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="{{asset('img/svg_icon/2.svg')}}" alt="">
                    </div>
                    <h3>{!!__('welcome_page.comfortable_hotel')!!}</h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="{{asset('img/svg_icon/3.svg')}}" alt="">
                    </div>
                    <h3>{!!__('welcome_page.travel_guide')!!}</h3>
                </div>
            </div>
        </div>
    </div>-->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="http://madang.kenzap.com/wp-content/themes/madang/images/meal.svg" alt="We Deliver Your Meals">
                    </div>
                    <h5>Choose Your Favorite</h5>
                    <p>Choose your favorite meals and order online or by phone. It's easy to customize your order.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="http://madang.kenzap.com/wp-content/themes/madang/images/delivery.svg" alt="We Deliver Your Meals">
                    </div>
                    <h5>We Deliver Your Meals</h5>
                    <p>We prepared and delivered meals arrive at your door.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="http://madang.kenzap.com/wp-content/themes/madang/images/eat-enjoy.svg" alt="Eat and Enjoy">
                    </div>
                    <h5>Eat and Enjoy</h5>
                    <p>No shooping, no cooking, no counting and no cleaning. Enjoy your healthy meals with your family.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- testimonial_area  -->
<!--
<div class="testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="{{asset('img/testmonial/author.png')}}" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Micky Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="{{asset('img/testmonial/author.png')}}" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Tom Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="{{asset('img/testmonial/author.png')}}" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Jerry Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- /testimonial_area  -->

<!--
<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Recent Trips</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="{{asset('img/trip/1.png')}}" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="{{asset('img/trip/2.png')}}" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="{{asset('img/trip/3.png')}}" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->


@endsection


