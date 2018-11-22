<?php 

	class Tarif
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function getHarga($parameter)
		{
			$sql = "SELECT harga FROM tarif WHERE parameter = ?";
	     	$rest = $this->db->prepare($sql);
			$rest->execute([$parameter]);
			$row = $rest->fetch();
			return $row['harga'];
		}

		public function updateHarga($parameter, $nilai)
		{
			$sql = "UPDATE tarif SET harga = ? WHERE parameter = ?";
			$rest = $this->db->prepare($sql);
			$rest->execute([$nilai, $parameter]);
		}

	}

 ?>