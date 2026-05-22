@extends('layouts.web.master')
@section('title', 'Gifts')
@section('content')

<main class="gift-page-wrapper inner-page-wrapper">
    <section class="gift-banner inner-banner position-relative z-1">
        <div class="container">
            <div class="row align-items-center justify-content-between g-4">
                <div class="col-lg-5 col-xl-4">
                    <h1 class="sec-title mb-3">Send Gifts That <span>Matter</span></h1>
                    <p class="para mb-4">
                        Virtual gifts, premium surprises, and real-world gift cards delivered instantly through chat, matches, and moments on Wandr.
                    </p>
                    <a href="/user/login" class="btn btn--primary btn--hover-theme">Send a Gift</a>
                </div>
           
            </div>
        </div>
    </section>

    <section class="gift-sec gap-y-100" aria-labelledby="gift-features-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="gift-features-heading" class="sec-title gift-sec__title mb-3">Our <span>Features</span></h2>
                    <p class="gift-sec__lead">
                        Thoughtful gifting built into how you connect no awkward links, no leaving the conversation.
                    </p>
                </div>
            </div>
            <div class="row g-4 g-lg-5 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <article class="gift-card-wrapper">
                        <div class="gift-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                        <h3 class="gift-card-wrapper__title">In-App <span>Virtual Gifts</span></h3>
                        <p class="gift-card-wrapper__text">
                            Send stickers, animations, and premium gifts during chat or video seen instantly on the other side.
                        </p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="gift-card-wrapper">
                        <div class="gift-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                        <h3 class="gift-card-wrapper__title">Gift Cards & <span>Credits</span></h3>
                        <p class="gift-card-wrapper__text">
                            Share wallet credits or partner gift cards with real value perfect for birthdays, thanks, or just because.
                        </p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="gift-card-wrapper">
                        <div class="gift-card-wrapper__icon" aria-hidden="true">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <h3 class="gift-card-wrapper__title">Gifts With <span>Context</span></h3>
                        <p class="gift-card-wrapper__text">
                            Tie gifts to matches, events, or trips so every present feels personal, not random.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="gift-how-sec light-sec gap-y-100" aria-labelledby="gift-how-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 id="gift-how-heading" class="sec-title sec-title--dark text-center mb-3">How It <span class="text-primary-theme">Works</span></h2>
                    <p class="gift-how-sec__desc">
                        Three taps from idea to delivered fast, secure, and built for modern social apps.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="gift-how-card">
                        <span class="gift-how-card__step" aria-hidden="true">01</span>
                        <h3 class="gift-how-card__title">Choose a Gift</h3>
                        <p>Browse categories, trending picks, and premium collections or surprise them with credits.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gift-how-card">
                        <span class="gift-how-card__step" aria-hidden="true">02</span>
                        <h3 class="gift-how-card__title">Personalize & Send</h3>
                        <p>Add a note, send in chat, or attach to a special moment. Pay safely with your Wandr wallet.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gift-how-card">
                        <span class="gift-how-card__step" aria-hidden="true">03</span>
                        <h3 class="gift-how-card__title">Instant Delivery</h3>
                        <p>They receive it immediately with notifications and a clear redemption path in-app.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="/user/login" class="btn btn--primary btn--hover-theme">Start Gifting</a>
                </div>
            </div>
        </div>
    </section>

    <section class="gift-discover-sec light-sec" aria-labelledby="gift-discover-heading">
        <div class="container">
            <ul class="gift-stats row g-3 g-md-4 mb-5 list-unstyled" aria-label="Gifting platform highlights">
                <li class="col-6 col-lg-3">
                    <div class="gift-stat">
                        <span class="gift-stat__value">1M+</span>
                        <span class="gift-stat__label">Gifts sent on Wandr</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="gift-stat">
                        <span class="gift-stat__value">500+</span>
                        <span class="gift-stat__label">Unique gift designs</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="gift-stat">
                        <span class="gift-stat__value">50+</span>
                        <span class="gift-stat__label">Brand partners</span>
                    </div>
                </li>
                <li class="col-6 col-lg-3">
                    <div class="gift-stat">
                        <span class="gift-stat__value">&lt;3s</span>
                        <span class="gift-stat__label">Average delivery time</span>
                    </div>
                </li>
            </ul>

            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="gift-discover-heading" class="sec-title sec-title--dark mb-3">Gifts for Every <span class="text-primary-theme">Moment</span></h2>
                    <p class="gift-discover-sec__desc">
                        From first hello to big milestones find the right gesture without leaving Wandr.
                    </p>
                </div>
            </div>

            <div class="row g-3 g-md-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-heart"></i></span>
                        <span class="gift-category-tile__name">Romance</span>
                        <span class="gift-category-tile__count">For matches & dates</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-cake-candles"></i></span>
                        <span class="gift-category-tile__name">Birthday</span>
                        <span class="gift-category-tile__count">Cards & bundles</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-champagne-glasses"></i></span>
                        <span class="gift-category-tile__name">Celebration</span>
                        <span class="gift-category-tile__count">Parties & wins</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-hand-holding-heart"></i></span>
                        <span class="gift-category-tile__name">Thank You</span>
                        <span class="gift-category-tile__count">Show appreciation</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-user-group"></i></span>
                        <span class="gift-category-tile__name">Friendship</span>
                        <span class="gift-category-tile__count">Light & fun picks</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-gem"></i></span>
                        <span class="gift-category-tile__name">Premium</span>
                        <span class="gift-category-tile__count">Exclusive drops</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-face-smile"></i></span>
                        <span class="gift-category-tile__name">Stickers</span>
                        <span class="gift-category-tile__count">Chat reactions</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/user/login" class="gift-category-tile">
                        <span class="gift-category-tile__icon"><i class="fa-solid fa-wallet"></i></span>
                        <span class="gift-category-tile__name">Gift Cards</span>
                        <span class="gift-category-tile__count">Real-world value</span>
                        <i class="fa-solid fa-arrow-right gift-category-tile__arrow" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="gift-discover-panel row align-items-center g-4 g-lg-5 mt-5">
                <div class="col-lg-6">
                    <div class="gift-discover-panel__visual">
                        <img
                            src="https://img.freepik.com/free-photo/cheerful-woman-proposing-boyfriend_23-2147736066.jpg?semt=ais_hybrid&w=740&q=80"
                            alt="Beautiful gift box with ribbon"
                            class="gift-discover-panel__img gift-discover-panel__img--main"
                            loading="lazy"
                            width="900"
                            height="600"
                        >
                        <img
                            src="{{ asset('imgs/home/couple-image.png') }}"
                            alt="People celebrating with gifts"
                            class="gift-discover-panel__img--accent"
                            loading="lazy"
                            width="500"
                            height="340"
                        >
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="gift-discover-panel__eyebrow">Connected gifting</p>
                    <h3 class="sec-title sec-title--dark mb-3">Gifts that fit your <span class="text-primary-theme">whole Wandr life</span></h3>
                    <p class="gift-discover-panel__text mb-4">
                        Surprise someone you met on dating, thank an event host, or celebrate a trip one wallet, one inbox, every gesture in sync.
                    </p>
                    <ul class="gift-discover-panel__list">
                        <li><i class="fa-solid fa-circle-check"></i> Send during chat, video calls, or profiles</li>
                        <li><i class="fa-solid fa-circle-check"></i> Wallet credits & partner gift cards</li>
                        <li><i class="fa-solid fa-circle-check"></i> Secure checkout with instant notifications</li>
                    </ul>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="/user/login" class="btn btn--primary btn--hover-theme">Browse Gifts</a>
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
