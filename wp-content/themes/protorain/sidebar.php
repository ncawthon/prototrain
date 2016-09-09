<div class="sidebar small-6 medium-6 large-5 columns">
	<ul class="tabs" data-tabs id="example-tabs">
		<?php
		$events_args = array('post_type'=>'events');
		$places = get_terms('places','hide_empty=0');
		$i=1;
		foreach($places as $place):
			?>
		<li class="tabs-title <?php if($i==1) echo 'is-active';?>"><a href="#<?php echo $place->slug;?>" aria-selected=<?php if($i==1) echo "true";?>><span><?php echo $place->name;?></span></a></li>
		<?php 
		$i++;
		endforeach;?>
	</ul>
	<div class="tabs-content" data-tabs-content="example-tabs">
		<?php
		$i=1;
		foreach ($places as $key => $place):?>
		<div class="tabs-panel <?php if($i==1) echo'is-active';?>" id="<?php echo $place->slug;?>">
			<div class="post-tabs_map medium-12">
				<?php //$map = get_post_meta( $place->term_id, 'mapfield', 1 ); ?>
				<iframe src="<?php echo get_term_meta($place->term_id,'mapfield',true); ?>" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>			
			</div>
			<div class="post-tabs_scroll medium-12 columns">
				<?php $place_query = array('post_type'=>'events',
					'tax_query' => array(
						array(
							'taxonomy' => 'places',
							'field'    => 'slug',
							'terms'    => $place->slug,
							),
						),
					);
				$place_post = new Wp_Query($place_query);
				while($place_post->have_posts()):$place_post->the_post();
				$_creativemeta_eve_place = get_post_meta(get_the_ID(),'_creativemeta_eve_place',true);
				$_creativemeta_eve_location = get_post_meta(get_the_ID(),'_creativemeta_eve_location',true); 
				$_creativemeta_eve_money = get_post_meta(get_the_ID(),'_creativemeta_eve_money',true);
				$_creativemeta_eve_date = get_post_meta(get_the_ID(),'_creativemeta_eve_date',true);
				$first_date = date("d",strtotime($_creativemeta_eve_date[0]));
				$second_date = date("d",strtotime($_creativemeta_eve_date[1]));
				$_creativemeta_eve_seats_number = get_post_meta(get_the_ID(),'_creativemeta_eve_seats_number',true);
				if($_creativemeta_eve_seats_number>0 && $_creativemeta_eve_seats_number!=''):
					?>
				<div class="post-tabs_coursedetails">
					<div class="post-tabs_date xsmall-3 small-3 medium-2 columns">
						<div class="post-tabs_date--wrap">
							<span><?php echo date("M",strtotime($_creativemeta_eve_date[0]));?></span>
							<p><?php echo $first_date.' & '.$second_date;?></p>
						</div>
					</div>
					<div class="post-tabs_details xsmall-9 small-9 medium-7 columns">
						<h3><?php the_title();?></h3>
						<p><?php echo $_creativemeta_eve_place;?></p>
						<p><?php echo $_creativemeta_eve_location;?></p>
					</div>
					<div class="post-tabs_price xsmall-12 small-12 medium-3 columns" id="seat_price">
						<a class="button button-orange" seat_id="<?php echo get_the_ID();?>" seats_num=<?php echo $_creativemeta_eve_seats_number.'/'.strtotime($_creativemeta_eve_date[0]).'/'.strtotime($_creativemeta_eve_date[1]);?> data-toggle="price">$<?php echo $_creativemeta_eve_money;?></a>
					</div>
				</div>
			<?php endif;
			endwhile;?>
		</div>
	</div>
	<?php
	$i++;
	endforeach;?>
</div>
</div>



