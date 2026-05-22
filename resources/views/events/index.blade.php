@extends('layouts.web.master')
@section('title', 'Events')
@section('content')

<main class="events-page-wrapper inner-page-wrapper">
    <section class="events-banner inner-banner position-relative z-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-xl-4">
                    <h1 class="sec-title mb-3">Meet The <span>Loved</span> Ones</h1>
                    <p class="para mb-4">
                        Connect with people who share your interests. Safe chats, smart matching, and real connections all in one place.
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
    <section class="events-sec gap-y-100" aria-labelledby="events-features-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="events-features-heading" class="sec-title events-sec__title mb-3">Our <span>Features</span></h2>
                    <p class="events-sec__lead">
                        Discover, book, and show up everything you need to turn plans into real world experiences.
                    </p>
                </div>
            </div>
            <div class="row g-4 g-lg-5 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <article class="event-card-wrapper">
                        <div class="event-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-magnifying-glass-location"></i>
                        </div>
                        <h3 class="event-card-wrapper__title">Smart Event <span>Discovery</span></h3>
                        <p class="event-card-wrapper__text">
                            Browse concerts, meetups, and local happenings tailored to your interests, location, and schedule.
                        </p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="event-card-wrapper">
                        <div class="event-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-ticket"></i>
                        </div>
                        <h3 class="event-card-wrapper__title">Easy RSVP & <span>Tickets</span></h3>
                        <p class="event-card-wrapper__text">
                            Reserve your spot in one tap free or paid events with secure checkout and digital passes ready when you arrive.
                        </p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="event-card-wrapper">
                        <div class="event-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <h3 class="event-card-wrapper__title">Connect With <span>Attendees</span></h3>
                        <p class="event-card-wrapper__text">
                            See who’s going, invite friends, and chat with other guests before the event so you never walk in alone.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="events-how-sec light-sec gap-y-100" aria-labelledby="events-how-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 id="events-how-heading" class="sec-title sec-title--dark text-center mb-3">How It <span class="text-primary-theme">Works</span></h2>
                    <p class="events-how-sec__desc">
                        From scroll to showtime in three simple steps no messy group chats or lost links.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="events-how-card">
                        <span class="events-how-card__step" aria-hidden="true">01</span>
                        <h3 class="events-how-card__title">Find Your Event</h3>
                        <p>Filter by date, category, or distance. Save favorites and get alerts when something new drops nearby.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="events-how-card">
                        <span class="events-how-card__step" aria-hidden="true">02</span>
                        <h3 class="events-how-card__title">RSVP & Invite</h3>
                        <p>Claim your spot, see the guest list, and bring friends along all inside the same Wandr experience.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="events-how-card">
                        <span class="events-how-card__step" aria-hidden="true">03</span>
                        <h3 class="events-how-card__title">Show Up & Enjoy</h3>
                        <p>Check in at the venue with directions on hand, then share the moment and discover what’s next.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="/user/login" class="btn btn--outline">Explore Events</a>
                </div>
            </div>
        </div>
    </section>

    <section class="events-discover-sec light-sec" aria-labelledby="events-discover-heading">
        <div class="container">
            <ul class="events-stats row g-3 g-md-4 mb-5 list-unstyled" aria-label="Platform highlights">
                <li class="col-6 col-lg-3">
                    <div class="events-stat">
                        <span class="events-stat__value">50K+</span>
                        <span class="events-stat__label">Active events monthly</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="events-stat">
                        <span class="events-stat__value">120+</span>
                        <span class="events-stat__label">Cities worldwide</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="events-stat">
                        <span class="events-stat__value">2M+</span>
                        <span class="events-stat__label">RSVPs processed</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="events-stat">
                        <span class="events-stat__value">4.9</span>
                        <span class="events-stat__label">Average host rating</span>
                    </div>
                </li>
            </ul>

            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="events-discover-heading" class="sec-title sec-title--dark mb-3">Find Experiences <span class="text-primary-theme">You’ll Love</span></h2>
                    <p class="events-discover-sec__desc">
                        Browse by what you’re in the mood for same flow top event platforms use, tuned for Wandr’s social layer.
                    </p>
                </div>
            </div>

            <div class="row g-3 g-md-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-music"></i></span>
                        <span class="events-category-tile__name">Music & Live</span>
                        <span class="events-category-tile__count">2,400+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-champagne-glasses"></i></span>
                        <span class="events-category-tile__name">Nightlife</span>
                        <span class="events-category-tile__count">890+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="events-category-tile__name">Business</span>
                        <span class="events-category-tile__count">1,100+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-dumbbell"></i></span>
                        <span class="events-category-tile__name">Sports & Wellness</span>
                        <span class="events-category-tile__count">640+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-palette"></i></span>
                        <span class="events-category-tile__name">Arts & Culture</span>
                        <span class="events-category-tile__count">720+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-utensils"></i></span>
                        <span class="events-category-tile__name">Food & Drink</span>
                        <span class="events-category-tile__count">1,850+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-laptop-code"></i></span>
                        <span class="events-category-tile__name">Workshops</span>
                        <span class="events-category-tile__count">530+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="events-category-tile">
                        <span class="events-category-tile__icon"><i class="fa-solid fa-heart"></i></span>
                        <span class="events-category-tile__name">Community</span>
                        <span class="events-category-tile__count">410+ near you</span>
                        <i class="fa-solid fa-arrow-right events-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="events-discover-panel row align-items-center g-4 g-lg-5 mt-5">
                <div class="col-lg-6">
                    <div class="events-discover-panel__visual">
                        <img
                            src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=900&auto=format&fit=crop&q=80"
                            alt="People networking at a professional event"
                            class="events-discover-panel__img events-discover-panel__img--main"
                            loading="lazy"
                            width="900"
                            height="600"
                        >
                        <img
                            src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80"
                            alt="Live music concert atmosphere"
                            class="events-discover-panel__img--accent"
                            loading="lazy"
                            width="500"
                            height="340"
                        >
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="events-discover-panel__eyebrow">For attendees & hosts</p>
                    <h3 class="sec-title sec-title--dark mb-3">One place to discover, host, and <span class="text-primary-theme">grow your crowd</span></h3>
                    <p class="events-discover-panel__text mb-4">
                        Whether you’re filling your weekend or launching your next meetup, Wandr gives you discovery, ticketing, and community tools without switching apps.
                    </p>
                    <ul class="events-discover-panel__list">
                        <li><i class="fa-solid fa-circle-check"></i> Personalized feeds by city and interest</li>
                        <li><i class="fa-solid fa-circle-check"></i> Host dashboards with RSVP and messaging</li>
                        <li><i class="fa-solid fa-circle-check"></i> Connect with Wandr dating & travel in one account</li>
                    </ul>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="/user/login" class="btn btn--primary btn--hover-theme">Find Events</a>
                        <a href="/user/sign-up" class="btn btn--outline">Host an Event</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
@endpush

@endsection