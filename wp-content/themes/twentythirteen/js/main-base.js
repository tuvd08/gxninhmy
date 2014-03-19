(function($, window) {
    //run before onload done
    $('.on-show-menu').on('click', function() {
      var menu = $('.menu-container');
      var sMenu = $('.main_menu');
      if(menu.css('display') === 'none') {//198x416
        menu.show();
        sMenu.css({width: '0px', height:'0px', overflow :'hidden'}).
                  animate({width: '198px', height:'416px'}, 300, function() { $(this).removeAttr('style'); });
      } else {
        sMenu.css({overflow :'hidden'}).animate({width: '0px', height:'0px'}, 300, function() { 
          $(this).removeAttr('style');
          menu.hide();
        });
      }
    });
    
    $('.on-hide-menu').on('click', function() {
      if($('.left-column').width() < 20) {
        var menu = $('.menu-container');
        var sMenu = $('.main_menu');
        sMenu.css({overflow :'hidden'}).animate({width: '0px', height:'0px'}, 300, function() { 
            $(this).removeAttr('style');
            menu.hide();
        });
      }
    });

})(jQuery, window);
