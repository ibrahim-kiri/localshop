<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use Core\Request;
use \Model\User;

/**
 * signup class
 */
class Signup
{
	use MainController;

	public function index()
	{
		$user = new User();
		$req = new Request;

		$data = [];
		if ($req->posted()) 
		{
			if ($user->validate($req->post())) 
			{
				//validation complete
				$arr = $req->post();
				$arr['password'] = password_hash($arr['password'], PASSWORD_DEFAULT);
				$arr['date'] = date("Y-m-d H:i:s");
				$arr['role'] = "user";

				$user->insert($arr);
				message("Account created! please login to continue");
				redirect('login');
			}

			$data['errors'] = $user->errors;
		}

		$this->view('signup',$data);
	}

}
