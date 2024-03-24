$(document).ready(function () {
	$( "#trimester" ).on( "change", function() {
	var trimester = $(this).val();
	$.ajax({
		type:'POST',
		url:'schedules_management/initialsSelection',
		data: { trimester },
		success: function ( data ) { $("#ois").html(data); }
		});
	});
});
$(document).ready(function () {
	$( "#trimester" ).on( "change", function() {
	var trimester = $(this).val();
	$.ajax({
		type:'POST',
		url:'schedules_management/lineSelection',
		data: { trimester },
		success: function ( data ) { $("#schedule").html(data); }
		});
	});
});