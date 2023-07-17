<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Product;

/**
 * home class
 */
class Home
{
	use MainController;

	public function index()
	{
		$product = new Product;
		$data['rows'] = $product->findAll();
		$this->view('home',$data);
	}

}
