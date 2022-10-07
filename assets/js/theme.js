

$(document).ready(function() {




  
  var $recently_view = $('.js-recently_view');
  if ($recently_view.length > 0) {
    var myRecentlyView = new RecentlyView({
      succes: function (_products) {
        if (_.size(_products) > 0) {
          var _templateRecentlyView = _.template($('[data-template-id="recently_view"]').html())
          $recently_view.html(_templateRecentlyView({ products: _products }));

          initSwiperSlider($('.js-recently-slider'), {
            autoLength: true,
            minCartWidth: 300,
            autoResponsive: false
          })
        }
      }
    });
  }
});

$(document).ready(function() {
  $(document).on('click', '.article-text img', function(event) {
    BigPicture({
      el: event.target
    });
  });
});




$(function () {
  $('.js-filter-trigger').on('change', function (event) {
    $(this).parents('form:first')
    .submit();
  });
  $(document)
    .on('click', 'label', function (event) {
      var $form = $(this).parents('form:first');
      var $filterItem = $(this).parents('.filter-item');
      var $checkbox = $filterItem.find(':checkbox');

      if ($form.hasClass('collection-filter')) {
        event.preventDefault();
        $checkbox
          .prop('checked', !$checkbox.prop('checked'))
          .trigger('change');
      }
    })
    .on('change', 'input:not(.js-filter-range-placeholder), select', function (event) {
      var $form = $(this).parents('form:first');

      sendFilter($form, $(this));
    })
    .on('click', '[type="submit"]', function (event) {
      var $form = $(this).parents('form:first');

      if ($form.hasClass('collection-filter')) {
        event.preventDefault();
        sendFilter($form, $(event.target));
      }
    })
    .on('check', '.collection-filter', function (event) {

      sendFilter($(this), $(this));
    });

  function sendFilter ($form, $source) {
    if (!$form.hasClass('collection-filter')) {
      return false;
    }

    var isSubmitOnChange = $form.data('submit-onchange');
    var isButton = $source.is('button');

    if (isSubmitOnChange || isButton) {
      $form.submit();
    }
  };
});


$(function () {

  var $compareCount = $('.js-compare-amount');
  var $compareTable = $('.js-compare-table');

  var compareWrapper = '#js-compare-wrapper';
  var compareInner = '#js-compare-inner';
  var compareUrl = document.location.href;


  /**
   * COMPARE VIEW
   * Настройка переключалки видимости блоков
   * @type {string}
   */
  var compareViewToggler = '.js-same-toggle';
  var sameRows = '.same-row';

  if (!$.cookie('compare-view') && $('.product-title').length > 1) {
    $(sameRows).hide();
    $(compareViewToggler).addClass('active');
  }

  $(document).on('click', compareViewToggler, function (e) {
    e.preventDefault();

    $(compareViewToggler).toggleClass('active');
    $(sameRows).toggle();

    if (!$(this).hasClass('active')) {
      $.cookie("compare-view", 'true');
    } else {
      $.removeCookie("compare-view");
    }

  });

});

/**
 * Склонение слов
 * @param  {number} _day  число
 * @param  {array} titles массив слов
 * @return {string}       склонение
 *
 * declinationText(2, ['человек', 'человека', 'человек'])
 * => 'человека'
 */
var declinationText = function(_day, titles) {
  var day = Math.round(_day);
  var _titles = ['товар', 'товара', 'товаров'];
  if (titles) {
    _titles = titles;
  }
  var cases = [2, 0, 1, 1, 1, 2];
  return _titles[ (day % 100 > 4 && day % 100 < 20) ? 2 : cases[(day % 10 < 5) ? day % 10 : 5]];
};


$(document).ready(function() {

  var fixed_header = new DetectiveScroll({
    trigger: {
      el: $('.fixed_header'),
      scroll: 100
    }
  })
});


