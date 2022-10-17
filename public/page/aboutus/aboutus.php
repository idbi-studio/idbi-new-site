<?php

require_once '../../../src/connect_db.php';
/** @var $db */
?>
<section class="reg-page">
    <div class="container">
        <h1 style="white-space: nowrap">О НАС</h1>
        <div class="serv-points row is-grid">
            <div class="serv-point cell-6">
                <div class="inner about-us-list">
                    <div class="serv-title">
                        КОМПАНИЯ
                    </div>
                    <div class="serv-text">
                        <p>Digital агентство IDBI помогает бизнесу расти и развиваться в интернете с 2011 года.</p>
                        <p>Предлагаем своим клиентам широкий спектр услуг по разработке продающих интернет-магазинов под
                            ключ, высоконагруженных веб-ресурсов и приложений, расширяющих функционал любой CMS.
                            Брэндинг, дизайн, аналитика, разработка различной сложности модулей и программирование
                            помноженные на экспертизу наших сотрудников.</p>
                        <a href="https://www.insales.ru/collection/all/product/idbi" title=""> <img width="200px"
                                                                                                    src="/assets/images/web-sertificate_partner_1.png"
                                                                                                    alt="pic"/> </a>
                        <a href="https://ratingruneta.ru/e-commerce/high/" title=""
                           style="display: block; position: absolute; z-index: 99999; padding-top: 20px;">
                            <img style="width: 259px;"
                                 src="https://images.cmsmagazine.ru/diff/cms-badges-generated/ecom_global/20190/59c4a4c73a86ef56c0fa135a91b98552_badge_6210d9bda480cb.png"
                                 alt="Рейтинг разработчиков интернет-магазинов. Верхний сегмент"/></a>
                    </div>
                </div>
            </div>
            <div class="serv-point cell-6">
                <div class="inner about-us-list">
                    <div class="serv-title">
                        Клиенты
                    </div>
                    <section class="client-reviews about-us__client-reviews" id="reviews">
                        <div class="container">
                            <div class="row">
                                <div class="cell-12">
                                    <div class="pagination-logos"></div>
                                </div>
                                <div class="cell-8">
                                    <div class="swiper-promo-wrap">
                                        <div class="swiper-container js-reviews">
                                            <div class="swiper-wrapper">
                                                <?php
                                                $result = $db->query("SELECT * from idbi_review WHERE 1;");
                                                while ($review = $result->fetch_assoc()) {
                                                    ?>
                                                    <div class="swiper-slide" data-logo="<?= $review['image'] ?>">
                                                        <div class="client-review-content"
                                                             style="display:none;"><?= $review['content'] ?></div>
                                                        <div class="client-review-author" style="display:none;">
                                                            <div>
                                                                <strong><?= $review['title'] ?></strong>
                                                            </div>
                                                            <div><?= $review['link'] ?></div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#feedback-modal" class="i-wish js-modal" title="Хочу так же">Хочу так же</a>
                        <div class="cross"></div>
                        <a href="#feedback-modal" class="i-wish js-modal" title=""><img
                                    src="/assets/images/idbi_review.png" alt="pic"></a>
                    </section>
                </div>
            </div>
        </div>
        <section class="our-rewards">
            <h2 class="our-rewards__title">Наши<span>награды</span></h2>
            <div class="our-rewards__container row is-grid">
                <!-- lsits -->
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
                <a class="our-rewards__item cell-3" title="" data-aos="fade-up" data-aos-duration="600"
                   data-aos-once="true" data-fancybox="images" href="/assets/images/awards_sites_diplom_1st.jpg">
                    <div class="our-rewards__body text-center">
                        <h3 class="our-rewards__item-title">«Рейтинг разработчиков интернет-магазинов» <br>Верхний
                            сегмент</h3>
                        <p class="our-rewards__number">1 место</p>
                    </div>
                    <span class="our-rewards__label">Рейтинг Рунета</span>
                </a>
            </div>
        </section>
    </div>
</section>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/snippets/start-project.php' ?>
<section id="learn-more" class="learn-more">
    <div class="decor-title">
        <div class="container">
            <h2>Чем индивидуальный дизайн лучше шаблонного решения?</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="cell-7 points">
                <div class="row">
                    <div class="cell-6">
                        <strong>— 1</strong>
                        Повышение престижа компании, становление узнаваемого, оригинального фирменного стиля. Клиенты
                        видят, что в сайт вложили много сил и стараний и не «отваливаются» из-за подозрительного
                        внешнего вида, как это бывает у шаблонов.
                    </div>
                    <div class="cell-6">
                        <strong> — 2</strong>
                        Код, написанный по последним правилам верстки и программирования. Такие сайты индексируются
                        поисковыми роботами во много раз лучше шаблонов.
                    </div>
                    <div class="cell-6">
                        <strong>— 3</strong>
                        Благодаря многолетней практике создания сайтов различной тематики (а их, на минуточку, более 500
                        проектов), мы собрали огромную базу знаний как повысить вашу конверсию и по итогу повысить
                        прибыль.
                    </div>
                    <div class="cell-6">
                        <strong>— 4</strong>
                        Юридическая гарантия результата и качества — мы работаем по договору, в рамках которого
                        закрепляем и передаем авторские права на разработку.
                    </div>
                </div>
            </div>
            <div class="cell-5 garant hide-xs">
                <p><span class="bg-text mousemove-follower">Чем выше конверсия вашего ресурса — тем выше прибыль. <br/> Достичь максимальной конверсии и есть наша главная задача.<i
                                class="after"></i></span></p>
                <small>Дизайн сайта является вашей собственностью</small>
            </div>
        </div>
    </div>
</section>
