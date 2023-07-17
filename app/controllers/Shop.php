<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Product;

/**
 * shop class
 */
class Shop
{
	use MainController;

	public function index()
	{
		$product = new Product;
		$product->limit = 20;
		$data['rows'] = $product->findAll();
		$this->view('shop',$data);
	}

}
