<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function add(){
		$product_id = $this->input->post('product_id');
		$recipient_id = $this->input->post('recipient_id');
		if($this->cart->get_item($product_id, $recipient_id)){
			// var_dump($this->cart->get_item($product_id, $recipient_id));
			// die();
			$this->load->view('errors');
		}
		else{
			// die();
			$this->cart->add($product_id, $recipient_id);
			redirect('/carts/viewcart');
		}

		
	}
	public function viewcart(){
		$data['items'] = $this->cart->get_all();

		$this->load->view('cart', $data);
	}


	public function remove($product_id, $recipient_id){

		$this->cart->delete($product_id, $recipient_id);
		redirect('/carts/viewcart');
	}

}