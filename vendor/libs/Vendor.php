<?php 

	class Vendor
	{

		protected static $_Path, $_db;

		public static function setPath($path)
		{
			Self::$_Path = $path;
		}

		public static function setDB($db)
		{
			Self::$_db = $db;
		}

		public static function Path($request)
		{
			return Self::$_Path."".$request;
		}

		public static function View($request, $comp = [])
		{

			foreach ($comp as $key => $value) {
				${$key} = $value;
			}

			$request = str_replace(".", "/", $request);
			require Self::$_Path."view/".$request.".php";
		}

		public static function Controller($request)
		{
			require Self::$_Path."controller/".$request;
		}

		public static function directTo($link)
		{
			header("location:$link");
			echo "<script type='text/javascript'>
				window.location = $link;
			</script>";
			die();
		}

	}

 ?>