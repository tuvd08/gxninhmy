(function($, window) {

  function effectContent() {
    var effect = {
      types : {leftToRight : 'ltr', rightToLeft : 'rtl'},
      allItems : [],
      size : 0,
      container : null,
      currentBlock : null,
      time : 600,
      isImgSlider: false,
      init : function(prElm, time) {
        effect.container = $('#'+prElm);
        if(effect.container.length == 0) {
          effect.container = $('.'+prElm);
        }
        effect.allItems = effect.container.find('> .item-slider');
        effect.currentBlock = effect.container.find('> .active-item');
        effect.isImgSlider = (effect.currentBlock.find('.img-slider').length > 0);
        //
        effect.allItems.each(function(index) { $(this).attr('data-index', index);});
        effect.size = effect.allItems.length;
       // effect.resetHeight();
        if(typeof time != 'undefined') {
          effect.time = time;
        }
      },
      resetHeight: function() {
        effect.container.width('auto');
        var w = effect.container.outerWidth();
        
        if(effect.isImgSlider) {
          var img = new Image();
          img.src = effect.currentBlock.find('img.img-slider').attr('src');
          var imgW = img.width;
          w = Math.min(w, imgW);
        }
        effect.currentBlock.css('max-width', w + 'px');
        effect.container.width(w + 'px');
        var h = effect.currentBlock.outerHeight();
        effect.container.css('min-height', h + 'px');
      },
      getCurrentBlock : function(index){
        for (var i = 0; i < effect.size; ++i) {
          if(effect.allItems.eq(i).attr('data-index')*1 === index) {
            return effect.allItems.eq(i);
          }
        }
        return null;
      },
      effectApply : function(type, index, callback, callbefore) {
        var page = effect.getCurrentBlock(index);
        //
        if(callbefore && typeof callbefore === "function") {
          callbefore(page);
        }
        
        if(page && page.length > 0) {
          if(page[0] != effect.currentBlock[0]) {
            if(type === effect.types.leftToRight){
              page.insertBefore(effect.currentBlock);
              page.css({left: -(page.width()) + 'px'}).addClass('active-item');
              page.animate({left: 0}, effect.time, function() {});
              effect.currentBlock.animate({left: (effect.currentBlock.width() + page.width())}, effect.time, function() {
                effect.currentBlock.removeClass('active-item');
                effect.currentBlock = page;
                effect.resetHeight();
                //
                
                if(callback && typeof callback === "function") {
                  callback.call();
                }

              });
            } else {
              page.insertAfter(effect.currentBlock);
              page.css({left: (effect.currentBlock.width()) + 'px'}).addClass('active-item');
              page.animate({left: 0}, effect.time, function() {});
              effect.currentBlock.animate({left: -(page.width())}, effect.time, function() {
                effect.currentBlock.removeClass('active-item');
                effect.currentBlock = page;
                effect.resetHeight();
                //
                if(callback && typeof callback === "function") {
                  callback.call();
                }
              });
            }
          }
        } else {
            console.log('Sorry ! Page not existing.');
        }
      }
    };
    return effect;
  }
  
  var PostSlider = {
    items : [],
    size : 0,
    isAuto: true,
    timeLive : 3000,
    end: true,
    init : function(container, isAuto, timeLive) {
      var p = PostSlider;
      var contn = $('#'+container);
      if(contn.length == 0) {
        contn = $('.'+container + ':first');
      }
      //
      p.EffectPost = new effectContent();
      p.EffectPost.init(container);
      
      if(typeof isAuto === 'boolean'){
        p.isAuto = isAuto;
      }
      if(timeLive){
        p.timeLive = timeLive;
      }
      //
      window.ResizeWidth.push(p.EffectPost.resetHeight);
    },
    start : function() {
      PostSlider.EffectPost.resetHeight();
      PostSlider.initInterval();
    },
    initInterval : function() {
      var p = PostSlider;
      if(p.isAuto && p.interval === undefined) {
        p.interval = setInterval(function(evt) {
          var type = 'rtl';
          var currentIndex = p.EffectPost.currentBlock.attr('data-index')*1 + 1;
          if(currentIndex == (p.EffectPost.size)) {
            currentIndex = 0;
            type = 'ltr';
          }
          p.EffectPost.effectApply(type, currentIndex);
        }, p.timeLive); 
      }
    },
    clickAction : function(elm, type) {
      var p = PostSlider;
      if(elm.attr('data-index') === p.EffectPost.currentBlock.attr('data-index')) {
        return;
      }
      if(p.end === true) {
        p.end = false;
        p.EffectPost.effectApply(type, elm.attr('data-index'), p.callback, p.callbefore);
      }
    },
    callback : function() {
      PostSlider.end = true;
      PostSlider.initInterval();
    },
    callbefore : function(elm) {
      if(PostSlider.interval) {
        clearInterval(PostSlider.interval);
        PostSlider.interval = undefined;
      }
      //
      if(elm && elm.length > 0) {
        //
      }
    }
    
  };
  

  (function($){
    window.ResizeWidth = window.ResizeWidth || new Array();
    //
  })($);

   // load after ready
  $(document).ready(function() {
    PostSlider.init('slider-container', true);
    PostSlider.start();
  });
  
  function nextOrFirst (elm) {
    var parent = elm.parents('ul:first');
    var items = parent.find('li');
    var l = items.length;
    for(var i = 0; i < l; ++i) {
      if(items.eq(i)[0] === elm[0]) {
        if(i == (l - 1)) {
          return items.eq(0);
        }
        return items.eq(i + 1);
      }
    }
  }
  
  if($.fn.nextOrFirst === undefined) {
    $.fn.nextOrFirst = nextOrFirst;
  }
  
})(jQuery, window);
