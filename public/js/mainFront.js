
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


  const carousel2 = document.getElementById("carousel-facTes"),
  content2 = document.getElementById("content-facTes"),
  next2 = document.getElementById("next-facTes"),
  prev2 = document.getElementById("prev-facTes");
if(next2 && prev2 && content2){
  next2.addEventListener("click", e => {
    carousel2.scrollBy(width2 + gap, 0);
    if (carousel2.scrollWidth !== 0) {
      prev2.style.display = "flex";
    }
    if (content2.scrollWidth - width2 - gap <= carousel2.scrollLeft + width2) {
      next2.style.display = "none";
    }
  });
  prev2.addEventListener("click", e => {
    carousel2.scrollBy(-(width2 + gap), 0);
    if (carousel2.scrollLeft - width2 - gap <= 0) {
      prev2.style.display = "none";
    }
    if (!content2.scrollWidth - width2 - gap <= carousel2.scrollLeft + width2) {
      next2.style.display = "flex";
    }
  });
  
  let width2 = carousel2.offsetWidth;
  window.addEventListener("resize", e => (width2 = carousel2.offsetWidth));
  
}
/*FOTOS 1 */

$(function() {
  var galleryThumbs = new Swiper("#galeria1Tu", {
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
  var galleryTop = new Swiper("#galeria1To", {
    direction: "horizontal",
    spaceBetween: 10,
    navigation: {
      nextEl: "#galeria1sig",
      prevEl: "#galeria1prev"
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
/*FOTOS 2*/ 

$(function() {
  var galleryThumbs = new Swiper("#galeria2Tu", {
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
  var galleryTop = new Swiper("#galeria2To", {
    direction: "horizontal",
    spaceBetween: 10,
    navigation: {
      nextEl: "#galeria2sig",
      prevEl: "#galeria2prev"
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
/**/ 
/*FOTOS 3*/ 

$(function() {
  var galleryThumbs = new Swiper("#galeria3Tu", {
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
  var galleryTop = new Swiper("#galeria3To", {
    direction: "horizontal",
    spaceBetween: 10,
    navigation: {
      nextEl: "#galeria3sig",
      prevEl: "#galeria3prev"
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
/**/ 
/*FOTOS 4*/ 

$(function() {
  var galleryThumbs = new Swiper("#galeria4Tu", {
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
  var galleryTop = new Swiper("#galeria4To", {
    direction: "horizontal",
    spaceBetween: 10,
    navigation: {
      nextEl: "#galeria4sig",
      prevEl: "#galeria4prev"
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
/**/ 
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

/**/ 

let items = document.querySelectorAll('#informacionPosgrado.carousel .carousel-item');

if(undefined !== items){

  items.forEach((el) => {
  
    let minPerSlide = 4
    let next = el.nextElementSibling
    let size = $(window).width(); 
    if(size<768){
        minPerSlide = 2
    }
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            
              if(items.length>=5){
              next = items[0]
              }
          
        }
       
        if(next!=null){
          let cloneChild = next.cloneNode(true)
          el.appendChild(cloneChild.children[0])
          next = next.nextElementSibling
        }
        
    }
   
})
}


$(function(){
  var seleccionar = document.querySelector('.stickyHeaderFacul') !== null;
  if(seleccionar)
  {
      var stickyHeaderTop = $('.stickyHeaderFacul').offset().top;
    if(stickyHeaderTop){
      $(window).scroll(function(){
            if( $(window).scrollTop()> stickyHeaderTop-46 ) {
                    $('.stickyHeaderFacul').css({position: 'fixed', top: '38px'});
                  
            } else {
                    $('.stickyHeaderFacul').css({position: 'static', top: '38px'});
            }
      });
    }
   }
});


var nextButton = $("#right-btnN");
var backButton = $("#left-btnN");
var con = $("#cont");
var sliderCont = $("#slider-containerN");

var i = 0;


var mL = 0, maxX = 200, diff = 0 ;

function slide() {
   mL-=100;
  if( mL < -maxX ){ mL = 0 ;}
  sliderCont.animate({"margin-left" : mL + "%"}, 800);
}

function slideBack() {
  mL += 100;
  if ( mL > 0 ) { mL = -200 ; }
  sliderCont.animate({"margin-left" : mL + "%"}, 800);
}

nextButton.click(slide);
backButton.click(slideBack);

$(document).on("mousedown touchstart", con, function(e) {
  
  var startX = e.pageX || e.originalEvent.touches[0].pageX;
  diff = 0;

  $(document).on("mousemove touchmove", function(e) {
    
      var xt = e.pageX || e.originalEvent.touches[0].pageX;
      diff = (xt - startX) * 100 / window.innerWidth;
    if( mL == 0 && diff > 10 ) { 
      event.preventDefault() ;
    } else if (  mL == -maxX && diff < -10 ) {
       event.preventDefault();   
    } else {
      sliderCont.css("margin-left", mL + diff + "%");
    }
  });
});

$(document).on("mouseup touchend", function(e) {
  $(document).off("mousemove touchmove");
  if(  mL == 0 && diff > 4 ) { 
      sliderCont.animate({"margin-left" :  0 + "%"},100);
   } else if (  mL == -maxX  && diff < 4 ){
       sliderCont.animate({"margin-left" : -maxX  + "%"},100);  
   } else {
      if (diff < -10) {
        slide();
      } else if (diff > 10) {
        slideBack();
      } else {
        sliderCont.animate({"margin-left" :  mL + "%"},300);
      }
  }
});