<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Core\Session;
use \Core\Request;
use \Model\Product;
use Model\Order;
use Model\Order_detail;

/**
 * admin class
 */
class Admin
{
	use MainController;

	public function index()
	{
		$req = new Request;
		$ses = new Session;

		if (!$ses->is_logged_in() || $ses->user('role') != 'admin') 
		{
			message("Please login as admin");
			redirect('login');
		}
		$this->view('admin/dashboard');
	}

	public function users()
	{
		$req = new Request;
		$ses = new Session;

		if (!$ses->is_logged_in() || $ses->user('role') != 'admin') 
		{
			message("Please login as admin");
			redirect('login');
		}

		$this->view('admin/users');
	}

	public function orders()
	{
		$req = new Request;
		$ses = new Session;

		if (!$ses->is_logged_in()) 
		{
			message("Please login as admin");
			redirect('login');
		}

		$order = new Order;

		$order->limit = 30;

		if($ses->user('role') == 'admin')
		{
			$data['rows'] = $order->findAll();
		}else
		{
			$user_id = $ses->user('id');
			$data['rows'] = $order->where(['user_id'=>$user_id]);
		}

		$this->view('admin/orders',$data);
	}

	public function products()
	{
		$data = [];
		$action = $data['action'] = URL(2) ?? 'view';

		$product = new Product();
		$req = new Request;
		$ses = new Session;

		if (!$ses->is_logged_in() || $ses->user('role') != 'admin') 
		{
			message("Please login as admin");
			redirect('login');
		}


		if($action == 'add')
		{
			if ($req->posted()) 
			{
				if ($product->validate($req->post())) 
				{
					$file = $req->files();

					//validation complete
					$arr = $req->post();

					if (!empty($file['image']['name'])) 
					{
						$folder = "uploads/";
						if (!file_exists($folder)) 
						{
							mkdir($folder, 0777, true);
						}

						$arr['image'] = $folder . $file['image']['name'];
						move_uploaded_file($file['image']['tmp_name'], $arr['image']);

						$image_class = new \Model\Image;
						$image_class->resize($arr['image'], 1000);
					}

					$product->insert($arr);
					message("Product added successfully");
					redirect('admin/products');
				}
	
				$data['errors'] = $product->errors;
			}
		}else
		if($action == 'edit')
		{

		}else
		if($action == 'delete')
		{

		}else
		{
			$data['rows'] = $product->findAll();
		}

		$this->view('admin/products',$data);
	}

}