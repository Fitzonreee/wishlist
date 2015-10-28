<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishlists extends CI_Controller {

	public function index(){
		$newitem = $this->input->get();
		if($this->Wishlist->get_item($newitem['id'])){
			$this->load->view('errors');
		}
		else{
			$this->Wishlist->add($newitem);
			redirect('/wishlists/viewcart');
		}

		
	}
	public function viewcart(){
		$data['items'] = $this->Wishlist->get_all();
		$this->load->view('temp_wishlist', $data);
	}


	public function remove(){

		$olditem = $this->input->get();
		$olditemid = intval($olditem['id']);
		$this->Cart->delete($olditem['id']);
		redirect('/wishlists/viewcart');
	}

	
}