<!--modal-->
<div class="reveal" id="price" data-reveal data-close-on-click="false">
	<h3>Reserve Class</h3>



	<p id="seat_avail">(3 seats left)</p>
	<div class="reveal-date medium-6 medium-centered columns" id="date_format">THU MAY 21 & FRI MAY 22</div>
	<form action="" method="POST" id="payment-form">
		<div class="row">
			<div class="medium-6 columns">
				<label>First Name</label>
				<input type="text" placeholder="" id="fname" name="fname" data-stripe="name">
			</div>
			<div class="medium-6 columns">
				<label>Last Name</label>
				<input type="text" name="lname" id="lname" placeholder="">
			</div>
		</div>
		<div class="row">
			<div class="medium-12 columns">
				<label>Email Address</label>
				<input type="text" placeholder="" name="eadd" id="eadd" data-stripe="email">
			</div>
		</div>
		<div class="row">
			<div class="medium-8 columns">
				<label>Card Number</label>	
				<input type="text" size="20" placeholder="" id="cnumb" name="cnumb" data-stripe="number">
			</div>
			<div class="medium-4 columns">
				<label>Card Type</label>
				<select name="ctype" id="ctype">
					<option value="husker">Visa</option>
					<option value="starbuck">Mastercard</option>
					<option value="hotdog">Discovery</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 columns">
				<label>Security Code(cvc)</label>
				<input type="text" placeholder="" id="cvc" name="cvc" data-stripe="cvc">
			</div>
			<div class="medium-4 columns">
				<label>Expiry</label>
				<select data-stripe="exp_month" id="expmonth" name="expmonth">
					<?php 
					for($i=1;$i<=12;$i++){
						$monthName = date('F', mktime(0, 0, 0, $i, 10)); 
						?>
						<option value="<?php echo sprintf("%02d",$i);?>"><?php echo $monthName;?></option>
						<?php 
					}?>
				</select>
			</div>
			<div class="reveal-month medium-4 columns">
				<label> Month </label>
				<select data-stripe="exp_year" id="expyear" name="expyear">
					<?php for($i=16;$i<31;$i++){?>
						<option value="<?php echo sprintf("%02d",$i);?>"><?php echo sprintf("%02d",$i);?></option>
						<?php 
					}?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 columns reveal-terms">
				<fieldset class="medium-12">
					<input id="checkbox1" name="checkbox1"  type="checkbox"><label for="checkbox1">I agree to Prototrain's <a data-open="terms-open">Terms and Conditions.</a></label>
				</fieldset>
				<input type="hidden" name="price_value" id="price_value">
				<input type="hidden" name="course_id" id="course_id">
			</div>
		</div>
		<div class="row">
			<div class="medium-12 columns reveal-button">
				<input type="submit" class="button submit button-orange" name="Reserve CLass" id="reserve_button" value="Reserve Class">
				<button class="close-button" data-close aria-label="Close modal" type="button">
					Cancel
				</button>
				<span id="loading"></span>
			</div>
		</div>
	</form>
	<span id="message">
		
	</span>
</div>
<?php global $adimworks; ?>
<div class="reveal" id="terms-open" data-reveal>
	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">Close</span>
	</button>
	<?php $termscondition =  $adimworks['termscondition']; ?>
	<?php echo $termscondition;  ?>
</div>
<?php $publishable =  $adimworks['publishable']; ?>
<script type="text/javascript">
	$('body').on('click','#seat_price a',function(){
		var seat_price = $(this).html();
		$('#price_value').val(seat_price);
		var seat_id = $(this).attr('seat_id');
		var seats_num = $(this).attr('seats_num');
		seats_num = seats_num.split('/');
		//console.log(date_custom(seats_num[1]*1000));
		$('#date_format').html(date_custom(seats_num[1]*1000)+' & '+date_custom(seats_num[2]*1000))
		$('#seat_avail').html('('+seats_num[0]+' seats left)');
		$('#course_id').val(seat_id);
	});
	function date_custom(date_value)
	{
		var monthNames = [
		"JAN", "FEB", "MAR",
		"APR", "MAY", "JUN", "JUL",
		"AUG", "SEP", "OCT",
		"NOV", "DEC"
		];
		var dayName=["SUN","MON","TUE","WED","THU","FRI","SAT"];

		var date = new Date(date_value);
		var day = date.getDate();
		var dayN = date.getDay();
		var monthIndex = date.getMonth();
		var year = date.getFullYear();

//console.log(day, monthNames[monthIndex], year);
return dayName[dayN]+' '+monthNames[monthIndex]+' '+day;
//document.write(day + ' ' + monthNames[monthIndex] + ' ' + year);
}
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
// function testcheck()
// {
//     if (!jQuery("#checkbox1").is(":checked")) {
//         alert("none checked");
//         return false;
//     }
//     return true;
// }

