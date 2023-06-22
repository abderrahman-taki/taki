<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 ">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('img/GeniFood.png')}}" alt="" style="width: 70%">
                            </a>
                        </div>

                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a style="font-size: 2em;" href="https://www.facebook.com/profile.php?id=100087286642554">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a style="font-size: 2em; margin-left: 20px" href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a style="font-size: 2em; margin-left: 20px" href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a style="font-size: 2em; margin-left: 20px" href="#">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            {!!__('footer_nav.quick_links')!!}
                        </h3>
                        <ul class="links">
                            <li><a href="{{route('about',app()->getLocale())}}">{!!__('header_navbar.about')!!}</a></li>
                            <li><a href="{{route('contact',app()->getLocale())}}"> {!!__('footer_nav.contact')!!}</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Services
                        </h3>
                        <ul class="links double_links">
                            <li><a href="{{route('all_meals',app()->getLocale())}}">Healthy Ready Meals</a></li>
                            <li><a href="{{route('cutomize_meals',app()->getLocale())}}">Customize Meal</a></li>
                            <li><a href="{{route('packs',app()->getLocale())}}">Packs</a></li>
                        </ul>
                    </div>
                    <div class="footer_widget" style="margin-top: 250px">
                        <h3 class="footer_title">
                            {!!__('contact_page.title')!!}
                        </h3>
                        <ul class="links">
                            <li><i class="fa fa-phone" style="margin-right: 10px"></i> {!!__('contact_page.grp_phone')!!}</li>
                            <li><i class="fa fa-envelope"></i> {!!__('contact_page.grp_working_mail')!!}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Instagram
                        </h3>
                        <div class="instagram_feed">
                            <div class="row">
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/1.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/2.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/3.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/4.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/5.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/6.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/7.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/8.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset('img/instagram/9.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
