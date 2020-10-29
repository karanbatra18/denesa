$('.counter').each(function () {
    var $this = $(this),
        countTo = $this.attr('data-count');

    $({countNum: $this.text()}).animate({
            countNum: countTo
        },

        {

            duration: 8000,
            easing: 'linear',
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                $this.text(this.countNum);
                //alert('finished');
            }

        });

});
$(".top-doctors").owlCarousel({
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    margin: 25,
    loop: true,
    responsive: {
        0: {
            items: 1,
            dots: true,
        },
        767: {
            items: 2,

        },
        992: {
            items: 3,

        },
        1200: {
            items: 4,
            dots: false,
            nav: true,
        }
    }
});
$(".slide-testimonial").owlCarousel({
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    items: 1,
    margin: 25,
    loop: true,
    responsive: {
        0: {
            dots: true,
        },
        992: {
            dots: false,
            nav: true,
        }

    }
});

$(".testimonial-image").owlCarousel({
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    items: 1,
    margin: 10,
    loop: false,
    dots: true,

});

/* Get iframe src attribute value i.e. YouTube video url
   and store it in a variable */
//var url = $("#vidpop").attr('src');
var v_src = $(".modal").find("iframe").attr('src');
var url = v_src + '&rel=0&autoplay=1';
$(".modal").find("iframe").attr('src', '');
/* Assign empty url value to the iframe src attribute when
modal hide, which stop the video playing */
$(".modal").on('hide.bs.modal', function () {
    $(".modal").find("iframe").attr('src', '');
});
/* Assign the initially stored url back to the iframe src

attribute when modal is displayed again */
$(".modal").on('show.bs.modal', function () {
    $(".modal").find("iframe").attr('src', url);
});

// Go to Top
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('#scroll').fadeIn();
    } else {
        $('#scroll').fadeOut();
    }
});
$('#scroll').click(function () {
    $("html, body").animate({scrollTop: 0}, 600);
    return false;
});

// Dropdown
$(".menu-item-has-children > a").after('<span class="dropdown-toggle" ></span>');
$('body').on('click', '.dropdown-toggle', function () {
    if (!$(this).parents().hasClass('open')) {
        $('li').removeClass('open');
    }
    $(this).parent().toggleClass('open');
});

// header add class on scroll

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".navbar").addClass("darkHeader");
    } else {
        $(".navbar").removeClass("darkHeader");
    }
});

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 230) {
        $(".shd").addClass("section-top");
    } else {
        $(".shd").removeClass("section-top");
    }
});

(function ($) {
    $('.doctor-tabbing ul > li > a').click(function () {
        $('.active').removeClass('active'); // remove all current selections
        $(this).addClass('active')

    });
    "use strict"; // Start of use strict
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 230) {
            $(".doctor-tabbing").addClass("fixed-top");
        } else {
            $(".doctor-tabbing").removeClass("fixed-top ");
        }
    });
    // Smooth scrolling using jQuery easing

    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - 200)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });


})(jQuery); // End of use strict


$('.cost .more').click(function () {
    $(this).parents('.cost').addClass('expend');
});
$('.cost .less').click(function () {
    $(this).parents('.cost').removeClass('expend');
});
$('.mobile-search-button i').click(function () {
    $('.mobile-search-form').toggleClass('active');
    $('.navbar-collapse.collapse').removeClass('show');
    $('body').removeClass('overflow-hidden');

});
$('.navbar-toggler').click(function () {
    $('body').toggleClass('overflow-hidden');
});

// add for popup box
/*   $(window).on('load',function(){
      setTimeout(function(){
       $('.popup-form').addClass('show');
       $('body').addClass('overflow-hidden');
       }, 3000);
  });*/
$('.consulation_class').click(function () {
    $('.popup-form').removeClass('d-none');
    $('.popup-form').addClass('show');
    $('body').addClass('overflow-hidden');
});

$('.popup-form .close').click(function () {
    $('.popup-form').addClass('d-none');
    $('body').removeClass('overflow-hidden');
});

$('.single-blog-sidebar a').click(function () {
    $(this).parent('li').siblings('li').find('a').removeClass('active');
    $(this).parent('li').find('a').addClass('active');
});

   