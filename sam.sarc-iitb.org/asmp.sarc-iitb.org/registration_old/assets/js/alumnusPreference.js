$(document).ready(function(){
	$('a#expand').click(function() {
		$(this).prev('span.extra_sop').slideToggle();
        $(this).children('span.linktext').toggle();
    });
	$("table#alumnusPreference tr:nth-child(2n)").addClass("even");
	$("table#alumnusPreference").tableDnD({
		
	});
	$("form#preferenceForm").submit(function(){
		var array= new Array();
		var size = $("table#alumnusPreference tr").length;
		for(var i=1; i<=size; i++){
			array[i-1]=$("table#alumnusPreference tr:nth-child("+i+")").attr('id');
		}
		$("#preferenceOrder").val(array.toString());
	});
});
