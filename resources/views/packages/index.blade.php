@extends('layouts.web.master')
@section('title', 'Pricing')
@section('content')

<main class="packages-page">
    <section class="packages-hero" aria-labelledby="packages-hero-heading">
        <div class="packages-hero__glow" aria-hidden="true"></div>
        <div class="container position-relative">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9 col-xl-8">
                    <p class="packages-hero__eyebrow">Simple, transparent pricing</p>
                    <h1 id="packages-hero-heading" class="packages-hero__title">
                        Plans that <span>grow with you</span>
                    </h1>
                    <p class="packages-hero__lead">
                        Start free, upgrade when you’re ready. Every tier unlocks more of Wandr dating, events, travel, and gifts in one membership.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="packages-plans" aria-labelledby="packages-plans-heading">
        <div class="container">
            <div class="packages-plans__head text-center mb-5">
                <h2 id="packages-plans-heading" class="visually-hidden">Choose your plan</h2>
                <div class="packages-billing-toggle" role="group" aria-label="Billing period">
                    <button type="button" class="packages-billing-toggle__btn active" data-billing="monthly">Monthly</button>
                    <button type="button" class="packages-billing-toggle__btn" data-billing="yearly">
                        Yearly
                        <span class="packages-billing-toggle__save">Save 20%</span>
                    </button>
                </div>
            </div>

            <div class="row g-4 g-xl-5 justify-content-center align-items-stretch">
                <div class="col-md-6 col-lg-4">
                    <article class="packages-plan-card">
                        <div class="packages-plan-card__icon" aria-hidden="true">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <h3 class="packages-plan-card__name">Free</h3>
                        <p class="packages-plan-card__tagline">Explore Wandr at your pace</p>
                        <div class="packages-plan-card__price">
                            <span class="packages-plan-card__amount" data-monthly="$0" data-yearly="$0">$0</span>
                            <span class="packages-plan-card__period">/ month</span>
                        </div>
                        <ul class="packages-plan-card__features">
                            <li><i class="fa-solid fa-check"></i> Create profile & browse</li>
                            <li><i class="fa-solid fa-check"></i> Limited daily matches</li>
                            <li><i class="fa-solid fa-check"></i> Join public events</li>
                            <li><i class="fa-solid fa-check"></i> Basic messaging</li>
                            <li class="packages-plan-card__muted"><i class="fa-solid fa-minus"></i> Premium gifts & boosts</li>
                        </ul>
                        <a href="/user/sign-up" class="btn btn--outline packages-plan-card__btn w-100">Get Started</a>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="packages-plan-card packages-plan-card--featured">
                        <span class="packages-plan-card__badge">Most popular</span>
                        <div class="packages-plan-card__icon" aria-hidden="true">
                            <i class="fa-solid fa-crown"></i>
                        </div>
                        <h3 class="packages-plan-card__name">Premium</h3>
                        <p class="packages-plan-card__tagline">For active connectors</p>
                        <div class="packages-plan-card__price">
                            <span class="packages-plan-card__amount" data-monthly="$19" data-yearly="$15">$19</span>
                            <span class="packages-plan-card__period">/ month</span>
                        </div>
                        <ul class="packages-plan-card__features">
                            <li><i class="fa-solid fa-check"></i> Unlimited matches & likes</li>
                            <li><i class="fa-solid fa-check"></i> See who liked you</li>
                            <li><i class="fa-solid fa-check"></i> Priority event RSVPs</li>
                            <li><i class="fa-solid fa-check"></i> Video chat & read receipts</li>
                            <li><i class="fa-solid fa-check"></i> Monthly gift credits</li>
                        </ul>
                        <a href="/user/login" class="btn btn--primary btn--hover-theme packages-plan-card__btn w-100">Upgrade Now</a>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="packages-plan-card">
                        <div class="packages-plan-card__icon" aria-hidden="true">
                            <i class="fa-solid fa-gem"></i>
                        </div>
                        <h3 class="packages-plan-card__name">Elite</h3>
                        <p class="packages-plan-card__tagline">Maximum visibility & perks</p>
                        <div class="packages-plan-card__price">
                            <span class="packages-plan-card__amount" data-monthly="$39" data-yearly="$29">$39</span>
                            <span class="packages-plan-card__period">/ month</span>
                        </div>
                        <ul class="packages-plan-card__features">
                            <li><i class="fa-solid fa-check"></i> Everything in Premium</li>
                            <li><i class="fa-solid fa-check"></i> Profile boost & spotlight</li>
                            <li><i class="fa-solid fa-check"></i> Travel booking perks</li>
                            <li><i class="fa-solid fa-check"></i> Concierge event access</li>
                            <li><i class="fa-solid fa-check"></i> Priority 24/7 support</li>
                        </ul>
                        <a href="/user/login" class="btn btn--outline packages-plan-card__btn w-100">Go Elite</a>
                    </article>
                </div>
            </div>

            <p class="packages-plans__note text-center mt-4">
                <i class="fa-solid fa-lock"></i> Secure checkout · Cancel anytime · No hidden fees
            </p>
        </div>
    </section>

    <section class="packages-compare" aria-labelledby="packages-compare-heading">
        <div class="container">
            <div class="row mb-4 mb-lg-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 id="packages-compare-heading" class="packages-section-title">Compare <span>plans</span></h2>
                    <p class="packages-section-desc">See exactly what’s included at every level.</p>
                </div>
            </div>
            <div class="packages-table-wrap">
                <table class="packages-table">
                    <thead>
                        <tr>
                            <th scope="col">Features</th>
                            <th scope="col">Free</th>
                            <th scope="col" class="packages-table__highlight">Premium</th>
                            <th scope="col">Elite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Daily matches</th>
                            <td>10 / day</td>
                            <td class="packages-table__highlight">Unlimited</td>
                            <td>Unlimited</td>
                        </tr>
                        <tr>
                            <th scope="row">Video chat</th>
                            <td><i class="fa-solid fa-xmark packages-table__no" aria-label="No"></i></td>
                            <td class="packages-table__highlight"><i class="fa-solid fa-check packages-table__yes" aria-label="Yes"></i></td>
                            <td><i class="fa-solid fa-check packages-table__yes" aria-label="Yes"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Event priority</th>
                            <td>Standard</td>
                            <td class="packages-table__highlight">Priority</td>
                            <td>VIP access</td>
                        </tr>
                        <tr>
                            <th scope="row">Travel discounts</th>
                            <td><i class="fa-solid fa-xmark packages-table__no" aria-label="No"></i></td>
                            <td class="packages-table__highlight">5% off</td>
                            <td>15% off</td>
                        </tr>
                        <tr>
                            <th scope="row">Gift credits / mo</th>
                            <td>—</td>
                            <td class="packages-table__highlight">$10</td>
                            <td>$30</td>
                        </tr>
                        <tr>
                            <th scope="row">Profile boost</th>
                            <td><i class="fa-solid fa-xmark packages-table__no" aria-label="No"></i></td>
                            <td class="packages-table__highlight"><i class="fa-solid fa-xmark packages-table__no" aria-label="No"></i></td>
                            <td><i class="fa-solid fa-check packages-table__yes" aria-label="Yes"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Support</th>
                            <td>Email</td>
                            <td class="packages-table__highlight">Priority</td>
                            <td>24/7 dedicated</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="packages-faq" aria-labelledby="packages-faq-heading">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <h2 id="packages-faq-heading" class="packages-section-title">Frequently asked <span>questions</span></h2>
                    <p class="packages-section-desc mb-4">
                        Everything you need to know before upgrading. Still unsure? Our team is happy to help.
                    </p>
                    <a href="{{ route('user.read.contact') }}" class="btn btn--outline">Contact support</a>
                </div>
                <div class="col-lg-7">
                    <div class="packages-faq-list">
                        <details class="packages-faq-item" open>
                            <summary>Can I switch plans later?</summary>
                            <p>Yes. Upgrade or downgrade anytime from your account settings. Changes apply on your next billing cycle unless you choose immediate upgrade.</p>
                        </details>
                        <details class="packages-faq-item">
                            <summary>Is there a free trial for Premium?</summary>
                            <p>New members often receive promotional access—check your dashboard after sign-up. Standard billing applies when a trial ends unless you cancel.</p>
                        </details>
                        <details class="packages-faq-item">
                            <summary>What payment methods do you accept?</summary>
                            <p>We support major cards, PayPal, and region-specific options where available. All transactions are encrypted and PCI-compliant.</p>
                        </details>
                        <details class="packages-faq-item">
                            <summary>Do plans include all Wandr modules?</summary>
                            <p>Every plan includes core access to dating, events, travel discovery, and gifting. Higher tiers unlock limits, credits, and premium features in each module.</p>
                        </details>
                        <details class="packages-faq-item">
                            <summary>How do I cancel my subscription?</summary>
                            <p>Go to Settings → Subscription → Cancel. You’ll keep Premium benefits until the end of your paid period, then revert to Free automatically.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="packages-cta">
        <div class="container">
            <div class="packages-cta__inner text-center">
                <img src="{{ asset('imgs/premium-badge.svg') }}" alt="" class="packages-cta__badge" width="64" height="64" aria-hidden="true">
                <h2 class="packages-cta__title">Start free. <span>Upgrade when it clicks.</span></h2>
                <p class="packages-cta__text">Join thousands who use one app for connection, experiences, and everything after.</p>
                <a href="/user/sign-up" class="btn btn--primary btn--hover-theme">Create Free Account</a>
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script>
(function () {
    var toggle = document.querySelector('.packages-billing-toggle');
    if (toggle) {
        var amounts = document.querySelectorAll('.packages-plan-card__amount');
        var periods = document.querySelectorAll('.packages-plan-card__period');

        toggle.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-billing]');
            if (!btn) return;

            toggle.querySelectorAll('.packages-billing-toggle__btn').forEach(function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');

            var yearly = btn.getAttribute('data-billing') === 'yearly';
            amounts.forEach(function (el) {
                el.textContent = yearly ? el.getAttribute('data-yearly') : el.getAttribute('data-monthly');
            });
            periods.forEach(function (el) {
                el.textContent = yearly ? '/ month, billed yearly' : '/ month';
            });
        });
    }

    var faqItems = document.querySelectorAll('.packages-faq-item');
    faqItems.forEach(function (item) {
        item.addEventListener('toggle', function () {
            if (!item.open) return;
            faqItems.forEach(function (other) {
                if (other !== item) {
                    other.open = false;
                }
            });
        });
    });
})();
</script>
@endpush

@endsection
