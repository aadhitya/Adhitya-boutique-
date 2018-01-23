$(function( )  {
	$('ul.larent > li').hover(function() {
		$(this).find('ul.lhild').show(400);
	}, function() {
		$(this).find('ul.lhild').hide(400);
	});
});