setTimeout(function() {
  $('#alertmessage').fadeOut('slow');
}, 5000); 

$(document).ready(function() {   
$('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
});
	$('#t_trip_fromlocation').on('click', function() {
		if($("#t_created_by").val().length == 0) {
		   $("#ermsg").html('<div id="alertmessage" class="col-md-12"><div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span style="margin-left: 40%;">Please login before trying to book..</span></div></div>');
		   setTimeout(function() {
		        $("#alertmessage").hide().data("active", false);
		    }, 10000);
		}
	});
  var input = document.getElementById('t_trip_fromlocation');
  new google.maps.places.Autocomplete(input);
  var t_trip_tolocation = document.getElementById('t_trip_tolocation');
  new google.maps.places.Autocomplete(t_trip_tolocation);
	

});