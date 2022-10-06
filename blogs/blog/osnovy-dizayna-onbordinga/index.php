<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/head.tpl'; ?>

    <meta property="og:title" content="{{ article.title }}" />
    <meta property="og:image" content="{{ article.image.original_url }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ article.url }}" />
    <meta property="twitter:url" content="{{ article.url }}" />
    <meta property="twitter:title" content="{{ article.title }}" />

    <!--CSS-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/style.tpl' ?>

</head>
<body class="template-is-blog">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/header.tpl' ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/fixed_header.tpl' ?>

    <?php include 'osnovy-dizayna-onbordinga.php' ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.tpl'?>

    <!--JS-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/scripts.tpl' ?>


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