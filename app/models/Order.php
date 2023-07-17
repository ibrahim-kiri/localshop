<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Order class
 */
class Order
{
	
	use Model;

	protected $table = 'orders';

	protected $allowedColumns = [

		'name',
		'email',
		'phone',
		'amount',
		'delivery_address',
		'user_id',
		'status',
        'date',
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
		}else
		if (!preg_match("/^[a-zA-Z]+ [a-zA-Z]+$/", trim($data['name']))) 
		{
			$this->errors['name'] = "Please enter a valid first and last name";
		}

		if (empty($data['delivery_address'])) 
		{
			$this->errors['delivery_address'] = "A delivery address is required";
		}

		if (empty($data['phone'])) 
		{
			$this->errors['phone'] = "A Phone number is required";
		}

		if (empty($data['email'])) 
		{
			$this->errors['email'] = "An email is required";
		}else
		if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) 
		{
			$this->errors['email'] = "Email not valid";
		}

		if (empty($this->errors)) 
		{
			return true;
		}

		return false;
	}

	function create_table()
	{
		$query = "create table if not exists orders(
			id int unsigned primary key auto_increment,
			name varchar(60) not null,
			email varchar(100) not null,
			delivery_address varchar(1024) not null,
			phone varchar(15) not null,
			amount decimal(10,2) default 0 not null,
			paid tinyint(1) default 0 not null,
			status varchar(100) null;
			user_id int default 0 not null,
            date datetime not null,
			raw text null,

			key name (name),
			key email (email)
			
		)";

		$this->query($query);
	}

}