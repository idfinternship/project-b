$(document).ready(function(c) {
    $('.alert-close').on('click', function(c){
      document.getElementById("textbox").style.display = '';
      document.getElementById("search").style.display = '';
      $(this).parent().fadeOut('slow', function(c){
        document.getElementById("filter").style.display = '';
  });
});   
});
$(document).ready(function(c) {
    $('.alert-close1').on('click', function(c){
      $(this).parent().fadeOut('slow', function(c){
  });
});   
});