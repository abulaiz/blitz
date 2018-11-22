<?php 
	
	// Memulai Sessions
	session_start();

	// Set Server Time
	date_default_timezone_set("Asia/Jakarta");

	// Vendor Path Direcory
	$_Path = '../vendor/';

	// Load Vendor Class
	require $_Path.'libs/Vendor.php';

	// Load Router Class
	require $_Path.'libs/Router.php';	

	// Load Database config
	require $_Path.'config/database.php';

	// Identifikasi Request
	if(!isset($_SERVER['REDIRECT_URL']))
		$_request = "";
	else
		$_request = $_SERVER['REDIRECT_URL'];


	// Berlaku di localhost imron saja
	$_request = str_replace("/blitz/public/", "", $_request);


	// Parsing global variable into libs Classes
	Vendor::setPath($_Path);
	Vendor::setDB($_db);
	Router::setRequest($_request);


	// Global Routes File
	require Vendor::Path('routes.php');	


	// If URL cann't find request
	die("Error 404");
?>