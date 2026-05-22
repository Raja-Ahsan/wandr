<footer class="footer">
    <div class="container">
        <div class="footer-top gap-y-100">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo mb-3">
                        <img src="{{asset('imgs/logo.png')}}" alt="logo">
                    </div>
                    <p class="para footer-left-para mb-3">
                        To design and scale platforms that simplify how people interact, discover, and transact in everyday life.
                    </p>
                    <ul class="social-links d-flex align-items-center">
                        <li><a href="" class="social-icon"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="" class="social-icon"><i class="fa-brands fa-tiktok"></i></a></li>
                        <li><a href="" class="social-icon"><i class="fa-brands fa-pinterest-p"></i></a></li>
                        <li><a href="" class="social-icon"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                       
                        <div class="col-md-4">
                            <div class="footer-links-wrapper">
                                <h4 class="footer-links-title">Features</h4>
                                <ul>
                                <li><a href="{{ route('dating') }}">Dating</a></li>
                                    <li><a href="{{ route('events') }}">Events</a></li>
                                    <li><a href="{{ route('travel') }}">Travel</a></li>
                                    <li><a href="{{ route('gift') }}">Gifts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-links-wrapper">
                                <h4 class="footer-links-title">Quick Links</h4>
                                <ul>
                                    
                                    <li><a href="{{ route('why-wandr') }}">Why Wandr</a></li>
                                    <li><a href="{{ route('packages') }}">Pricing</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-links-wrapper">
                                <h4 class="footer-links-title">Contact</h4>
                                <ul>
                                    <li><a class="d-flex align-items-center gap-2" href="tel:2165265918"><span class="contact-icon"><i class="fa-solid fa-phone"></i></span> 216 526 5918</a></li>
                                    <li><a class="d-flex align-items-center gap-2" href="mailto:gengpaxton@gmail.com"><span class="contact-icon"><i class="fa-regular fa-envelope"></i></span> gengpaxton@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-12">
                    <p>
                        © {{ date('Y') }} Wandr. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>