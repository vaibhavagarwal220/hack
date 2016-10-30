$('#savbtn').click(function()
{

var nf=$('#fnm').val();
var nl=$('#srnm').val();
var unm=$('#un').val();
$.post('change.php',{nf:nf,nl:nl,unm:unm},function(data){
	$("#slideNotice").html(data).slideDown().delay(500).slideUp();
	
});
});
