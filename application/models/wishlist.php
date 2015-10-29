<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishlist extends CI_Model {

	public function get_all($id){
		$query = "SELECT product_id, name, description, image_url, category_id, users.first_name, users.id FROM wishlists LEFT JOIN products ON wishlists.product_id = products.id LEFT JOIN users ON users.id = wishlists.user_id WHERE user_id = ?";
		return $this->db->query($query, $id)->result_array();
	}
	public function get_item($id){
		$query = "SELECT * FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values)->row_array();
	}
	public function add($id){
		$query = "INSERT INTO wishlists (user_id, product_id, created_at) VALUES (?,?, NOW())";
		$values = [$this->session->userdata('id'), $id];
		return $this->db->query($query, $values);
	}
	public function delete($id){
		$query = "DELETE FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);
	}
}