<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');


/**
 * cancelled class
 */
class Cancelled
{
	use MainController;

	public function index()
	{

		$this->view('cancelled');
	}

}
