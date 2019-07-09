$(document).ready(function()
{
	hidetip()
    $('[data-toggle="tooltip"]').tooltip();

    $(".float-all-menu").on("click", function()
    {
    	if( $(".float-bot").css("display") == "none" )
    	{
    		$(".float-bot").show();
			// $(".task-arrow-btn").show();
    		$(this).css( { "transform":"rotateZ(45deg)" } );
    		showtip();
    	}
    	else
    	{
    		$(".task-right-btn").hide();
			$(".task-arrow-btn").show();
    		$(this).css( { "transform":"rotateZ(0deg)" } );
    		hidetip();
    	}
    	// $(".float-bot").slideToggle();
    });

	$(function()
	{
	    $('#side-menu').metisMenu();
	});
	$('.side-bar-collapse').click(function(){
	    $('.sidebar-nav').toggle();
	    $('#page-wrapper').toggleClass('custom1');
		 $(this).find('.fa').toggleClass('fa-chevron-left fa-chevron-right');
	    });
	$(document).on('click', '.panel-heading button.clickable', function(e){
	    var $this = $(this);
		if(!$this.hasClass('panel-collapsed')) {
			$this.parents('.panel').find('.panel-body').slideUp();
			$this.addClass('panel-collapsed');
			$this.find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
		} else {
			$this.parents('.panel').find('.panel-body').slideDown();
			$this.removeClass('panel-collapsed');
			$this.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
		}
	});

	function hidetip()
	{
		$('.float-bot').children().each(function(key,val)
		{
			$(this).children('.dash-mbtn').hide('explode', {direction: 'right'}, 500);
		});
		$('.task-right-btn').children().each(function(key,val)
		{
			$(this).children('.dash-mbtn').show('explode', {direction: 'right'}, 500);
		});
		
		$(".float-bot").hide();
		$('.container').css({"opacity":"1","pointer-events":"auto"});
		$(".hide-taps").css({"opacity":"1","pointer-events":"auto"});
	}

	function showtip()
	{
		$('.float-bot').children().each(function(key,val)
		{
			$(this).children('.dash-mbtn').show('explode', {direction: 'right'}, 500);
		});
		$('.task-right-btn').children().each(function(key,val)
		{
			$(this).children('.dash-mbtn').hide('explode', {direction: 'right'}, 500);
		});
		
		$(".task-arrow-btn").hide();
		$(".task-right-btn").hide();
		$('.arrow').attr('id','down-arr').removeClass('fa-angle-up').addClass('fa-angle-down');
		$('.container').css({"opacity":"0.5","pointer-events":"none"});
		$(".hide-taps").css({"opacity":"1","pointer-events":"none"});
	}

}); 