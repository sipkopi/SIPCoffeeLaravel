(function ($) {
  "use strict";

  $(document).ready(function () {
    let portfolioContainer = $('.portfolio-container');
    if (portfolioContainer.length > 0) {
      let portfolioIsotope = new Isotope(portfolioContainer[0], {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilterSelect = $('#portfolio-filters');
      if (portfolioFilterSelect.length > 0) {
        portfolioFilterSelect.on('change', function () {
          portfolioIsotope.arrange({
            filter: $(this).val()
          });
          portfolioIsotope.on('arrangeComplete', function () {
            AOS.refresh();
          });

          // Update the displayed text inside the dropdown
          const selectedOption = $(this).find('option:selected').text();
          $('#selected-filter-text').text(selectedOption);
        });
      }
    }
  });

  // Rest of your code...

  ﻿

  

  // Preloader area
  var windowOn = $(window);
  windowOn.on("load", function () {
    $("#loading").fadeOut(500);
  });

  // Menu bars
  $(".header-bar").on("click", function (e) {
    $(".main-menu, .header-bar").toggleClass("active");
  });

  // Mobile Menu
  $(".main-menu li a").on("click", function (e) {
    var element = $(this).parent("li");
    if (element.hasClass("open")) {
      element.removeClass("open");
      element.find("li").removeClass("open");
      element.find("ul").slideUp(300, "swing");
    } else {
      element.addClass("open");
      element.children("ul").slideDown(300, "swing");
      element.siblings("li").children("ul").slideUp(300, "swing");
      element.siblings("li").removeClass("open");
      element.siblings("li").find("li").removeClass("open");
      element.siblings("li").find("ul").slideUp(300, "swing");
    }
  });

  // Menu Top Fixed
  var fixed_top = $(".header-section");
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 300) {
      fixed_top.addClass("menu-fixed animated fadeInDown");
      fixed_top.removeClass("slideInUp");
      $("body").addClass("body-padding");
    } else {
      fixed_top.removeClass("menu-fixed fadeInDown");
      fixed_top.addClass("slideInUp");
      $("body").removeClass("body-padding");
    }
  });

  // Mega menu area
  $("#mega-menu-btn, .mega-menu-area").hover(
    function () {
      $(".mega-menu-area").addClass("mega-menu-hover");
    },
    function () {
      $(".mega-menu-area").removeClass("mega-menu-hover");
    }
  );

  // Scroll down area
  $("#scrollDown").on("click", function () {
    setTimeout(function () {
      $("html, body").animate({ scrollTop: "+=1000px" }, "slow");
    }, 1000);
  });

  // Shop count
  $(".quantity").on("click", ".plus", function (e) {
    let $input = $(this).prev("input.qty");
    let val = parseInt($input.val(), 10);
    $input.val(val + 1).change();
  });
  $(".quantity").on("click", ".minus", function (e) {
    let $input = $(this).next("input.qty");
    var val = parseInt($input.val(), 10);
    if (val > 0) {
      $input.val(val - 1).change();
    }
  });

  // Image src change
  $(document).on("click", ".changeImage", function () {
    var newImage = $(this).data("image");
    var fadeDuration = 50;
    $("#myImage").fadeOut(fadeDuration, function () {
      $("#myImage").attr("src", newImage);
      $("#myImage").fadeIn(fadeDuration);
    });
  });

  // Image src and class add
  $(document).on("mouseenter", ".changeImage2", function () {
    var newImage = $(this).data("image");
    var fadeDuration = 200;
    $("#myImage2").fadeOut(fadeDuration, function () {
      $("#myImage2").attr("src", newImage);
      $("#myImage2").fadeIn(fadeDuration);
    });
    $(this).addClass("clicked");
    $(".changeImage2").not(this).removeClass("clicked");
  });

  // Hide & show by toggle
  $(document).on("click", ".share-btn", function () {
    var target = $(this).data("target");
    $("#" + target).toggle();
  });

  // Hide & show by click
  $(document).on("click", "#openButton", function () {
    $("#targetElement").removeClass("side_bar_hidden");
  });
  $(document).on("click", "#closeButton", function () {
    $("#targetElement").addClass("side_bar_hidden");
  });

  // Radio btn
  $(document).ready(function () {
    $(document).on("click", ".radio-btn span", function () {
      $(this).toggleClass("radio-btn-active");
    });
  });

  // Isotope
  var $grid = $(".filter__items").isotope({});
  $(".filter__list").on("click", "li", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });
  $(".filter__list").each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on("click", "li", function () {
      $buttonGroup.find(".active").removeClass("active");
      $(this).addClass("active");
    });
  });

  // Background image
  $("[data-background]").each(function () {
    $(this).css(
      "background-image",
      "url(" + $(this).attr("data-background") + ")"
    );
  });

  // Video popup
  $(".video-popup").magnificPopup({
    type: "iframe",
    iframe: {
      markup:
        '<div class="mfp-iframe-scaler">' +
        '<div class="mfp-close"></div>' +
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
        "</div>",
      patterns: {
        youtube: {
          index: "youtube.com/",
          id: "v=",
          src: "https://www.youtube.com/embed/%id%?autoplay=1",
        },
        vimeo: {
          index: "vimeo.com/",
          id: "/",
          src: "//player.vimeo.com/video/%id%?autoplay=1",
        },
        gmaps: {
          index: "//maps.google.",
          src: "%id%&output=embed",
        },
      },
      srcAction: "iframe_src",
    },
  });

  // Map popup
  $(".map-popup").magnificPopup({
    disableOn: 700,
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
  });
// Hot item slider area start here ***
var swiper = new Swiper(".hot-items__slider", {
  loop: "true",
  spaceBetween: 30,
  speed: 500,
  centeredSlides: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
});
// Hot item slider area end here ***

// Product slider area start here ***
var swiper = new Swiper(".product-slider", {
  loop: "true",
  spaceBetween: 30,
  speed: 500,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".product-arry-next",
    prevEl: ".product-arry-prev",
  },
  breakpoints: {
    1200: {
      slidesPerView: 4,
    },
    992: {
      slidesPerView: 3,
    },
    575: {
      slidesPerView: 2,
    },
  },
});
// Product slider area end here ***


  // Add payment amount
  $(document).on("click", ".amount-btn", function () {
    $(".amount-btn").removeClass("active");
    $(this).addClass("active");
  });
  


  const search = document.getElementById("search"); 
  const items = document.querySelectorAll(".portfolio-item");
  
  search.addEventListener("input", (e) => filterData(e.target.value));

  function filterData(search) {
    items.forEach((item) => {
      if (item.innerText.toLowerCase().includes(search.toLowerCase())) {
        item.classList.remove("d-none");
      } else {
        item.classList.add("d-none");
      }
    });
  }


})(jQuery);
