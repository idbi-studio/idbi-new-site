<?php

$db = new mysqli('localhost', 'u1153297_site', '4bOnSSdJ5sYUKzU4ZAjM', 'u1153297_site');
if ($db->connect_error) {
    die('Database error' . $db->connect_errno);
}
$db->set_charset("utf8mb4");

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_FLOAT);
if (!$page) {
    $page = 1;
}
$offset = ($page - 1) * 10;
$result = $db->query("SELECT * from idbi_portfolio;");
if ($result === false) {
    die('Database error' . $db->error);
}
?>
<div class="portfolio-page">

    <div class="container">
        <h1><span class="hide-xs">—</span> НАШИ РАБОТЫ</h1>
        <h3>С 2011 года мы разработали огромное количество интернет-магазинов: от небольших монопродуктовых лендингов,
            до крупных интернет-магазинов. Наши услуги подходят всем: как начинающим стартаперам, которые хотят
            попробовать, так и крупным игрокам, которые занимают лидирующие позиции на рынке ecommerce. С некоторыми из
            них вы можете ознакомиться ниже: </h3>

        <div class="new-works row">
            <div class="new-work with-form cell-4 cell-12-sm text-center" data-aos="fade-up" data-aos-duration="600">
                <div class="new-inner">
                    <div class="new-content">
                        <div class="new-recall">
                            <img src="/assets/images/new-place.svg">
                            <span>Место для вашего проекта</span>
                            <button data-buy-id-place="252074080" class="button js-modal" data-title="project2"
                                    href="#feedback-modal">Оставить заявку
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $products = [];
            while ($product = $result->fetch_assoc()) {
                $products[] = $product;
                ?>
                <div class="new-work cell-4 cell-6-sm cell-12-xs text-center preview-93295355 aos-init aos-animate"
                     data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
                    <div class="new-inner">
                        <a class="runet-rating-plate" data-fancybox=""
                           href="/assets/images/runet_rate_2018_diplom_idbi.jpg">
                            <img src="/assets/images/runetaward.png">
                        </a>
                        <?php if ($product['review']) { ?>
                            <a href="#review-<?= $product['id'] ?>" data-fancybox="" class="review-label-link">отзыв</a>
                        <?php } ?>
                        <div style="display: none">
                            <div class="review-popup" id="review-93295355">
                                <div class="inner">
                                    <div class="editor"><?= $product['review'] ?></div>
                                    <div class="review-author">Компания <?= $product['title'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="new-content">
                            <div class="new-text">
                                <div class="new-text-animation flex-middle row">
                                    <div class="cell-10">
                                        <div class="new-title">— <?= $product['title'] ?></div>
                                        <div class="new-subtitle"><?= $product['description'] ?></div>
                                    </div>
                                    <div class="cell-2 text-right">
                                        <i class="icon-eye fa fa-eye" href="/assets/images/portfolio/levage.jpg"
                                           data-fancybox="project" data-width="1500"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="js-port-slider-all">
                                <div class="port-container">
                                    <?php
                                    $result2 = $db->query("SELECT * from idbi_image WHERE portfolio_id = {$product['id']};");
                                    $count = 1;
                                    while ($image = $result2->fetch_assoc()) {
                                        ?>
                                        <div class="port-slide<?= $count === 1 ? ' active' : '' ?>">
                                            <img src="<?= $image['src'] ?>">
                                        </div>
                                        <?php
                                        $count++;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="port-pagination"></div>
                    </div>
                </div>
                <?php
            }
            ?>

            <!-- to be continued -->
            <div class="new-work cell-4 cell-6-sm cell-12-xs text-center preview-98684111 aos-init aos-animate"
                 data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
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

    <a href="#feedback-modal" class="i-wish js-modal">Хочу так же<</a>
    <div class="cross"></div>

</div>

<script>
    $(function () {
        $('[data-fancybox]').fancybox({
            wheel: false,
            hideScrollbar: true,
        });
    });

</script>

<style type="text/css">
    .new-work.preview-93295355 .new-text {
        background: rgba(0, 0, 0, 0.6);
    }

    .new-work.preview-93295355:hover .new-text {
        background: rgba(0, 0, 0, 0.9);
    }

    .new-work.preview-93295355 .port-pagination .port-bullet {
        background: #fff;
        border-color: #fff;
    }

    .new-work.preview-93295355 .port-pagination .port-bullet.active {
        background: transparent;
    }

    .new-work.preview-93295355 .new-text * {
        color: #fff;
    }
</style>
