<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function __construct(){
		require_once(APPPATH."libraries/stripe-php-master/init.php");
		parent:: __construct();
		$this->output->enable_profiler(TRUE);
	}
	public function bill_user(){
		\Stripe\Stripe::setApiKey("sk_test_BzcfGDAVwQw9efuWp2eVvyVg");
		$stripe_info = $this->input->post();
		$billing = $this->user->get_billing_id($this->session->userdata("id"));
		$total = $this->cart->get_total($this->cart->get_all());
		if ($billing) {
			\Stripe\Charge::create(array(
		  "amount"   => $total,
		  "currency" => "usd",
		  "customer" => $billing["billing_id"]
		  ));
		}
		else{
			$customer = \Stripe\Customer::create(array(
			  "source" => $stripe_info["stripeToken"],
			  "description" => "Example customer")
			);
			$this->user->set_billing_id($customer["id"]);
			try {
			  $charge = \Stripe\Charge::create(array(
			    "amount" => $total,
			    "currency" => "usd",
			    "source" => $customer["source"],
			    "description" => "Example charge"
			    ));
			} catch(\Stripe\Error\Card $e) {
			  // The card has been declined
			}
		}
	}
}