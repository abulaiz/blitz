<?php 
	// Important
	require Vendor::Path('libs/SenderUtility.php');
	require Vendor::Path('libs/Guard.php');

	// Require model
	require Vendor::Path('model/pengirim.php');

	class PengirimController extends Vendor
	{

		private $guard;

		public function __construct()
		{
			$this->guard = new Guard();
		}

		public function cek()
		{
			$id = $this->guard->isPost('id');

			$obj = new Pengirim(Self::$_db);
			$registered = $obj->hasRegistered($id);

			if($registered){
				echo json_encode(['registered'=>true, 'data' => $obj->getName($id)]);
			} else {
				echo json_encode(['registered'=>false]);
			}
		}

	}

 ?>