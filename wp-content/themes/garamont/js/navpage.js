$( ".fm-lien-toggle" ).click(function() {
  $(".toggle-active").slideUp();
  $("#fm-toggle-" + this.id).addClass('toggle-active');   
  $("#fm-toggle-" + this.id).slideToggle();
});