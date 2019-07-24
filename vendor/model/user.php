<?php 

	class User
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function create($username, $password, $password_key, $kode_kantor_cabang)
		{
			$sql = "INSERT INTO users VALUES(?,?,?,?)";
			$res = $this->db->prepare($sql);
			return $res->execute([$username, $password, $password_key, $kode_kantor_cabang]);
		}


	}

 ?>