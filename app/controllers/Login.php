<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\User;
use \Core\Request;
use \Core\Session;


/**
 * login class
 */
class Login
{
	use MainController;

	public function index()
	{
		$user = new User();
		$req = new Request;
		$ses = new Session;

		$data = [];
		if($req->posted())
		{
 			$post = $req->post();

			//check for the email
			$row = $user->first(['email'=>$post['email']]);

			if($row)
			{

				if(password_verify($post['password'], $row->password))
				{
					//everything good
					$ses->auth($row);
					redirect('home');
				}
 
			}

			$data['errors']['email'] = "Wrong email or password";
		}

		$this->view('login',$data);
	}

}
