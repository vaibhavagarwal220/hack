$('#nameuser').keyup(function(){
	var username=$('#nameuser').val();
	var len=username.length;
	if(len<=6){
		$('#ustatus').html('<strong>at least 6 characters required</strong>');
		$('#btnsignup').attr('disabled',true);
	}
	else{
		$('#ustatus').html('<strong>Loading...</strong>');
		$.post('ucheck.php',{username:username},function(data){
		$('#ustatus').html(data);
		if(data=='<strong>username available</strong>'){$('#btnsignup').attr('disabled',false);}
		else {$('#btnsignup').attr('disabled',true);}		
		});
	}
	
});
$(document).ready(function(){
	$('#btnsignup').attr('disabled',true);
});