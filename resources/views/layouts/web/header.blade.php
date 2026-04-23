<header class="header z-2 position-absolute w-100">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="{{ asset('imgs/logo.png') }}" alt="">
            </div>
            <nav class="primary-navs-wrapper flex-grow-1">
                <ul id="primaryNavs" class="primary-navs d-flex justify-content-between align-items-center ">
                    <li class="close-icon d-lg-none">
                        <button type="button" class="border-0 bg-transparent p-0 lh-1" id="headerNavClose" aria-label="Close menu">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Why Wandr</a></li>
                    <li><a href="#">Stories</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li class="d-lg-none w-100 px-1 mt-2">
                        <a href="/user/login" class="btn btn--outline w-100 text-center">Get Started</a>
                    </li>
                </ul>
            </nav>
            <div class="menu-icon d-lg-none">
                <button type="button" class="border-0 bg-transparent p-0 lh-1" id="headerNavOpen" aria-controls="primaryNavs" aria-expanded="false" aria-label="Open menu">
                    <i class="fa-solid fa-bars" aria-hidden="true"></i>
                </button>
            </div>
            <a href="/user/login" class="btn btn--outline d-none d-lg-inline-block text-nowrap">Get Started</a>
        </div>
    </div>
</header>



<script>
(function () {
    var mq = window.matchMedia('(max-width: 991.98px)');
    var nav = document.getElementById('primaryNavs');
    var openBtn = document.getElementById('headerNavOpen');
    var closeBtn = document.getElementById('headerNavClose');
    if (!nav || !openBtn || !closeBtn) return;

    function setOpen(isOpen) {
        nav.classList.toggle('active', isOpen);
        openBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        if (mq.matches) {
            document.body.style.overflow = isOpen ? 'hidden' : '';
            document.body.style.touchAction = isOpen ? 'none' : '';
        } else {
            document.body.style.overflow = '';
            document.body.style.touchAction = '';
        }
    }

    function closeNav() {
        setOpen(false);
    }

    function openNav() {
        if (mq.matches) setOpen(true);
    }

    openBtn.addEventListener('click', function () {
        if (nav.classList.contains('active')) closeNav();
        else openNav();
    });
    closeBtn.addEventListener('click', closeNav);

    nav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (mq.matches) closeNav();
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeNav();
    });

    if (mq.addEventListener) {
        mq.addEventListener('change', function (e) {
            if (!e.matches) closeNav();
        });
    } else if (mq.addListener) {
        mq.addListener(function (e) {
            if (!e.matches) closeNav();
        });
    }

    window.addEventListener('resize', function () {
        if (!mq.matches) closeNav();
    });
})();
</script>

<style>
    @media (max-width: 991.98px) {
        .header .logo img {
            max-width: min(160px, 55vw);
            height: auto;
        }
    }
</style>