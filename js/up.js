$(document).ready(function(){
	/*$('#btn').click(function(){
		alert($('#imgin').val().substr($('#imgin').val().lastIndexOf('\\') + 1));
		var path=$('#imgin').val();
		$('.imgc:last').append('<div class=imgc><img src='+path+'></div>');
	});*/
	$('.imgc').hover(function(){
		$(this).text('i am active');
	});
});