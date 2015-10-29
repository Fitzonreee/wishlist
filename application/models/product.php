<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

	public function get_all($id){
		return $this->db->query("SELECT * FROM wishlists LEFT JOIN products ON wishlists.product_id = products.id WHERE user_id = $id")->result_array();
	}
	public function get_product($id){
		$query = "SELECT * FROM products WHERE id = ?";
		return $this->db->query($query, $id)->row_array();
	}
	public function add($info){
		$query = "INSERT INTO users (first_name, last_name, email, password, salt, user_level, date_created, date_updated) VALUES (?,?,?,?,?,?,NOW(),NOW())";
		$encryption = $this->encrypt_password($info["password"]);
		$values = [$info['first_name'], $info["last_name"], $info["email"], $encryption['password'], $encryption['salt'], $info["user_level"]];

		return $this->db->query($query, $values);
	}
	public function delete($id){
		$query = "DELETE FROM users WHERE user_id = ?";
		return $this->db->query($query, $id);
	}

	public function get_all_based_on_preferences(){
		$query = "SELECT * FROM products JOIN preferences on products.category_id = preferences.category_id JOIN dislikes ON products.id = dislikes.product_id WHERE preferences.user_id = ? AND dislikes.user_id != ?";
		$values = [$this->session->userdata('id'), $this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}

}