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

		public function my_list(){
		$data['items'] = $this->wishlist->get_all($this->session->userdata('id'));
		$this->load->view('my_list', $data);
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

	public function add_my_list($id){
		if($this->wishlist->get_item($id)){
			$this->load->view('errors');
		}
		else{
			$this->wishlist->add($id);
			redirect('/wishlists/my_list');
		}
	}

	public function friends_list($id){
		$items_on_wishlist = $this->wishlist->get_all($id);
		$name = $items_on_wishlist[0]['first_name'];
		$new_wishlist = [];
		foreach($items_on_wishlist as $item){
			if(empty($this->cart->in_cart($item['product_id'], $id))){
				$new_wishlist[] = $item;
			}
		}
		$new_wishlist[] = $name;
		$list['item'] = $new_wishlist;
		$this->load->view('friend_list', $list);
	}

	public function delete($id){
		$this->wishlist->delete($id);
		redirect('/wishlists/my_list');
	}
}