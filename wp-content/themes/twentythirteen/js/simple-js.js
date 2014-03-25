(function ($) {

    window.Load = {};
    window.Resize = window.Resize || new Array(); //push
    window.ResizeWidth = window.ResizeWidth || new Array();

    Load.currWidth = 0;
        
    Load.animateWidth = function(settings) {
      return {
        run : function(elm) {
          var jelm = $(elm);
          if(settings.from && settings.from >= 0) {
            jelm.css('width', from + 'px');
          }
          jelm.animate({'width': settings.to + 'px'}, (settings.time) ? settings.time : 300, function(){
            if (typeof(settings.callback) == "function") {settings.callback(this) };
          });
          return jelm;
        }
      };
    }
    $.fn.animateWidth = function(settings) {
      var outerArguments = arguments;
      if(typeof settings === 'undefined') {
        settings = {to:0};
      }
      return this.each(function() {
        var instance = $.data(this, 'animateWidth') || $.data(this, 'animateWidth', new Load.animateWidth(settings));
        return instance.run.call(this, this);
      });
    };
  

    Load.loadMin700 = function() {
      window.maxWidth = $('body').width();
      if(window.maxWidth < 700) {
        $('body').addClass('min-body');
        $('.max').hide();
        $('.min').show();
        $('.right-column').css({padding:'0px', margin: '0px', width : '5px'});
        $('.left-column').css({padding:'0px', margin: '0px', width : '5px'});
        $('.menu-container').css('position', 'relative')
           .find('.main_menu').addClass('show-menu-block');
           
        var img = $('img.banner-img').css('margin-left', function() {return (window.maxWidth - $(this).width())/2;});
        
     } else {
       if($('.min').eq(0).css('display') === 'block') {
         $('.max').show();
         $('.min').hide();
         //$('.right-column').attr('style', '');
         $('.left-column').animateWidth({to: 250, callback:function(elm){ $(elm).attr('style', '');} }); 
         $('.menu-container').attr('style', '')
           .find('.main_menu').removeClass('show-menu-block');
       }
     }
    }
    
    Load.loadMin900 = function() {
      window.maxWidth = $('body').width();
      //right-container
      if(window.maxWidth < 900) {
        $('.right-column').css({padding:'0px', margin: '0px', width : '5px'});
        $('.right-container').hide();
      } else {
       if($('.right-container').css('display') === 'none' || $('.right-column').width() < 20) {
         $('.right-container').show();
         $('.right-column').animateWidth({to: 280, callback:function(elm){ $(elm).attr('style', '');} }); 
       }
     }
    }
    
    Load.maxWidthImg = function() {
      var parent = $('.image-resize');
      if(parent.length > 0) {
        //var imgs = parent.find('img');
        //imgs.animate({'width': (parent.width() - 10) + 'px'}, 300, function(){$(this).css('width', 'auto');});
      }
    }

    Load.onload = function() {
      window.maxWidth = $('body').width();

      Load.loadMin700();
      //
      Load.loadMin900();
      //
      $('.image-box').fancybox();
       
      var post = $('#post-detail');
      if(post.length > 0) {
        var postContent = post.find('.entry-content');
        var maxW = postContent.width() - 10;
        var imgs = postContent.find('img');
        imgs.each(function(index) {
          if($(this).parents('.album-container:first').length === 0) {
            var img = $(this).css({'padding':'0px', 'margin': '10px 0px'}).addClass('thumbnail');
            img.after( '<a class="img-' +index+ '" href="' + img.attr('src') + '"></a>');
            var a = postContent.find('a.img-'+index + ':first');
            a.append(img);
            a.fancybox();
          } else {
            $(this).parents('a:first').fancybox();
          }
        });
      }
       
      $('.link-post-image').css('padding-top', function() {
        var thizz = $(this);
        if(thizz.height() >= 40) {
          return 0;
        }
        return 11;
      });
      
      $('a').each(function(id) {
        if($(this).data('toggle') === 'tooltip') {
          $(this).tooltip();
          $(this).on('shown.bs.tooltip', function () {
            var title = $(this).parents('div:first').find('.tooltip:first').find('.tooltip-inner');
            var size = title.text().length;
            if(size < 100) {
              title.css('max-width', '220px');
            } else if(size < 200) {
              title.css('max-width', '320px');
            } else {
              title.css('max-width', '420px');
            }
          });
        }
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

    // load after ready
    $(document).ready(function() {
      Load.onload(); 
    });

    // resize
    window.ResizeWidth.push(Load.loadMin700);
    window.ResizeWidth.push(Load.loadMin900);
    window.ResizeWidth.push(Load.maxWidthImg);

    $(window).on('resize', function (evt) {
      try {
        for (var i = 0; i < window.Resize.length; ++i) {
          var method = window.Resize[i];
          if (typeof(method) == "function") method(evt) ;
        }
      } catch(e) {};
      
      if (Load.currWidth != document.documentElement.clientWidth) {
        try {
          for (var i = 0; i < window.ResizeWidth.length; ++i) {
            var method = window.ResizeWidth[i];
            if (typeof(method) == "function") method(evt) ;
          }
        } catch(e) {};
      }
      Load.currWidth = document.documentElement.clientWidth;
    });
    
    
  window.closeLayer = Load.closeLayer;
})(jQuery);
