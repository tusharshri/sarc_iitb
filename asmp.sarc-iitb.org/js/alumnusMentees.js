$(document).ready(function(){
	$('a#expand').click(function() {
		$(this).prev('span.extra_sop').slideToggle();
        $(this).children('span.linktext').toggle();
    });
	$("table#mentee tr:nth-child(2n)").addClass("even");
});
