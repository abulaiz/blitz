<?php 
		// Initialize variable
		$_db = null;

		// Database Configurations
		$db_hostname='localhost'; 
		$db_username='root'; 
		$db_password=''; 
		$dbname='blizt';

		// instance of PDO Object
		try {
			$_db = new PDO('mysql:host='.$db_hostname.';dbname='.$dbname.';charset=utf8', $db_username, $db_password);
			$_db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e) {
			die("Failed to connect database");
		}	

 ?>