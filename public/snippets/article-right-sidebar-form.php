
<div class="cell-12 cell-7-m cell-12-s mod-fast-order js-feedback-modal">
    <form method="post" id="client" action="/cart_items" class="mod-fast-call_form">
        <div class="row article-input-mail-wrap"><input type="text" tabindex="1" name="name" id="fo-name" class="article-input-mail" placeholder="ВВЕДИТЕ ВАШЕ ИМЯ"></div>
        <div class="row article-input-mail-wrap"><input type="email" name="email" data-title-form="ecom" data-feedback-custom-content="Email клиента" tabindex="2" id="fo-email" class="article-input-mail" placeholder="ВВЕДИТЕ ВАШ EMAIL"></div>
        <div class="row article-input-mail-wrap"><input type="text" tabindex="2" name="phone" id="fo-phone" class="article-input-mail" placeholder="ВВЕДИТЕ ВАШ ТЕЛЕФОН"></div>
        <div class="row hide"><label>Комментарий:</label><textarea id="fo-comment" rows="" col=""></textarea></div>
        <button type="submit" class="send-but mod-fast-order-sub make-order article-right-sidebar-btn" tabindex="4">Отправить</button>
        <button type="button" class="send-but mod-fast-order-close hide" tabindex="4">Закрыть</button>
    </form>
    <a class="js-modal hide modal-send" href="#modal-send" title="">обратный звонок</a>
</div>

<script>
    $(function(){
        $(".make-order").click(function(e) {
            e.preventDefault();

            var productVariant = 200178361;
            console.log(String(productVariant));
            fast_checkout(productVariant);

            var client_name = $(this).parent().find('[name="name"]').val() || "пусто",
                    client_phone = $(this).parent().find('[name="phone"]').val().replace(" ", "").replace(" ", "") || "пусто",
                    client_email = $(this).parent().find('[type="email"]').val() || "пусто",
                    from_site = 'idbi',
                    from_form = $(this).attr('data-title-form') || "пусто";
            $.post(
                    "https://letidbi.ru/lid_in.php",
                    {
                        client_name: client_name,
                        client_phone: client_phone,
                        client_email: client_email,
                        from_site: from_site,
                        from_form: from_form
                    },
                    onAjaxSuccess
            );

            function onAjaxSuccess(data){
                console.log('лид', data);
                console.log(client_phone);
            }
            console.log(client_phone);

        });


    });
</script>










