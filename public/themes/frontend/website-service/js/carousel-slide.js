$(document).ready(function() {
    $('.owl-carousel.owl-carousel-project').owlCarousel({
        center: true,
        loop: true,
        margin: 80,
        nav: true,
        navText: [
            "<button class='slick-prev'></button>",
            "<button class='slick-next'></button>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1.5,
                margin: 10,
                navText: false
            },
            600: {
                items: 2.5,
                margin: 60,
                navText: false
            },
            1000: {
                items: 2.5
            }
        },
        // Các tùy chọn khác
        onInitialized: function(event) {
            var currentIndex = $(event.target).find('.owl-item.center').index();
            $(event.target).find('.owl-item').each(function(index) {
                if (Math.abs(currentIndex - index) > 1) {
                    $(this).addClass('fadeout');
                }
            });
        },
        onTranslated: function(event) {
            $(event.target).find('.owl-item').removeClass('fadeout');
            var currentIndex = $(event.target).find('.owl-item.center').index();
            $(event.target).find('.owl-item').each(function(index) {
                if (Math.abs(currentIndex - index) > 1) {
                    $(this).addClass('fadeout');
                }
            });
        }
    });

    $('.owl-carousel.carousel-news').owlCarousel({
        center: true,
        loop: true,
        margin: 77,
        nav: true,
        navText: [
            "<button class='slick-prev'></button>",
            "<button class='slick-next'></button>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1.5,
                margin: 20, /* Điều chỉnh khoảng cách */
                navText: false
            },
            600: {
                items: 3.5,
                margin: 30,
                navText: false
            },
            1000: {
                items: 4.5
            }
        },
        onInitialized: function (event) {
            var currentIndex = $(event.target).find('.owl-item.center').index();
            $(event.target).find('.owl-item').each(function (index) {
                if (Math.abs(currentIndex - index) > 1) {
                    $(this).addClass('fadeout');
                }
            });
        },
        onTranslated: function (event) {
            $(event.target).find('.owl-item').removeClass('fadeout');
            var currentIndex = $(event.target).find('.owl-item.center').index();
            $(event.target).find('.owl-item').each(function (index) {
                if (Math.abs(currentIndex - index) > 1) {
                    $(this).addClass('fadeout');
                }
            });
        }
    });

    $('.owl-carousel.customer-logos').owlCarousel({
        center: true,
        loop: true,
        margin: 45,
        nav: true,
        navText: false,
        autoplay: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 3,
                margin: 15,
                navText: false
            },
            600: {
                items: 5,
                margin: 35,
            },
            1000: {
                items: 7
            }
        },
    });

    $('.owl-carousel.process-list').owlCarousel({
        center: true,
        loop: true,
        margin: 52,
        nav: true,
        startPosition: 1,
        navText: [
            "<button class='slick-prev'></button>",
            "<button class='slick-next'></button>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 20, /* Điều chỉnh khoảng cách */
                navText: false
            },
            600: {
                items: 3,
                margin: 30,
                navText: false
            },
            1000: {
                items: 3
            }
        },
        onInitialized: function (event) {
            var currentIndex = $(event.target).find('.owl-item.center').index();
            $(event.target).find('.owl-item').each(function (index) {
                if (Math.abs(currentIndex - index) > 1) {
                    $(this).addClass('fadeout');
                }
            });
        },
        onTranslated: function (event) {
            $(event.target).find('.owl-item').removeClass('fadeout');
            var currentIndex = $(event.target).find('.owl-item.center').index();
            $(event.target).find('.owl-item').each(function (index) {
                if (Math.abs(currentIndex - index) > 1) {
                    $(this).addClass('fadeout');
                }
            });
        }
    });

    $('.owl-carousel.advantage-list').owlCarousel({
        center: false,
        loop: true,
        margin: 52,
        nav: true,
        startPosition: 1,
        navText: [
            "<button class='slick-prev'></button>",
            "<button class='slick-next'></button>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 20, /* Điều chỉnh khoảng cách */
                navText: false
            },
            600: {
                items: 3,
                margin: 30,
                navText: false
            },
            1000: {
                items: 3
            }
        },
    });



});
