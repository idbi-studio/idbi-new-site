<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/head.php'; ?>

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