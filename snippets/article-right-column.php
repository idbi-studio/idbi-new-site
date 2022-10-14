<?php
/** @var $db */

?>
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
                    <a href="/blogs/blog/<?= $article['permalink'] ?>" class="art-img" title="<?= $article['title'] ?>"
                       style="background-image: url(<?= $article['image'] ?>)"></a>
                    <div class="art-wrap">
                        <a href="/blogs/blog/<?= $article['permalink'] ?>" class="art-date"
                           title="<?= $article['title'] ?>"><?= (new DateTime($article['published_at']))->format('d.m.y') ?></a>
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
