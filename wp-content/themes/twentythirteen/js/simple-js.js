(function ($) {

    window.Load = {};
    window.Resize = new Array(); //push
    
    
    
    
    Load.onload = function() {
      window.maxWidth = $('body').width();
      
      if(window.maxWidth < 600) {
          $('body').addClass('min-body');
          $('.max').hide();
          $('.min').show();
          $('.right-column').css({padding:'0px', margin: '0px', width : '5px'});
          $('.left-column').css({padding:'0px', margin: '0px', width : '5px'});
          $('.menu-container').css('position', 'relative')
             .find('.main_menu').addClass('show-menu-block');
          
          $('.on-show-menu').on('click', function() {
            $('.menu-container').toggle(500);
          });
          
          $('.on-hide-menu').on('click', function() {
            $('.menu-container').hide(500);
          });
       }
      //
       $('.image-box').fancybox();
       
       var post = $('#post-detail');
       if(post.length > 0) {
          var postContent = post.find('.entry-content');
          var maxW = postContent.width() - 10;
          var imgs = postContent.find('img');
          imgs.each(function(index) {
              var img = $(this).css('max-width', maxW + 'px').css({'padding':'0px', 'margin': '10px 0px'}).addClass('thumbnail');
              img.after( '<a class="img-' +index+ '" href="' + img.attr('src') + '"></a>');
              var a = postContent.find('a.img-'+index + ':first');
              a.append(img);
              a.fancybox();
          });
       }
       
       $('.link-post-image').css('padding-top', function() {
          var thizz = $(this);
          if(thizz.height() >= 40) {
            return 0;
          }
          return 15;
       });
       
    }

    Load.getLayer = function() {
      var layer = $('#layer-info');
      layer.html('<div class="bg-gray"></div>').show();
      layer.find('.bg-gray:first').on('click', Load.closeLayer).css({'width': $('html').width(), 'height' : $('html').height(), 'display' : 'block'});
      $('html').css('overflow', 'hidden');
      return layer;
    }
    
    Load.closeLayer = function() {
      $('html').css('overflow', 'auto');
      $('#layer-info').hide(300).html('');
    }
    
    // load
    $(document).ready(function() {
      Load.onload(); 
    });

    // resize
//    window.Resize.push(Load.pdTop);

    $(window).on('resize', function () {
        for (var i = 0; i < window.Resize.length; ++i) {
            window.Resize[i]();
        }
    });
    
    
    
    
    
  window.closeLayer = Load.closeLayer;
})(jQuery);
