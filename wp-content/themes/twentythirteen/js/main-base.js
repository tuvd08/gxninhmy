(function($, window) {
	window.InitMethods = window.InitMethods || new Array();

	function initBase() {
		// run before onload done
		$('.on-show-menu').on('click', function() {
			var menu = $('.menu-container');
			var sMenu = $('.main_menu');
			if (menu.css('display') === 'none') {// 198x416
				menu.css('visibility', 'hidden').show();
				var w = sMenu.data('width') || sMenu.width();
				var h = sMenu.height();
				menu.css('visibility', '');
				sMenu.animate({
					width : w + 'px',
					height : h + 'px'
				}, 200, function() {
					$(this).css('overflow', '');
				});
			} else {
				sMenu.css({
					overflow : 'hidden'
				}).animate({
					width : '0px',
					height : '0px'
				}, 300, function() {
					$(this).removeAttr('style');
					menu.hide();
				});
			}
		});

		$('.on-hide-menu').on('click', function() {
			if ($('.left-column').width() < 20) {
				var menu = $('.menu-container');
				var sMenu = $('.main_menu');
				sMenu.css({
					overflow : 'hidden'
				}).animate({
					width : '0px',
					height : '0px'
				}, 300, function() {
					$(this).removeAttr('style');
					menu.hide();
				});
			}
		});
		if (window.pageid && window.pageid != '') {
			if (window.pageid == 'thu-tro-giup') {
				$('div.entry-thumbnail').hide();
			}
		}
		///
		$('a').on('click', function(evt) {
			var elm = $(this);
			var href = elm.attr('href');
			var isAjax = (href.indexOf('/') > 0)
						 && elm.hasClass('image-box') === false
						 && elm.attr('class').indexOf('img-') < 0
						 && elm.parents('#wpadminbar').length === 0
						 && elm.hasClass('dropdown-toggle') === false
						 && elm.hasClass('post-edit-link') === false;
			if (isAjax) {
				if (href.indexOf('http') === 0 && href.indexOf(window.location.hostname) < 0) {
					isAjax = false;
				}
			}
			if (isAjax) {
				evt.preventDefault();
				$('.bodyMarkLayer').show();
				$.ajax({
					url : href
				}).done(function(data) {
					$('.bodyMarkLayer').hide();
					var i = data.indexOf('<head>');
					var headHtml = data.substring(i, data.indexOf('</head>', i+1) + 7);
					var newHtml = $('<html/>');
					newHtml.html(headHtml);
					var newTitle = newHtml.find('title:first').text();
					$('head:first').find('title:first').text(newTitle);
					//
					newHtml = $('<html/>');
					i = data.indexOf('<body');
					var bodyHtml = data.substring(i, data.lastIndexOf('</body>') + 7);
					newHtml.html(bodyHtml);
					$(document.body).find('div#body').html(newHtml.find('div#body').html());
					//
					window.history.replaceState({}, null, href);
					$( window ).scrollTop( 10 );
					for (var i = 0; i < window.InitMethods.length; ++i) {
						var method = window.InitMethods[i];
						if (typeof (method) == "function") {
							method();
						}
					}
				});
				setTimeout(function() {
					$('.bodyMarkLayer').hide();
				}, 1500);
			}
		});
	}
	window.DONE = false;
	function showBody(time) {
	    console.log('showBody ' + time);
		if (window.DONE === false) {
			window.DONE = true;
			setTimeout(function() {
				$(document.body).css({'visibility':'visible', 'position':'relative'});
				$('.bodyMarkLayer').hide();
			}, time);
		}
	}
	$(document).ready(function() {
		$('.bodyMarkLayer').show();
		showBody(200);
		initBase();
	});
	//
	showBody(1000);
	window.InitMethods.push(initBase);
})(jQuery, window);
