<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishlist extends CI_Model {

	public function get_all(){
		return $this->db->query("SELECT * FROM wishlists LEFT JOIN products ON wishlists.product_id = products.id WHERE user_id = 1")->result_array();
	}
	public function get_item($id){
		$query = "SELECT * FROM wishlists WHERE product_id = ?";
		return $this->db->query($query, $id)->row_array();
	}
	public function add($newitem){
		$query = "INSERT INTO wishlists (user_id, product_id, created_at) VALUES (?,?, NOW())";
		$values = [$this->session->userdata('id'), $newitem['id']];
		return $this->db->query($query, $values);
	}
	public function delete($id){
		$query = "DELETE FROM wishlists WHERE product_id = ? AND user_id = 1";
		return $this->db->query($query, $id);
	}
}