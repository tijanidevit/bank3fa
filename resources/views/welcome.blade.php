@extends('layout.app')

@section('title')
    Landing Page
@endsection

@section('body')
<section id="home" class="main-slider main-slider-style2">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
        "effect": "fade",
        "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 5000
        }}'>
        <div class="swiper-wrapper">

            <!--Start Single Swiper Slide-->
            <div class="swiper-slide">
                <div class="content-layer">
                    <div class="main-slider-content">
                        <div class="main-slider-content__inner">
                            <div class="big-title">
                                <h2>Providing<br> the best future<br> for your best <br> living.</h2>
                            </div>
                            <div class="text">
                                <p>
                                    Don't just make a deposit, make an investment today.
                                </p>
                            </div>
                            <div class="btns-box">
                                <a class="btn-one" href="#">
                                    <span class="txt">
                                        Read More
                                    </span>
                                </a>
                                <a class="btn-one style2" href="#">
                                    <span class="txt">
                                        Check Eligibility
                                    </span>
                                </a>
                            </div>
                            <div class="bottom-text">
                                <p><span>*</span> In a free hour, when our power.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-layer" style="background-image: url(assets/images/slides/slide-v2-1.jpg);">
                    <!--Start Slide Single Features-->
                    <div class="slide-single-features one">
                        <span class="icon-accept"></span>
                        <h3>From 6.65% p.a</h3>
                    </div>
                    <!--End Slide Single Features-->
                    <!--Start Slide Single Features-->
                    <div class="slide-single-features two">
                        <span class="icon-accept"></span>
                        <h3>High Repayment Tenure </h3>
                    </div>
                    <!--End Slide Single Features-->
                </div>
            </div>
            <!--End Single Swiper Slide-->

            <!--Start Single Swiper Slide-->
            <div class="swiper-slide">
                <div class="content-layer">
                    <div class="main-slider-content">
                        <div class="main-slider-content__inner">
                            <div class="big-title">
                                <h2>Prestige bank<br> makes access to<br> savings fast & <br> simple.</h2>
                            </div>
                            <div class="text">
                                <p>
                                    We help businesses and customers achieve more.
                                </p>
                            </div>
                            <div class="btns-box">
                                <a class="btn-one" href="#">
                                    <span class="txt">
                                        Read More
                                    </span>
                                </a>
                                <a class="btn-one style2" href="#">
                                    <span class="txt">
                                        Check Eligibility
                                    </span>
                                </a>
                            </div>
                            <div class="bottom-text">
                                <p><span>*</span> In a free hour, when our power.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="image-layer" style="background-image: url(assets/images/slides/slide-v2-2.jpg);">
                    <!--Start Slide Single Features-->
                    <div class="slide-single-features one">
                        <span class="icon-accept"></span>
                        <h3>6.5k Personal Account</h3>
                    </div>
                    <!--End Slide Single Features-->
                    <!--Start Slide Single Features-->
                    <div class="slide-single-features two">
                        <span class="icon-accept"></span>
                        <h3>14.2k Corporate Account</h3>
                    </div>
                    <!--End Slide Single Features-->
                </div>
            </div>
            <!--End Single Swiper Slide-->

            <!--Start Single Swiper Slide-->
            <div class="swiper-slide">
                <div class="content-layer">
                    <div class="main-slider-content">
                        <div class="main-slider-content__inner">
                            <div class="big-title">
                                <h2>Bank with<br> the happiest<br> employees in the <br> country.</h2>
                            </div>
                            <div class="text">
                                <p>
                                    We help businesses and customers achieve more.
                                </p>
                            </div>
                            <div class="btns-box">
                                <a class="btn-one" href="#">
                                    <span class="txt">
                                        Read More
                                    </span>
                                </a>
                                <a class="btn-one style2" href="#">
                                    <span class="txt">
                                        Check Eligibility
                                    </span>
                                </a>
                            </div>
                            <div class="bottom-text">
                                <p><span>*</span> In a free hour, when our power.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-layer" style="background-image: url(assets/images/slides/slide-v2-3.jpg);">
                    <!--Start Slide Single Features-->
                    <div class="slide-single-features one">
                        <span class="icon-accept"></span>
                        <h3>86 Branches In Country</h3>
                    </div>
                    <!--End Slide Single Features-->
                    <!--Start Slide Single Features-->
                    <div class="slide-single-features two">
                        <span class="icon-accept"></span>
                        <h3>1.6k On Role Employees</h3>
                    </div>
                    <!--End Slide Single Features-->
                </div>
            </div>
            <!--End Single Swiper Slide-->

            <!-- If we need navigation buttons -->
            <div class="main-slider__nav main-slider__nav--style2">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                    <i class="icon-chevron left"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-chevron right"></i>
                </div>
            </div>

        </div>
    </div>
</section>


