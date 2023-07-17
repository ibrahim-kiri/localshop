<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Core\Session;
use \Core\Request;

/**
 * ajax class
 */
class Ajax
{
	use MainController;

	public function index()
	{

		
		

	}

	public function cart()
	{
		$ses = new Session;
		$req = new Request;
		//echo json_encode($ses->get('CART'));

		if($req->posted())
		{
			$data_type = $req->input('data_type');
			$id = $req->input('id');
			$cart = $ses->get('CART');

			if($data_type == 'add')
			{
				
				if(empty($cart))
				{

					$arr2['id'] = $id;
					$arr2['qty'] = 1;
					$arr[] = $arr2;
					$ses->set('CART',$arr);

					echo "Item added successfully";
					
				}else{

					$found = false;
					foreach ($cart as $key => $arr) {
						
						if($arr['id'] == $id)
						{
							$cart[$key]['qty']++;
							$found = true;
						}
					}

					if(!$found)
					{
						$arr['id'] = $id;
						$arr['qty'] = 1;
						$cart[] = $arr;
						
					}

					$ses->set('CART',$cart);

					echo "Item added successfully";
					
				}
			}else
			if($data_type == 'remove')
			{
				
				if(!empty($cart))
				{

					foreach ($cart as $key => $arr) {
						
						if($arr['id'] == $id)
						{
							unset($cart[$key]);
						}
					}

					$ses->set('CART',$cart);
					echo "Item removed successfully";
					
				}
			}
		}

	}

}
