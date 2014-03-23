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
      init : function(container, time) {
        effect.container = $(container);
        if(effect.container.length == 0) {
          return;
        }
        effect.allItems = effect.container.find('> .item-slider');
        effect.size = effect.allItems.length;
        if(effect.size.length === 0) {
          return;
        }
        effect.currentBlock = effect.container.find('> .active-item');
        var firstImg = effect.currentBlock.find('.img-slider');
        effect.isImgSlider = (firstImg.length > 0);
        //
        effect.allItems.each(function(index) { $(this).attr('data-index', index);});

        if(typeof time != 'undefined') {
          effect.time = time;
        }
        //
        if(effect.isImgSlider) {
          firstImg.on('load', effect.resetHeight);
        }
      },
      resetHeight: function() {
        var w = effect.container.parent().width();
        if(effect.isImgSlider) {
          var imgW = effect.currentBlock.find('img.img-slider').width();
          if(imgW > 0) {
            w = Math.min(w, imgW);
          }
          if(w != imgW) {
            effect.container.find('img.img-slider').css('max-width', (w-4) + 'px');
          }
          effect.isImgSlider = false;
        }
        effect.currentBlock.css('max-width', w + 'px');
        var h = effect.currentBlock.height();
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
  
  function Slider() {
    var OjSlider = {
      items : [],
      size : 0,
      isAuto: true,
      timeLive : 4000,
      end: true,
      init : function(container, isAuto, timeLive) {
        if($(container).length == 0) {
          return;
        }
        //
        var p = OjSlider;
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
        OjSlider.EffectPost.resetHeight();
        OjSlider.initInterval();
      },
      initInterval : function() {
        var p = OjSlider;
        if(p.isAuto && p.interval === undefined && p.EffectPost.size > 0) {
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
        var p = OjSlider;
        if(elm.attr('data-index') === p.EffectPost.currentBlock.attr('data-index')) {
          return;
        }
        if(p.end === true) {
          p.end = false;
          p.EffectPost.effectApply(type, elm.attr('data-index'), p.callback, p.callbefore);
        }
      },
      callback : function() {
        OjSlider.end = true;
        OjSlider.initInterval();
      },
      callbefore : function(elm) {
        if(OjSlider.interval) {
          clearInterval(OjSlider.interval);
          OjSlider.interval = undefined;
        }
        //
        if(elm && elm.length > 0) {
          //
        }
      }
      
    };
    return OjSlider;
  }

  (function($){
    window.ResizeWidth = window.ResizeWidth || new Array();
    //
  })($);

   // load after ready
  $(document).ready(function() {
    //
    $('.slider-container').each(function(index) {
      var timeLive = 4000;
      if($(this).parents('.entry-content').length > 0) {
          timeLive = 5000;
      }
      var postSlider = new Slider();
      postSlider.init($(this), true, timeLive);
      postSlider.start();
    });
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
