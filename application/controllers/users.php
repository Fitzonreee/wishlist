<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	}
	public function register(){
		$data = $this->input->post();
		$result = $this->user->validate_register($data);
		//check if registration input is valid and clean
		if ($result == "valid") {
			//check if this is the first registration ever
			if (!$this->user->get_all()) {
				$data["user_level"] = 9;
			}
			else 	$data["user_level"] = 0;

			$this->user->add($data);
			$success[] = 'Registration successful.';
      $this->session->set_flashdata('success', $success);
		}
		else {
			$errors = [validation_errors()];
			$this->session->set_flashdata('errors', $errors);
		}
		if (!$this->session->userdata("user_id")) {
			redirect('dashboard/register');
		}
		else redirect("dashboard/add");
	}
	public function login(){
		$result = $this->user->validate_login($this->input->post());
		if ($result == "valid") {
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
	public function delete(){
		if ($this->session->userdata("user_id")) {
			$temp = $this->user->get_user($this->session->userdata("user_id"));
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
			$temp = $this->user->get_user($this->session->userdata("user_id"));
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
			$temp = $this->user->get_user($this->session->userdata("user_id"));
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