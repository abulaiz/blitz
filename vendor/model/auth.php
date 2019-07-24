<?php 

	class Auth
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function getKey($username)
		{
			$sql = "SELECT password_key FROM users WHERE username=?";
			$res = $this->db->prepare($sql);
			$res->execute([$username]);

			if($res->rowCount()!=1) return null;

			$row = $res->fetch();
			return $row['password_key'];			
		}

		public function isPassword($username, $password)
		{
			$sql = "SELECT * FROM users WHERE username=? AND password=?";
			$res = $this->db->prepare($sql);
			$res->execute([$username,$password]);

			if($res->rowCount()==1) return true;
			else return false;			
		}

		public function getProfile($username)
		{
			$sql = "SELECT kantor_cabang.kode, kantor_cabang.nama_kecamatan, kota.nama AS kota, provinsi.nama AS provinsi
					FROM users INNER JOIN kantor_cabang ON users.kode_kantor_cabang = kantor_cabang.kode
					INNER JOIN kota ON kantor_cabang.id_kota = kota.id
					INNER JOIN provinsi ON kota.id_provinsi = provinsi.id 
					WHERE users.username = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$username]);
			$row = $res->fetch();
			return $row;
		}

	}

 ?>