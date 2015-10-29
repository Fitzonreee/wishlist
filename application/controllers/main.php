<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		// if (!$this->session->userdata("user_id")) {
		// 	redirect("/");
		// }
		//$this->output->enable_profiler(TRUE);
	}
	public function index(){
		$this->load->view('product');
	}
	public function home(){
		$this->load->view('friend_list');

	}
	
	public function friends(){
		$data['friends'] = $this->user->get_friends($this->session->userdata('id'));
		$this->load->view('friends', $data);

	}
	public function preferences(){
		$this->load->view('preferences');
	}
	public function get_all_friends(){
		var_dump($this->user->get_friends(1));
		var_dump($this->session->userdata('id'));
	}
	
	public function settings(){
		$this->load->view('settings');
	}
	
}