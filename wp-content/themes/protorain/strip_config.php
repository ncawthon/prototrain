<?php
global $adimworks; 

$secret =  $adimworks['secret']; 
$publishable =  $adimworks['publishable']; 


require_once('stripe/init.php');

$stripe = array(
	// "secret_key"      => "sk_test_HS8ruqeaaAzjYOeoydN0LmYy",
	// "publishable_key" => "pk_test_DXrvi7czfEQonwUiQlR3y8Vi"

	"secret_key"		=> "$secret",
	"publishable_key"	=> "$publishable"
	);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>