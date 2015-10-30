<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

	public function get_all($id){
		return $this->db->query("SELECT * FROM wishlists LEFT JOIN products ON wishlists.product_id = products.id WHERE user_id = $id")->result_array();
	}
	public function get_product($id){
		$query = "SELECT * FROM products WHERE id = ?";
		return $this->db->query($query, $id)->row_array();
	}
	public function add($id){
		$query = "INSERT INTO wishlists (product_id, user_id, created_at) VALUES (?,?, now())";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);

	}
	public function delete_wishlist($id){
		$query = "DELETE FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);
	}
	public function check_wishlist($id){
		$query = "SELECT * FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);
	}

	public function get_all_based_on_preferences(){
		$query = "SELECT * FROM products RIGHT JOIN preferences on products.category_id = preferences.category_id LEFT JOIN dislikes ON products.id = dislikes.product_id WHERE dislikes.user_id IS NULL";
		$values = [$this->session->userdata('id'), $this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}

	public function dislike($id){
		$query = "INSERT INTO dislikes (product_id, user_id, created_at) VALUES (?,?, now())";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);

	}
}