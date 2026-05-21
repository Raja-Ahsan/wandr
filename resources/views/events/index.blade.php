@extends('layouts.web.master')
@section('title', 'Dating')
@section('content')

<main class="events-page-wrapper inner-page-wrapper">
    <section class="events-banner inner-banner position-relative z-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-xl-4">
                    <h1 class="sec-title mb-3">Meet The <span>Loved</span> Ones</h1>
                    <p class="para mb-4">
                        Connect with people who share your interests. Safe chats, smart matching, and real connections—all in one place.
                    </p>
                    <a href="/user/login" class="btn btn--primary">Get Started</a>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="dating-banner-img">
                        <img src="{{ asset('imgs/boy-girl.png') }}" class="w-100" alt="Couple connecting on Wandr">
                    </div>
                </div> -->
            </div>
        </div>
        <!-- <img src="{{ asset('imgs/svgs/wave.svg') }}" class="w-100 wave-img" alt=""> -->
    </section>
    <section class="events-sec gap-y-100">
        <div class="container">
            <div class="row mb-5 text-center d-flex justify-content-center flex-column align-items-center">
                <div class="col-lg-12">
                    <h2 class="sec-title">Our <span>Features</span></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="event-card-wrapper">
                        <h3 class="sec-title">title</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="event-card-wrapper">
                        <h3 class="sec-title">title</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="event-card-wrapper">
                        <h3 class="sec-title">title</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    @push('scripts')
    @endpush

    @endsection