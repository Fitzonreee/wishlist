<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	}
	public function register(){
		$data = $this->input->post();
		$result = $this->user->validate_register($data);

		if ($result == "valid") {
			$this->user->add_user($data);
			$this->set_userinfo($data["email"]);
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
			$this->set_userinfo($this->input->post("email"));
			redirect("/main/home");
		}
		else {
			$errors = $result;
			$this->session->set_flashdata('errors', $errors);
			redirect("/");
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("/");
	}
	private function set_userinfo($email){
		$userinfo = $this->user->get_user_by_email($email);
		$this->session->set_userdata("user_id", $userinfo["id"]);
		$this->session->set_userdata("first_name", $userinfo["first_name"]);
		$this->session->set_userdata("last_name", $userinfo["last_name"]);
		$this->session->set_userdata("email", $userinfo["email"]);
		$this->session->set_userdata("created_at", $userinfo["created_at"]);
	}
	public function add_friend($me, $them){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $me) {
			$result = $this->user->create_request($me, $them);

			if ($result) {
				$success[] = 'Friend request sent.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = "Failed to send friend request.";
				$this->session->set_flashdata('errors', $errors);
			}
			redirect("/main/show/$them"); //!!!!!may have to change later
		}
		redirect("/");
	}
	public function remove_friend($me, $them){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $me) {
			$result = $this->user->remove_friendship($me, $them);

			if ($result) {
				$success[] = 'Friend removed.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = "Unable to remove friend at this time.";
				$this->session->set_flashdata('errors', $errors);
			}
		}
		redirect("/");
	}
	public function cancel_friend_req($me, $them){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $me) {
			$result = $this->user->delete_request($me, $them);

			if ($result) {
				$success[] = 'Friend request cancelled.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = "Couldn't cancel friend request at this time.";
				$this->session->set_flashdata('errors', $errors);
			}
			redirect("/main/show/$them"); //!!!!! may have to change later
		}
		redirect("/");
	}
	public function accept_friend_req($them, $me){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $me) {
			$result = $this->user->create_friendship($me, $them);

			if ($result) {
				$result = $this->user->delete_request($them, $me);

				if ($result) {
					$success[] = 'Friend added!';
		      $this->session->set_flashdata('success', $success);
				}
				else{
					$errors = "Couldn't add friend at this time, delreq failed.";
					$this->session->set_flashdata('errors', $errors);
				}
			}
			else {
				$errors = "Couldn't add friend at this time.";
				$this->session->set_flashdata('errors', $errors);
			}
			redirect("/main/show/$me"); //!!!!! may have to change later
		}
		redirect("/");
	}
	public function reject_friend_req($them, $me){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $me) {
			$result = $this->user->delete_request($them, $me);

			if ($result) {
				$success[] = 'Friend request ignored.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = "Couldn't ignore friend request at this time.";
				$this->session->set_flashdata('errors', $errors);
			}
			redirect("/main/show/$me"); //!!!!! may have to change later
		}
		redirect("/");
	}
	public function edit_info($target_id){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $target_id) {
			$data = $this->input->post();
			$data["user_id"] = $target_id; //!!!!!used for admin deletion, if we decide to
			if ($this->user->validate_update($data) == "valid") {
				$result = $this->user->update_user_admin($data);
			}

			if ($result) {
				$success[] = 'Update succesful.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = [validation_errors()];
				$this->session->set_flashdata('errors', $errors);
			}
			redirect("/main/edit/$target_id"); //!!!!!may have to change later
		}
		redirect("/");
	}
	public function change_password($target_id){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $target_id) {
			$data = $this->input->post();
			$data["user_id"] = $target_id; //!!!!!used for admin deletion, if we decide to
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
			redirect("/main/edit/$target_id"); //!!!!!may have to change later
		}
		redirect("/");
	}
	public function delete($target_id){
		if ($this->session->userdata("user_id") && $this->session->userdata("user_id") == $target_id) {
			$result = $this->user->delete($target_id);
			if ($result) {
				$this->session->sess_destroy();
				$success[] = 'Deletion succesful.';
	      $this->session->set_flashdata('success', $success);
			}
			else {
				$errors = "Unable to delete user at this time.";
				$this->session->set_flashdata('errors', $errors);
			}
		}
		redirect("/");
	}
}