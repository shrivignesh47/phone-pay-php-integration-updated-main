<?php

require('vendor/autoload.php');
use PhonePe\PhonePe;
use PhonePe\Env;
use PhonePe\payments\v1\PhonePePaymentClient;
use PhonePe\payments\v1\models\request\builders\PgPayRequestBuilder;
use PhonePe\payments\v1\models\request\builders\InstrumentBuilder;

$MERCHANTID = "M22T6NWEV1X8R";
$SALTKEY = "bf5622f5-16e6-4f3d-bc2c-96588f33310b";
$SALTINDEX = "1";
$env = Env::PRODUCTION;
$SHOULDPUBLISHEVENTS = true;

$phonePePaymentsClient = new PhonePePaymentClient($MERCHANTID, $SALTKEY, $SALTINDEX, $env, $SHOULDPUBLISHEVENTS);

$merchantTransactionId = rand(1111111111, 99999999999);

// Capture form data
$name = $_POST['name'];
$phone = $_POST['phone'];

$request = PgPayRequestBuilder::builder()
    ->mobileNumber($phone)
    ->callbackUrl("http://localhost/demo/phonepe/response.php")
    ->merchantId($MERCHANTID)
    ->merchantUserId(rand(1111111111, 99999999999))
    ->amount(8400000) // Example amount in paise (₹1000)
    ->merchantTransactionId($merchantTransactionId)
    ->redirectUrl("http://www.siragirivel.in") // Your site where you want the user to be redirected after payment
    ->redirectMode("REDIRECT")
    ->paymentInstrument(InstrumentBuilder::buildPayPageInstrument())
    ->build();

$response = $phonePePaymentsClient->pay($request);

// Redirect to PhonePe's payment page
$url = $response->getInstrumentResponse()->getRedirectInfo()->getUrl();
header('Location: ' . $url);
exit;

?>
