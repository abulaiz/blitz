<?php 

	class Pengiriman
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function insertPengiriman($id, $id_pengirim, $kode_asal, $kode_tujuan, $tanggal)
		{
			$sql = "INSERT INTO pengiriman VALUES(?,?,?,?,?,?)";
			$res = $this->db->prepare($sql);
			return $res->execute([$id, $id_pengirim, $kode_asal, $kode_tujuan, '1', $tanggal]);
		}

		public function insertDetail($id_pengiriman, $deskripsi_barang, $berat_benda, $alamat_penerima, $nama_penerima, $harga)
		{
			$sql = "INSERT INTO detail_pengiriman VALUES(?,?,?,?,?,?)";
			$res = $this->db->prepare($sql);
			return $res->execute([$id_pengiriman, $deskripsi_barang, $berat_benda, $alamat_penerima, $nama_penerima, $harga]);			
		}

		public function updateStatusPengiriman($id_pengiriman, $status)
		{
			$sql = "SELECT tanggal FROM pengiriman WHERE id=?";
			$res = $this->db->prepare($sql);
			$res->execute([$id_pengiriman]);
			$data = $res->fetch();
			$tanggal = $data['tanggal'];
			$o_tanggal = json_decode($tanggal, true);
			
			if($status!="1"){
				$o_tanggal[$status] = date("Y-m-d H:i:s");
			}
			if($status!="5"){
				$o_tanggal[(string)($status+1)] = null;
			}

			$tanggal = json_encode($o_tanggal);


			$sql = "UPDATE pengiriman SET status=?, tanggal=? WHERE id=?";
			$res = $this->db->prepare($sql);
			return $res->execute([$status, $tanggal, $id_pengiriman]);				
		}

		public function deletePengiriman($id_pengiriman)
		{
			$sql = "DELETE FROM pengiriman WHERE id=?";
			$res = $this->db->prepare($sql);
			return $res->execute([$id_pengiriman]);				
		}

		public function auth($id_pengiriman, $kode_kantor, $status)
		{
			$sql = "SELECT * FROM pengiriman WHERE id = ?";
	     	$rest = $this->db->prepare($sql);
	        $rest->execute([$id_pengiriman]);

	        $data = $rest->fetch();
	        $ret = false;
	        $stat = (int)$status;
	        if($stat<3 && $kode_kantor == $data['kode_asal'] ) $ret = true;
	        elseif($stat>2 && $kode_kantor == $data['kode_tujuan']) $ret = true;

	        return $ret;
		}		


		public function showPengiriman($kantor_cabang)
		{
			$sql = "SELECT pengiriman.id, pengirim.nama, pengiriman.status, kantor_cabang.nama_kecamatan 
					FROM pengiriman
					INNER JOIN pengirim ON pengiriman.id_pengirim = pengirim.id
					INNER JOIN kantor_cabang ON pengiriman.kode_tujuan = kantor_cabang.kode
					WHERE (pengiriman.status = ? OR pengiriman.status = ?) AND pengiriman.kode_asal = ? ORDER BY pengiriman.id DESC";
			$res = $this->db->prepare($sql);
			$res->execute(['1', '2', $kantor_cabang]);
			return $res;	
		}

		public function showKonfirmasi($kantor_cabang)
		{
			$sql = "SELECT pengiriman.id, pengirim.nama, pengiriman.status, kantor_cabang.nama_kecamatan 
					FROM pengiriman
					INNER JOIN pengirim ON pengiriman.id_pengirim = pengirim.id
					INNER JOIN kantor_cabang ON pengiriman.kode_asal = kantor_cabang.kode
					WHERE pengiriman.status = ? AND pengiriman.kode_tujuan = ? ORDER BY pengiriman.id DESC";
			$res = $this->db->prepare($sql);
			$res->execute(['2', $kantor_cabang]);
			return $res;	
		}

		public function showPenerimaan($kantor_cabang)
		{
			$sql = "SELECT pengiriman.id, pengirim.nama, pengiriman.status, kantor_cabang.nama_kecamatan 
					FROM pengiriman
					INNER JOIN pengirim ON pengiriman.id_pengirim = pengirim.id
					INNER JOIN kantor_cabang ON pengiriman.kode_asal = kantor_cabang.kode
					WHERE (pengiriman.status = ? OR pengiriman.status = ?) AND pengiriman.kode_tujuan = ? ORDER BY pengiriman.id DESC";
			$res = $this->db->prepare($sql);
			$res->execute(['3', '4', $kantor_cabang]);
			return $res;	
		}

		public function showTerkirim($kantor_cabang)
		{
			$sql = "SELECT pengiriman.id, pengirim.nama, pengiriman.status, kantor_cabang.nama_kecamatan 
					FROM pengiriman
					INNER JOIN pengirim ON pengiriman.id_pengirim = pengirim.id
					INNER JOIN kantor_cabang ON pengiriman.kode_tujuan = kantor_cabang.kode
					WHERE pengiriman.status = ? AND pengiriman.kode_asal = ? ORDER BY pengiriman.id DESC";
			$res = $this->db->prepare($sql);
			$res->execute(['5', $kantor_cabang]);
			return $res;	
		}

		public function jumlahPengirimanG()
		{
			$sql = "SELECT * FROM pengiriman";
			$res = $this->db->prepare($sql);
			$res->execute();
			return $res->rowCount();				
		}

		public function jumlahDikirimG()
		{
			$sql = "SELECT * FROM pengiriman WHERE status = '4' OR status = '3' OR status = '2'";
			$res = $this->db->prepare($sql);
			$res->execute();
			return $res->rowCount();				
		}

		public function jumlahTerkirimG()
		{
			$sql = "SELECT * FROM pengiriman WHERE status = '5'";
			$res = $this->db->prepare($sql);
			$res->execute();
			return $res->rowCount();				
		}		

		public function jumlahPengiriman($kode_kantor)
		{
			$sql = "SELECT * FROM pengiriman WHERE kode_asal = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$kode_kantor]);
			return $res->rowCount();				
		}

		public function jumlahDikirim($kode_kantor)
		{
			$sql = "SELECT * FROM pengiriman WHERE (status = '4' OR status = '3' OR status = '2') AND kode_asal = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$kode_kantor]);
			return $res->rowCount();				
		}

		public function jumlahTerkirim($kode_kantor)
		{
			$sql = "SELECT * FROM pengiriman WHERE status = '5' AND kode_asal = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$kode_kantor]);
			return $res->rowCount();				
		}

		public function showDetailPengiriman($id_pengiriman)
		{
			$sql = "SELECT pengiriman.*, pengirim.nama, pengirim.kontak, detail_pengiriman.* 
					FROM pengiriman
					INNER JOIN pengirim ON pengiriman.id_pengirim = pengirim.id
					INNER JOIN detail_pengiriman ON pengiriman.id =detail_pengiriman.id_pengiriman 
					WHERE pengiriman.id = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$id_pengiriman]);
			$data = $res->fetch();
			return $data;	
		}

		public function detailUnsecure($id){
		    $sql = "SELECT * FROM pengiriman WHERE id='$id'";
		    $query = $this->db->query($sql);
		    return $query;			
		}


	}

 ?>