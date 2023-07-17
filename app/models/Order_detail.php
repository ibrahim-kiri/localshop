<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Order_detail class
 */
class Order_detail
{
	
	use Model;

	protected $table = 'order_details';

	protected $allowedColumns = [

		'order_id',
		'description',
		'qty',
		'amount',
		'total',
	];

	function create_table()
	{
		$query = "create table if not exists order_details(

			id int unsigned primary key auto_increment,
			order_id int unsigned,
			description varchar(100) not null,
			qty int default 1 not null,
			total decimal(10,2) default 0 not null,
			amount decimal(10,2) default 0 not null,

            key order_id (order_id)
		)";

		$this->query($query);
	}

}