$(document).ready(function() {
  if ($('.js-instagram').length) {
    // Получаем фотографии из API
    var myInstagram = new InstagramPhotos({
      user_id: 5720831737,
      access_token: '5720831737.1677ed0.75c5924295bb49eaa35c62372aabfd64',
      countPhoto: 20,
      done: function (photos) {
        var templateContent = $('[data-template-id="insta-footer"]').html();
        // Функция lodash шаблона
        var instaRenderContent = _.template(templateContent);

        var _instaContent = instaRenderContent({photos: photos});

        $('.js-instagram').html( _instaContent );
        setTimeout(function () {
          instaSlider()
        }, 100)
      },
      fail: function (error) {
        if (error.meta) {
          console.warn(error.meta.error_message);
        }
      }
    });
  }


  function instaSlider() {
    var minSlideWidth = 300;
    var _slidesPerView = _.floor( $('.js-instagram').outerWidth() /  minSlideWidth);
    if (_slidesPerView < 1) {
      _slidesPerView = 1;
    }
    var sliderLength = $('.js-instagram').find('.swiper-slide').length;
    var instagramSlider = new Swiper('.js-instagram', {
      slidesPerView: _slidesPerView,
      loopAdditionalSlides: sliderLength,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      speed: 600,
      setWrapperSize: true,
      paginationClickable: true,
      loop: true,
      preventClicks: true,
      controlBy: 'container',
      spaceBetween: 0
    });
  }

});

$(function(){

  $('.main-menu-marker').on('click', function(){
    $(this).parents('li:first').toggleClass('opened');

  });
  $('.js-toggle-menu, .opaco').on('click', function(e){
    e.preventDefault();

    $('#mobile-nav').toggleClass('opened');
    if ($('#mobile-nav').hasClass('opened')) {
      $('body').append('<div class="opaco"></div>');
      $('.opaco').fadeIn('slow');
    } else {
      $('.opaco').remove();
    }
    $('body').toggleClass('menu-opened');

  });

  $('body').on('click','.opaco', function(){
    $('#mobile-nav').removeClass('opened');
    $('.opaco').remove();
    $('body').removeClass('menu-opened');
  });
});

