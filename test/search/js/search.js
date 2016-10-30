$(document).ready(function(){
	$('#term').keyup(function(){
		var sterm=$('#term').val();
		$.post('search.php',{
		sterm:sterm			
		},function(data){
			$('#result').html(data);
		});
});
});
