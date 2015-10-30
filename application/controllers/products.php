<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function display_products($rand){
		$products = $this->product->get_all_based_on_preferences();
		// if(!($products)){
			
		// }
		// else{
		// 	if($rand != 'true'){
		// 		unset($unique['products'][$rand]);
		// 		$unique['products'] = array_values($unique['products']);

		// 	}
		$count = count($products);
		for($i = 0; $i < $count; $i ++){
			if($this->wishlist->get_item($products[$i]['id'])){
				unset($products[$i]);
			}
		}
		$products = array_values($products);
		$unique['products'] = $products;
		if(empty($products)){
			$this->load->view('errors2');
		}
		else{
			$this->load->view('product', $unique);
		}
		}

	public function dislike($id){
		$this->product->dislike($id);
		if(!($this->product->check_wishlist($id))){
			$this->product->delete_wishlist($id);
		}
		redirect('/products/display_products/true');
	}

	public function add($id, $index){
		$this->wishlist->add($id);
		redirect('/products/display_products/true');
	}
	public function main(){
		$this->load->view('product');
	}
}