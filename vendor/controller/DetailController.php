<?php 
	// Important
	require Vendor::Path('libs/Guard.php');
	require Vendor::Path('libs/SenderUtility.php');

	// Require model
	require Vendor::Path('model/pengiriman.php');
	require Vendor::Path('model/kantor.php');

	class DetailController extends Vendor
	{

		private $guard;

		private $stat1, $stat2, $stat3, $stat4, $stat5;

		public function __construct()
		{
			$this->guard = new Guard();
			$this->guard->hasToken(false);
		}

		public function pengiriman()
		{
			$id = $this->guard->isPost('id');

			$obj1 = new Pengiriman(Self::$_db);
			$obj2 = new Kantor(Self::$_db);
			$data = $obj1->showDetailPengiriman($id);
			$this->setStats($data['tanggal']);

			$callback = array(
				"text" => [
					"id_pengiriman" => $data["id"],
					"kode_asal" => $obj2->getKecamatan($data["kode_asal"]),
					"kode_tujuan" => $obj2->getKecamatan($data["kode_tujuan"]),
					"harga" => $data["harga"],
					"nama_pengirim" => $data["nama"],
					"kontak" => $data["kontak"],
					"nama_penerima" => $data["nama_penerima"],
					"alamat_penerima" => $data["alamat_penerima"],
					"deskripsi_barang" => $data["deskripsi_barang"],
					"berat_barang" => $data["berat_benda"],
					"stat-1" => $this->stat1,
					"stat-2" => $this->stat2,
					"stat-3" => $this->stat3,
					"stat-4" => $this->stat4,
					"stat-5" => $this->stat5
				],
				"img" => SenderUtility::getImageURL($id)
			);

			echo json_encode($callback);
		}

		private function setStats($tanggal)
		{
			$tanggal = str_replace("null", '"-"', $tanggal);

			$o_tanggal = json_decode($tanggal, true);
			$this->stat1 = $o_tanggal["1"];
			$this->stat2 = $o_tanggal["2"];
			$this->stat3 = $o_tanggal["3"];
			$this->stat4 = $o_tanggal["4"];
			$this->stat5 = $o_tanggal["5"];
		}

	}

 ?>