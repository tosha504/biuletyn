$(document).ready(function () {
  var header = $('.header'),
      burger = $(".header__burger span"),
      body = $("body"),
      navMobile = $(".header__mobile");
  $(window).on('scroll', function (e) {
    if ($(window).scrollTop() > 20) {
      // console.log($(window).scrollTop());
      header.addClass('fixed');
    } else {
      header.removeClass('fixed');
    }
  });
  $("a[href^='#']").on("click", function (e) {
    var target = $(this).attr("href");
    $("html, body").animate({
      scrollTop: $(target).offset().top - 120
    }, 1000);
  });
  burger.on("click", function (event) {
    burger.toggleClass("active");
    navMobile.toggleClass("active");
    body.toggleClass("fixed-page");
  });
  $('.slider').slick({
    arrows: false,
    autoplay: true,
    pauseOnFocus: false
  });
  $('.click-prev').on('click', function () {
    $('.slider').slick('slickPrev');
  });
  $('.click-next').on('click', function () {
    $('.slider').slick('slickNext');
  });
  $('.usually__slider').slick({
    arrows: false,
    autoplay: true,
    pauseOnFocus: false,
    dots: true
  });
  $('.click-prev').on('click', function () {
    $('.usually__slider').slick('slickPrev');
  });
  $('.click-next').on('click', function () {
    $('.usually__slider').slick('slickNext');
  });
  $('.card__wrap_gallery').owlCarousel({
    margin: 10,
    items: 1,
    loop: false,
    nav: false,
    dotsContainer: '#dotsSliderGallery',
    onInitialized: counter,
    onTranslated: counter,
    responsive: {
      0: {
        stagePadding: 25
      },
      768: {
        stagePadding: 50
      },
      1000: {
        stagePadding: 0
      }
    }
  });

  function counter(event) {
    var element = event.target; // DOM element, in this example .owl-carousel

    var items = event.item.count; // Number of items

    var item = event.item.index + 1; // Position of the current item
    // it loop is true then reset counter from 1

    if (item > items) {
      item = item - items;
    }

    if (item < 10 && items < 10) {
      $(element).parent().find('#countSliderGallery').html("0" + item + " | " + "0" + items);
    } else {
      $(element).parent().find('#countSliderGallery').html(item + " | " + items);
    }
  }
});
