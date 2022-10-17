<?php

$permalink = explode('/', $_SERVER['QUERY_STRING']);
if (count($permalink) !== 3) {
    http_response_code(404);
    die();
}
$permalink = $permalink[2];

require_once '../../../../src/connect_db.php';
/** @var $db */

$permalink = $db->real_escape_string($permalink);
$result = $db->query("SELECT * from idbi_article WHERE published_at <= now() AND permalink = '$permalink';");
if ($result === false || $result->num_rows < 1) {
    http_response_code(404);
    die();
}
$article = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/head.php'; ?>

    <meta property="og:title" content="{{ article.title }}" />
    <meta property="og:image" content="{{ article.image.original_url }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ article.url }}" />
    <meta property="twitter:url" content="{{ article.url }}" />
    <meta property="twitter:title" content="{{ article.title }}" />

    <!--CSS-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/style.php' ?>

</head>
<body class="template-is-blog">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/header.php' ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/fixed_header.php' ?>

    <?php include 'blog.php' ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'?>

    <!--JS-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/scripts.php' ?>


    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script type="text/javascript" src="/assets/js/pagination.js"></script>
    <script type="text/javascript" src="/assets/js/scripts.js"></script>


    <input type="text" data-variant-id-feedback value="253191219" class="hide">
</body>
</html>

<script>
$(function(){
      $('[data-fancybox]').fancybox({
       wheel: false,
       hideScrollbar: true
  });
})

</script>