$(document).ready(function() {
  
  
  
  
  $.fancybox.defaults.animationEffect = "zoom-in-out";

  $(document).on('click', '.added-close', function(event) {
    event.preventDefault();
    $.fancybox.close();
  });


  $(document).on('click', '.js-modal', function(event) {
    event.preventDefault();

    $.fancybox.open({
      src  : $(this).attr('href'), // Source of the content
      type : 'inline',
      wheel: false
    });

  });


  $(document).on('click', '[data-open-mobile-menu]', function(event) {
      event.preventDefault();
      alertify.panel({
        target: '.mobile_menu',
        position: 'left'
      });
    });

  $('[name="phone"]').inputmask("+9(999) 999 9999");
  
  var listCountries = $.masksSort($.masksLoad("https://cdn.rawgit.com/andr-04/inputmask-multi/master/data/phone-codes.json"), ['#'], /[0-9]|#/, "mask");
  var listRU = $.masksSort($.masksLoad("https://cdn.rawgit.com/andr-04/inputmask-multi/master/data/phones-ru.json"), ['#'], /[0-9]|#/, "mask");
  var inputNamePhone = $('[name="phone"]');
  var maskOpts = {
    inputmask: {
      definitions: {
        '#': {
          validator: "[0-9]",
          cardinality: 1
        }
      },
      showMaskOnHover: false,
      autoUnmask: true,
      clearMaskOnLostFocus: false
    },
    match: /[0-9]/,
    replace: '#',
    listKey: "mask"
  };

  var maskChangeWorld = function(maskObj, determined) {
    if (determined) {
      var hint = maskObj.name_ru;
      if (maskObj.desc_ru && maskObj.desc_ru != "") {
        hint += " (" + maskObj.desc_ru + ")";
      }
      $("#descr").html(hint);
    } else {
      $("#descr").html("Маска ввода");
    }
  }

  $(inputNamePhone).inputmasks($.extend(true, {}, maskOpts, {
    list: listCountries,
    onMaskChange: maskChangeWorld
  }));

  $('[name="phone"]').on("keyup", function(event) {
    
  var value = $(event.target).inputmask("unmaskedvalue");

  if (value.length === 1 && value === "8") {
  	$('[name="phone"]').inputmask("8(999) 999 9999");
  } else {
  	$('[name="phone"]').inputmask("+9(999) 999 9999");
  }
});


});




$(".js-modal").click(function(e) {
      var productVariant = $(this).data('buy-id-place') || 253191219;
      $('[data-variant-id-feedback]').val(productVariant);
});

$(".js-modal-promo").click(function(e) {
      var productVariant = $(this).data('buy-id-place') || 253191219;
      $('[data-variant-id-feedback]').val(productVariant);
});





var mzOptions = {
  zoomDistance: 0,
  expand: 'window',
  rightClick: 'true',
  hint: 'off'
};
$(document).ready(function() {
  var $galleryThumbs = $('.js-gallery-thumbs');
  var $galleryMain = $('.js-product-gallery-main');

  var galleryThumbs = new Swiper('.js-gallery-thumbs', {
    loopedSlides: $('.js-gallery-thumbs .swiper-wrapper .swiper-slide').length,
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next.is-thumb',
      prevEl: '.swiper-button-prev.is-thumb',
    },
    speed: 200,
    loop: false,
    slidesPerView: 3,
    touchRatio: 0.2,
    slideToClickedSlide: true
  });

  var galleryTop = new Swiper('.js-product-gallery-main', {
    loopedSlides: $('.js-product-gallery-main .swiper-wrapper .swiper-slide').length,
    navigation: {
      nextEl: '.swiper-button-next.is-gallery',
      prevEl: '.swiper-button-prev.is-gallery',
    },
    speed: 200,
    loop: false,
    spaceBetween: 0
  });

  galleryTop.on('transitionEnd', function (e) {
    $('.js-gallery-trigger').removeClass('is-active');
    $('.js-gallery-trigger').eq(galleryTop.activeIndex).addClass('is-active');
  })

  galleryTop.params.control = galleryThumbs;
  galleryThumbs.params.control = galleryTop;

  $('.js-gallery-trigger:first').addClass('is-active');
  $(document).on('click', '.js-gallery-trigger', function(event) {
    event.preventDefault();
    var index = $(this).index();
    $galleryMain[0].swiper.slideTo(index);
  });

});



$(document).ready(function() {
  $('.js-products-slider').each(function(index, el) {
    var lastSliderFlag = false;
    if (index  == $('.js-products-slider').length - 1) {
        lastSliderFlag = true;
    }
    initSwiperSlider($(el), {
      autoLength: true, // автоматически выставить кол-во слайдов исходя из минимальной ширины карточки
      minCartWidth: 280, // Минимальная ширина карточки
      autoResponsive: false, // Автоматически расчитать респонсив для слайдера
      lastSlider: lastSliderFlag
    })
  });



});

/**
 * Инициализация слайдера
 * @param  {jquery object} $container $('.main-slider') селектор блока со слайдером. не swiper-container, а его родитель
 * @param  {object} options настройки для свайпера
 * @return {instance} Созданный инстанс слайдера
*/
function initSwiperSlider($container, _options) {
  var _uuid = generateUUID();
  var options = _options || {};
  var uniqueClass = '.' + 'slider-' + _uuid;
  var selector =  uniqueClass + ' .swiper-container';
  var $nextButton = uniqueClass + ' .swiper-button-next';
  var $prevButton = uniqueClass + ' .swiper-button-prev';
  var sliderLength = $container.find('.swiper-slide').length;
  var _parent = options._parents;
  var $parent = null;
  if (_parent) {
    $parent = $container.parents(_parent + ':first');
  }
  $container.addClass(uniqueClass.replace('.', ''));

  var mainSliderLength = 7;
  var minCartWidth = options.minCartWidth || 300;
  var containerWidth = $(selector).width();
  var containerParent = $(selector).parent().width();

  if (options.autoLength) {
    mainSliderLength = _.floor( containerWidth / minCartWidth );
    if (mainSliderLength < 1) {
      mainSliderLength = 1;
    }
  }

  var breakpoints = {};
  if (options.autoResponsive) {
    var _breakpoints = options.maxBreakpoint || 1280;
    var _minBreak = options.minBreakpoint || 300;
    if (_breakpoints > (containerWidth + (containerWidth - containerParent + 50))) {
      _breakpoints = containerWidth;
    }
    if ($('body').width() > $(window).width()) {
      _breakpoints = $('body').width();
    }
    var _points = _.floor(_breakpoints / 50);
    $.each(Array(_points), function(index, el) {
      var _breakpoint = _breakpoints - (50 * index);
      var slidesPerView = _.floor(_breakpoint / minCartWidth);
      if (slidesPerView < 1) {
        slidesPerView = 1;
      }

      if (_minBreak < _breakpoint) {
        breakpoints[_breakpoint] = {
          slidesPerView: slidesPerView,
          spaceBetween: 1
        }
      }
    });

  }

  var defaultOptions = {
    slidesPerView: 7,
    setWrapperSize: true,
    loop: mainSliderLength < sliderLength,
    loopAdditionalSlides: sliderLength,
    controlBy: 'container',
    spaceBetween: 1,
    navigation: {
      nextEl: $nextButton,
      prevEl: $prevButton,
    },
    pagination: {
      el: uniqueClass + ' .swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      1200: {
        slidesPerView: 6
      },
      1010: {
        slidesPerView: 5
      },
      768: {
        slidesPerView: 3
      },
      480: {
        slidesPerView: 2
      }
    },
    on: {
      init: function(){
        if (options.lastSlider) {

          $('.js-tabs').dataTabs({
            onTab: function(){


            }
          })
       }

      }
    }
  }

  var sliderOption = $.extend(true, defaultOptions, options);

  var showSlider = sliderLength > 0;
  var arrowHide = sliderLength < sliderOption.slidesPerView;

  if (arrowHide) {
    $container.addClass('arrow-hide');
  }
  if (!showSlider) {
    $container.addClass('is-empty');
    return;
  }

  var slider = new Swiper(selector, sliderOption);


  if ($parent) {
    $parent.on('mouseenter', function(event) {
      slider.update(true);
    });
  }

  $('.js-slider-next').on('click', function(e){
    e.preventDefault();
    slider.slideNext();
  });

  return slider;
}

