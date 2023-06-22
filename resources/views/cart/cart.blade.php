@extends('layouts.app')

@section('content')

<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_11 overlay" style="height: 350px !important;">
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
    <div class="popular_places_area">
        <div class="container">
            @if(count($listCarts) > 0)
            <div class="row">
                <div class="col">
                    <div class="section_title ">
                        <h3>Total price : {{$total_price}} MAD</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($listCarts as $listCart)
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{Storage::url($listCart->food->image)}}" alt="">
                        </div>
                        <div style="width: 80%; float:left"> 
                            <div class="place_info">
                                <a href="#"><h3>{{$listCart->food->title}}</h3></a>
                                <label>{{$listCart->food->price}} MAD</label>
                                <h3>Quantity : {{$listCart->prod_qty}}</h3>
                                <h3>Total: {{$listCart->food->price * $listCart->prod_qty}} MAD</h3>
                            </div>
                        </div>
                        <div style="width: 20%;"> 
                            <div class="search_btn" style="padding-top: 20%;">
                                <a href="{{route('removeItem',['language'=>app()->getLocale(),'id'=>$listCart->id])}}">                                            
                                    <button class="boxed-btn11" type="submit" style="
                                    margin-bottom: 10px;
                                    margin-left: 100px;
                                ">Remove</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p style="color: red">Sorry, but it seems that your cart list is empty</p>
            @endif
            </div>
            @if(count($listCarts) > 0)
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact_join">
                        <form action={{route('storeOrder',app()->getLocale())}} method="post" enctype="multipart/form-data"  class="probootstrap-form">
                            {{ csrf_field() }}
                            @include('inc.alert')
                            <input type="text" name="total_price" value="{{$total_price}}" hidden>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-10">
                                        <input type="text" name="first_name" placeholder="First Name"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"  required
                                            class="single-input-primary">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-10">
                                        <input type="text" name="last_name" placeholder="Last Name"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                                                class="single-input-primary">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-10">
                                        <input type="text" name="phone" placeholder="Phone Number"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required
                                            class="single-input-primary">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-10">
                                        <input type="email" name="EMAIL" placeholder="Email address"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail address'" required
                                                class="single-input-primary">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-10">
                                        <textarea class="single-textarea single-input-primary" placeholder="Adress" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Adress'" name="Adress" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-group-icon mt-10">
                                        <div class="form-select" id="default-select">
                                            <select name="payment" class="participant">
                                            <option value="0"> Select an option </option>
                                            <option value="1">Online Payment</option>
                                            <option value="2">Payment On Delivery</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                                <div class="col-lg-12">
                                    <div class="mt-10">
                                        <div class="submit_btn">
                                            <button class="boxed-btn4" type="submit">Order Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
            @endif
        </div>
    </div>
@endsection
