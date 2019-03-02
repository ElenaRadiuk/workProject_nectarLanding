(function($){
  $(document).ready(function(){
    $('.headersearch .fa-search').click(function(){
      $('.headersearch .search-form').toggle();
    });
    // $('#htmainslider').bxSlider({
    //   pager: false,
    //   adaptiveHeight: true
    // });
    $('#htsecondaryslider').bxSlider({
      controls: false
    });
    $('#sert_check').on('click', function () {

      var $input = $('#number'),
      $error = $('.error');
      var number = $input.val();
      var url = 'http://nectarica.com/wp-content/uploads/'+number+'.pdf';

      UrlExists(url, function(status){
        if(status === 200){
          window.location.assign(url);
        }
        else if(status === 404){
          $input.addClass('wrongData');
          $error.addClass('shown');

          setTimeout(function() {
            $input.removeClass('wrongData')
            $error.removeClass('shown')
          }, 4000);

        }
      });

    })
  });
  function UrlExists(url, cb){
    jQuery.ajax({
      url:      url,
      dataType: 'text',
      type:     'GET',
      complete:  function(xhr){
        if(typeof cb === 'function')
          cb.apply(this, [xhr.status]);
      }
    });
  }
})(jQuery);