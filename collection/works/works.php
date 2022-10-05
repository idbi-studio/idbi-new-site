<div class="portfolio-page">

  <div class="container">
    <h1><span class="hide-xs">—</span> НАШИ РАБОТЫ</h1>
    <h3>С 2011 года мы разработали огромное количество интернет-магазинов: от небольших монопродуктовых лендингов, до крупных интернет-магазинов. Наши услуги подходят всем: как начинающим стартаперам, которые хотят попробовать, так и крупным игрокам, которые занимают лидирующие позиции на рынке ecommerce. С некоторыми из них вы можете ознакомиться ниже: </h3>

    <div class="new-works row">
      <div class="new-work with-form cell-4 cell-12-sm text-center" data-aos="fade-up" data-aos-duration="600">
        <div class="new-inner">
          <div class="new-content">
            <div class="new-recall">
              <img src="/assets/images/new-place.svg">
              <span>Место для вашего проекта</span>
              <button data-buy-id-place="252074080" class="button js-modal" data-title="project2" href="#feedback-modal">Оставить заявку</button>
            </div>
          </div>
        </div>
      </div>

      <?php include $_SERVER['DOCUMENT_ROOT'] . '/snippets/our-work.tpl' ?>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/snippets/our-work.tpl' ?>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/snippets/our-work.tpl' ?>

      <!-- to be continued -->
      <div class="new-work cell-4 cell-6-sm cell-12-xs text-center preview-98684111 aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
          <div class="new-inner">
              <div class="new-content">
                  <div class="new-text">
                      <div class="new-text-animation flex-middle row">
                          <div class="cell-10">
                              <div class="new-title">— to be continued</div>
                              <div class="new-subtitle"></div>
                          </div>
                          <div class="cell-2 text-right">
                              <i class="icon-eye fa fa-eye" href="" data-fancybox="project" data-width="1500"></i>
                          </div>
                      </div>
                  </div>
                  <img class="new-bg" src="/assets/images/portfolio_tobecontinued.jpg">
              </div>
              <div class="port-pagination"></div>
          </div>
      </div>

    </div>
  </div>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/snippets/start-project.tpl' ?>
  
  <a href="#feedback-modal" class="i-wish js-modal" >Хочу так же<</a>
  <div class="cross"></div>

</div>

<script>
$(function(){
    $('[data-fancybox]').fancybox({
       wheel: false,
       hideScrollbar: true
  });
})

</script>