$(document).ready(function(){
	$("#y").on('select', function(){
		$var = $(this).text();
		$('#gem').text($var);
	});
	$('#dp1').datepicker();
});