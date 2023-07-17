<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Product class
 */
class Product
{
	
	use Model;

	protected $table = 'products';

	protected $allowedColumns = [

		'image',
		'name',
		'description',
		'price',
		'qty',
		'user_id',
	];

	/*****************************
	 * 	rules include:
		required
		alpha
		email
		numeric
		unique
		symbol
		longer_than_8_chars
		alpha_numeric_symbol
		alpha_numeric
		alpha_symbol
	 * 
	 ****************************/
	protected $validationRules = [

		'email' => [
			'email',
			'unique',
			'required',
		],
		'username' => [
			'alpha',
			'required',
		],
		'password' => [
			'not_less_than_8_chars',
			'required',
		],
	];

	public function validate($data)
	{
		$this->errors = [];

		if (empty($data['name'])) 
		{
			$this->errors['name'] = "A name is required";
		}

		if (empty($data['description'])) 
		{
			$this->errors['description'] = "A description is required";
		}

		if (!is_numeric($data['price'])) 
		{
			$this->errors['price'] = "Price must be a number";
		}

		if (!is_numeric($data['qty'])) 
		{
			$this->errors['qty'] = "Quantity must be a number";
		}

		if (empty($this->errors)) 
		{
			return true;
		}

		return false;
	}

	function create_table()
	{
		$query = "create table if not exists products(
			id int unsigned primary key auto_increment,
			name varchar(30) not null,
			description text not null,
			image varchar(1024) not null,
			price decimal(10,2) default 0 not null,
			qty int default 1 null,
			user_id int default 0 not null,
			key name (name)
		)";

		$this->query($query);
	}

}