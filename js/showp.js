$(document).ready(function(){
$('input[type="password"]').after('<input type=checkbox class=spc>Show Password');
$('.spc').change(function(){
	var prev=$(this).prev();
	var value=prev.val();
	var type=prev.attr('type');
	var cls=prev.attr('class');
	var maxl=prev.attr('maxlength');
	var id=prev.attr('id');
	var name=prev.attr('name');
	var placeholder=prev.attr('placeholder');
	var newtype=(type=='password')?'text':'password';
	prev.remove();
	$(this).before('<input name='+name+'class='+cls+' id='+id+' placeholder=' +placeholder +' type='+newtype+' value='+value+' maxlength='+maxl+'>');

});
});