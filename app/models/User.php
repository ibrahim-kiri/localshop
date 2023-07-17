<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class User
{
	
	use Model;

	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $loginUniqueColumn = 'email';

	protected $allowedColumns = [

		'image',
		'username',
		'email',
		'password',
		'role',
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

		if (empty($data['email'])) 
		{
			$this->errors['email'] = "Email is required";
		}else 
		if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) 
		{
			$this->errors['email'] = "Email is not valid";
		}else
		if ($this->first(['email'=>$data['email']])) 
		{
			$this->errors['email'] = "Email already in use";
		}

		if (empty($data['username'])) 
		{
			$this->errors['username'] = "A username is required";
		}

		if (empty($data['password'])) 
		{
			$this->errors['password'] = "Password is required";
		}

		// if (empty($data['terms'])) 
		// {
		// 	$this->errors['terms'] = "Please accept the terms and conditions";
		// }

		if (empty($this->errors)) 
		{
			return true;
		}

		return false;
	}

	function create_table()
	{
		$query = "create table if not exists users(
			id int unsigned primary key auto_increment,
			username varchar(30) not null,
			email varchar(100) not null,
			password varchar(255) not null,
			image varchar(1024) null,
			role varchar(10) not null,
			date datetime not null,

			key username (username),
			key email (email)
		)";

		$this->query($query);
	}

}