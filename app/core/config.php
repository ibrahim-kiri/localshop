<?php 

defined('ROOTPATH') OR exit('Access Denied!');

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** database config **/
	define('DBNAME', 'localshop_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'mysql');
	
	define('ROOT', 'http://localhost/localshop/public');

}else
{
	/** database config **/
	define('DBNAME', 'id21042581_localshop_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'id21042581_mylocalroot');
	define('DBPASS', 'Vvu&RX0hW-McE}X%');
	define('DBDRIVER', 'mysql');

	define('ROOT', 'https://perambulatory-cushi.000webhostapp.com/');

}

define('APP_NAME', "Local Shop");
define('APP_DESC', "Best website on the planet");

define('SK', 'sk_test_51NU7TrEuQe78yZLZPVwsSweuH8ZVo4N8rkJ0K1FY3gRxlSRmMu4US9n8mWk9XtRId5bPbWF0iaFeVYq5RH2pTR8x00av5orh5R');
define('HK', 'whsec_lwKOti0x3ayZ2czZT9zm209axKEbclsK');

/** true means show errors **/
define('DEBUG', true);
