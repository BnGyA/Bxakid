(function($){
	$('#hamburger').click(function(e){
        e.preventDefault;
        $('#navigation').toggleClass('opened');
    });
    
    
    $(".answer").hide();
    $(".question").click(function () {
        $(".answer").slideUp();
        $(this).next(".answer").slideToggle(500);
    });

})(jQuery);