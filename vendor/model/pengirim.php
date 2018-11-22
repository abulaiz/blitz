<?php 

	class Pengirim
	{
		private $db;

		public function __construct($_db)
		{
			$this->db = $_db;
		}

		public function hasRegistered($id)
		{
			$sql = "SELECT id FROM pengirim WHERE id = ?";
	     	$rest = $this->db->prepare($sql);
	        $rest->execute([$id]);
	        $ret = $rest->rowCount(); 
	        if($ret==0) return false;
	        else return true;		
		}

		public function tambahPengirim($id, $nama, $kontak)
		{
			$sql = "INSERT INTO pengirim VALUES(?,?,?)";
			$res = $this->db->prepare($sql);
			return $res->execute([$id, $nama, $kontak]);	
		}

		public function getName($id)
		{
			$sql = "SELECT nama FROM pengirim WHERE id = ?";
	     	$rest = $this->db->prepare($sql);
	        $rest->execute([$id]);	
			$row = $rest->fetch();
			return $row['nama'];	        		
		}

	}

 ?>