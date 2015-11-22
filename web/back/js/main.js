// flashbag animation
$(function(){

	$('.flash').hide();
	$('.flash').queue(function(){
		setTimeout(function(){
			$('.flash').dequeue();
		}, 300 );
	});
	$('.flash').fadeIn();
	$('.flash').queue(function(){
		setTimeout(function(){
			$('.flash').dequeue();
		}, 4000 );
	});
	$('.flash').fadeOut();

	$('.flash').on('click', function(){
		$(this).hide();
	});
});


// menu mobile
$(function(){

	$('#nav-trigger').on('click', function(){

		if($('nav').is(':hidden') ){
			$('nav').slideDown();
		} else{
			$('nav').slideUp();
		}
	});
});
