$(document).ready(function () {
  $('#sidebar').toggleClass('active');
  /*efecto imagenes */
$(".imagenView").click(function(){
  $("#full-image").attr("src", $(this).attr("src"));
  $('#visorImagen').show();
  alert('sip');
});

$("#visorImagen .close").click(function(){
  $('#visorImagen').hide();
});

$(document).keyup(function(e) {
  if (e.key === "Escape") { 
    $('#visorImagen').hide();
 }
});
});

