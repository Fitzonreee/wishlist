<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	}
	public function register(){
		$data = $this->input->post();
		$result = $this->user->validate_register($data);

		if ($result == "valid") {
			$this->user->add($data);
			$this->set_userinfo();
			$success[] = 'Registration successful.';
      $this->session->set_flashdata('success', $success);
		}
		else {
			$errors = [validation_errors()];
			$this->session->set_flashdata('errors', $errors);
		}

		if (!$this->session->userdata("user_id")) {
			// !!!!! change to external index
			redirect('/');
		}
		else redirect("/main/home"); // !!!!! change to internal home
	}
	public function login(){
		$result = $this->user->validate_login($this->input->post());
		if ($result == "valid") {
			$this->set_userinfo();
			redirect("/dashboard/home");
		}
		else {
			$errors = $result;
			$this->session->set_flashdata('errors', $errors);
			redirect("/dashboard/login");
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("/");
	}
	private function set_userinfo(){
		$userinfo = $this->user->get_user_by_email($data["email"]);
		$this->session->set_userdata("user_id", $userinfo["user_id"]);
		$this->session->set_userdata("first_name", $userinfo["first_name"]);
		$this->session->set_userdata("last_name", $userinfo["last_name"]);
		$this->session->set_userdata("email", $userinfo["email"]);
		$this->session->set_userdata("created_at", $userinfo["created_at"]);
	}




	
	
	public function delete(){
		if ($this->session->userdata("user_id")) {
			$temp = $this->user->get_user_by_id($this->session->userdata("user_id"));
			if ($temp["user_level"] == 9) {
				$result = $this->user->delete($this->input->post("delete"));
				if ($result) {
					$success[] = 'Deletion succesful.';
		      $this->session->set_flashdata('success', $success);
				}
				else {
					$errors = [validation_errors()];
					$this->session->set_flashdata('errors', $errors);
				}
			}
		}
		redirect("/");
	}
	public function edit_info($target_id){
		if ($this->session->userdata("user_id")) {
			$temp = $this->user->get_user_by_id($this->session->userdata("user_id"));
			$data = $this->input->post();
			$data["user_id"] = $target_id;
			if ($temp["user_level"] == 9) {
				if ($this->user->validate_update_admin($data) == "valid") {
					$result = $this->user->update_user_admin($data);
				}
			}
			else {
				if ($this->user->validate_update_normal($data) == "valid") {
					$result = $this->user->update_user_normal($data);
				}
			}

			if ($result) {
				$success[] = 'Update succesful.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = [validation_errors()];
				$this->session->set_flashdata('errors', $errors);
			}
			redirect("dashboard/edit/$target_id");
		}
		redirect("/");
	}
	public function change_password($target_id){
		if ($this->session->userdata("user_id")) {
			$temp = $this->user->get_user_by_id($this->session->userdata("user_id"));
			$data = $this->input->post();
			$data["user_id"] = $target_id;
			if ($this->user->validate_change_password($data) == "valid") {
				$result = $this->user->update_password($data);
			}

			if ($result) {
				$success[] = 'Password changed.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = [validation_errors()];
				$this->session->set_flashdata('errors', $errors);
			}
			redirect("dashboard/edit/$target_id");
		}
		redirect("/");
	}
}