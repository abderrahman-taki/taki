@extends('layouts.app')

@section('content')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>{!!__('contact_page.title')!!}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- ================ contact section start ================= -->
<section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">{!!__('contact_page.get_touch')!!}</h2>
                </div>
                <div class="col-lg-8">
                    <p>{!!__('contact_page.sentence')!!}</p><br>
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info" style="border-bottom: 1px solid rgb(170, 170, 170); padding-bottom:20px">
                        <div class="media-body">
                            <h2>{!!__('contact_page.help')!!}</h2>
                            <p style="width: 100%">{!!__('contact_page.sentence')!!}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i style="color: #FF4A52" class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>{!!__('contact_page.grp_phone')!!}</h3>
                            <p>{!!__('contact_page.grp_working_hour')!!}</p>
                        </div>
                    </div>
                    <div class="media contact-info" style="border-bottom: 1px solid rgb(170, 170, 170); padding-bottom:20px">
                        <span class="contact-info__icon"><i style="color: #FF4A52" class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>{!!__('contact_page.grp_working_mail')!!}</h3>
                            <p>{!!__('contact_page.send_query')!!}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <div class="media-body">
                            <h2>{!!__('contact_page.social_media')!!}</h2>
                            <br>
                            <div class="socail_links">
                                <a class="contact" href="https://www.facebook.com/profile.php?id=100087286642554">
                                    <i class="ti-facebook" style="margin-right: 20px"></i>
                                </a>
                                <a class="contact" href="#">
                                    <i class="ti-twitter-alt" style="margin-right: 20px"></i>
                                </a>
                                <a class="contact" href="#">
                                    <i class="fa fa-instagram" style="margin-right: 20px"></i>
                                </a>
                                <a class="contact" href="#">
                                    <i class="fa fa-youtube-play" style="margin-right: 20px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ================ contact section end ================= -->

@endsection
