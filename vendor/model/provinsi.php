<?php 

	class Provinsi
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function show()
		{
			$sql = "SELECT * FROM provinsi";
			$res = $this->db->query($sql);
			return $res;
		}

	}

 ?>