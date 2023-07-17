<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Core\Request;
use \Core\Session;
use \Model\Product;
use \Model\Order;
use \Model\Order_detail;

/**
 * checkout class
 */
class Checkout
{
	use MainController;

	public function index()
	{
		
		$product = new Product;
		$order = new Order;
		$order_detail = new Order_detail;
		$ses = new Session;
		$req = new Request;
		
		if (!$ses->is_logged_in()) 
		{
			message("Please login in order to checkout");
			redirect('login');
		}
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

		// if something was posted
		if ($req->posted() && is_array($data['CART'])) 
		{
			
			if ($order->validate($req->post())) 
			{
				$arr = $req->post();
				$arr['paid'] = 0;
				$arr['status'] = "pending";
				$arr['amount'] = $data['total'];
				$arr['date'] = date("Y-m-d H:i:s");
				$arr['user_id'] = $ses->user('id');

				$order->insert($arr);

				//get id for last added order
				$arr2 = [];
				$arr2['amount'] = $arr['amount'];
				$arr2['date'] = $arr['date'];
				$arr2['user_id'] = $arr['user_id'];

				$order->order_type = 'desc';
				$row = $order->first($arr2);

				$arr['order_id'] = 0;
				if ($row) 
				{
					$id = $row->id;
					$arr['order_id'] = $id;
					foreach ($data['CART'] as $cart_arr) 
					{
						$arr2 = [];
						$arr2['description'] = $cart_arr['row']->description;
						$arr2['qty'] = $cart_arr['qty'];
						$arr2['amount'] = $cart_arr['row']->price;
						$arr2['total'] = $arr2['qty'] * $arr2['amount'];
						$arr2['order_id'] = $id;

						$order_detail->insert($arr);
					}
				}

				if ($arr['payment_method'] == 'stripe') 
				{
					stripe_checkout($arr);
					$ses->pop('CART');
				}else
				if ($arr['payment_method'] == 'paypal') {
					paypal_checkout($arr);
				}

				// redirect('thanks');

			}

			$data['errors'] = $order->errors;
		}

		$this->view('checkout',$data);
	}

}