function generateUUID() {
  var d = new Date().getTime();
  var uuid = 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = (d + Math.random()*16)%16 | 0;
    d = Math.floor(d/16);
    return (c=='x' ? r : (r&0x3|0x8)).toString(16);
  });
  return uuid;
};

$(document).ready(function() {
  var reviewsSlider = new Swiper('.js-reviews', {
	spaceBetween: 10,
    pagination: {
        el: '.pagination-logos',
        clickable: true,
        renderBullet: function (swiper, index, className) {

          console.log(swiper, index, className);
          console.log($('.js-reviews .swiper-slide').eq(swiper).attr('data-logo'));
          return '<div class="logo-bullet '+index+'"><img src="'+$('.js-reviews .swiper-slide').eq(swiper).attr("data-logo")+'" alt=""></div>';
        }
    },
    loop: false,
    paginationClickable: true,
    autoHeight: true,
  });

  /*
 $('.js-promo-next').on('click', function(e){
   e.preventDefault();
   promoSlider.slideNext();
 });
 */
if($('.js-type').length){
   var typed = new Typed('.js-type', {
  strings: ["в кратчайшие сроки!"],
  typeSpeed: 150,
  cursorChar: '',
  onComplete: function(){
    setTimeout(function () {
      $('.typed-cursor').fadeOut('300', function() {

      })
    }, 2000)

  }

});

}
});


let mobileAppBlockWrap = $('.mobile-app-block-wrap');

$(window).scroll(function() {
  var scrollDistance = $(window).scrollTop();

  mobileAppBlockWrap.each(function(i) {

    if ($(this).position().top < scrollDistance + 400) {
      $(this).addClass('active');
    }
  });
}).scroll();

if (mobileAppBlockWrap[0] && mobileAppBlockWrap.hasClass('active')) {
  	
  	$('.mobile-app-video').each(function() {
      	console.log('play');
      
      	$(this)[0].play();
    });
  
	new Typed('.js-type-mobile-app', {
      strings: ["приложений"],
      typeSpeed: 150,
      cursorChar: '',
      onComplete: function(){
        setTimeout(function () {
          $('.typed-cursor').fadeOut('1000', function() {})
        }, 500);
      }
    });
}

