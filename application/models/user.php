<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct(){
		parent:: __construct();
	}

	/*Registration*/
	public function validate_register($data){
    $this->form_validation->set_rules('username', 'Username', 'real_escape_string|xss_clean|trim|required');
    $this->form_validation->set_rules('first_name', 'First Name', 'real_escape_string|xss_clean|trim|required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'real_escape_string|xss_clean|trim|required');
    $this->form_validation->set_rules('email', 'Email', 'real_escape_string|xss_clean|trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'real_escape_string|xss_clean|trim|required|min_length[1]|matches[confirm_password]');
    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'real_escape_string|xss_clean|trim|required');
    if($this->form_validation->run()) {
      return "valid";
    } else {
      return array(validation_errors());
    }
	}
	public function add_user($info){
		$query = "INSERT INTO users (username, first_name, last_name, email, password, salt, created_at, updated_at) VALUES (?,?,?,?,?,?,NOW(),NOW())";
		$encryption = $this->encrypt_password($info["password"]);
		$values = [$info["username"], $info['first_name'], $info["last_name"], $info["email"], $encryption['password'], $encryption['salt']];

		return $this->db->query($query, $values);
	}
	private function encrypt_password($pass) {
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encryptpass = md5($pass . '' . $salt);
		$encrypted = ["salt"=>$salt, "password"=>$encryptpass];
		return $encrypted;
	}

	/*Login*/
	public function validate_login($data){
    $this->form_validation->set_rules('email', 'Email', 'real_escape_string|xss_clean|trim|required|valid_email|!is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'real_escape_string|xss_clean|trim|required|min_length[1]');

    if($this->form_validation->run()) {
    	if ($this->verify_user($data["email"], $data["password"])) {

      	return "valid";
    	}
    	else {
    		return ["Incorrect password."];
    	}
    } else {
      return array(validation_errors());
    }
	}
	private function verify_user($email, $pass){
		$query = "SELECT * FROM users WHERE email = ?";
		$temp = $this->db->query($query, $email)->row_array();
		if ($this->check_encryption($pass, $temp["salt"]) == $temp['password']) {
			return true;
		}
		else return false;
	}
	private function check_encryption($pass, $salt){
		$encryptpass = md5($pass . '' . $salt);
		return $encryptpass;
	}

	/*Friendships*/
	public function get_friends($user_id){
		$query = "SELECT friends.username AS username, friends.user_id AS user_id FROM users JOIN friendships ON users.user_id = friendships.user_id JOIN users as friends ON friends.friend_id = friends.user_id WHERE users.user_id = ?";
		return $this->db->query($query, $user_id)->result_array();
	}
	public function create_friendship($user_id, $friend_id){
		$query = "INSERT INTO friendships (user_id, friend_id) VALUES (?, ?), (?, ?);";
		$values = [$user_id, $friend_id, $friend_id, $user_id];
		return $this->db->query($query, $values);
	}
	public function remove_friendship($user_id, $friend_id){
		$this->db->trans_start();
		$values = [$user_id, $friend_id];
		$this->db->query("DELETE FROM friendships WHERE friendships.user_id = ? AND friendships.friend_id = ?;", $values);
		$values = [$friend_id, $user_id];
		$this->db->query("DELETE FROM friendships WHERE friendships.user_id = ? AND friendships.friend_id=?;", $values);
		$this->db->trans_complete();
	}

	/*Friend Requests*/
	public function get_req_status($me, $them){
		$query = "SELECT * FROM friend_requests WHERE (recipient = ? AND requestor = ?) OR (requestor = ? AND recipient = ?)";
		$values = [$me, $them, $them, $me];
		return $this->db->query($query, $values)->row_array();
	}
	public function create_request($me, $them){
		$query = "INSERT INTO friend_requests (recipient, requestor) VALUES (?,?)";
		$values = [$me, $them];
		return $this->db->query($query, $values);
	}
	public function delete_request($id1, $id2){
		$values = [$id1, $id2];
		$query = "DELETE FROM friend_requests WHERE requestor = ? AND recipient = ?";
		$this->db->query($query, $values);
	}





	public function get_all(){
		$query = "SELECT user_id, concat(first_name, ' ', last_name) AS name, email, date_created, user_level FROM users";
		return $this->db->query($query)->result_array();
	}
	public function get_user_by_email($email){
		$query = "SELECT user_id, first_name, last_name, email, created_at FROM users WHERE email = ?";
		return $this->db->query($query, $email)->row_array();
	}
	public function get_user_by_id($id){
		$query = "SELECT user_id, first_name, last_name, email, created_at FROM users WHERE user_id = ?";
		return $this->db->query($query, $id)->row_array();
	}

	public function delete($id){
		$query = "DELETE FROM users WHERE user_id = ?";
		return $this->db->query($query, $id);
	}
	public function update_user_admin($info){
		$query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, user_level = ?, description = ?, date_updated = NOW() WHERE user_id = ?";
		$values = [$info['email'], $info["first_name"], $info["last_name"], $info["user_level"], $info["description"], $info["user_id"]];

		return $this->db->query($query, $values);
	}
	public function update_user_normal($info){
		$query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, description = ?, date_updated = NOW() WHERE user_id = ?";
		$values = [$info['email'], $info["first_name"], $info["last_name"], $info["description"], $info["user_id"]];

		return $this->db->query($query, $values);
	}
	public function update_password($info){
		$q = $this->db->query("SELECT salt FROM users WHERE user_id = ?", $info["user_id"])->row_array();
		$salt = $q["salt"];
		$encryptpass = md5($info["password"] . '' . $salt);

		$query = "UPDATE users SET password = ?, date_updated = NOW() WHERE user_id = ?";
		$values = [$encryptpass, $info["user_id"]];

		return $this->db->query($query, $values);
	}
	public function validate_update_admin($data){
    $this->form_validation->set_rules('email', 'Email', 'real_escape_string|xss_clean|trim|valid_email|');
    $this->form_validation->set_rules('first_name', 'First Name', 'real_escape_string|xss_clean|trim');
    $this->form_validation->set_rules('last_name', 'Last Name', 'real_escape_string|xss_clean|trim');
    $this->form_validation->set_rules('user_level', 'User Level', 'real_escape_string|xss_clean|trim');
    $this->form_validation->set_rules('description', 'Description', 'real_escape_string|xss_clean|trim');

    if($this->form_validation->run()) {
      return "valid";
    }
    else {
      return array(validation_errors());
    }
	}
	public function validate_update_normal($data){
    $this->form_validation->set_rules('email', 'Email', 'real_escape_string|xss_clean|trim|valid_email');
    $this->form_validation->set_rules('first_name', 'First Name', 'real_escape_string|xss_clean|trim');
    $this->form_validation->set_rules('last_name', 'Last Name', 'real_escape_string|xss_clean|trim');
    $this->form_validation->set_rules('description', 'Description', 'real_escape_string|xss_clean|trim');

    if($this->form_validation->run()) {
      return "valid";
    }
    else {
      return array(validation_errors());
    }
	}
	public function validate_change_password($data){
    $this->form_validation->set_rules('password', 'Password', 'real_escape_string|xss_clean|trim|required|min_length[1]|matches[confirm_password]');
    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'real_escape_string|xss_clean|trim|required');

    if($this->form_validation->run()) {
      return "valid";
    }
    else {
      return array(validation_errors());
    }
	}
	
}