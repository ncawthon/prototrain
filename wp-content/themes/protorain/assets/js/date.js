jQuery( document ).ready(function($) {
	$('body').on('focus','.details_meta_date',function(){
		$(this).datepicker({
			dateFormat : 'dd-mm-yy'
		});
	});
    $('body').on('click', '#add_date', function(event) {
    	var datas = $(this).attr('data');
    	$(this).attr('data',parseInt(datas)+1);
    	$('#date_form').append("<div data="+datas+">From: <input type='text_small' name=details_meta_date["+datas+"][from] class='details_meta_date'  value=''> To: <input type='text_small' name=details_meta_date["+datas+"][to] class='details_meta_date'  value=''><a href='#!' class='remove_date'>Remove</a><br></div>");
    	/* Act on the event */
    });
    $('body').on('click', '.remove_date', function(event) {
    	$(this).parent('div').remove();
    	/* Act on the event */
    });
});