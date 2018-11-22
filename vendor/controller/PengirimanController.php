<?php 
	// Important Libs
	require Vendor::Path('libs/Guard.php');
	require Vendor::Path('libs/SenderUtility.php');

	// Require model
	require Vendor::Path('model/pengiriman.php');
	require Vendor::Path('model/pengirim.php');

	class PengirimanController extends Vendor
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

		public function store()
		{
			$id_pengirim = $this->guard->str($this->guard->isPost('id'), 30);
			$nama_pengirim = $this->guard->str($this->guard->isPost('nama'), 30);
			$kontak_pengirim = $this->guard->str($this->guard->isPost('kontak'), 30);

			$nama_penerima = $this->guard->str($this->guard->isPost('nama_penerima'), 25);
			$alamat_penerima = $this->guard->str($this->guard->isPost('alamat_penerima'), 40);
			
			$deskripsi_barang = $this->guard->str($this->guard->isPost('deskripsi_barang'), 40);
			$berat_benda = $this->guard->isNumber($this->guard->isPost('berat_benda'));

			$kode_asal = Guard::UserInfo('kode_kantor');
			$kode_tujuan = $this->guard->isPost('kode_tujuan');

			$harga = $this->guard->isNumber($this->guard->isPost('harga'));

			$tanggal = json_encode([
				"1" => date("Y-m-d H:i:s"), "2" => null, "3" => null, "4" => null, "5" => null
			]);

			// Mendaftarkan Pengirim
			$obj = new Pengirim(Self::$_db);
			if(!$obj->hasRegistered($id_pengirim)){
				$obj->tambahPengirim($id_pengirim, $nama_pengirim, $kontak_pengirim);
			}

			// Mendaftarkan catatan pengiriman
			$id_pengiriman = SenderUtility::generate_id($kode_asal);
			$obj2 = new Pengiriman(Self::$_db);
			$insert = $obj2->insertPengiriman($id_pengiriman, $id_pengirim, $kode_asal, $kode_tujuan, $tanggal);
			if($insert){
				$obj2->insertDetail($id_pengiriman, $deskripsi_barang, $berat_benda, $alamat_penerima, $nama_penerima, $harga);
				SenderUtility::upload($_FILES['gambar'] ,$id_pengiriman);
				Guard::setExtra('pesan', 'Data pengiriman baru berhasil di tambahkan dengan No Resi (id) '.$id_pengiriman);
				Self::directTo('pengiriman');
			} else 
				die("Fail to insert new Data");
		}

		public function update()
		{
			$status = $this->guard->isGet('toStatus');
			$id_pengiriman = $this->guard->isGet('id');

			$obj = new Pengiriman(Self::$_db);

			// Proses authorisasi
			if($obj->auth($id_pengiriman, Guard::UserInfo('kode_kantor'), $status)){
				$obj->updateStatusPengiriman($id_pengiriman, $status);
				Guard::setExtra('pesan', 'Status pengiriman '.$id_pengiriman.' berhasil dirubah');
			}

			$stat = (int) $status;
			if($stat<3)	Self::directTo('pengiriman');
			elseif($stat>2) Self::directTo('penerimaan');

		}

		public function delete()
		{
			$id_pengiriman = $this->guard->isGet('id');
			$obj = new Pengiriman(Self::$_db);

			// Proses authorisasi
			if($obj->auth($id_pengiriman, Guard::UserInfo('kode_kantor'), '1')){
				$obj->deletePengiriman($id_pengiriman);
				SenderUtility::removeImage($id_pengiriman);
				Guard::setExtra('pesan', 'Pengiriman '.$id_pengiriman.' telah dibatalkan');
			}

			Self::directTo('pengiriman');
		}

	}

 ?>