<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Model {

	public function get_all(){
		return $this->db->query("SELECT user_id, product_id, recipient_id, name, description, image_url, price, category_id, first_name, last_name FROM carts LEFT JOIN products ON carts.product_id = products.id LEFT JOIN users ON carts.recipient_id = users.id WHERE user_id = 1")->result_array();
	}
	public function get_item($product_id, $recipient_id){
		$query = "SELECT * FROM carts WHERE product_id = ? AND recipient_id = ? AND user_id = ?";
		$values = [$product_id, $recipient_id, $this->session->userdata('id')];
		return $this->db->query($query, $values)->row_array();
	}
	public function add($product_id, $recipient_id){
		$query = "INSERT INTO carts (user_id, product_id, recipient_id, created_at) VALUES (?,?,?,NOW())";
		$values = [$this->session->userdata('id'), $product_id, $recipient_id];
		return $this->db->query($query, $values);
	}
	public function delete($product_id, $recipient_id){
		$query = "DELETE FROM carts WHERE product_id = ? AND user_id = ? AND recipient_id = ?";
		$values = [$product_id, $this->session->userdata('id'), $recipient_id];
		return $this->db->query($query, $values);
	}
}