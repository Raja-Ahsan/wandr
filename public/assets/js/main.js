(function () {
    var section = document.querySelector('.js-what-is-wandr');
    var body = document.querySelector('.js-what-is-wandr-body');
    if (!section || !body || body.dataset.splitDone === '1') {
        return;
    }

    var raw = body.textContent.replace(/\s+/g, ' ').trim();
    var words = raw.split(' ');
    body.textContent = '';
    var staggerMs = 42;
    var prefersReduced =
        window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    words.forEach(function (word, i) {
        var span = document.createElement('span');
        span.className = 'what-is-wandr__word';
        if (!prefersReduced) {
            span.style.transitionDelay = i * staggerMs + 'ms';
        }
        span.appendChild(document.createTextNode(word));
        body.appendChild(span);
        if (i < words.length - 1) {
            body.appendChild(document.createTextNode(' '));
        }
    });
    body.dataset.splitDone = '1';

    if (prefersReduced) {
        section.classList.add('what-is-wandr-sec--revealed');
        return;
    }

    var io = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    section.classList.add('what-is-wandr-sec--revealed');
                } else {
                    section.classList.remove('what-is-wandr-sec--revealed');
                }
            });
        },
        { root: null, rootMargin: '0px 0px -8% 0px', threshold: 0.2 }
    );
    io.observe(section);
})();

$('.testimonial-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: $('.testimonials-sec .arrow-prev'),
    nextArrow: $('.testimonials-sec .arrow-next'),
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          centerMode: false,
          centerPadding: '0px'
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          centerMode: false,
          centerPadding: '0px'
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '28px'
        }
      },
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '12px'
        }
      }
    ]
  });
$('.key-features-slider').slick({
    slidesToShow: 4,
    arrows: false,
    prevArrow: $('.arrows-wrapper .arrow-prev'),
    nextArrow: $('.arrows-wrapper .arrow-next'),
    responsive: [
        {
            breakpoint: 1300,
            settings: {
              arrows: false,
              slidesToShow: 3
            }
          },
      {
        // Slick uses width < breakpoint; 769 so 768px viewports get 2 slides (not 1300’s 3).
        breakpoint: 769,
        settings: {
          arrows: false,
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });