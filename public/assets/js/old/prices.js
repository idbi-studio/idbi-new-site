
$(document).ready(function() {

    $(".heading_prices").fadeIn(500).css("display", "flex");
  
    const headerForFullPageHide = new ScrollMagic.Controller({container: "body"});

    const RotatingTop = new ScrollMagic.Scene({
        triggerElement: ".rotating_prices", 
        triggerHook: .1,
        offset: 1,
        duration: 10,
        })
        .setTween( ".fixed_header", 1, {top: 0, opacity: 1, ease: Linear.easeOutQuart})
        .addTo(headerForFullPageHide)

    var pricesFullpage = new fullpage('#fullpage', {
        fitToSection: true,
        anchors: ['hero', 'prices', 'feedback', 'whyexpensive', 'contactus'],
    }); 

    const RotatingPrices = new ScrollMagic.Controller({container: ".rotating-vertical"});
 
    $(".fish").each(function() {
        const RotatingTop = new ScrollMagic.Scene({
        triggerElement: this, 
        duration: 270,
        offset: 190
        })
        .setTween( this, {scale: 1.3, color: "#b6b6b6;", ease: Linear.easeOutCubic})
        .addTo(RotatingPrices)
	});

    $(".fish").each(function() {
        const RotatingBottom = new ScrollMagic.Scene({
        triggerElement: this, 
        duration: 270,
        offset: -190
        })
        .setTween( this, {scale: 2.1, color: "white", ease: Linear.easeInCubic})
        .addTo(RotatingPrices)  
    });

    var swiperRotating = new Swiper('.rotating-vertical', {
    direction: 'vertical',
    autoplay: false,
    speed: 1100,
    slidesPerView: 2,
    initialSlide: 2,
    resistanceRatio: 0.7,
    freeMode: true,
    freeModeSticky: true,
    slideToClickedSlide: true,
    mousewheel: false,
    loop: false,
    grabCursor: true,
    centeredSlides: true,
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable: true,
        },
    breakpoints: {
        0: {
            slidesPerView: 3,
        },
        480: {
            slidesPerView: 3,
        },
        640: {
            slidesPerView: 3,
        }
    }
    
    });
    
    // document.addEventListener('touchmove', function(e) {
    //     // Если 1 палец внутри элемента
    //     if (e.targetTouches.length == 1) {
    //       var touch = e.targetTouches[0];
    //       // Place element where the finger is
    //       swiperRotating.style.left = touch.pageX + 'px';
    //       swiperRotating.style.top = touch.pageY + 'px';
    //     }
    //   }, false);

    // document.addEventListener('touchmove', function (event) {
    //     handleTouchMove(event, 'SCROLL')
    //   }, false);

    var notOnTheEdge = true;

    swiperRotating.on('touchEnd', function () { 
        var index = this.activeIndex;
        var segment = $('.rotating-vertical_section').eq(index).data('segment');
        if (segment == 5) {
            if (!notOnTheEdge) {
                fullpage_api.moveSectionUp();
            }
            notOnTheEdge = false;
        } else if (segment == 1) {
            if (!notOnTheEdge) {
                fullpage_api.moveSectionDown();
            }
            notOnTheEdge = false;
        } else {
            notOnTheEdge = true;
        }
    });
    
    var swiperWhy = new Swiper('#adaptiveSlider', {
        autoplay: true,
        speed: 500,
        slidesPerView: 1,
        loop: true,
        grabCursor: false,
        initialSlide: 1,
    });

    // function onMouseWheel(e) {
    //     clearTimeout($.data(this, 'timer'));
    
    //     $(".swiper-wrapper").addClass('mousewheel');
    //     $.data(this, 'timer', setTimeout( function () {
    //       $(".swiper-wrapper").removeClass('mousewheel')
    
    //         }, 250));
    //   };
      
    //   window.addEventListener( 'mousewheel', onMouseWheel, false )
    //   window.addEventListener( 'DOMMouseScroll', onMouseWheel, false )
  
});
