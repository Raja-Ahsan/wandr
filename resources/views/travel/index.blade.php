@extends('layouts.web.master')
@section('title', 'Travel')
@section('content')

<main class="travel-page-wrapper inner-page-wrapper">
    <section class="travel-banner inner-banner position-relative z-1">
        <div class="container">
            <div class="row align-items-center justify-content-between g-4">
                <div class="col-lg-5 col-xl-4">
                    <h1 class="sec-title mb-3">Explore The <span>World</span> With Wandr</h1>
                    <p class="para mb-4">
                        Plan trips, book stays and experiences, and travel with people you trust all connected to your Wandr social life in one app.
                    </p>
                    <a href="/user/login" class="btn btn--primary">Start Planning</a>
                </div>
            </div>
        </div>
    </section>

    <section class="travel-sec gap-y-100" aria-labelledby="travel-features-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="travel-features-heading" class="sec-title travel-sec__title mb-3">Our <span>Features</span></h2>
                    <p class="travel-sec__lead">
                        From weekend escapes to bucket-list adventures plan, book, and share every journey without leaving Wandr.
                    </p>
                </div>
            </div>
            <div class="row g-4 g-lg-5 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <article class="travel-card-wrapper">
                        <div class="travel-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-compass"></i>
                        </div>
                        <h3 class="travel-card-wrapper__title">Smart Trip <span>Discovery</span></h3>
                        <p class="travel-card-wrapper__text">
                            Explore destinations, itineraries, and local experiences curated to your budget, dates, and travel style.
                        </p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="travel-card-wrapper">
                        <div class="travel-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-bed"></i>
                        </div>
                        <h3 class="travel-card-wrapper__title">Stays & <span>Activities</span></h3>
                        <p class="travel-card-wrapper__text">
                            Book hotels, tours, and unique experiences in one flow—with clear pricing and instant confirmations.
                        </p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="travel-card-wrapper">
                        <div class="travel-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <h3 class="travel-card-wrapper__title">Travel With <span>Friends</span></h3>
                        <p class="travel-card-wrapper__text">
                            Coordinate group trips, split costs, and stay in sync with chat—whether it’s friends, family, or new connections.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="travel-how-sec light-sec gap-y-100" aria-labelledby="travel-how-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 id="travel-how-heading" class="sec-title sec-title--dark text-center mb-3">How It <span class="text-primary-theme">Works</span></h2>
                    <p class="travel-how-sec__desc">
                        Three steps from inspiration to boarding pass—simple, social, and built for real travelers.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="travel-how-card">
                        <span class="travel-how-card__step" aria-hidden="true">01</span>
                        <h3 class="travel-how-card__title">Dream & Discover</h3>
                        <p>Browse destinations, save wishlists, and get recommendations based on seasons, deals, and your Wandr network.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="travel-how-card">
                        <span class="travel-how-card__step" aria-hidden="true">02</span>
                        <h3 class="travel-how-card__title">Book Together</h3>
                        <p>Reserve flights, stays, and activities. Invite travel buddies and manage plans in one shared itinerary.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="travel-how-card">
                        <span class="travel-how-card__step" aria-hidden="true">03</span>
                        <h3 class="travel-how-card__title">Go & Remember</h3>
                        <p>Access tickets offline, get local tips on arrival, and share highlights with your community when you’re back.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="/user/login" class="btn btn--outline">Plan a Trip</a>
                </div>
            </div>
        </div>
    </section>

    <section class="travel-discover-sec light-sec" aria-labelledby="travel-discover-heading">
        <div class="container">
            <ul class="travel-stats row g-3 g-md-4 mb-5 list-unstyled" aria-label="Travel platform highlights">
                <li class="col-6 col-lg-3">
                    <div class="travel-stat">
                        <span class="travel-stat__value">80K+</span>
                        <span class="travel-stat__label">Destinations listed</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="travel-stat">
                        <span class="travel-stat__value">180+</span>
                        <span class="travel-stat__label">Countries covered</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="travel-stat">
                        <span class="travel-stat__value">500K+</span>
                        <span class="travel-stat__label">Trips planned yearly</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="travel-stat">
                        <span class="travel-stat__value">4.8</span>
                        <span class="travel-stat__label">Traveler satisfaction</span>
                    </div>
                </li>
            </ul>

            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="travel-discover-heading" class="sec-title sec-title--dark mb-3">Trips for Every <span class="text-primary-theme">Traveler</span></h2>
                    <p class="travel-discover-sec__desc">
                        Whether you want a quick getaway or a month abroad—start with the trip type that fits your vibe.
                    </p>
                </div>
            </div>

            <div class="row g-3 g-md-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-plane"></i></span>
                        <span class="travel-category-tile__name">Flights</span>
                        <span class="travel-category-tile__count">Best fares tracked</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-hotel"></i></span>
                        <span class="travel-category-tile__name">Hotels & Stays</span>
                        <span class="travel-category-tile__count">Boutique to luxury</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-umbrella-beach"></i></span>
                        <span class="travel-category-tile__name">Beach & Resort</span>
                        <span class="travel-category-tile__count">Sun-ready escapes</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-mountain-sun"></i></span>
                        <span class="travel-category-tile__name">Adventure</span>
                        <span class="travel-category-tile__count">Hikes, dives & more</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-city"></i></span>
                        <span class="travel-category-tile__name">City Breaks</span>
                        <span class="travel-category-tile__count">Weekend culture trips</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-van-shuttle"></i></span>
                        <span class="travel-category-tile__name">Road Trips</span>
                        <span class="travel-category-tile__count">Routes & rentals</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-users"></i></span>
                        <span class="travel-category-tile__name">Group Travel</span>
                        <span class="travel-category-tile__count">Split & coordinate</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="travel-category-tile">
                        <span class="travel-category-tile__icon"><i class="fa-solid fa-spa"></i></span>
                        <span class="travel-category-tile__name">Wellness Retreats</span>
                        <span class="travel-category-tile__count">Reset & recharge</span>
                        <i class="fa-solid fa-arrow-right travel-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="travel-discover-panel row align-items-center g-4 g-lg-5 mt-5">
                <div class="col-lg-6 order-lg-2">
                    <div class="travel-discover-panel__visual">
                        <img
                            src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=900&auto=format&fit=crop&q=80"
                            alt="Traveler planning a trip with map and journal"
                            class="travel-discover-panel__img travel-discover-panel__img--main"
                            loading="lazy"
                            width="900"
                            height="600"
                        >
                        <img
                            src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=500&auto=format&fit=crop&q=80"
                            alt="Tropical beach destination"
                            class="travel-discover-panel__img travel-discover-panel__img--accent"
                            loading="lazy"
                            width="500"
                            height="340"
                        >
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <p class="travel-discover-panel__eyebrow">All in one on Wandr</p>
                    <h3 class="sec-title sec-title--dark mb-3">Travel that connects to your <span class="text-primary-theme">whole life</span></h3>
                    <p class="travel-discover-panel__text mb-4">
                        Match with someone in one city, meet at an event in another, then plan a trip together dating, events, and travel finally live in one ecosystem.
                    </p>
                    <ul class="travel-discover-panel__list">
                        <li><i class="fa-solid fa-circle-check"></i> Shared itineraries with friends & matches</li>
                        <li><i class="fa-solid fa-circle-check"></i> Local experiences tied to events near you</li>
                        <li><i class="fa-solid fa-circle-check"></i> Secure payments and trip notifications</li>
                    </ul>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="/user/login" class="btn btn--primary btn--hover-theme">Browse Trips</a>
                        <a href="/user/sign-up" class="btn btn--outline">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
@endpush

@endsection
