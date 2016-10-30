$('#save_btn').click(function()
{

var op=$('#opwd').val();
var np=$('#npwd').val();
var npc=$('#npwdc').val();
$.post('savepchange.php',{op:op,np:np,npc:npc},function(data){
	$("#slideNotice").html(data).slideDown().delay(500).slideUp();
});
});