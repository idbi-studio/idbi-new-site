<?php

require_once './src/connect_db.php';
/** @var $db */
?><?php

require_once './src/connect_db.php';
/** @var $db */
?>
<section class="heading">
    <div class="container">
        <div class="heading-inner">
            <h1>
                <span class="second-line" style="padding: 15px 33px 0; margin-top: 20px;">
                    Создаем
                </span>
                <div></div>
                <span class="first-line">
                    про<a class="secret-link" href="/page/secret" title="">даю</a>щий
                </span>
                <span class="second-line">
                    интернет-ресурс
                    <span class="js-type"></span>
                </span>
            </h1>
            <a href="#prices" class="learn-more-link go-link" title="">УЗНАТЬ</a>
        </div>
    </div>
</section>

<section class="promo-section">
    <div class="container">
        <?php include 'snippets/promo.php' ?>
    </div>
</section>

<!-- Рейтинг РУНЕТА -->
<?php include "snippets/our-award.php" ?>

<section class="new-portfolio" id="projects">
    <div class="container">
        <h2><span class="hide-xs">—</span> Наши работы</h2>

        <div class="new-works row">
            <!-- Items work -->
            <?php
            $result = $db->query("SELECT * from idbi_portfolio ORDER BY position DESC LIMIT 10;");
            $i = 1;
            while ($product = $result->fetch_assoc()) {
                if (in_array($i, [5, 11, 19, 36,])) {
                    ?>
                    <div class="new-work with-form cell-4 cell-12-sm text-center" data-aos="fade-up"
                         data-aos-duration="600">
                        <div class="new-inner">
                            <div class="new-content">
                                <div class="new-recall">
                                    <img src="/assets/images/new-place.svg" alt="">
                                    <span>Место для вашего проекта</span>
                                    <button data-buy-id-place="252074080" class="button js-modal" data-title="project2"
                                            href="#feedback-modal">Оставить заявку
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                include('./collection/works/work.php');
                $i++;
            }
            ?>

            <div class="new-work with-form cell-4 cell-12-sm text-center" data-aos="fade-up" data-aos-duration="600"
                 data-aos-once="true">
                <div class="new-inner">
                    <div class="new-content">
                        <a class="more-works" href="/" title="">Ещё</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- КАК ЭТО РАБОТАЕТ -->
<?php include 'snippets/who_needd.php' ?>

<section class="how-it-works">
    <div class="decor-title">
        <div class="container"><h2>как это работает</h2></div>
    </div>
    <div class="how-inner">
        <div class="container">
            <div class="row">
                <div class="cell-6 dark-half cell-12-sm">
                    <div class="how-block">
                        <div class="strong">— вы</div>
                        <ul>
                            <li>
                                <span>Предоставляете пожелания, эскизы сайта, скриншоты в любой удобной для Вас форме</span>
                            </li>
                            <li><span>Обсуждаете с нами функционал будущего сайта</span></li>
                            <li><span>Определяетесь со стилем</span></li>
                            <li><span>Согласовываете и утверждаете присланный нами дизайн-макет</span></li>
                            <li><span>Подключаете и настраиваете модули оплаты и доставки</span></li>
                            <li><span>Настраиваете домен вашего ресурса</span></li>
                            <li><span>Запускаете сайт!</span></li>
                        </ul>
                    </div>
                </div>
                <div class="cell-6 light-half cell-12-sm">
                    <div class="how-block">
                        <div class="strong">
                            — мы
                        </div>
                        <ul>
                            <li><span>Вникаем в ваш бизнес, обсуждаем все процессы, связанные с онлайн-решением</span>
                            </li>
                            <li><span>Продумываем концепцию будущего сайта</span></li>
                            <li><span>Отрисовываем дизайн-макет главной страницы</span></li>
                            <li><span>Согласовываем с Вами и вносим правки</span></li>
                            <li><span>Утверждаем макет главной</span></li>
                            <li><span>Готовим остальные страницы сайта</span></li>
                            <li><span>Согласовываем, вносим правки, утверждаем*</span></li>
                            <li>
                                <span>После утверждения мы приступаем к интеграции дизайн-макета на современную CMS</span>
                            </li>
                            <li><span>Устанавливаем готовый сайт на Ваш аккаунт и вносим по необходимости косметические правки</span>
                            </li>
                            <li><span>Помогаем подключить платежные, логистичсекие и маркетинговые модули</span></li>
                        </ul>
                    </div>
                    <div class="how-notice">
                        <ul>
                            <li>
                                <div class="row">
                                    <span class="cell-2 asterics"></span><span class="cell-10">Срок создания сайта составляет 4-8 недель. Дизайн сайта является вашей собственностью. По окончанию работ мы передаем вам PSD файлы и полностью рабочий интернет-магазин с инструкцией по управлению.</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client-reviews" id="reviews">
    <div class="decor-title">
        <div class="container">
            <h2>Клиенты о нас</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="cell-12">
                <div class="pagination-logos">
                </div>
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
                                    <div class="client-review-content"><?= $review['content'] ?></div>
                                    <div class="client-review-author">
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

        <div class="very-cool">
            <span class="first-word"> — очень</span> <span class="second-word">круто</span><img
                    src="/assets/images/woman.png" alt=""><span class="img-wrap"></span>
        </div>

    </div>
    <a href="#feedback-modal" class="i-wish js-modal" title="">Хочу так же
        <!--<span>Х</span><span>о</span><span>ч</span><span>у</span><span>&nbsp;</span><span>т</span><span>а</span><span>к</span><span>&nbsp;</span><span>ж</span><span>е</span>--></a>
    <div class="cross"></div>

</section>

<div class="mobile-app-block-wrap">

    <div class="decor-title"><h2 class="title">Разр<span>аб</span>отка</h2></div>

    <div class="mobile-app-block">
        <div class="left-block" data-aos="fade-up" data-aos-duration="600">
            <div class="title red-title">
                <span>мобильных</span>
                <span><span class="js-type-mobile-app"></span></span>
            </div>

            <div class="image">
                <div class="description">Разрабатываем крутые приложения для iOS и Android с фокусом на UX-дизайн</div>

                <div class="mobile-app-video-wrap">
                    <video class="mobile-app-video"
                           src="https://cdn.idbi.ru/files/1/3163/19934299/original/mobile-app.mp4" loop="true"
                           muted="true" webkit-playsinline="true" playsinline="true" autoplay="true"></video>
                </div>
            </div>

            <div class="description">Создаем интерфейсы аналитических систем, мобильные приложения и цифровые сервисы
                для крупного и мелкого бизнеса
            </div>

            <div class="text-bg">UX</div>
        </div>

        <div class="center-block" data-aos="fade-up" data-aos-duration="2000">
            <div class="image mobile-app-video-wrap">
                <video class="mobile-app-video" src="https://cdn.idbi.ru/files/1/3163/19934299/original/mobile-app.mp4"
                       loop="true" muted="true" webkit-playsinline="true" playsinline="true" autoplay="true"></video>
            </div>
        </div>

        <div class="right-block" data-aos="fade-up" data-aos-duration="600">
            <div class="title">Осмысленные интерфейсы</div>
            <div class="description">Разрабатываем крутые приложения для iOS и Android с фокусом на UX-дизайн</div>
            <button data-buy-id-place="252075126" class="btn js-modal" data-title="project3" href="#feedback-modal">
                Оставить заявку
            </button>
            <div class="text-bg">Ui</div>
        </div>
    </div>

    <div class="step-list">
        <div class="step-list--item" data-aos="fade-up" data-aos-duration="200">
            <div class="number"><span>01</span></div>
            <div class="title">ДИЗАЙН UI/UX/CX</div>
            <div class="description">Нетривиальные персонализированные интерфейсы, мобильные и веб-приложения с
                продуманным взаимодействием, никаких шаблонов и готовых решений
            </div>
        </div>
        <div class="step-list--item" data-aos="fade-up" data-aos-duration="600">
            <div class="number"><span>02</span></div>
            <div class="title">РАЗРАБОТКА</div>
            <div class="description">Мы — не только про продажу, мы —
                про простоту восприятия, понимание и интуитивность. Наши продукты доносят идеи до пользователей, они
                понятны без инструкции и работают с первых дней
            </div>
        </div>
        <div class="step-list--item" data-aos="fade-up" data-aos-duration="800">
            <div class="number"><span>03</span></div>
            <div class="title">НЕ ПРОСТО ПРОДАКШН</div>
            <div class="description">Прорабатываем концепцию
                продукта от и до. Не только делаем свою часть работы, но и погружаемся в бизнес,
                чтобы быть полноценным партнером
                в проектах, в которых участвуем
            </div>
        </div>
    </div>

    <div class="bottom-image">
        <img src="/assets/images/mobile-app-image-2.jpg" alt="" data-aos="fade-up" data-aos-duration="600"/>
    </div>
</div>

<!-- У ВАС ЕСТЬ ПРОЕКТ? -->
<?php include 'snippets/start-project.php' ?>
