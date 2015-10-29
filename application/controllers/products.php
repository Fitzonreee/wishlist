<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function display_products($rand){
		$unique['products'] = $this->product->get_all_based_on_preferences();
		if(!($unique['products'])){
			$unique['products'] = 'All possible items added to wishlist!';
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