$("#login-button").click(function(event){
	 $('h1.name').html("<b>Iniciando</b><br>"+ $('#email').val());

   event.preventDefault();
		 $('form').fadeOut(500);
  
	 $('.wrapper').addClass('form-success');
});