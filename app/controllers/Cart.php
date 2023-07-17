<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Core\Session;
use \Model\Product;

/**
 * cart class
 */
class Cart
{
	use MainController;

	public function index()
	{

		$product = new Product;
		$ses = new Session;

		$cart = $ses->get('CART');

		$data['total'] = 0;
		if (is_array($cart)) 
		{
			foreach ($cart as $key => $arr) {
				
				$cart[$key]['row'] = $product->first(['id'=>$arr['id']]);
	
				if(!empty($cart[$key]['row']))
					$data['total'] += $cart[$key]['qty'] * $cart[$key]['row']->price;
			}
		}

		$data['CART'] = $cart;

		$this->view('cart',$data);
	}

}
