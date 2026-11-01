
# CCAvenue Payment Gateway PHP

A simple PHP extension for CCAvenue(www.ccavenue.com) payment gateway integration in Laravel


## Installation

Require this package in your composer.json and update composer. This will download the package.

    composer require samdoit/ccavenue

### Laravel

On Laravel 5.5 or later the ServiceProvider is registered automatically through package auto-discovery.
On older versions, add it to the providers array in config/app.php

    Samdoit\CCAvenue\CCAvenueServiceProvider::class,

Publish the config file

    php artisan vendor:publish --tag=ccavenue-config

and set your credentials in `.env`

    CCAVENUE_MERCHANT_ID=
    CCAVENUE_ACCESS_CODE=
    CCAVENUE_WORKING_KEY=

#### Request Payment

	require_once __DIR__ . '/../vendor/autoload.php'; 
	use Samdoit\CCAvenue\CCAvenuePayment;

	$ccavenue = new CCAvenuePayment();

	// required details
	$ccavenue->setAmount( '<Amount>' );
	$ccavenue->setOrderId( '<order_id>' );
	$ccavenue->setRedirectUrl( '<redirect_url>' );
	$ccavenue->setCancelUrl( '<cancel_url>' );  // optional, defaults to the redirect url
	$ccavenue->setCurrency( 'INR' );            // optional, defaults to INR

	// billing details
	$ccavenue->setBillingName( '<billing_cust_name>' );
	$ccavenue->setBillingAddress( '<billing_cust_address>' );
	$ccavenue->setBillingCity( '<billing_cust_city>' );
	$ccavenue->setBillingZip( '<billing_cust_zip>' );
	$ccavenue->setBillingState( '<billing_cust_state>' );
	$ccavenue->setBillingCountry( '<billing_cust_country>' );
	$ccavenue->setBillingEmail( '<billing_cust_email>' );
	$ccavenue->setBillingTel( '<billing_cust_tel>' );
	$ccavenue->setBillingNotes( '<billing_cust_notes>' );  // sent as merchant_param1

	// copy all the billing details to shipping details
	$ccavenue->billingSameAsShipping();

	// get encrypted data to be passed (throws InvalidArgumentException if a required field is missing)
	$data = $ccavenue->getEncryptedData();

	// access code to be passed along the param
	$access_code = $ccavenue->getAccessCode();
	

#### HTML Redirect
	<html>
	<body>
        <form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
            <input type=hidden name=encRequest value="{{ $data }}">
            <input type=hidden name=access_code value="{{ $access_code }}">
        </form>

        <script language='javascript'>document.redirect.submit();</script>
	</body>
	</html>


#### Payment Response

	require_once __DIR__ . '/../vendor/autoload.php'; 
	use Samdoit\CCAvenue\CCAvenuePayment;

	// Get Response
	$response = $_POST["encResp"];

	$ccavenue = new CCAvenuePayment();

	$result = $ccavenue->response($response);

	// 'success', 'pending' (aborted), 'declined' or 'error'
	if ($result['status'] === 'success') {
		$orderId  = $result['data']['order_id'];
		$trackingId = $result['data']['tracking_id'];
	}
