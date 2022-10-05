<footer {% if template=='page.prices' %}class="section" {% endif %}>
    <div class="container">
        <div class="row footer-topside">
            <div class="cell-4 cell-6-lg footer-leftside">
                <a href="/" class="logo">
                    <img src="/assets/images/logo_dark.svg" alt="{{ account.title }}">
                    <span style="display: block; font-size: 13px;">Профессиональная разработка<br />продающих интернет-ресурсов</span>
                </a>
            </div>
            <div class="cell-4 hide-lg footer-middleside">
                Мы всегда будем рады ответить на все ваши вопросы,
                объяснить непонятные вам темы и предложить
                подходящие именно вам варианты развития вашего
                бизнеса в зоне онлайн
            </div>
            <div class="cell-4 cell-6-lg text-right">
                <nav class="footer-navigate text-left">
                    <a href="{% unless template == 'index' %}/{% endunless %}#projects" class="go-link footer-link-icon">Наши работы</a>
                    <a href="/page/services" class="go-link footer-link-icon">Наши услуги</a>
                </nav>
            </div>
        </div>
        <div class="row footer-bottomside">
            <div class="cell-6 cell-12-md text-right-md">
                <img src="/assets/images/footer-phone.svg" />
                <div class="content-bottomside">
                    <h3><a class="man_col" href="callto:+7 495 120-77-62">+7 495 120-77-62</a></h3>
                    <div class="row flex-end-md">
                        <a class="bottom-icon  wha" href="https://wa.me/79629545062">
                            <img src="/assets/images/icons8-whatsapp-48.png" />
                        </a>
                        <a class="bottom-icon telg" href="tg://resolve?domain=idbidevelop">
                            <img src="/assets/images/icons8-telegram-app-48.png" />
                        </a>
                    </div>
                    <span>Позвоните нам <br> или закажите <a data-buy-id-place="253048632" class="js-modal" href="#feedback-modal">обратный звонок</a></span>
                </div>
            </div>
            <div class="cell-6 cell-12-md text-right-md">
                <img class="open-map" src="/assets/images/footer-location.svg" />
                <div class="content-bottomside">
                    <h3 class="open-map">приезжайте к нам в гости</h3>
                    <span>107078, г. Москва, <br>ул. Новорязанская, 18, стр. 12 <br><a href="mailto:sales@idbi.ru">sales@idbi.ru</a><br>ООО "ИДБИ"</span>
                </div>
            </div>
        </div>
    </div>
    <div class="copy text-center">
        <span>© <?php echo date('Y'); ?> IDBI</span>Все права защищены.
    </div>
</footer>