@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/clients.css')}}">

@section('content')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>{!!__('about_us_page.title')!!}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_story">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="story_heading text-center">
                    <h1 style="font-family: 'Nothing You Could Do', cursive;">{!!__('about_us_page.welcome')!!}</h1>
                    <h2>{!!__('about_us_page.sentence1')!!}</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 bg-about" style="height: 300px">
                        </div>
                    </div>
                </div>
                <div class="container grid-container col-lg-12">
                    <div class="row">
                        <div class="grid1 col-lg-8" style="text-align: justify; text-justify: inter-word;">
                            {!!__('about_us_page.sentence2')!!}
                        </div>
                        <div class="grid2 col-lg-4">
                            <div class="grid2-1">
                                <p>{!!__('about_us_page.sentence3')!!}</p>
                            </div>
                            <div class="grid2-2">
                                <p>{!!__('about_us_page.sentence4')!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin-top: 50px">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7 grid3"></div>
                            <div class="col-lg-5 grid4">
                                <div class="grid4-1">
                                    <div>
                                        <h2 style="text-decoration: underline; color:black">{!!__('contact_page.title')!!}</h2><br>
                                        <i class="fa fa-phone" style="margin-right: 10px"></i> {!!__('contact_page.grp_phone')!!} <br>
                                        <i class="fa fa-envelope" style="margin-right: 10px"></i>{!!__('contact_page.grp_working_mail')!!}
                                    </div>
                                    <div style="margin-top: 100px">
                                        <h2 style="text-decoration: underline; color:black">{!!__('about_us_page.connect_to')!!}</h2><br>
                                        <div class="socail_links">
                                            <ul>
                                                <li>
                                                    <a href="https://www.facebook.com/North-Explorer-103831341569672">
                                                        <i class="ti-facebook" style="margin-right: 20px"></i>Geni Fresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="ti-twitter-alt" style="margin-right: 20px"></i>Geni Fresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/northexploreragency/">
                                                        <i class="fa fa-instagram" style="margin-right: 20px"></i>genifreshagency
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.youtube.com/channel/UCrbUHzXnopp4FG6O_1BmGCA">
                                                        <i class="fa fa-youtube-play" style="margin-right: 20px"></i>Geni Fresh
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="row" style="margin-top: 70px; border-top: 1px solid rgb(173, 173, 173);">
                    <div class="col-lg-11 offset-lg-1">
                        <div class="counter_wrap">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3  class="counter">100</h3>
                                        <p>Tour has done successfully</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3 class="counter">100</h3>
                                        <p>Yearly tour arrange</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3 class="counter">100</h3>
                                        <p>Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="client-wrap">
                    <div class="section_title text-center mb_70">
                        <h3>Our clients</h3>
                        <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                    </div>
                    <div class="client google">
                        <div class="client-more-less"></div>
                        <div class="client-meta">
                            <div class="client-close"></div>
                            <ul class="project-list">
                                <hr class="bar">
                                <h4 class="client-title">Google</h4>
                                <li>Description</li>
                            </ul>
                        </div>
                        <div class="overflow-wrapper">
                            <img data-src="http://lorempixel.com/300/250/business">
                            <img data-src="http://lorempixel.com/300/250/technics">
                            <img data-src="http://lorempixel.com/300/250/nature">
                            <img data-src="http://lorempixel.com/300/250/city">
                            <img data-src="http://lorempixel.com/300/250/transport">
                            <img data-src="http://lorempixel.com/300/250/business">
                            <img data-src="http://lorempixel.com/300/250/technics">
                            <img data-src="http://lorempixel.com/300/250/nature">
                            <img data-src="http://lorempixel.com/300/250/city">
                            <img data-src="http://lorempixel.com/300/250/transport">
                        </div>
                        <img class="client-logo" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg">
                    </div>

                    <div class="client microsoft">
                        <div class="client-more-less"></div>
                        <div class="client-meta">
                            <div class="client-close"></div>
                            <ul class="project-list">
                                <hr class="bar">
                                <h4 class="client-title">LG Corporation</h4>
                                <li>Description</li>
                            </ul>
                        </div>
                        <div class="overflow-wrapper">
                            <img data-src="http://lorempixel.com/300/250/business">
                            <img data-src="http://lorempixel.com/300/250/city">
                            <img data-src="http://lorempixel.com/300/250/nature">
                            <img data-src="http://lorempixel.com/300/250/technics">
                            <img data-src="http://lorempixel.com/300/250/transport">
                        </div>
                        <img class="client-logo smaller" src="https://upload.wikimedia.org/wikipedia/commons/b/bf/LG_logo_%282015%29.svg">
                    </div>

                      <div class="client logitech">
                        <div class="client-more-less"></div>
                        <div class="client-meta">
                            <div class="client-close"></div>
                            <ul class="project-list">
                                <hr class="bar">
                                <h4 class="client-title">Logitech</h4>
                                <li>Description</li>
                            </ul>
                        </div>
                        <div class="overflow-wrapper">
                            <img data-src="http://lorempixel.com/300/250/business">
                            <img data-src="http://lorempixel.com/300/250/technics">
                            <img data-src="http://lorempixel.com/300/250/nature">
                            <img data-src="http://lorempixel.com/300/250/city">
                            <img data-src="http://lorempixel.com/300/250/transport">
                        </div>
                        <img class="client-logo" src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Logitech_logo.png">
                    </div>

                    <div class="client amd">
                        <div class="client-more-less"></div>
                        <div class="client-meta">
                            <div class="client-close"></div>
                            <ul class="project-list">
                                <hr class="bar">
                                <h4 class="client-title">AMD</h4>
                                <li>Description</li>
                            </ul>
                        </div>
                        <div class="overflow-wrapper">
                            <img data-src="http://lorempixel.com/300/250/business">
                            <img data-src="http://lorempixel.com/300/250/technics">
                            <img data-src="http://lorempixel.com/300/250/nature">
                            <img data-src="http://lorempixel.com/300/250/city">
                            <img data-src="http://lorempixel.com/300/250/transport">
                        </div>
                        <img class="client-logo" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/AMD_Logo.svg">
                      </div>

                      <div class="client skype">
                        <div class="client-more-less"></div>
                        <div class="client-meta">
                            <div class="client-close"></div>
                            <ul class="project-list">
                                <hr class="bar">
                                <h4 class="client-title">Skype</h4>
                                <li>Description</li>
                          </ul>
                        </div>
                        <div class="overflow-wrapper">
                            <img data-src="http://lorempixel.com/300/250/business">
                            <img data-src="http://lorempixel.com/300/250/technics">
                            <img data-src="http://lorempixel.com/300/250/nature">
                            <img data-src="http://lorempixel.com/300/250/city">
                            <img data-src="http://lorempixel.com/300/250/transport">
                        </div>
                        <img class="client-logo smaller" src="https://upload.wikimedia.org/wikipedia/commons/a/a7/Skype_logo.svg">
                      </div>

                    </div>
                -->
            </div>
        </div>
    </div>
</div>


@endsection

<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"> </script>

