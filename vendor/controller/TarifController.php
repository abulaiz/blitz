<?php 
	// Important Libs
	require Vendor::Path('libs/Guard.php');

	// Require model
	require Vendor::Path('model/tarif.php');

	class TarifController extends Vendor
	{

		private $guard;

		public function __construct()
		{
			$this->guard = new Guard();

			if($this->guard->hasLogin()==false){
				Self::directTo('login');
			}

			if(!$this->guard->hasToken()) Self::directTo('dashboard');
		}

		public function update()
		{
			$tarif_jarak = $this->guard->isNumber($this->guard->isPost('tarif_jarak'));
			$tarif_berat = $this->guard->isNumber($this->guard->isPost('tarif_berat'));

			$obj = new Tarif(Self::$_db);
			$obj->updateHarga('jarak', $tarif_jarak);
			$obj->updateHarga('berat', $tarif_berat);

			Guard::setExtra('pesan', 'Tarif berhasil di update');
			Self::directTo('tarif');
		}

	}

 ?>