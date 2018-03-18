$(document).ready(function(){
	$('a.button-like').click(function(){
		var params = {
			'id': $(this).attr('data-id')
		};
		$.post('/post/default/like', params, function (data){
			console.log(data);
		});
		return false;
	});
});