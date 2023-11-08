
$(document).ready(function () {

var btnlist =  $('li.btn-default');
if (btnlist){
	btnlist.click(function(e){
 	var listbtn = event.target;
	alert('All is good.'+ btnlist.length)
	});
else{
	btnlist.click(function(e){
 	var listbtn = event.target;
	alert('All is bad.'+ btnlist.length);
	});
}
	btnlist.click(function(e){
 	var listbtn = event.target;
 	var lbclass =$(listbtn).attr('class');

	switch (lbclass) {
		case 'posts':
			var address = $(listbtn).attr('href');
			e.preventDefault();
			$.getJSON('/posts', function (response) {
				$('#PItable').html(response.data);
			
			});
				window.open(address);
			break;

		case 'membership':
			var address = $(listbtn).attr('href');
			e.preventDefault();
			$.getJSON('/posts', function (response) {
				$('#PItable').html(response.data);
			
			});
			window.open(address);
			break;
			
		case 'settings':
			var address = $(listbtn).attr('href');
			e.preventDefault();
			$.getJSON('/posts', function (response) {
				$('#PItable').html(response.data);
			
			});
			window.open(address);
			break;
		
		case 'reports':
			var address = $(listbtn).attr('href');
			e.preventDefault();
			$.getJSON('/posts', function (response) {
				$('#PItable').html(response.data);
			
			});
			window.open(address);
			break;
			
		case 'admins':
			alert('White is in stock and you get a discount!');
			break;
		case 'general':
			alert('White is in stock and you get a discount!');
			break;
		default:
			alert('The color:' + carColor + ' is not known.');
	break;
	};

});






if($('#user-form')){
	var form = $('#user-form');

	form.submit(function (e) {
	e.preventDefault();

	$.ajax({
		url: form.attr('action'),
		type: "POST",
		data: form.serialize(),
		dataType: "json"
		})
		.done(function (response) {
			if (response.success) {
				alert()->success('Record Saved successfully!', 'Thank You');;
				window.location.replace(response.url);
			} else {
				5 alert()->error('Record Not Saved', 'Error');
			}
		})
		.fail(function () {
			5 alert()->error('Error Message', 'Error');
		});
	});
}
});
