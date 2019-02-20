/**
 * Created by PhanLong on 10/8/2015.
 */
jQuery(function($){
	$(".process-wrap > span").each(function() {
		$(this)
			.data("origWidth", $(this).width())
			.width(0)
			.animate({
				width: $(this).data("origWidth")
			}, 1200);
	});
});

