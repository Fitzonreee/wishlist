<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index(){
		$this->session->set_userdata('id', 1);
		$data['products'] = $this->Product->get_all($this->input->get('id'));
		$this->load->view('temp_view', $data);
	}
	public function home(){
		$this->load->view('preferences');
	}


	public function add(){
		echo "hello add";
	}

	public function info($id){
		$item['info'] = $this->product->get_product($id);
		$this->load->view('product_info', $item);
	}

}