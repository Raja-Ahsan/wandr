@extends('layouts.web.master')
@section('title', 'Dating')
@section('content')

<main class="dating-page-wrapper inner-page-wrapper">
    <section class="dating-banner inner-banner position-relative z-1">
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
    <section class="features-sec gap-b-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mx-auto">
                    <div class="text-center">
                        <h2 class="sec-title sec-title--dark text-center mb-3"><span class="text-primary-theme">Features</span></h2>
                        <p class="dating-sec-desc">
                            Everything you need to match, chat, and meet—designed around privacy and real connection.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-3">
                    <div class="d-flex flex-column row-gap-50" style="gap: 70px;">
                        <div class="feature-card-wrapper">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('imgs/icons/private-chat.png') }}" class="w-100" alt="">
                            </div>
                            <div class="feature-content-wrapper">
                                <h3 class="feature-title sec-title mb-3">Private <span>Chat</span></h3>
                                <p>Secure one-on-one messaging with read receipts and media sharing built for real conversations.</p>
                            </div>
                        </div>
                        <div class="feature-card-wrapper">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('imgs/icons/fb.png') }}" class="w-100" alt="">
                            </div>
                            <div class="feature-content-wrapper">
                                <h3 class="feature-title mb-3 sec-title">Facebook <span>Login</span></h3>
                                <p>Sign up in seconds with your social account and start matching without a long onboarding flow.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="feature-sec-img-wrapper">
                        <img src="{{ asset('imgs/dating-mobile.png') }}" class="w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex flex-column row-gap-50 feature-right-content" style="gap: 70px;">
                        <div class="feature-card-wrapper">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('imgs/icons/discovery.png') }}" class="w-100" alt="">
                            </div>
                            <div class="feature-content-wrapper">
                                <h3 class="feature-title mb-3 sec-title">Discovery <span>Settings</span></h3>
                                <p>Fine-tune who you see by age, distance, interests, and lifestyle preferences that matter to you.</p>
                            </div>
                        </div>
                        <div class="feature-card-wrapper">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('imgs/icons/location.png') }}" class="w-100" alt="">
                            </div>
                            <div class="feature-content-wrapper">
                                <h3 class="feature-title sec-title mb-3">Geo <span>Location</span></h3>
                                <p>Find matches nearby or explore new cities when you travel—connections follow where you go.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dating-testimonials-sec light-sec gap-y-100" id="testimonials">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="sec-title sec-title--dark text-center mb-3">What Our <span>Users</span> Say</h2>
                    <p class="dating-sec-desc">
                        Real stories from people who found meaningful connections on Wandr.
                    </p>
                </div>
            </div>
            <div class="row align-items-center gy-3 mb-4">
                <div class="col-lg-12">
                    <div class="arrows-wrapper d-flex justify-content-end gap-3 dating-testimonial-arrows">
                        <div class="arrows arrow-prev dating-arrow-prev" role="button" tabindex="0" aria-label="Previous testimonial"><i class="fa-solid fa-chevron-left"></i></div>
                        <div class="arrows arrow-next dating-arrow-next" role="button" tabindex="0" aria-label="Next testimonial"><i class="fa-solid fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="dating-testimonial-slider">
                        <div class="dating-testimonial-card">
                            <div class="dating-testimonial-card__head d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('imgs/avatars/1.png') }}" alt="" class="dating-testimonial-avatar" width="56" height="56">
                                <div>
                                    <h4 class="dating-testimonial-name">Sarah Mitchell</h4>
                                    <div class="dating-testimonial-stars" aria-label="5 out of 5 stars">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="dating-testimonial-quote">Wandr made it easy to meet someone genuine. The chat felt safe from day one, and we connected over shared interests—not just photos.</p>
                        </div>
                        <div class="dating-testimonial-card">
                            <div class="dating-testimonial-card__head d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('imgs/avatars/1.png') }}" alt="" class="dating-testimonial-avatar" width="56" height="56">
                                <div>
                                    <h4 class="dating-testimonial-name">James Carter</h4>
                                    <div class="dating-testimonial-stars" aria-label="5 out of 5 stars">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="dating-testimonial-quote">I tried other apps, but Wandr’s matching actually worked for me. Within weeks I was planning real dates with people nearby.</p>
                        </div>
                        <div class="dating-testimonial-card">
                            <div class="dating-testimonial-card__head d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('imgs/avatars/1.png') }}" alt="" class="dating-testimonial-avatar" width="56" height="56">
                                <div>
                                    <h4 class="dating-testimonial-name">Emily Rodriguez</h4>
                                    <div class="dating-testimonial-stars" aria-label="5 out of 5 stars">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="dating-testimonial-quote">Love the video chat and gift features—they helped conversations feel more personal before we met in person.</p>
                        </div>
                        <div class="dating-testimonial-card">
                            <div class="dating-testimonial-card__head d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('imgs/avatars/1.png') }}" alt="" class="dating-testimonial-avatar" width="56" height="56">
                                <div>
                                    <h4 class="dating-testimonial-name">David Kim</h4>
                                    <div class="dating-testimonial-stars" aria-label="5 out of 5 stars">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="dating-testimonial-quote">Clean design, thoughtful features, and a community that feels respectful. Exactly what I wanted from a dating platform.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dating-cta-sec light-sec gap-y-100 position-relative">
        <div class="container">
            <div class="row align-items-center justify-content-between g-5">
                <div class="col-lg-5">
                    <h2 class="sec-title sec-title--dark mb-4">Join thousands finding love on <span>Wandr</span></h2>
                    <p class="dating-sec-desc mb-4 mx-0">
                        Start matching today. Create your profile in minutes and discover people who are looking for the same thing you are.
                    </p>
                    <a href="/user/login" class="btn btn--outline">Get Started</a>
                </div>
                <div class="col-lg-6 position-relative">
                    <div class="dating-cta-img-wrapper">
                        <img src="{{ asset('imgs/dating/01.png') }}" class="w-100 dating-cta-phone" alt="Wandr app on mobile">
                    </div>
                    <img src="{{ asset('imgs/heart.png') }}" class="dating-cta-float dating-cta-float--heart" alt="" aria-hidden="true">
                    <span class="dating-cta-float dating-cta-float--dot" aria-hidden="true"></span>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script>
(function () {
    var toggle = document.querySelector('.dating-plan-toggle');
    if (!toggle) return;

    var amounts = document.querySelectorAll('.dating-plan-price__amount');
    var periodLabel = document.querySelectorAll('.dating-plan-price__period');

    toggle.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-billing]');
        if (!btn) return;

        toggle.querySelectorAll('.dating-plan-toggle__btn').forEach(function (b) {
            b.classList.remove('active');
        });
        btn.classList.add('active');

        var yearly = btn.getAttribute('data-billing') === 'yearly';
        amounts.forEach(function (el) {
            el.textContent = yearly ? el.getAttribute('data-yearly') : el.getAttribute('data-monthly');
        });
        periodLabel.forEach(function (el) {
            el.textContent = yearly ? '/ month, billed yearly' : '/ month';
        });
    });
})();

$(function () {
    var $slider = $('.dating-testimonial-slider');
    if (!$slider.length || typeof $.fn.slick !== 'function') return;

    $slider.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $('.dating-arrow-prev'),
        nextArrow: $('.dating-arrow-next'),
        responsive: [
            { breakpoint: 1200, settings: { slidesToShow: 2 } },
            { breakpoint: 768, settings: { slidesToShow: 1 } }
        ]
    });
});
</script>
@endpush

@endsection