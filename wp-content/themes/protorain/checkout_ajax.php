<?php
include '../../../wp-load.php';
if($_POST['stripeToken']!=''):
	$price_value = $_POST['price_value'];
$email = $_POST['eadd'];
$course_id = $_REQUEST['course_id'];
$previous_seat = get_post_meta($course_id,'_creativemeta_eve_seats_number',true);

$price_value = str_replace('$', '',$price_value);
$price_value = str_replace(',', '',$price_value);
$price_value = $price_value*100;
require_once('strip_config.php');

$token  = $_POST['stripeToken'];

$customer = \Stripe\Customer::create(array(
	'email' => $email,
	'source'  => $token
	));

$charge = \Stripe\Charge::create(array(
	'customer' => $customer->id,
	'amount'   => $price_value,
	'currency' => 'usd'
	));
$previous_seat = $previous_seat-1;
echo json_encode(array('msg'=>'Reservation Succeded','seat'=>$previous_seat));
update_post_meta($course_id,'_creativemeta_eve_seats_number',$previous_seat);
else:
	echo json_encode(array('msg'=>'Reservation Failed. Please Try again'));
endif;
?>