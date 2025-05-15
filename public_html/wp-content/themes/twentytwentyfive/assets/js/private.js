$(document).ready(function() {

    var btn = $('#back-to-top');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });

    var countFlag = false;
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    $(window).scroll(function(){

        $('.in_view').each(function () {
            if (isScrolledIntoView(this) === true) {
                if(!countFlag) {
                    countFlag = true;
                    $(".timer").countTo({
                        speed: 1000,
                        refreshInterval: 2
                    });
                }
            }else {
                countFlag = false;
            }
        });

        var $nelsonItem = $('.nelson_item');
        var oTop2 = 0;
        $.each($nelsonItem, function() {
            var oTop2 = $(this).offset().top - window.innerHeight;
            if ($(window).scrollTop() > oTop2) {
                $(this).addClass('active')
            }
        });
        if($('.number_left').length) {
            var number_left = $('.number_left');
            var oTop4 = number_left.offset().top - window.innerHeight;
            if ($(window).scrollTop() > oTop4 ) {
                number_left.addClass('active')
            }
        }
    });

    function animateSequence() {
        var a = document.getElementsByClassName('sequence');
        for (var i = 0; i < a.length; i++) {
            var $this = a[i];
            var letter = $this.innerHTML;
            letter = letter.trim();
            var str = '';
            var delay = 100;
            for (l = 0; l < letter.length; l++) {
                if (letter[l] != ' ') {
                    str += '<span style="animation-delay:' + delay + 'ms; -moz-animation-delay:' + delay + 'ms; -webkit-animation-delay:' + delay + 'ms; ">' + letter[l] + '</span>';
                    delay += 150;
                } else
                    str += letter[l];
            }
            $this.innerHTML = str;
        }
    }

    function animateRandom() {
        var a = document.getElementsByClassName('random');
        for (var i = 0; i < a.length; i++) {
            var $this = a[i];
            var letter = $this.innerHTML;
            letter = letter.trim();
            var delay = 70;
            var delayArray = new Array;
            var randLetter = new Array;
            for (j = 0; j < letter.length; j++) {
                while (1) {
                    var random = getRandomInt(0, (letter.length - 1));
                    if (delayArray.indexOf(random) == -1)
                        break;
                }
                delayArray[j] = random;
            }
            for (l = 0; l < delayArray.length; l++) {
                var str = '';
                var index = delayArray[l];
                if (letter[index] != ' ') {
                    str = '<span style="animation-delay:' + delay + 'ms; -moz-animation-delay:' + delay + 'ms; -webkit-animation-delay:' + delay + 'ms; ">' + letter[index] + '</span>';
                    randLetter[index] = str;
                } else
                    randLetter[index] = letter[index];
                delay += 80;
            }
            randLetter = randLetter.join("");
            $this.innerHTML = randLetter;
        }
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    $('.news_detail').closest('body').find('header').addClass('black');
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 1) {
            $('header').addClass('scroll');
            $('main').addClass('scroll');
        } else {
            $('header').removeClass('scroll');
            $('main').removeClass('scroll');
        }
    });
    var swiper = new Swiper(".banner_slider .swiper", {
        autoplay: {
            delay: 8000
        },
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        speed: 2000,
        navigation: {
            nextEl: ".next-kk",
            prevEl: ".prev-kk",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">'+ 0 + (index + 1) + "</span>";
            },
        },
    });
    var swiper2 = new Swiper(".faci_slider .swiper", {
        autoplay: true,
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        speed: 1500,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            1024: {
                loop: false,
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
        navigation: {
            nextEl: ".next-1",
            prevEl: ".prev-1",
        },
    });
    for (i=1; i < 10; i++) {
        var swiper5 = new Swiper('.refined_slider_'+i+' .swiper', {
            autoplay: {
                delay: 5000
            },
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            speed: 1000,
            navigation: {
                nextEl: '.next-1'+i+'',
                prevEl: '.prev-1'+i+'',
            },
        });
    }
    var swiper414 = new Swiper(".his_slider .swiper", {
        autoplay: false,
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        speed: 1500,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper411 = new Swiper(".his_slider_thumb .swiper", {
        autoplay: true,
        slidesPerView: 3,
        spaceBetween: 0,
        loop: true,
        speed: 1500,
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 0,
            },
            1024: {
                slidesPerView: 7,
                spaceBetween: 0,
            },
        },
        thumbs: {
            swiper: swiper414,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper416 = new Swiper(".news_slider .swiper", {
        autoplay: false,
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        speed: 1500,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
        },
        pagination: {
            el: ".swiper-pagination-2",
            type: 'custom',
            renderCustom: function (swiper, current, total) {
                return '<div class="ok">'+ '<span class="current">' + current + '</span>' + '<span class="total">' + '/' + '<span>' +total+'</span>' + '</span>' + '</div>'
            }
        },
        navigation: {
            nextEl: ".next-n",
            prevEl: ".prev-n",
        },
    });
    var swiper417 = new Swiper(".partner_slider .swiper", {
        autoplay: true,
        slidesPerView: 3,
        spaceBetween: 10,
        loop: false,
        speed: 1500,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        navigation: {
            nextEl: ".next-f1",
            prevEl: ".prev-f1",
        },
    });
    function initSwiper(){
        var swiper13 = new Swiper(".no_slider_thumb_1 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper14 = new Swiper(".no_slider_main_1 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper13
            },
            navigation: {
                nextEl: ".nextt-1",
                prevEl: ".prevv-1",
            },
        });
        var swiper113 = new Swiper(".no_slider_thumb_2 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper114 = new Swiper(".no_slider_main_2 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper113
            },
            navigation: {
                nextEl: ".nextt-2",
                prevEl: ".prevv-2",
            },
        });
        var swiper115 = new Swiper(".no_slider_thumb_3 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper116 = new Swiper(".no_slider_main_3 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper115
            },
            navigation: {
                nextEl: ".nextt-3",
                prevEl: ".prevv-3",
            },
        });
        var swiper117 = new Swiper(".no_slider_thumb_4 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper118 = new Swiper(".no_slider_main_4 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper117
            },
            navigation: {
                nextEl: ".nextt-4",
                prevEl: ".prevv-4",
            },
        });

        var swiper20 = new Swiper(".no_slider_thumb_5 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper21 = new Swiper(".no_slider_main_5 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper20
            },
            navigation: {
                nextEl: ".nextt-5",
                prevEl: ".prevv-5",
            },
        });
        var swiper22 = new Swiper(".no_slider_thumb_6 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper23 = new Swiper(".no_slider_main_6 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper22
            },
            navigation: {
                nextEl: ".nextt-6",
                prevEl: ".prevv-6",
            },
        });
        var swiper24 = new Swiper(".no_slider_thumb_7 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper25 = new Swiper(".no_slider_main_7 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper24
            },
            navigation: {
                nextEl: ".nextt-7",
                prevEl: ".prevv-7",
            },
        });
        var swiper26 = new Swiper(".no_slider_thumb_8 .swiper", {
            autoplay: false,
            slidesPerView: 2,
            spaceBetween: 20,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            loop: true,
            speed: 1500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper27 = new Swiper(".no_slider_main_8 .swiper", {
            autoplay: true,
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 1500,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            preventInteractionOnTransition: true,
            thumbs: {
                swiper: swiper26
            },
            navigation: {
                nextEl: ".nextt-4",
                prevEl: ".prevv-4",
            },
        });
    }
    initSwiper();
    $("#nav-no1").click(function(){
        initSwiper();
    });
    $("#nav-no2").click(function(){
        initSwiper();
    });
    $("#nav-no3").click(function(){
        initSwiper();
    });
    $("#nav-no4").click(function(){
        initSwiper();
    });
    var swiper119 = new Swiper(".news_hot_slider .swiper", {
        autoplay: true,
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        speed: 1500,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
        },
        navigation: {
            nextEl: ".next",
            prevEl: ".prev",
        },
    });
    var swiper11 = new Swiper(".number_slider .swiper", {
        autoplay: {
            delay: 3000
        },
        speed: 1500,
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true
    });
    AOS.init({
        once:true,
        // disable: function () {
        //     var maxWidth = 767;
        //     return window.innerWidth < maxWidth;
        // }
    });
    $("#menu").mmenu({
        "extensions": [
            "fx-menu-zoom"
        ],
        "counters": true
    });
    $('.btn-search, .btn-s-mb').click(function () {
        $('.search-hd').slideToggle(200)
    });
})