(function($, window) {
  window.InitMethods = window.InitMethods || new Array();
    
  function initBase() {
    //run before onload done
    $('.on-show-menu').on('click', function() {
      var menu = $('.menu-container');
      var sMenu = $('.main_menu');
      if(menu.css('display') === 'none') {//198x416
				menu.css('visibility', 'hidden').show();
				var w = sMenu.data('width') || sMenu.width();
				var h = sMenu.height();
        menu.css('visibility', '');
        sMenu.animate({width: w +'px', height: h + 'px'}, 200, function() { $(this).css('overflow', ''); });
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
    if(window.pageid && window.pageid != '') {
      if(window.pageid == 'thu-tro-giup') {
         $('div.entry-thumbnail').hide();
      }
    }
  }
  window.DONE = false;
  function showBody(time) {
    if(window.DONE === false) {
      window.DONE = true;
      setTimeout(function() {
        $(document.body).hide().css('visibility', 'visible').show(200);
      }, time);
    }
  }
  $( document ).ready(function() {
    showBody(200);
    initBase();
  });
  //
  showBody(1000);
  window.InitMethods.push(initBase);
})(jQuery, window);
