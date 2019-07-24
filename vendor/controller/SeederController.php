<?php 

	require Vendor::Path('libs/TriangleCrypt.php');

	// Require model
	require Vendor::Path('model/user.php');
	require Vendor::Path('model/kantor.php');

	class SeederController extends Vendor
	{

		public function user()
		{
			$kantor = new Kantor(Self::$_db);
			$data = $kantor->showAll();
			$crypt = new TriangleCrypt();

			while($item = $data->fetch())
			{
				$password_key = rand(3, 6);
				$password = $crypt->encrypt($item['nama_kecamatan']."s", $password_key);
				// die($password);
				$user = new User(Self::$_db);
				$user->create("user-".$item['kode'], $password, $password_key, $item['kode']);

			}			
		}

	}

 ?>