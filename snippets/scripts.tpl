<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

<script type="text/javascript" src="/assets/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.inputmask-multi.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/assets/js/snap.svg.js"></script>
<script type="text/javascript" src="/assets/js/swiper.min.js"></script>
<script type="text/javascript" src="/assets/js/typed.js"></script>
<script type="text/javascript" src="/assets/js/DetectiveScroll.js"></script>
<script type="text/javascript" src="/assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="/assets/js/aos.js"></script>








<script type="text/javascript" src="/assets/js/theme.js"></script>
<script type="text/javascript" src="/assets/js/jquery.onepage-scroll.js"></script>
<script type="text/javascript" src="/assets/js/slick.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>




<script>

$(function(){
	$('footer .open-map').on('click', function(){
		window.open('https://yandex.ru/maps/213/moscow/?mode=search&text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%80%D1%8F%D0%B7%D0%B0%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%2018%D1%815&sll=37.662012%2C55.772178&sspn=0.015053%2C0.004917&ll=37.661068%2C55.771905&z=17', '_blank');
	});
});

var lFollowX = 0,
    lFollowY = 0,
    x = 0,
    y = 0,
    friction = 1 / 30;

function moveBackground() {
  x += (lFollowX - x) * friction;
  y += (lFollowY - y) * friction;

  translate = 'translate('+x+'px, '+y+'px)';

  $('.mousemove-follower .after').css({
    '-webit-transform': translate,
    '-moz-transform': translate,
    'transform': translate
  });

  window.requestAnimationFrame(moveBackground);
}

$(window).on('mousemove click', function(e) {

  var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
  var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
  lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
  lFollowY = (10 * lMouseY) / 100;

});

moveBackground();

    AOS.init();
		function jsImg(){
 $('.js-load').each(function(){
       var thisEl = $(this);

     if(thisEl.hasClass('js-loaded')){

        } else{
         var elTop = thisEl.offset().top;
           var windowSumm = ($(window).scrollTop() * 1) + ($(window).height() * 1);

           if(windowSumm >= elTop){
               var dataSrc = thisEl.attr('data-src');
               console.log(dataSrc);
             thisEl.attr('src', dataSrc).css('opacity', '1').addClass('js-loaded');
            }
        }
    });
}

$(document).ready(function(){
 jsImg();
});
$(window).scroll(function(){
 jsImg();
});
$(window).resize(function(){
 jsImg();
});
  </script>

<script type="text/javascript">
$(document).ready(function(){

	if ($('body').hasClass('template-is-index')){
		var bigCircleOptions = [
			{r: 570, fill: "#dbd6d9"},
			{r: 570, fill: "#ff4747"},
			{r: 570, fill: "#ffffff"},
			{r: 522, fill: "#ffc5c6"},
			{r: 522, fill: "#36bdc"},
			{r: 404, fill: "#fff15f"},
			{r: 572, fill: "#e7bdc9"},
			{r: 404, fill: "#d2d2d2"},
			{r: 572, fill: "#f6a0cd"},
			{r: 522, fill: "#ffcfe0"},
			{r: 572, fill: "#ff2847"},
			{r: 522, fill: "#ffffff"}
		];
		var smallCircleOptions = [
			{r: 375},
			{r: 375},
			{r: 370},
			{r: 320},
			{r: 320},
			{r: 204},
			{r: 373},
			{r: 204},
			{r: 378},
			{r: 320},
			{r: 378},
			{r: 320}
		];
		var s = Snap("#snap-svg");
		var bigCircle = s.circle(572, 572, 570);
		var smallCircle = s.circle(572, 572, 370);
		bigCircle.attr({
			fill: "#fff"
		});
		smallCircle.attr({
			fill: "#f6f6f6"
		});
		var promoSlider = new Swiper('.js-promo', {
			effect: 'fade',
			speed: 700,
			pagination: {
				el: '.promo-slider-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.promo-slider-next',
				prevEl: '.promo-slider-prev',
			},
			on: {
				slideChange: function(){
					bigCircle.animate(bigCircleOptions[this.realIndex], 700);
					smallCircle.animate(smallCircleOptions[this.realIndex], 700);
				}
			},
			loop: true,
			paginationClickable: true,
			autoHeight: false,
			autoplay: {
				delay: 2000,
				fadeEffect: {
					crossFade: true
				}
			}
		});
	      
	    $('.js-promo-next').on('click', function(e){
	   		e.preventDefault();
			promoSlider.slideNext();
		});
    
	}
});
</script>

<!-- НАШИ РАБОТЫ -->
  <script type="text/javascript">
  function portSlider_all(){

    var portSlides = $('.js-port-slider-all');

    portSlides.each(function(){
      var thisEl = $(this);
      var parentEl = thisEl.parents('.new-inner:first');

      var portSlide = thisEl.find('.port-slide');
      var firstSlide = thisEl.find('.port-slide:first-child');
      var lastSlide = thisEl.find('.port-slide:last-child');
      var paginationContainer = parentEl.find('.port-pagination');

      var lastIndex = lastSlide.index() * 1;
 
      for (var i = 0; i <= lastIndex; i++) {
        if (i === 0) {
          paginationContainer.append('<span class="port-bullet active"></span>');
        } else{
          paginationContainer.append('<span class="port-bullet"></span>');
        }
      }

      var firstBullet = paginationContainer.find('.port-bullet:first-child');
      var portBullet = paginationContainer.find('.port-bullet');
      firstSlide.addClass('active');

      portBullet.on('click', function(){
        var thisEl = $(this);
        var thisIndex = thisEl.index() * 1;

        portBullet.each(function(){
          $(this).removeClass('active');
        });
        thisEl.addClass('active');

        portSlide.each(function(){
          var thisEl_2 = $(this);
          var thisIndex_2 = thisEl_2.index();

          if(thisIndex === thisIndex_2){
            thisEl_2.addClass('active');
          } else{
            thisEl_2.removeClass('active');
          }
        });

      });
			thisEl.on('click', function(){
	 console.log(paginationContainer.find('.port-bullet.active').index());
	 //если последний то кликнуть по первому
	 if (paginationContainer.find('.port-bullet').length - 1 == paginationContainer.find('.port-bullet.active').index()) {
	 	paginationContainer.find('.port-bullet:first').click();
	 } else {
	 	paginationContainer.find('.port-bullet.active').next('.port-bullet').click();
	 }


	 	 });
    });
  }

  portSlider_all();

</script>

<!-- {% include "templates_option" %} -->
<!-- {% include "modals" %} -->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/feedback.tpl' ?>

<script>
$(window).load( function () {
	$(".load-wrap").remove();
})
</script>




