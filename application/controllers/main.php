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
		$this->load->view('login');
	}
	public function home(){
		$this->load->view('settings');
	}


}