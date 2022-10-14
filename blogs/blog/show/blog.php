<?php
/** @var $article */

/** @var $db */
?>
<div class="container">
    <div class="breadcrumb-wrapper is-article">
        <ul class="breadcrumb">
            <li class="breadcrumb-item home">
                <a class="breadcrumb-link" title="Главная" href="/">Главная</a>
            </li>
            <li class="breadcrumb-item">
                <a class="breadcrumb-link" title="<?= $article['title'] ?>"
                   href="/blogs/blog/<?= $article['permalink'] ?>/"><?= $article['title'] ?></a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="article-content">
        <div class="row is-grid">
            <div class="article-inner cell-9 cell-8-lg cell-12-m grid-8 padded-right m-grid-12 s-grid-12">
                <!-- Article content -->
                <h1 class="article-title"><?= $article['title'] ?></h1>
                <div class="article-text editor">
                    <?= $article['content'] ?>
                </div>
                <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                <script src="https://yastatic.net/share2/share.js"></script>
                <div class="article-share">Поделиться
                    <div class="ya-share2"
                         data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp,telegram"></div>
                </div>
            </div>
            <div class="cell-3 cell-4-lg cell-12-m article-right-sidebar shit">
                <div class="row is-grid article-right-sidebar__wrap-form fixed pis">
                    <a href="https://idbi.ru" class="cell-12 article-right-sidebar__form-title"
                       title="Заказать интернет-магазин под ключ">Заказать интернет-магазин под ключ</a>
                    <!-- Sidebar form -->
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/article-right-sidebar-form.php' ?>
                    <a href="https://idbi.ru"
                       class="cell-12 cell-5-m cell-8-s cell-10-xs cell-12-mc push-2-s push-1-xs push-0-mc"
                       title=""><img src="/assets/images/idbi-img-2.jpg" alt="pic"></a>
                </div>
            </div>
            <div class="blog-right-column grid-4 m-grid-12 s-grid-12">
                <div class="row">
                    <div class="last-articles cell-12">
                        <div class="art-tags-title">Облако тэгов</div>
                        <div class="art-tags">
                            <?php
                            $result = $db->query("SELECT * from idbi_tag WHERE 1;");
                            while ($tag = $result->fetch_assoc()) {
                                ?>
                                <a href="/blogs/blog/tags/<?= $tag['url'] ?>" class="art-tag"
                                   title="<?= $tag['title'] ?>"><?= $tag['title'] ?></a>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="aside-header art-title" style="padding-bottom:30px">
                            Популярные посты
                        </div>
                        <ul class="articles-list list-vertical">
                            <?php
                            $result = $db->query("SELECT * from idbi_article WHERE popular > 0 ORDER BY popular DESC;");
                            while ($article = $result->fetch_assoc()) {
                                ?>
                                <li class="list-item show-flex flex-middle">
                                    <a href="/blogs/blog/<?= $article['permalink'] ?>" class="art-img"
                                       style="background-image: url(<?= $article['image'] ?>)"></a>
                                    <div class="art-wrap">
                                        <a href="/blogs/blog/<?= $article['permalink'] ?>" class="art-date"
                                           title=""><?= (new DateTime($article['published_at']))->format('d.m.y') ?></a>
                                        <a class="list-link art-link" href="/blogs/blog/<?= $article['permalink'] ?>"
                                           title="<?= $article['title'] ?>"><?= $article['title'] ?></a>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!-- /.last-articles -->
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#market-key" class="js-modal cookie-form" data-title="projectBlog" title=""></a>
<script>
    $(window).load(function () {
        $('.load-wrap').remove();


        console.log($.cookie('cookie_name'));

        if ($.cookie('cookie_name')) {
            console.log('Уже заходили');
        } else {
            console.log('Впервые у нас');
            $.cookie('cookie_name', 1, {
                expires: 1,
                path: '/',
            });

            function getCounter() {
                var counter = 0;
                return function () {
                    return counter++;
                };
            }

            var count = getCounter();


            $(window).on('scroll', function () {
                var top = $(this).scrollTop();
                var place = $(document).height() / 3;
                if (top > place) {
                    if (!count()) {
                        $('.cookie-form').click();
                    }
                }
            });


        }

        console.log($.cookie('cookie_name'));

    });
</script>
