<?php 

	class Kantor
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function show($id_kota, $kantor_awal)
		{	
			$sql = "SELECT kantor_cabang.kode, kantor_cabang.nama_kecamatan, jarak_kantor_cabang.jarak 
					FROM kantor_cabang INNER JOIN jarak_kantor_cabang ON 
					kantor_cabang.kode = jarak_kantor_cabang.kode_tujuan
					WHERE kantor_cabang.id_kota = ? AND kantor_cabang.kode != ? AND jarak_kantor_cabang.kode_asal = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$id_kota, $kantor_awal, $kantor_awal]);
			return $res;					
		}	

		public function getKecamatan($kode)
		{
			$sql = "SELECT nama_kecamatan FROM kantor_cabang WHERE kode = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$kode]);
			$data = $res->fetch();
			return $kode." - ".$data["nama_kecamatan"];
		}	

	}

 ?>