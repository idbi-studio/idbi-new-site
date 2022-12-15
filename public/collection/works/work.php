<?php
/**
 * @var $product
 * @var $db
 */

?>
<div class="new-work cell-4 cell-6-sm cell-12-xs text-center preview-93295355 aos-init aos-animate preview-<?= $product['id'] ?>"
     data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
    <div class="new-inner">
        <?php if ($product['reward_image']) { ?>
            <a class="runet-rating-plate" data-fancybox=""
               href="<?= $product['reward_letter'] ?>">
                <img src="<?= $product['reward_icon'] ?>">
            </a>
        <?php } ?>
        <?php if ($product['review']) { ?>
            <a href="#review-<?= $product['id'] ?>" data-fancybox="" class="review-label-link">отзыв</a>
            <div style="display: none">
                <div class="review-popup" id="review-<?= $product['id'] ?>">
                    <div class="inner">
                        <div class="editor"><?= $product['review'] ?></div>
                        <div class="review-author">Компания <?= $product['title'] ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="new-content">
            <div class="new-text">
                <div class="new-text-animation flex-middle row">
                    <div class="cell-10">
                        <div class="new-title">— <?= $product['title'] ?></div>
                        <div class="new-subtitle"><?= $product['description'] ?></div>
                    </div>
                    <div class="cell-2 text-right">
                        <i class="icon-eye fa fa-eye" href="<?= $product['image'] ?>"
                           data-fancybox="project" data-width="1500"></i>
                    </div>
                </div>
            </div>
            <?php if ($product['type'] === 'слайдер') { ?>
                <div class="js-port-slider-all">
                    <div class="port-container">
                        <?php
                        $result2 = $db->query("SELECT * from idbi_image WHERE portfolio_id = {$product['id']};");
                        $count = 1;
                        while ($image = $result2->fetch_assoc()) {
                            ?>
                            <div class="port-slide<?= $count === 1 ? ' active' : '' ?>">
                                <img src="<?= $image['src'] ?>" alt="<?= $product['title'] ?>">
                            </div>
                            <?php
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            <?php } else { ?>
                <img src="<?= $product['video'] ?>" alt="<?= $product['title'] ?>"/>
            <?php } ?>
        </div>
        <div class="port-pagination"></div>
    </div>
</div>

<style>
    <?php if ($product['preview_color']) { ?>
    .new-work.preview-<?= $product['id'] ?> .new-text {
        background: rgba(<?= $product['preview_color'] ?>, 0.6);
    }

    .new-work.preview-<?= $product['id'] ?>:hover .new-text {
        background: rgba(<?= $product['preview_color'] ?>, 0.9);
    }

    <?php } ?>
    <?php if ($product['pagination_color']) { ?>
    .new-work.preview-<?= $product['id'] ?> .port-pagination .port-bullet {
        background: <?= $product['pagination_color'] ?>;
        border-color: <?= $product['pagination_color'] ?>;
    }

    .new-work.preview-<?= $product['id'] ?> .port-pagination .port-bullet.active {
        background: transparent;
    }

    <?php } ?>
    .new-work.preview-<?= $product['id'] ?> .new-text * {
        color: <?= $product['text_color'] ?>;
    }
</style>
