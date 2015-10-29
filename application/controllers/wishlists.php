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
		if ($this->session->userdata("id") != $id) {
			$me = $this->session->userdata("id");
			$data['data'] = $this->wishlist->get_all($id);
			$friendship_status = $this->user->get_friendship($me, $id);
			if ($friendship_status) {
				$data["friend_status"] = "friends";
			}
			else {
				$req_status = $this->user->get_req_status($me, $id);
				if (empty($req_status)) {
					$data["friend_status"] = "none";
				}
				else if ($req_status["requestor_id"] == $me) {
					$data["friend_status"] = "cancel";
				}
				else if ($req_status["recipient_id"] == $me) {
					$data["friend_status"] = "accept";
				}
			}
			$data["friend_id"] = $id;
			$this->load->view('friend_list', $data);
		}
		else
			redirect("/wishlists/my_list");
	}

	public function delete($id){
		$this->wishlist->delete($id);
		redirect('/wishlists/my_list');
	}
}