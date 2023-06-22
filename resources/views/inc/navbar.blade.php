<style>
    .nice-select{
        width: 100%!important;
    }
</style>

<div class="header-area" style="z-index: 999">
    <div id="sticky-header" class="main-header-area">
        <div class="container-fluid">
            <div class="header_bottom_border">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('img/GeniFoodNav.png')}}" alt="" style="width: 70%; height:50px">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="{{route('home',app()->getLocale())}}">{!!__('header_navbar.home')!!}</a></li>
                                    <li><a href="{{route('about',app()->getLocale())}}">{!!__('header_navbar.about')!!}</a></li>
                                    <li><a href="#">Services <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="{{route('all_meals',app()->getLocale())}}">Healthy Ready Meals</a></li>
                                            <li><a href="{{route('cutomize_meals',app()->getLocale())}}">Customize Meal</a></li>
                                            <li><a href="{{route('packs',app()->getLocale())}}">Packs</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                                <a href="{{route('listCart',['language'=>app()->getLocale()])}}" class="cart-btn pull-right transition-none brcolor bghcolor brhcolor">
                                    <i class="fa fa-shopping-cart transition-none txcolor"></i>
                                    <span class="cart-count transition-none">{{$countCart}}</span>
                                    <span class="cart-text transition-none">Items</span>
                                </a>
                    </div>
                    <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                        <a class="flag" href="" style="padding-right:10px;"><img src="{{asset('img/flags/flag-uk.png')}}"/></a>
                        <a class="flag" href="" style="padding-right:10px;"><img src="{{asset('img/flags/flag-fr.png')}}"/></a>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header>
<!-- header-end -->


