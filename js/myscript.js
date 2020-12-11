
$(document).ready(function() {
  $('.addcart').click(function (e) {
    e.preventDefault();
    var listingId = $(this).attr('val');
    $.get('addcart?listingId='+listingId, function (data) {
        $('#addcart').modal('show')
            .find('#addcartContent')
            .html(data);
    });
});


});

function myFunction(){
	alert("Happy Shopping!")
}
