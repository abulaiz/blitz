<?php 

	class Kota
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function show($id)
		{	
			$sql = "SELECT * FROM kota WHERE id_provinsi = ?";
			$res = $this->db->prepare($sql);
			$res->execute([$id]);
			return $res;					
		}

	}

 ?>