let observerConfig = {
  attributes: true,
};
let observer = new MutationObserver(function () {
  
  new Typed('.js-type-mobile-app', {
    strings: ["приложений"],
    typeSpeed: 150,
    cursorChar: '',
    onComplete: function(){
      setTimeout(function () {
        $('.typed-cursor').fadeOut('1000', function() {})
      }, 500);
    }
  });
});

if (mobileAppBlockWrap[0]) {
  observer.observe(mobileAppBlockWrap[0], observerConfig);
}



$(document).ready(function() {
  var scroll_top = new DetectiveScroll({
    trigger: {
      el: $('.js-scroll_top'),
      scroll: $(window).height() / 3
    }
  })

  $(document).on('click', '.js-scroll_top', function(event) {
    event.preventDefault();
    window.scroll({ top: 0, left: 0, behavior: 'smooth' });
  });
});


function deleteAllCookies() {
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++)
  {
      var spcook =  cookies[i].split("=");
      deleteCookie(spcook[0]);
  }
  function deleteCookie(cookiename)
  {
      var d = new Date();
      d.setDate(d.getDate() - 1);
      var expires = ";expires="+d;
      var name=cookiename;
      //alert(name);
      var value="";
      document.cookie = name + "=" + value + expires + "; path=/acc/html";
  }
  window.location = ""; // TO REFRESH THE PAGE
}

$(document).ready(function() {
  $(document).on('click', '[data-clear-cookies]', function(event) {
    event.preventDefault();
    deleteAllCookies();

    alertify.success('Куки очищены', 4)
  });
  $(document).on('click', '[data-clear-localforage]', function(event) {
    event.preventDefault();
    localforage.clear();

    alertify.success('localforage очищен', 4);
    window.location = ""; // TO REFRESH THE PAGE
  });
  $(document).on('click', '[data-clear-cart]', function(event) {
    event.preventDefault();
    Cart.clear();

    setTimeout(function () {
      alertify.success('Корзина очищена', 4);
      window.location = ""; // TO REFRESH THE PAGE
    }, 3000)
  });
});

$(document).ready(function() {
  $('[data-alert-success]').click(function(event) {
    alertify.success('Товар добавлен в корзину', 10)
  });
  $('[data-alert-error]').click(function(event) {
    alertify.error('Ошибка при отправке формы', 10)
  });
  $('[data-alert-warning]').click(function(event) {
    alertify.warning('Товар удален', 10)
  });
  $('[data-alert-message]').click(function(event) {
    alertify.message('Все поля обязательны для заполнения', 10)
  });

  $('.js-fav-style').click(function(event) {
    event.preventDefault();

    $(this).toggleClass('not-added is-added');
  });
});

$(document).ready(function() {
  $("a.go-link").click(function() {
    var elementClick = $(this).attr("href");
    var destination = $(elementClick).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({
      scrollTop: destination
    }, 800);
    return false;
  });
});

//====================================================================================================================== Мои скрипты




//======================================================================================================================Параллакс

// function myScroll(block, myDoc){
//   if( block.length != 0) {
//     var st = $(myDoc).scrollTop(); //высота скролинга страницы
//     var th = $(myDoc).height(); //высота окна
//     var blockDist = $(block).offset().top; //позиция блока относительно верха страниццы
//     var position = st - ( blockDist - th ); // вычитаем из позиции блока высоту окна и результат вычитаем из длинны скролинга
//     block.css( {"transform": "translate(0%, " + st / 8.5 + "%)"});
//
//   }
// }
//
// $(window).on("scroll", function(){
//   var self = this;
//   myScroll($(".wrwr"), self);
// });

//======================================================================================================================Конец Параллакс






// $(window).on("scroll", function(){
//   if($(this).scrollTop()>100){
//     $('.article-right-sidebar__wrap-form').addClass('fixed');
//   }
//   else if ($(this).scrollTop()<100){
//     $('.article-right-sidebar__wrap-form').removeClass('fixed');
//
//   }
// });



