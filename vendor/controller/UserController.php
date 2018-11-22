<?php 

	require Vendor::Path('libs/Guard.php');
	
	require Vendor::Path('model/auth.php');

	class UserController extends Vendor
	{

		private $guard;

		public function __construct()
		{
			$this->guard = new Guard();
		}

		public function login()
		{
			Self::View('content.dashboard.login');
		}

		public function auth()
		{
			$obj = new Auth(Self::$_db);
			$username = $this->guard->isPost('username');
			$key = $obj->getKey($username);
			$_error = "error";
			if($key==null){
				Self::View('content.dashboard.login',compact('_error'));
			} else {
				$password = $this->guard->encrypt($this->guard->isPost('password'), $key);
				if($obj->isPassword($username, $password)){
					$user = $obj->getProfile($username);
					$this->guard->setUserInfo([
						"username" => $username,
						"kode_kantor" => $user['kode'],
						"alamat_kantor" => $user['nama_kecamatan'].", ".$user['kota'].", ".$user['provinsi'],
						"token" => array()
					]);
					session_regenerate_id();
					Self::directTo('dashboard');
				} else {
					Self::View('content.dashboard.login',compact('_error'));
				}
			}
		}

		public function logout()
		{
			session_destroy();
			Self::directTo('login');
		}

	}

 ?>