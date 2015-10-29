<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function display_products($rand){
		$data = $this->product->get_all_based_on_preferences();
		$unique['products'] = $this->product->removes_products_on_wishlist($data);
		if(!($unique['products'])){
			$unique['products'] = 'All possible items added to wishlist!';
			echo "hello";
			$this->load->view('product', $unique);
		}
		else{
			if($rand != 'true'){
				unset($unique['products'][$rand]);
				$unique['products'] = array_values($unique['products']);

			}
			$this->load->view('product', $unique);
		}
	}

}