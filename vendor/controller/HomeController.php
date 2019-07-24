<?php 

	require Vendor::Path('model/pengiriman.php');

	class HomeController extends Vendor
	{

		public function index()
		{
			Vendor::View('content.landing-page.home');
		}

		public function search(){
			$id = $_GET['id'];
			$p = new Pengiriman(Self::$_db);
			$data = $p->detailUnsecure($id);

			while($data_mk = $data->fetch(PDO::FETCH_OBJ)){
		
				echo $data_mk->id;
			}			
		}

	}

 ?>