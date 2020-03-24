function goToURL() {
    location.href = '/item/create';
}

function goToCreateRequestURL(){
  location.href = '/item/request/create';
}

$(function() {

  if ($("#return_expected-yes").is(":checked")) {
    $('#asking_product_div').show();
  }
  else if ($("#return_expected-no").is(":checked")) {
    $('#asking_product_div').hide();
    
  }
});


$('#return_expected-yes').click(function(e){
    $('#asking_product_div').show();
})

$('#return_expected-no').click(function(e){
  $('#asking_product_div').fadeOut();
})
