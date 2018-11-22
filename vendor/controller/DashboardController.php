<?php 
	// Important
	require Vendor::Path('libs/Guard.php');

	// Require model
	require Vendor::Path('model/provinsi.php');
	require Vendor::Path('model/tarif.php');
	require Vendor::Path('model/pengiriman.php');

	class DashboardController extends Vendor
	{

		private $guard;

		public function __construct()
		{
			$this->guard = new Guard();

			if($this->guard->hasLogin()==false){
				Self::directTo('login');
			}

		}

		public function index()
		{
			$obj = new Pengiriman(Self::$_db);
			$kode_kantor = Guard::UserInfo('kode_kantor');

			$pengirimanG = $obj->jumlahPengirimanG();
			$pengiriman = $obj->jumlahPengiriman($kode_kantor);

			$dikirimG = $obj->jumlahDikirimG();
			$dikirim = $obj->jumlahDikirim($kode_kantor);

			$terkirimG = $obj->jumlahTerkirimG();
			$terkirim = $obj->jumlahTerkirim($kode_kantor);

			Self::View('content.dashboard.home', compact('pengirimanG', 'pengiriman', 'dikirimG', 'dikirim', 'terkirimG', 'terkirim'));
		}

		public function input()
		{
			$obj = new Provinsi(Self::$_db);
			$provinsi = $obj->show();
			$obj = new Tarif(Self::$_db);
			$tarif_jarak = $obj->getHarga('jarak');
			$tarif_berat = $obj->getHarga('berat');

			Self::View('content.dashboard.input_pengiriman', compact('provinsi','tarif_jarak','tarif_berat'));
		}

		public function pengiriman()
		{
			$obj = new Pengiriman(Self::$_db);
			$data = $obj->showPengiriman(Guard::UserInfo('kode_kantor'));
			Self::View('content.dashboard.data_pengiriman', compact('data'));
		}

		public function konfirmasi()
		{
			$obj = new Pengiriman(Self::$_db);
			$data = $obj->showKonfirmasi(Guard::UserInfo('kode_kantor'));
			Self::View('content.dashboard.data_konfirmasi', compact('data'));
		}

		public function penerimaan()
		{
			$obj = new Pengiriman(Self::$_db);
			$data = $obj->showPenerimaan(Guard::UserInfo('kode_kantor'));
			Self::View('content.dashboard.data_penerimaan', compact('data'));
		}

		public function terkirim()
		{
			$obj = new Pengiriman(Self::$_db);
			$data = $obj->showTerkirim(Guard::UserInfo('kode_kantor'));
			Self::View('content.dashboard.data_terkirim', compact('data'));
		}

		public function tarif()
		{
			$obj = new Tarif(Self::$_db);
			$tarif_jarak = $obj->getHarga('jarak');
			$tarif_berat = $obj->getHarga('berat');
			Self::View('content.dashboard.tarif', compact('tarif_jarak','tarif_berat'));				
		}

	}

 ?>