<?php

$db = new mysqli('localhost', 'u1153297_site', '4bOnSSdJ5sYUKzU4ZAjM', 'u1153297_site');
if ($db->connect_error) {
    die('Database error');
}

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_FLOAT);
if (!$page) {
    $page = 1;
}
$offset = ($page - 1) * 10;
$result = $db->query("SELECT * from idbi_article WHERE published_at >= now() LIMIT 10 OFFSET $offset;");
if ($result === false) {
    die('Database error');
}

$result = $db->query("SELECT COUNT(id) from idbi_article WHERE published_at >= now();");
if ($result === false) {
    die('Database error');
}
$pageCount = $result->fetch_row()[0] / 10;
?>

<div class="container">
    <h2 class="blog-title page-title"> УЮТНЫЙ БЛОГ О ДИЗАЙНЕ </h2>

    <div class="blog">
        <div class="row">
            <div class="blog-articles cell-9 cell-8-lg cell-12-md" id="list">
                <div class="row is-grid cards-row wrapper">
                    <?php
                    while ($article = $result->fetch_assoc()) {
                        ?>
                    <!-- Articles -->
                    <div class="cell-12 article-cell">
                        <div class="article_preview cards-col in-blog ">
                            <div class="row card-body cards-col">
                                <div class="cell-6 cell-8-s push-2-s cell-12-xs push-0-xs article_preview-image_wrap-wrap show-flex">
                                    <div class="article_preview-image_wrap image-container is-wide is-cover"
                                         style="background-image: url(<?= $article['image'] ?>);"></div>
                                    <a class="article_preview-image-shadow"
                                       href="/blogs/blog/osnovy-dizayna-onbordinga"></a>
                                    <a href="/blogs/blog/osnovy-dizayna-onbordinga"
                                       class="article-date"><?= (new DateTime($article['published_at']))->format('d.m.y') ?></a>
                                </div>
                                <div class="cell-6 cell-12-s show-flex flex-middle article_preview-inner-wrap">
                                    <div class="article_preview-inner">
                                        <a class="article_preview-title"
                                           href="/blogs/blog/osnovy-dizayna-onbordinga"><?= $article['title'] ?></a>
                                        <a href="/blogs/blog/osnovy-dizayna-onbordinga"
                                           class="article_preview-preview"><?= substr($article['content'], 0, 97) ?>
                                            ...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                </div>

            </div>
            <div class="blog-right-column cell-3 cell-4-lg cell-12-md grid-4 m-grid-12 s-grid-12 shit">
                <div class="article-right-column-wrap pis">
                    <div class="blog-link-to-idbi">
                        <a href="https://idbi.ru/#prices" target="_blank"
                           class="cell-12 article-right-sidebar__form-title .article-right-sidebar__form-titlenew">Заказать
                            интернет-магазин</a>
                    </div>

                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/article-right-column.tpl' ?>

                    <a href="https://idbi.ru"
                       class="cell-12 cell-5-m cell-8-s cell-10-xs cell-12-mc push-2-s push-1-xs push-0-mc go-to-idbi ooff">
                        <img src="/assets/images/idbi-img-2.jpg" alt="pic">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#market-key" class="js-modal cookie-form" data-title="projectBlog"></a>