<section id="about" class="intro-style1-area" style="background-color: #f5f8f7;">
    <div class="container">
        <div class="row">

            <div class="col-xl-6">
                <div class="intro-style1-video-gallery">
                    <div class="intro-style1-video-gallery-bg"
                        style="background-image: url(assets/images/resources/intro-style1-video-gallery.jpg);">
                    </div>
                    <div class="intro-video-gallery-style1">
                        <div class="icon wow zoomIn animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <a class="video-popup" title="Video Gallery"
                                href="https://www.youtube.com/watch?v=06dV9txztKY">
                                <span class="icon-play-button-1"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="intro-style1-content-box">
                    <div class="sec-title">
                        <h2>Known for Trust,<br> Honesty & Customer<br> Support</h2>
                    </div>
                    <div class="text">
                        <p>Belongs to those who fail in their duty through weakness of will, which is
                            the same as saying through shrinking from toil and pain. These cases are
                            perfectly simple and easy to distinguish.</p>

                        <p>Choice is untrammelled and when nothing prevents our being able to do
                            what we like best every pleasure is to be welcomed. </p>
                    </div>

                    <div class="row">
                        <!--Start Intro Style1 Single Box-->
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="intro-style1-single-box">
                                <div class="img-box">
                                    <div class="img-box-inner">
                                        <img src="assets/images/resources/intro-style1-1.jpg" alt="">
                                    </div>
                                    <div class="overlay-text">
                                        <h3>Our Journey</h3>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">For Over Four Decades Our Bank</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End Intro Style1 Single Box-->
                        <!--Start Intro Style1 Single Box-->
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="intro-style1-single-box">
                                <div class="img-box">
                                    <div class="img-box-inner">
                                        <img src="assets/images/resources/intro-style1-2.jpg" alt="">
                                    </div>
                                    <div class="overlay-text">
                                        <h3>Our Team</h3>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Passion & Professional Management</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End Intro Style1 Single Box-->
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section id="service" class="locker-facility-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="locker-facility-highlights">
                    <div class="single-box one">
                        <div class="icon">
                            <span class="icon-checkbox-mark"></span>
                        </div>
                        <p>Choose your locker sizes</p>
                    </div>
                    <div class="single-box two">
                        <div class="icon">
                            <span class="icon-checkbox-mark"></span>
                        </div>
                        <p>Book from anywhere</p>
                    </div>
                    <div class="single-box three">
                        <div class="icon">
                            <span class="icon-checkbox-mark"></span>
                        </div>
                        <p>Facility of Nomination</p>
                    </div>
                    <div class="img-box">
                        <div class="inner">
                            <img class="float-bob-y" src="assets/images/resources/locker-facility.png" alt="">
                            <div class="icon">
                                <span class="icon-protection"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span><span class="path5"></span><span
                                        class="path6"></span><span class="path7"></span><span
                                        class="path8"></span><span class="path9"></span><span
                                        class="path10"></span><span class="path11"></span><span
                                        class="path12"></span><span class="path13"></span><span
                                        class="path14"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="locker-facility-text-box">
                    <div class="sec-title">
                        <h2>Best Locker<br> Facility For Your<br> Valuables</h2>
                    </div>
                    <div class="text-box">
                        <p>Perfectly simple and easy to distinguish. In a free
                            hour when our power off choices is untrammelled
                            best pleasure is to be welcomed every pleasures
                            to be welcomed every avoided.</p>
                    </div>
                    <div class="btns-box">
                        <a class="btn-one" href="#">
                            <span class="txt">Online Booking</span>
                        </a>
                    </div>
                    <div class="faq-question-btn">
                        <div class="icon">
                            <span class="icon-faq"></span>
                        </div>
                        <p>Have queries? Click below link</p>
                        <a href="#"><span class="icon-right-arrow"></span>faq's</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="facts" class="facts-area">
    <div class="facts-area-bg" style="background-image: url(assets/images/backgrounds/facts-area-bg.jpg);">
    </div>
    <div class="container">
        <div class="sec-title text-center">
            <h2>Few Interesting Numbers</h2>
            <div class="sub-title">
                <p>Numbers that speak about banking service.</p>
            </div>
        </div>
        <div class="row">
            <!--Start Single Fact Box-->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="single-fact-box">
                    <div class="icon">
                        <span class="icon-bank"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span
                                class="path11"></span><span class="path12"></span><span
                                class="path13"></span><span class="path14"></span><span
                                class="path15"></span><span class="path16"></span></span>
                    </div>
                    <div class="text">
                        <h3>Our Network</h3>
                        <p>86 Branches around the country</p>
                    </div>
                </div>
            </div>
            <!--End Single Fact Box-->

            <!--Start Single Fact Box-->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="single-fact-box">
                    <div class="icon">
                        <span class="icon-expert"><span class="path1"></span><span class="path2"></span></span>
                    </div>
                    <div class="text">
                        <h3>Customers</h3>
                        <p>More than 1.5 illion customers</p>
                    </div>
                </div>
            </div>
            <!--End Single Fact Box-->

            <!--Start Single Fact Box-->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="single-fact-box">
                    <div class="icon">
                        <span class="icon-human"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span
                                class="path11"></span><span class="path12"></span><span
                                class="path13"></span><span class="path14"></span><span
                                class="path15"></span></span>
                    </div>
                    <div class="text">
                        <h3>Employee</h3>
                        <p>1.6k professional employees</p>
                    </div>
                </div>
            </div>
            <!--End Single Fact Box-->

            <!--Start Single Fact Box-->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="single-fact-box">
                    <div class="icon">
                        <span class="icon-money-bag"><span class="path1"></span><span
                                class="path2"></span></span>
                    </div>
                    <div class="text">
                        <h3>Loans Disbursed</h3>
                        <p>45.6 Cr loans for 258 customers</p>
                    </div>
                </div>
            </div>
            <!--End Single Fact Box-->

        </div>
    </div>
</section>
@endsection
