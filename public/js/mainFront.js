
const gap = 16;

const carousel = document.getElementById("carousel-fac"),
  content = document.getElementById("content-fac"),
  next = document.getElementById("next-fac"),
  prev = document.getElementById("prev-fac");
if(next && prev && content){
  next.addEventListener("click", e => {
    carousel.scrollBy(width + gap, 0);
    if (carousel.scrollWidth !== 0) {
      prev.style.display = "flex";
    }
    if (content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
      next.style.display = "none";
    }
  });
  prev.addEventListener("click", e => {
    carousel.scrollBy(-(width + gap), 0);
    if (carousel.scrollLeft - width - gap <= 0) {
      prev.style.display = "none";
    }
    if (!content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
      next.style.display = "flex";
    }
  });
  
  let width = carousel.offsetWidth;
  window.addEventListener("resize", e => (width = carousel.offsetWidth));
  
}


$(function() {
  var galleryThumbs = new Swiper(".gallery-thumbs", {
    centeredSlides: true,
    centeredSlidesBounds: true, 
    direction: "horizontal",
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: false,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    watchOverflow: true,
    breakpoints: {
      480: {
        direction: "vertical",
        slidesPerView: 3,
      }
    }
  });
  var galleryTop = new Swiper(".gallery-top", {
    direction: "horizontal",
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    thumbs: {
      swiper: galleryThumbs
    },
  });
  galleryTop.on('slideChangeTransitionStart', function() {
    galleryThumbs.slideTo(galleryTop.activeIndex);
  });
  galleryThumbs.on('transitionStart', function() {
    galleryTop.slideTo(galleryThumbs.activeIndex);
  });
});


$(function() {
  
  $('.slide:not(:first) .layer').hide();
  
  var controller = new ScrollMagic.Controller();
  
  var wipeAnimation = new TimelineMax()
  .staggerTo(".slide:not(:last)", 1, {
      y: "-100%",
      ease: Linear.easeNone,
      onStartParams: ["{self}"],
      onStart: function fadeOut(tween) {
        $(tween.target).find('.layer').fadeOut();
        $(tween.target).next().find('.layer').delay(600).fadeIn();
      },
      onReverseCompleteParams: ["{self}"],
      onReverseComplete: function fadeIn(tween) {
        $(tween.target).find('.layer').fadeIn();
        $(tween.target).next().find('.layer').fadeOut();
      },
    }, 2, 1)
  .staggerTo(".slide:last", 1, {
      onCompleteParams: ["{self}"],
      onComplete: function (tween) {
        $(tween.target).find('.layer').fadeOut();
      },
      onReverseCompleteParams: ["{self}"],
      onReverseComplete: function (tween) {
        $(tween.target).find('.layer').fadeIn();
      },
    }, 1);

  new ScrollMagic.Scene({
    triggerElement: ".slides",
    triggerHook: "onLeave",
    duration: "300%"
  })
    .setPin(".slides")
    .setTween(wipeAnimation)
    .addTo(controller)

});