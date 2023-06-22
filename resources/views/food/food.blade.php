@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/destination-slider.css')}}">

@section('content')

@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
<hr>
<!-- slider_area_start -->
<div class="text-center destination-titre" style="margin-bottom: 100px; margin-top:100px">
    <p>{{$food->title}}</p>
</div>
<form  action="{{route('addToCart',app()->getLocale())}}" method="post" enctype="multipart/form-data"  class="probootstrap-form">
  {{ csrf_field() }}
<div class="container" style="margin-bottom: 50px; margin-top:50px;">
    <div class="row">
        <div class="slider_area col-lg-6">
            <div class="slider_active owl-carousel">
                <div class="single_slider  d-flex align-items-center overlay" style="background-image: url('/storage/{{$food->image}}'); height: 500px;">
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

        <div class="blog_area destination col-lg-6">
            <div class="destination_info">
              <blockquote class="generic-blockquote">
                <div class="price">
                  <input type="text" name="id" value="{{$food->id}}" hidden>
                  <span><b><i class="fa fa-hourglass-start"></i></b> Category : {{$category->title}} <br>
                  <span><b><i class="fa fa-hourglass-end"></i></b>  Ingredients :
                    @foreach ($ingredients as $ingredient)
                      @foreach ($food_ingredients as $food_ingredient)
                        @if ($food_ingredient->food_id == $food->id && $food_ingredient->ingredient_id == $ingredient->id)
                          {{$ingredient->title}} ,
                        @endif
                      @endforeach
                    @endforeach <br>
                  <span><b><i class="fa fa-hourglass-start"></i></b> Calories : {{$food->calories}} <br>
                  <span><b><i class="fa fa-hourglass-start"></i></b> Proteins : {{$food->proteins}} <br>
                  <span><b><i class="fa fa-hourglass-start"></i></b> Fats : {{$food->fats}} <br>
                  <span><b><i class="fa fa-hourglass-start"></i></b> Carbohydrates : {{$food->carbohydrates}} <br>
                  <span><b><i class="fa fa-money"></i></b> Price : <span id="prix">{{$food->price}}</span>  MAD</span><br>
                </div>
              </blockquote>
            </div>
            <div class="destination_info">
              {{$food->description}}
            </div>

            <div class="blog_details" style="
            height: 30%;">
              <div style="width: 50%; float:left"> 
                <label>Choose your Quantity :</label>
                <input type="number" id="quantity" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                
              </div>
              <div style="width: 50%; float:left"> 
                <label></label>
                <div class="submit_btn">
                  <button class="boxed-btn4" type="submit"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
                </div>
                    </div>
              
            </div>

        </div>

    </div>
</div>
<hr>
</form>
<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Other Meals</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($tops as $top)
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="{{Storage::url($top->image)}}" alt="">
                    </div>
                    <div class="place_info">
                        <a href="{{route('detailMeal',['language'=>app()->getLocale(),'slug'=>$top->slug])}}"><h3>{{$top->title}}</h3></a>
                        <p>{!!__('welcome_page.region')!!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Beach slider End -->

@endsection


<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"> </script>
<script src=" https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"> </script>

<script>
(function ($) {
  $(function () {
    var slider = $(".slider").flickity({
      imagesLoaded: true,
      percentPosition: false,
      initialIndex: 1,
      cellAlign: "center",
      contain: true,
      wrapAround: false,
      lazyLoad: false,
      pageDots: false,
      groupCells: 1,
      selectedAttraction: 0.2,
      friction: 0.8,
      draggable: true,
      prevNextButtons: false
    });

    //enable clicking on cards
    slider.on("staticClick.flickity", function (
      event,
      pointer,
      cellElement,
      cellIndex
    ) {
      if (typeof cellIndex == "number") {
        slider.flickity("selectCell", cellIndex);
      }
    });

    var flkty = slider.data("flickity");
    flkty.resize();
    flkty.reposition();

    flkty.on("settle", () => {
      flkty.resize();
      flkty.reposition();
    });

    $(".previous").on("click", function () {
      $(".slider").flickity("previous");
    });

    $(".next").on("click", function () {
      $(".slider").flickity("next");
    });

    function updateContent() {
      var i = flkty.selectedIndex;
      if (i == 1 || i == 2 || i == 3) {
        $(".paper1").removeClass("invisible");
        $(".paper2").removeClass("invisible");
      } else if (i == 0) {
        $(".paper1").addClass("invisible");
      } else if (i == 4) {
        $(".paper2").addClass("invisible");
      }
    }
    updateContent();
    slider.on("change.flickity", updateContent);
  });
})(jQuery);

var faPrev = {
  prefix: "fac",
  iconName: "prev",
  icon: [
    100,
    100,
    [],
    null,
    "M80.61,48.83H22.7L51.07,20.46a1.18,1.18,0,0,0,0-1.65,1.16,1.16,0,0,0-1.65,0L19.05,49.18h0l-.83.82.83.82h0L49.42,81.19a1.14,1.14,0,0,0,.82.34,1.16,1.16,0,0,0,.83-.34,1.18,1.18,0,0,0,0-1.65L22.7,51.17H80.61a1.17,1.17,0,0,0,0-2.34Z"
  ]
};

var faNext = {
  prefix: "fac",
  iconName: "next",
  icon: [
    100,
    100,
    [],
    null,
    "M81,50.83l.82-.83L81,49.18h0L50.58,18.81a1.16,1.16,0,0,0-1.65,0,1.18,1.18,0,0,0,0,1.65L77.31,48.83H19.39a1.17,1.17,0,0,0,0,2.34H77.31L48.93,79.54a1.18,1.18,0,0,0,0,1.65,1.18,1.18,0,0,0,1.66,0L81,50.83Z"
  ]
};

FontAwesome.library.add(faPrev, faNext);

</script>
