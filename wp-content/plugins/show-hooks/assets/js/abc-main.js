jQuery( function($){
	$( document ).ready( function() {
		var qs = (function (a) {
			if (a == "") return {};
			var b = {};
			for (var i = 0; i < a.length; ++i) {
				var p = a[i].split('=', 2);
				if (p.length == 1)
					b[p[0]] = "";
				else
					b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
			}
			return b;
		})(window.location.search.substr(1).split('&'));
		var isShowing = qs['abc-hooks'];
		if( (isShowing === 'show-filter-hooks') ){
			var $dragging = $('.abc-active');
			$(document.body).on("mousemove", function(e) {
				if ($dragging) {
					$dragging.offset({
						top: e.pageY,
						left: e.pageX
					});
				}
			});
			$(document.body).on("mousedown", "div", function (e) {
				$dragging = $(e.target);
			});
		
			$(document.body).on("mouseup", function (e) {
				$dragging = null;
			});
		}
	});
	// show hide the hook flotting window
	$('body').on('click', '.abc-show-hide', function(e){

		e.preventDefault();
		var text = $('.abc-show-hide-text').text();
		if( ( 'Hide' == text ) || ( 'HideHide' == text ) ){
			$('.abc-nested-hooks-block').addClass('abc-hide');
			$('.abc-show-hide-text').text('Show');
		}else{
			$('.abc-nested-hooks-block').removeClass('abc-hide');
			$('.abc-show-hide-text').text('Hide');
		}
	})
});