// Stripe.setPublishableKey('pk_test_DXrvi7czfEQonwUiQlR3y8Vi');
Stripe.setPublishableKey('<?php echo ($publishable); ?>');

$(function() {
	var $form = $('#payment-form');
	$("#payment-form").validate({
		rules: {
			fname: {
				required: true,
			},
			lname: {
				required: true,
			},
			eadd:
			{
				required:true,
				email:true,
			},
			cnumb:
			{
				required:true,
			},
			cvc:
			{
				required:true,
				minlength:3,
				maxlength:4,
			},
			checkbox1:
			{
				required:true
			}
		},
		messages:
		{
			fname:{
				required:"First name is required"
			},
			lname:{
				required:"Last name is required"
			},
			eadd:
			{
				required:"Email is required"
			},
			cnumb:
			{
				required:"Card Number must be entered"
			},
			cvc:
			{
				required:"CVC must be entered",
				// maxlength:"must be 3 number"
			},
			checkbox1:
			{
				required:"You need to agree Terms and Conditions"
			}

		},
  //       errorPlacement: function(error, element) {
  //       	$(this).parent('div.columns').children('input').addClass('error');
		// },
		submitHandler: function(form) {
			Stripe.card.createToken($form, stripeResponseHandler);
			//alert(form_value);
			//form.submit();
			
			
		}
	});


 //  var $form = $('#payment-form');
 //  $form.submit(function(event) {
	// $("#payment-form").validate({
	// 	submitHandler: function(form) {
	// 		form.submit();
	// 	}
	// });
 //    // Disable the submit button to prevent repeated clicks:
 //  	if(document.getElementById('checkbox1').checked)
 //  	{
	// 	$form.find('.submit').prop('disabled', true);

	// 	// Request a token from Stripe:
	// 	Stripe.card.createToken($form, stripeResponseHandler);

	// 	// Prevent the form from being submitted:
	// 	return false;
 //  	}
 //  	else
 //  	{
 //  		alert('please agree T&C');
 //  		return false;
 //  	}
 //  });
});
function stripeResponseHandler(status, response) {
  // Grab the form:
  var $form = $('#payment-form');

  if (response.error) { // Problem!

    // Show the errors on the form:
    $form.find('#message').text(response.error.message);
    //$form.find('.submit').prop('disabled', false); // Re-enable submission

  } else{ // Token was created!

    // Get the token ID:
    var token = response.id;

    // Insert the token ID into the form so it gets submitted to the server:
    $form.append($('<input type="hidden" name="stripeToken">').val(token));
    // Submit the form:
    //$form.get(0).submit();
    var form_value = $form.serialize();
    $.ajax({
    	url: '<?php bloginfo('template_url');?>/checkout_ajax.php',
    	type: 'POST',
				//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: form_value,
				beforeSend: function( xhr ) {
					$form.find('.submit').prop('disabled', true);
					$('#loading').html('<a href=""><img src="<?php bloginfo('template_url');?>/assets/images/loader.gif"></a>');
				},
			})
    .done(function(msg) {
    	var msg = JSON.parse(msg);
    	$('#message').html(msg.msg);
    	$('#loading').html('');
    	$('#seat_avail').html('('+msg.seat+' seats left)');
    	$($form)[0].reset();
    	$($form).hide();
    })
    .fail(function() {
    	console.log("error");
    })
    .always(function() {
    	console.log("complete");
    });
}
}
</script>