var windowHeight = $(window).height();
/*
$(document).on('scroll', function() {
  $('footer').each(function() {
    var self = $(this),
        height = self.offset().top - 200;
    if ($(document).scrollTop() + windowHeight >= height) {
      // $('.article-right-column-wrap').removeClass("fixed");
      // $('.article-right-sidebar__wrap-form').removeClass("fixed");
      $('.pis').removeClass("fixed");
      $('.shit').addClass("down");
      $(".go-to-idbi").removeClass("ooff");
    }else{
      // $('.article-right-column-wrap').addClass("fixed");
      // $('.article-right-sidebar__wrap-form').addClass("fixed");
      $('.pis').addClass("fixed");
      $('.shit').removeClass("down");
      $(".go-to-idbi").addClass("ooff");
    }
  });
});*/

var mql = window.matchMedia('all and (max-width: 1024px)');
if (mql.matches) {
  // размер окна 1024px или меньше
} else {
  // нет, размер окна более 1024px

  $(window).scroll(function(){
    if($(this).scrollTop()>140){
      $('.pis').addClass('fixed');
      $(".blog-link-to-idbi").show();
      $('footer').each(function() {
        var self = $(this),
            height = self.offset().top - 200;
        if ($(document).scrollTop() + windowHeight >= height) {
          $('.pis').removeClass("fixed");
          $('.shit').addClass("down");
          $(".go-to-idbi").removeClass("ooff");
          $(".blog-link-to-idbi").hide();
        }else{
          $('.pis').addClass("fixed");
          $('.shit').removeClass("down");
          $(".go-to-idbi").addClass("ooff");
        }
      });
    }
    else if ($(this).scrollTop()<140){
      $('.pis').removeClass('fixed');
      $(".blog-link-to-idbi").hide();
    }
  });
}










/*
$(document).on('submit','form',function(){
   console.log('onsubmit');
  var client_name = $(this).find('[name="name"]').val() || "пусто",
      client_phone = $(this).find('[name="phone"]').val().replace(" ", "").replace(" ", "") || "пусто",
      client_email = $(this).find('[type="email"]').val() || "пусто",
      from_site = 'idbi',
      from_form = $(this).attr('data-title-form') || "пусто";
  $.post(
      "https://letidbi.ru/lid_in.php",
  {
    client_name: client_name,
    client_phone: client_phone,
    client_email: client_email,
    from_site: from_site,
    from_form: from_form
  },
  	onAjaxSuccess
  );

  function onAjaxSuccess(data){
    console.log('лид', data);
  }
});*/






$('[data-title]').click(function(){
  	$('.js-feedback').attr('data-title-form', $(this).attr('data-title'));
});

$(document).on('click', '[data-title]', function(){
  setTimeout(function(){
  	$('.fancybox-content').addClass('h1os');
  	$('.fancybox-slide').addClass('h1os');
  }, 100)
	
});

$(document).ready(function() {
  $('body').addClass('dom-ready');

  $(window).on('load', function(event) {
    $('body').addClass('window-load');
  });

  $('[data-fancybox]').fancybox({
    /*toolbar: false,*/
       wheel: false,
       hideScrollbar: true
       /*afterClose : function() {
           console.log(123);
         $(".i-wish").removeClass("on");
       }*/
  });

  
});



    $(".icon-eye").on("click", function () {
      $(".i-wish").addClass("on");
      $(".cross").addClass("on");
    });
  
  
	$(".cross").on("click", function () {
  		$(".i-wish").removeClass("on");
      	$(".fancybox-button--close").click();
        $(this).removeClass("on");
	});

$(document).ready(function() {
  var awards = new Swiper('.awards', {
    speed: 400,
    spaceBetween: 30,
    slidesPerView: 4,
    navigation: {
      nextEl: '.award-swiper-button-next',
      prevEl: '.award-swiper-button-prev'
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      // when window width is <= 920px
      920: {
        slidesPerView: 3
      },
      640: {
        slidesPerView: 2
      },
      480: {
        slidesPerView: 1
      }
    }

  });
});

setTimeout(function () {
  $(window).scroll();
  $(window).resize();
}, 1000);















