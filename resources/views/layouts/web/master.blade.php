<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Wandr</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        html.is-preloading,
        html.is-preloading body {
            overflow: hidden !important;
            height: 100%;
        }
    </style>
    <script>
        document.documentElement.classList.add('is-preloading');
    </script>
</head>

<body>
    <div id="site-preloader" class="preloader-wrapper" role="status" aria-live="polite" aria-busy="true" aria-label="Loading Wandr">
        <div class="preloader-wrapper__mesh" aria-hidden="true"></div>
        <div class="preloader-wrapper__content">
            <div class="lds-heart preloader-heart" aria-hidden="true">
                <div></div>
            </div>
            <span class="visually-hidden">Loading…</span>
        </div>
    </div>
    @include('layouts.web.header')
    @yield('content')
    @include('layouts.web.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/js/scroll-smooth.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
    (function () {
        var preloader = document.getElementById('site-preloader');
        var root = document.documentElement;
        if (!preloader) return;

        var reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var fadeMs = reducedMotion ? 0 : 500;
        var minShowMs = reducedMotion ? 0 : 500;
        var maxShowMs = 4000;
        var startedAt = Date.now();
        var hidden = false;

        function lockScroll() {
            root.classList.add('is-preloading');
        }

        function unlockScroll() {
            root.classList.remove('is-preloading');
        }

        lockScroll();

        function hidePreloader() {
            if (hidden) return;
            hidden = true;
            preloader.classList.add('is-hidden');
            preloader.setAttribute('aria-busy', 'false');

            window.setTimeout(function () {
                unlockScroll();
                if (preloader.parentNode) {
                    preloader.parentNode.removeChild(preloader);
                }
            }, fadeMs);
        }

        function scheduleHide() {
            var elapsed = Date.now() - startedAt;
            var delay = Math.max(0, minShowMs - elapsed);
            window.setTimeout(hidePreloader, delay);
        }

        if (document.readyState === 'complete') {
            scheduleHide();
        } else {
            window.addEventListener('load', scheduleHide, { once: true });
        }

        window.setTimeout(hidePreloader, maxShowMs);
    })();
    </script>
    @stack('scripts')
</body>

</html>