/*
 * All Scripts Used in this Livesay Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

jQuery(document).ready(function($) {

  "use strict";
  // Livesay sticky header script
  $('.lvsy-header-sticky').sticky({topSpacing:0});
  if ($('.lvsy-header-sticky').hasClass('header-style-two')) {
    $('.sticky-wrapper').addClass('sticky-style-two');
  }

  // Testimonial style one indicator active
  $('.carousel-indicators li:first').addClass('active');

   $(".meks-instagram-widget a").removeAttr("title");

  // Livesay nav script
  $('ul.nav li.dropdown a').on('click', function() {
    var element = $(this).parent('.dropdown');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('.dropdown').removeClass('open');
      element.find('.dropdown-menu').slideUp();
    }
    else {
      element.addClass('open');
      element.children('.dropdown-menu').slideDown();
      element.siblings('.dropdown').children('.dropdown-menu').slideUp();
      element.siblings('.dropdown').removeClass('open');
      element.siblings('.dropdown').find('.dropdown').removeClass('open');
      element.siblings('.dropdown').find('.dropdown-menu').slideUp();
    }
  });
  $('.menu-item-has-children .dropdown-toggle, .menu-item-has-children .dropdown-menu .menu-item-has-children.dropdown > a').on('click', function(e) {
    e.stopPropagation();
    e.preventDefault();
  });
  // Livesay apply equal height in children div script
  $(window).load(function() {
    if (screen.width >= 650) {
      var maxheight = 0;
      $('ul.products .product').each(function () {
        maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
      });
      $('ul.products .product').height(maxheight);
    }
    if (screen.width > 991) {
      var maxheight = 0;
      $('.accommodation-item').each(function () {
        maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
      });
      $('.accommodation-item').height(maxheight);
    }

    if (screen.width >= 768) {
      var maxheight = 0;
      $('.lvsy-donors-style-three .lvsy-donor-item').each(function () {
        maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
      });
      $('.lvsy-donors-style-three .lvsy-donor-item').height(maxheight);
    }

    var maxheight = 0;
    $('.service-item').each(function () {
      maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
    });
    $('.service-item').height(maxheight);

    // Livesay countdown script
    $('.lvsy-countdown').each( function() {
      var $countdown = $(this);
      var date = $countdown.data("date");
      var id = $countdown.data("id");
      var format = $countdown.data("format");
      var count_format = format ? format : 'dHMS';
      // Plural Labels
      var years = $countdown.data("years");
      var months = $countdown.data("months");
      var weeks = $countdown.data("weeks");
      var days = $countdown.data("days");
      var hours = $countdown.data("hours");
      var minutes = $countdown.data("minutes");
      var seconds = $countdown.data("seconds");
      // Singular Labels
      var year = $countdown.data("year");
      var month = $countdown.data("month");
      var week = $countdown.data("week");
      var day = $countdown.data("day");
      var hour = $countdown.data("hour");
      var minute = $countdown.data("minute");
      var second = $countdown.data("second");

      var austDay = new Date();
      austDay = new Date(date);
      $('.lvsy-count-'+id).countdown({
        until: austDay,
        labels: [years,months,weeks,days,hours,minutes,seconds],
        labels1: [year,month,week,day,hour,minute,second],
        format: count_format,
      });
    });

    // Livesay carousel script
    $('.lvsy-carousel').each( function() {
      var $carousel = $(this);
      var $items = ($carousel.data("items") !== undefined) ? $carousel.data("items") : 3;
      var $items_laptop = ($carousel.data("laptop") !== undefined) ? $carousel.data("laptop") : 3;
      var $items_tablet = ($carousel.data("tablet") !== undefined) ? $carousel.data("tablet") : 3;
      var $items_mobile = ($carousel.data("mobile") !== undefined) ? $carousel.data("mobile") : 1;
      $carousel.owlCarousel ({
        loop : ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : false,
        items : $carousel.data("items"),
        margin : ($carousel.data("margin") !== undefined) ? $carousel.data("margin") : 0,
        dots : ($carousel.data("dots") !== undefined) ? $carousel.data("dots") : false,
        nav : ($carousel.data("nav") !== undefined) ? $carousel.data("nav") : false,
        navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
        autoplay : ($carousel.data("autoplay") !== undefined) ? $carousel.data("autoplay") : false,
        autoplayTimeout : ($carousel.data("autoplay-time") !== undefined) ? $carousel.data("autoplay-time") : 5000,
        animateOut : ($carousel.data("animateout") !== undefined) ? $carousel.data("animateout") : false,
        animateIn : ($carousel.data("animatein") !== undefined) ? $carousel.data("animatein") : false,
        mouseDrag : true,
        autoWidth : ($carousel.data("auto-width") !== undefined) ? $carousel.data("auto-width") : false,
        autoHeight : ($carousel.data("auto-height") !== undefined) ? $carousel.data("auto-height") : false,
        responsiveClass: true,
        responsive : {
          0 : {
            items : $items_mobile,
          },
          850 : {
            items : $items_tablet,
          },
          1200 : {
            items : $items_laptop,
          },
          1600 : {
            items : $items,
          }
        }
      });

      var totLength = $(".owl-dot", $carousel).length;
      $(".total-no", $carousel).html(totLength);
      $(".current-no", $carousel).html(totLength);
      $carousel.owlCarousel();
      $(".current-no", $carousel).html(1);
      $carousel.on('changed.owl.carousel', function(event) {
        var total_items = event.page.count;
        var currentNum = event.page.index + 1;
        $(".total-no", $carousel ).html(total_items);
        $(".current-no", $carousel).html(currentNum);
      });
    });

  });

  // Livesay toggle script
  $('.lvsy-toggle').on('click', function () {
    $(this).toggleClass('active');
  });

  $(".lvsy-toggle").on('click', function () {
    $(".lvsy-nav").slideToggle();
  });

  //brxy hover script
  $('.speaker-item, .gallery-item, .pricing-item, .share-blog, .products .product, .lvsy-event-video, .video-item').hover (
    function() {
      $(this).addClass('lvsy-hover');
    },
    function() {
      $(this).removeClass('lvsy-hover');
    }
  );

  // Livesay Parallax Script
  if (screen.width >= 768) {
    if ( $('.lvsy-parallax').length > 0 ) {
      $(this).parallax( {
        scrollProperty: 'scroll',
        verticalOffset: 0,
        horizontalOffset: 0,
        horizontalScrolling: false,
        responsive: true
     });
    }
  }

  // Livesay parallax script
  $('.lvsy-parallax').parallax ({});

  // Livesay has content script
  $('.event-item:has(.event-info p)').addClass('has-content');

   // Livesay has content script
  $('.event-title').click(function () {
    var next = $(this).next('.event-info-wrap');
    $('.event-info-wrap').not(next).slideUp(350);
    next.slideToggle(350);
  });
  var $lists = $('.event-title').click(function(e) {
    $lists.filter('.active').removeClass('active');
     $(this).addClass('active');
     e.preventDefault() /*ignores actual link*/
  });

  // Livesay sticky sidebar script
  $('.lvsy-secondary').theiaStickySidebar ({
    additionalMarginTop: 106,
  });

  // Livesay gallery script
  $('.lvsy-gallery').fancybox ({
    helpers : {
      title : {
        type: 'outside'
      },
      thumbs  : {
        width : 80,
        height  : 80
      }
    }
  });

  // Livesay custom video control script
  $('.video-wrap .lvsy-control-btn a').click(function () {
    if ($('.video-wrap video').get(0).paused) {
      $('.video-wrap video').get(0).play();
    }
    else {
      $('.video-wrap video').get(0).pause();
    }
    $('.lvsy-control-btn').toggleClass('pause');
    $('.lvsy-event-video').toggleClass('video-on');
  });

  // Livesay vertical scroll script
  if (screen.width >= 1200) {
    $('.vertical-scrollbox').enscroll ({
      showOnHover: true,
      horizontalScrolling: false,
    });
  }

  // Livesay horizontal scroll script
  $('.horizontal-scrollbox').enscroll ({
    showOnHover: true,
    verticalScrolling: false,
    horizontalScrolling: true,
    horizontalTrackClass: 'horizontal-track',
    horizontalHandleClass: 'horizontal-handle',
  });

  // Livesay responsive tabs script
  $('.woocommerce-tabs').responsiveTabs ({
    collapsible: false,
    animation: 'fade',
    duration: 0,
    active: 0,
  });

  // Livesay back top script
  $('.lvsy-back-top').hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 150) {
      $('.lvsy-back-top').fadeIn();
    }
    else {
      $('.lvsy-back-top').fadeOut();
    }
  });
  $('.lvsy-back-top a').click(function () {
    $('body,html').animate ({
      scrollTop: 0
    }, 350);
  return false;
  });

  // Star ratings for comments
  $( 'p.stars' ).hide();
  $('#rating').show();

  // Livesay swiper slider script
  var swipermw = $('.swiper-container.mousewheel').length ? true : false;
  var swiperkb = $('.swiper-container.keyboard').length ? true : false;
  var swipercentered = $('.swiper-container.center').length ? true : false;
  var swiperautoplay = $('.swiper-container').data('autoplay');
  var swiperinterval = $('.swiper-container').data('interval'),
  swiperinterval = swiperinterval ? swiperinterval : 7000;
  swiperautoplay = swiperautoplay ? swiperinterval : false;

  // Livesay swiper fadeslides script
  var autoplay = 5000;
  var swiper = new Swiper('.fadeslides', {
    autoplayDisableOnInteraction: false,
    effect: 'fade',
    speed: 800,
    loop: true,
    paginationClickable: true,
    watchSlidesProgress: true,
    autoplay: autoplay,
    simulateTouch: false,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    mousewheelControl: swipermw,
    keyboardControl: swiperkb,
  });

});