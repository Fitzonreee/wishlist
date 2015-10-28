<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function index(){
		$newitem = $this->input->get();
		if($this->Cart->get_item($newitem['id'])){
			$this->load->view('errors');
		}
		else{
			$this->Cart->add($newitem);
			redirect('/carts/viewcart');
		}

		
	}
	public function viewcart(){
		$data['items'] = $this->Cart->get_all();
		$this->load->view('temp_cart_view', $data);
	}


	public function remove(){

		$olditem = $this->input->get();
		$olditemid = intval($olditem['id']);
		$this->Cart->delete($olditem['id']);
		redirect('/carts/viewcart');
	}

	
}