@extends('layouts.web.master')

@section('content')
<main class="home-wrapper overflow-hidden">
    <section class="hero position-relative z-1 hero--atmospheric">
        <div class="hero-atmosphere" aria-hidden="true"></div>
        <img src="{{asset('imgs/purple-shade-01.png')}}" alt="purple-shade" class="purple-shade position-absolute">
        <img src="{{asset('imgs/shade-01.png')}}" alt="shade-01" class="banner-shade-01 position-absolute">
        <!-- <img src="{{asset('imgs/grid-bg.png')}}" alt="grid-bg" class="grid-bg position-absolute"> -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="hero-content text-center">
                        <h1 class="sec-title mb-3">Meet. <span>Explore.</span> Experience
                            All in One Place.</h1>
                        <p class="para mb-4">
                            Wandr brings people, events, travel, and real-world experiences together in one seamless digital platform.
                        </p>
                        <a href="#" class="btn btn--primary">Explore Features</a>
                    </div>
                </div>
                <div class="position-relative group-avatars-wrapper">
                    <!-- <div class="avatars">
                        <img src="{{asset('imgs/avatars/1.png')}}" alt="avatar-01" class="avatar avatar-1">
                        <img src="{{asset('imgs/avatars/1.png')}}" alt="avatar-01" class="avatar avatar-2">
                        <img src="{{asset('imgs/avatars/1.png')}}" alt="avatar-01" class="avatar avatar-3">
                        <img src="{{asset('imgs/avatars/1.png')}}" alt="avatar-01" class="avatar avatar-4">
                        <img src="{{asset('imgs/avatars/1.png')}}" alt="avatar-01" class="avatar avatar-5">
                        <img src="{{asset('imgs/avatars/1.png')}}" alt="avatar-01" class="avatar avatar-6">
                        <img src="{{asset('imgs/avatars/1.png')}}" alt="avatar-01" class="avatar avatar-7">
                    </div> -->
                    <img src="{{asset('imgs/group-avatars.png')}}" alt="hero-img" class="group-avatars">
                    <div class="hero-globe-layer">
                        <img src="{{asset('imgs/updated-globe.gif')}}" alt="globe" class="globe">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="suggested-matches-sec position-relative">
        <div class="container">
            <div class="col-12">
                <div class="d-flex justify-content-center screen-img-wrapper">
                    <img src="{{asset('imgs/screen.png')}}" alt="suggested-matches-bg" class="suggested-matches-bg">
                    <img src="{{asset('imgs/screen-bg.png')}}" alt="screen-bg" class="screen-bg">
                </div>
            </div>
        </div>
    </section>
    <section class="what-is-wandr-sec gap-y-100 js-what-is-wandr" aria-labelledby="what-is-wandr-heading">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h2 class="sec-title-md" id="what-is-wandr-heading">What is Wandr?</h2>
                    <p class="para what-is-wandr-sec__body js-what-is-wandr-body">
                        Wandr is a next-generation digital platform that merges social connection, lifestyle discovery, and real-world experiences into one unified ecosystem.
                    </p>
                    <div class="border-1"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="key-features-sec gap-b-100">
        <div class="row justify-content-center">
            <div class="col-12 mb-80">
                <h2 class="sec-title mb-5 text-center">Key <span>Features</span></h2>
                <div class="key-features-slider">
                    <div class="features-card">
                        <div class="features-card-img-wrapper">
                            <img src="{{asset('imgs/key-features/1.png')}}" alt="">
                        </div>
                        <div class="features-card-content">
                            <h4 class="hd-md mb-2">Social Connection</h4>
                            <p class="para">
                                Start conversations naturally with secure text and video chat.
                            </p>
                        </div>
                    </div>
                    <div class="features-card">
                        <div class="features-card-img-wrapper">
                            <img src="{{asset('imgs/key-features/2.png')}}" alt="">
                        </div>
                        <div class="features-card-content">
                            <h4 class="hd-md mb-2">Event Discovery</h4>
                            <p class="para">
                                Find local events tailored to your interests and availability.
                            </p>
                        </div>
                    </div>
                    <div class="features-card">
                        <div class="features-card-img-wrapper">
                            <img src="{{asset('imgs/key-features/3.png')}}" alt="">
                        </div>
                        <div class="features-card-content">
                            <h4 class="hd-md mb-2">Travel & Experiences</h4>
                            <p class="para">
                                Book trips, activities, and getaways without leaving the platform.
                            </p>
                        </div>
                    </div>
                    <div class="features-card">
                        <div class="features-card-img-wrapper">
                            <img src="{{asset('imgs/key-features/4.png')}}" alt="">
                        </div>
                        <div class="features-card-content">
                            <h4 class="hd-md mb-2">Digital Gifting</h4>
                            <p class="para">
                                Send in-app gifts and purchase gift cards with real-world value.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="store-badges-row d-flex justify-content-center align-items-center gap-3">
                    <div class="badge-wrapper">
                        <img src="{{asset('imgs/google-play.png')}}" alt="google-play" class="google-play-badge">
                    </div>
                    <div class="badge-wrapper">
                        <img src="{{asset('imgs/apple-store.png')}}" alt="apple-store" class="apple-store-badge">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="one-platform-sec gap-y-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="img-wrapper gradient-img-wrapper">
                        <img src="{{asset('imgs/one-platform.png')}}" alt="one-platform" class="one-platform-img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="one-platform-content">
                        <h2 class="sec-title mb-4">
                            One <span class="text-primary-theme">Platform.</span> <br> Zero Fragmentation.
                        </h2>
                        <p class="para mb-4">
                            Today’s digital world is scattered across multiple apps. Wandr simplifies your life by combining social networking, event discovery, travel booking, and digital commerce into one seamless experience.
                        </p>
                        <a href="#" class="btn btn--primary">Download App</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-choose-wandr-sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="sec-title text-center">Why Choose <span class="text-primary-theme">Wandr?</span></h2>
                </div>
                <div class="col-12">
                    <div class="why-choose-wandr-content position-relative">
                        <div class="why-choose-wandr-gif-wrapper mx-auto d-flex justify-content-center">
                            <img src="{{asset('imgs/why-choose-wandr.gif')}}" alt="why-choose-wandr-gif" class="why-choose-wandr-gif z-1">
                            <img src="{{asset('imgs/heart.png')}}" alt="heart-pulse" class="heart-pulse">
                        </div>
                        <div class="wcw-card wcw-card--1">
                            All-in-one lifestyle ecosystem
                            <img src="{{asset('imgs/wcw/1.png')}}" alt="wcw-1" class="wcw-img wcw-img-1">
                        </div>
                        <div class="wcw-card wcw-card--2">
                            Secure and scalable platform
                            <img src="{{asset('imgs/wcw/2.png')}}" alt="wcw-2" class="wcw-img wcw-img-2">
                        </div>
                        <div class="wcw-card wcw-card--3">
                            Real-time communication
                            <img src="{{asset('imgs/wcw/3.png')}}" alt="wcw-3" class="wcw-img wcw-img-3">
                        </div>
                        <div class="wcw-card wcw-card--4">
                            Built for modern digital lifestyles
                            <img src="{{asset('imgs/wcw/4.png')}}" alt="wcw-4" class="wcw-img wcw-img-4">
                        </div>
                        <div class="wcw-card wcw-card--5">
                            Smart recommendations based on behavior & location
                            <img src="{{asset('imgs/wcw/5.png')}}" alt="wcw-5" class="wcw-img wcw-img-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials-sec gap-y-100">
        <div class="container">
            <div class="row align-items-center gy-3 gy-lg-0">
                <div class="col-12 col-lg-6 text-center text-lg-start">
                    <h2 class="sec-title text-uppercase mb-0">TESTIMONIALS</h2>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="arrows-wrapper d-flex justify-content-center justify-content-lg-end gap-3">
                        <div class="arrows arrow-prev"><i class="fa-solid fa-chevron-left"></i></div>
                        <div class="arrows arrow-next"><i class="fa-solid fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slider">
                        <div class="testimonial-card">
                            <span class="quote-icon">
                                <i class="fa-solid fa-quote-left"></i>
                            </span>
                            <p class="para">
                                Wandr completely changed how I meet people and plan my weekends. I don’t need 3 different apps anymore—it’s all right here.
                            </p>
                        </div>
                        <div class="testimonial-card">
                            <span class="quote-icon">
                                <i class="fa-solid fa-quote-left"></i>
                            </span>
                            <p class="para">
                                I met amazing people, found local events, and even booked a trip—all in one platform. This is the future of social apps.
                            </p>
                        </div>
                        <div class="testimonial-card">
                            <span class="quote-icon">
                                <i class="fa-solid fa-quote-left"></i>
                            </span>
                            <p class="para">
                                The video chat feature feels natural and safe, and I love being able to send gifts during conversations. It makes everything more real.
                            </p>
                        </div>
                        <div class="testimonial-card">
                            <span class="quote-icon">
                                <i class="fa-solid fa-quote-left"></i>
                            </span>
                            <p class="para">
                                Wandr completely changed how I meet people and plan my weekends. I don’t need 3 different apps anymore—it’s all right here.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mx-auto d-flex justify-content-center">
                    <a href="#" class="btn btn--primary">View All</a>
                </div>
            </div>
        </div>
    </section>
    <section class="ready-to-wandr-sec position-relative">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <div class="ready-to-wandr-img-wrapper">
                        <img src="{{asset('imgs/ready-to-wandr-img.png')}}" alt="ready-to-wandr-img" class="ready-to-wandr-img">
                    </div>
                    <div class="ready-to-wandr-content">
                        <h2 class="sec-title text-center mb-5 sec-title-ready">Ready to <span>Wandr?</span></h2>
                        <div class="ready-to-wandr-btns">
                            <a href="#" class="btn btn--white">Sign Up Now</a>
                            <a href="#" class="btn btn--primary">Download App</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ready-to-find-sec">
        <div class="container px-3 px-md-4">
            <div class="ready-to-find-inner position-relative">
                <div class="row align-items-stretch align-items-lg-stretch g-4 g-lg-0">
                    <div class="col-12 col-lg-6 d-flex align-items-center">
                        <div class="ready-to-find-content w-100">
                            <h3 class="sec-title mb-3 mb-lg-4">Ready to Find Your Adventure Partner?</h3>
                            <p class="para mb-3 mb-lg-4">
                                Join thousands creating unforgettable experiences. Early members get premium free for 3 months.
                            </p>
                            <form action="" class="ready-to-find-form">
                                <div class="field-wrapper ready-to-find-field position-relative">
                                    <input type="email" name="email" class="input-field" placeholder="Enter Your Email Address" autocomplete="email" inputmode="email">
                                    <button type="button" class="btn btn-purple">Join Free</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 position-relative">
                        <div class="ready-to-find-right-content">
                            <img src="{{asset('imgs/ready-to-find-logo.png')}}" alt="" class="ready-to-find-logo-img img-fluid" loading="lazy">
                            <img src="{{asset('imgs/ready-to-find-right.png')}}" alt="Couple celebrating" class="ready-to-find-right-img img-fluid" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection