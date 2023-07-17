<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');


/**
 * thanks class
 */
class Thanks
{
	use MainController;

	public function index()
	{

		$this->view('thanks');
	}

}
