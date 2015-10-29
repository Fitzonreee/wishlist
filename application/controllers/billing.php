<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function __construct(){
		require_once(APPPATH."libraries/stripe-php-master/init.php");
		parent:: __construct();
		$this->output->enable_profiler(TRUE);
	}
	public function bill_user(){
		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_BzcfGDAVwQw9efuWp2eVvyVg");

		// Get the credit card details submitted by the form
		$strip_info = $this->input->post();

		var_dump($stripe_info);
		die();

		// Create a Customer
		$customer = \Stripe\Customer::create(array(
		  "source" => $token,
		  "description" => "Example customer")
		);

		
		// Charge the Customer instead of the card
		\Stripe\Charge::create(array(
		  "amount" => 1000, # amount in cents, again
		  "currency" => "usd",
		  "customer" => $customer->id)
		);

		# YOUR CODE: Save the customer ID and other info in a database for later!

		# YOUR CODE: When it's time to charge the customer again, retrieve the customer ID!

		\Stripe\Charge::create(array(
		  "amount"   => 1500, # $15.00 this time
		  "currency" => "usd",
		  "customer" => $customerId # Previously stored, then retrieved
		  ));
	}
	//add billing info
	//add shipping info
	//edit those
}