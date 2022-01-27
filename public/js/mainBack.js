$(document).ready(function () {
  $('#sidebar').toggleClass('active');

  $(".imagenView").click(function(){
    $("#full-image").attr("src", $(this).attr("src"));
    $('#visorImagen').show();
  });
  
  $("#visorImagen .close").click(function(){
    $('#visorImagen').hide();
  });

  $(document).keyup(function(e) {
    if (e.key === "Escape") { 
      $('#visorImagen').hide();
  }
  });

  $('.counter-value').each(function(){
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    },{
        duration: 3500,
        easing: 'swing',
        step: function (now){
            $(this).text(Math.ceil(now));
        }
    });
  });

});

document.querySelectorAll('.imagenView').forEach(item => {
  item.addEventListener('click', event => {

  })
})
