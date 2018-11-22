<?php 

	class Router extends Vendor
	{

		private static $_request;

		public static function setRequest($request)
		{
			Self::$_request = $request;
		}

		public static function getRequest(){
			return Self::$_request;
		}

		public static function post($path, $access)
		{

			if((Self::$_request==$path || Self::$_request==$path."/") && count($_POST)>0){
				Self::callController($access);
			}
		}

		public static function get($path, $access)
		{

			if((Self::$_request==$path || Self::$_request==$path."/") && count($_POST)==0){
				Self::callController($access);
			}
		}

		private static function callController($access){

				$access = explode("@", $access);

				// Require conroller file
				Self::Controller($access[0].".php");

				// Instance object
				$class = $access[0];
				$obj = new $class();

				// Access Method
				$obj->{$access[1]}();

				// Stop Prosses
				die();
		}


	}

 ?>