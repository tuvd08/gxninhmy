(function($){

  $(document).ready(function() {
    
    function clearCache(elm, action) {
      if(!action) {
        action = 'mousedown';
      }
      elm.on(action, function() {
        $.ajax(window.sire_url + 'clear_cache.php?clear=all&info=true').done(function(msg) {
            if(window.console && window.console.log) {
              console.log("Clear cache success: \n" + msg);
            }
          });
      });
    }
    
    if($('#posts-filter').length > 0) {
       var quicks = $('#posts-filter').find('.editinline');
       
       quicks.on('mouseup', function() {
         setTimeout(function() {
           var from = $('#posts-filter').find('.inline-edit-row:first');
           var a = from.find('a.save:first');
           //
           clearCache(a);
         }, 1000);
       });
       
       var trashs = $('#posts-filter').find('.submitdelete');
       //
       clearCache(trashs);
       
       //    
       var pr = $('#posts-filter').find('#the-list');
       var untrashs = pr.find('.untrash');
       if(untrashs.length > 0) {
          untrashs.each(function(index) {
             clearCache($(this).find('a:first'));
          })
       }
    }
    
    if($('#post').length > 0 && $('#poststuff').length > 0) {
      var pr = $('#poststuff');
      clearCache(pr.find('#publish'));
      clearCache(pr.find('a.submitdelete'));
    }
    
    if($('#wpbody').find('#message').find('a:first').length > 0) {
      clearCache($('#wpbody').find('#message').find('a:first'));
    }
    
  });

  
})(jQuery);
