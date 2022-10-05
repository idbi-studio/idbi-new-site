<div id="mobile-nav">
  <nav class="mobile-nav">
    <a style="padding: 5px 0;" href="{% unless template == 'index' %}/{% endunless %}#projects" class="go-link {% if template == 'index' %}js-toggle-menu{% endif %}">Наши работы</a>
    <a style="padding: 5px 0;" href="{% unless template == 'index' %}/{% endunless %}#learn-more" class="go-link {% if template == 'index' %}js-toggle-menu{% endif %}">Преимущества</a>
    <a style="padding: 5px 0;" href="/page/services" class="go-link {% if template == 'index' %}js-toggle-menu{% endif %}">Услуги</a>
    <a style="padding: 5px 0;" href="/blogs/blog">Блог</a>
  </nav>
  <a href="#0" class="menu-close js-toggle-menu">×</a>
</div>