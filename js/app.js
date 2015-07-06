(function($){
	$('#hamburger').click(function(e){
        e.preventDefault;
        $('#navigation').toggleClass('opened');
    })
})(jQuery);