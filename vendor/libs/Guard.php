<?php 


class Guard
{

	protected static $charSet = "abcdefghijklmnopqrstuvwqyzABCDEFGHIJKLMNOPQRSTUVWQYZ1234567890";

	public static function setExtra($label, $value)
	{
		$_SESSION[$label] = $value;
	}

	public static function putExtra($label)
	{
		$ex = $_SESSION[$label];
		unset($_SESSION[$label]);
		echo $ex;
	}

	public static function extraExists($label)
	{
		return isset($_SESSION[$label]);
	}

	public static function getInfo($name)
	{
		echo $_SESSION[$name];
	}

	public static function UserInfo($name)
	{
		return $_SESSION[$name];
	}

	public static function generateToken($maxChar)
	{
		$ss = substr( str_shuffle( Self::$charSet ), 0, $maxChar );
		$req = Router::getRequest();
		$_SESSION['token'][$req] = $ss;		
		echo $ss;
	}

	public function encrypt($text, $key)
	{
		$ret = "";
		$x = ord($key[2]);
		$max = strlen(Self::$charSet);
		for($i=0; $i<strlen($text); $i++){
			$b = ord($text[$i]) + $x;
			if($b<=$max && $b>=0) $ret .= Self::$charSet[$b];
			elseif($b<0){
				$b *= -1;
				if($b<=$max) $ret .= Self::$charSet[$b];
				else $ret .= Self::$charSet[$b % $max];
			}
			else $ret .= Self::$charSet[$b % $max];
			// Add Patern
			$x += (ord($key[0])+$i) - (ord($key[1])-$i);
		}
		return $ret;
	}

	public function hasLogin()
	{
		return isset($_SESSION['username']);
	}

	public function hasToken($uset=true)
	{
		if(!isset($_REQUEST['_token'])) return false;

		$a = $_REQUEST['_token'];

		foreach ($_SESSION['token'] as $key => $value) {
			if($_REQUEST['_token']==$value){
				if($uset)
					unset($_SESSION['token'][$key]);
				return true;
			}
		}

		return false;
		// return $_REQUEST['_token']==$_SESSION['token'];
	}

	public function isPost($req)
	{
		if(isset($_POST[$req])) return $_POST[$req];
		else die('Undefined Post');
	}

	public function isGet($req)
	{
		if(isset($_GET[$req])) return $_GET[$req];
		else die('Undefined Post');
	}


	public function isNumber($req)
	{
		if(is_numeric($req))
			return $req;
		else die("FAilure Value"); 
	}

	public function str($string, $max=1000)
	{
		$r = str_replace('<script type="text/javascript">', "", $string);
		$r = str_replace('<script>', "", $r);
		$r = str_replace('</script>', "", $r);
		$r = str_replace("<script type='text/javascript'>", "", $r);

		if(strlen($r>$max)){
			return substr($r, 0, $max);
		}

		return $r;
	}

	public function setUserInfo($_arr)
	{
		foreach ($_arr as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}

}

 ?>