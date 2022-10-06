// Blogs + articles 
jQuery.getJSON('/media/articles.json', function func0(data) {
  var myjson = JSON.stringify(data)  

  $('#list').pagination({
    dataSource: $.parseJSON(myjson),
    pageSize: 10,
    callback: function(data, pagination) {
      var wrapper = $('#list .wrapper').empty();
      $.each(data, function (index, value) {
        $('#list .wrapper').append('<div class="cell-12 article-cell">'
                                  +   '<div class="article_preview cards-col in-blog ">'
                                  +     '<div class="row card-body cards-col">'
                                  +       '<div class="cell-6 cell-8-s push-2-s cell-12-xs push-0-xs article_preview-image_wrap-wrap show-flex">'
                                  +         '<div class="article_preview-image_wrap image-container is-wide is-cover" style="background-image: url('+ value.image.original_url +');"></div>'
                                  +         '<a class="article_preview-image-shadow" href="/blogs/blog/osnovy-dizayna-onbordinga"></a>'
                                  +         '<a href="/blogs/blog/osnovy-dizayna-onbordinga" class="article-date">'+ moment(value.created_at).locale('ru').subtract(10, 'days').calendar() +'</a>'
                                  +       '</div>'
                                  +       '<div class="cell-6 cell-12-s show-flex flex-middle article_preview-inner-wrap">'
                                  +         '<div class="article_preview-inner">'
                                  +           '<a class="article_preview-title" href="/blogs/blog/osnovy-dizayna-onbordinga">'+value.title+'</a>'
                                  +           '<a href="/blogs/blog/osnovy-dizayna-onbordinga" class="article_preview-preview">'+ jQuery.trim(value.notice).substring(0, 100).trim(this) + "..." +'</a>'
                                  +         '</div>'
                                  +       '</div>'
                                  +     '</div>'
                                  +   '</div>'
                                  + '</div>');
      });
    }
  });
})
