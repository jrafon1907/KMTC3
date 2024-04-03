$(document).ready(function(){
	
	$('#prodTable').DataTable({
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 7
	});
	
	$('#salesTable').DataTable({
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 7
	});
	
	$('#invTable').DataTable({
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 7
	});
	
	$('#cusTable').DataTable({
		"bLengthChange": false, // Set to false to hide the "Show entries" dropdown
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 7
	});
	
	$('#supTable').DataTable({
		"bLengthChange": true,
		"bInfo": true,
		"bPaginate": true,
		"bFilter": true,
		"bSort": true,
		"pageLength": 7
	});
	
});
