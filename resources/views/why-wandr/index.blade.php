@extends('layouts.web.master')
@section('title', 'Why Wandr')
@section('content')

<main class="about-page">
    <section class="about-hero" aria-labelledby="about-hero-heading">
        <div class="about-hero__mesh" aria-hidden="true"></div>
        <div class="container position-relative">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10 col-xl-9">
                    <p class="about-hero__eyebrow">Why Wandr exists</p>
                    <h1 id="about-hero-heading" class="about-hero__title">
                        One ecosystem for how modern life <span>actually happens</span>
                    </h1>
                    <p class="about-hero__lead">
                        Dating, events, travel, and gifting shouldn’t live in four different apps. Wandr unifies real connection and real world experiences securely, beautifully, and on your terms.
                    </p>
                </div>
            </div>
            <ul class="about-hero__metrics row g-3 justify-content-center list-unstyled mt-5">
                <li class="col-6 col-md-4 col-lg-3">
                    <div class="about-metric-pill">
                        <span class="about-metric-pill__value">4-in-1</span>
                        <span class="about-metric-pill__label">Core experiences</span>
                    </div>
                </li>
                <li class="col-6 col-md-4 col-lg-3">
                    <div class="about-metric-pill">
                        <span class="about-metric-pill__value">1</span>
                        <span class="about-metric-pill__label">Shared identity</span>
                    </div>
                </li>
                <li class="col-6 col-md-4 col-lg-3">
                    <div class="about-metric-pill">
                        <span class="about-metric-pill__value">24/7</span>
                        <span class="about-metric-pill__label">Real-time sync</span>
                    </div>
                </li>
                <li class="col-6 col-md-4 col-lg-3">
                    <div class="about-metric-pill">
                        <span class="about-metric-pill__value">100%</span>
                        <span class="about-metric-pill__label">Privacy-first</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="about-story" aria-labelledby="about-story-heading">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-story__visual">
                        <img src="{{ asset('imgs/one-platform.png') }}" alt="Wandr unified platform" class="about-story__img w-100" loading="lazy">
                        <div class="about-story__badge">
                            <img src="{{ asset('imgs/logo-short.svg') }}" alt="" width="40" height="40" aria-hidden="true">
                            <span>Built for connection</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 id="about-story-heading" class="about-story__title">We started with a <span>simple question</span></h2>
                    <p class="about-story__text">
                        Why does meeting someone, finding something to do, planning a trip, and sending a thoughtful gift require four separate logins, four feeds, and four trust models?
                    </p>
                    <p class="about-story__text">
                        Wandr was built to answer that one premium lifestyle platform where your social graph, your calendar, and your wallet move together.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-compare" aria-labelledby="about-compare-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="about-compare-heading" class="about-section-title">The shift we’re <span>leading</span></h2>
                    <p class="about-section-desc">See how a fragmented stack compares to one intentional product experience.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <article class="about-compare-card about-compare-card--old">
                        <span class="about-compare-card__tag">The old way</span>
                        <h3 class="about-compare-card__title">Scattered apps</h3>
                        <ul class="about-compare-card__list">
                            <li><i class="fa-solid fa-xmark"></i> Duplicate profiles & passwords</li>
                            <li><i class="fa-solid fa-xmark"></i> Context lost between platforms</li>
                            <li><i class="fa-solid fa-xmark"></i> Harder to plan with people you meet</li>
                            <li><i class="fa-solid fa-xmark"></i> Inconsistent safety & payments</li>
                        </ul>
                    </article>
                </div>
                <div class="col-lg-6">
                    <article class="about-compare-card about-compare-card--new">
                        <span class="about-compare-card__tag">The Wandr way</span>
                        <h3 class="about-compare-card__title">One living ecosystem</h3>
                        <ul class="about-compare-card__list">
                            <li><i class="fa-solid fa-check"></i> Single profile across every module</li>
                            <li><i class="fa-solid fa-check"></i> Chat, events, travel & gifts connected</li>
                            <li><i class="fa-solid fa-check"></i> Smarter recommendations over time</li>
                            <li><i class="fa-solid fa-check"></i> Enterprise-grade security & wallet</li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="about-pillars" aria-labelledby="about-pillars-heading">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7">
                    <h2 id="about-pillars-heading" class="about-section-title about-section-title--light">What we <span>stand for</span></h2>
                    <p class="about-section-desc about-section-desc--light">Four principles guide every feature we ship.</p>
                </div>
            </div>
            <div class="about-bento row g-4">
                <div class="col-md-6">
                    <article class="about-bento__cell about-bento__cell--large">
                        <span class="about-bento__num">01</span>
                        <h3 class="about-bento__title">Human-first design</h3>
                        <p>Interfaces that feel calm, clear, and respectful—never noisy or manipulative.</p>
                    </article>
                </div>
                <div class="col-md-6 d-flex flex-column gap-4">
                    <article class="about-bento__cell">
                        <span class="about-bento__num">02</span>
                        <h3 class="about-bento__title">Trust by default</h3>
                        <p>Verification, reporting, and secure payments woven into every interaction.</p>
                    </article>
                    <article class="about-bento__cell">
                        <span class="about-bento__num">03</span>
                        <h3 class="about-bento__title">Real-world outcomes</h3>
                        <p>We measure success in meetups booked, trips taken, and memories made—not endless scrolling.</p>
                    </article>
                </div>
                <div class="col-12">
                    <article class="about-bento__cell about-bento__cell--wide">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-8">
                                <span class="about-bento__num">04</span>
                                <h3 class="about-bento__title">Intelligence with empathy</h3>
                                <p class="mb-0">Recommendations powered by behavior and location—transparent, controllable, and always in service of you.</p>
                            </div>
                            <div class="col-lg-4 text-lg-end">
                                <img src="{{ asset('imgs/why-choose-wandr.gif') }}" alt="" class="about-bento__gif" loading="lazy" aria-hidden="true">
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="about-ecosystem" aria-labelledby="about-ecosystem-heading">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 id="about-ecosystem-heading" class="about-section-title about-section-title--light">Everything <span>connects</span></h2>
                    <p class="about-section-desc about-section-desc--light">Tap a pillar—each module strengthens the others inside Wandr.</p>
                </div>
            </div>
            <div class="about-hub">
                <div class="about-hub__core">
                    <img src="{{ asset('imgs/logo.png') }}" alt="Wandr" class="about-hub__logo" width="120" loading="lazy">
                </div>
                <a href="{{ route('dating') }}" class="about-hub__node about-hub__node--dating">
                    <i class="fa-solid fa-heart"></i>
                    <span>Dating</span>
                </a>
                <a href="{{ route('events') }}" class="about-hub__node about-hub__node--events">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Events</span>
                </a>
                <a href="{{ route('travel') }}" class="about-hub__node about-hub__node--travel">
                    <i class="fa-solid fa-plane"></i>
                    <span>Travel</span>
                </a>
                <a href="{{ route('gift') }}" class="about-hub__node about-hub__node--gift">
                    <i class="fa-solid fa-gift"></i>
                    <span>Gifts</span>
                </a>
            </div>
        </div>
    </section>

    <section class="about-quote" aria-label="Brand belief">
        <div class="container">
            <blockquote class="about-quote__inner">
                <p>“We’re not building another app we’re building the layer where your relationships turn into experiences.”</p>
                <footer>The Wandr team</footer>
            </blockquote>
        </div>
    </section>

    <section class="about-trust" aria-labelledby="about-trust-heading">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-lg-8 mx-auto">
                    <h2 id="about-trust-heading" class="about-section-title">Built for <span>scale & care</span></h2>
                    <p class="about-section-desc">Infrastructure and policies you’d expect from a top-tier consumer platform.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-6 col-lg-4">
                    <div class="about-trust-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <h3>Secure infrastructure</h3>
                        <p>Encrypted messaging, protected payments, and proactive moderation.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="about-trust-item">
                        <i class="fa-solid fa-bolt"></i>
                        <h3>Real-time engine</h3>
                        <p>Live chat, notifications, and sync across every module instantly.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="about-trust-item">
                        <i class="fa-solid fa-globe"></i>
                        <h3>Global-ready</h3>
                        <p>Multi-language support and localization built for growth.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="about-trust-item">
                        <i class="fa-solid fa-sliders"></i>
                        <h3>You stay in control</h3>
                        <p>Granular privacy, discovery settings, and block tools—always visible.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="about-trust-item">
                        <i class="fa-solid fa-headset"></i>
                        <h3>Human support</h3>
                        <p>Real help when you need it—not bots-only runarounds.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="about-trust-item">
                        <i class="fa-solid fa-chart-line"></i>
                        <h3>Always improving</h3>
                        <p>Continuous releases shaped by community feedback and data ethics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-cta">
        <div class="container">
            <div class="about-cta__panel text-center">
                <h2 class="about-cta__title">Ready to experience the <span>difference</span>?</h2>
                <p class="about-cta__text">Join Wandr today—where your next connection, event, trip, or gift is already one tap away.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="/user/sign-up" class="btn btn--primary btn--hover-theme">Get Started Free</a>
                    <a href="/" class="btn btn--outline">Explore Home</a>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
@endpush

@endsection
