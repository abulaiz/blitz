<?php 
	// Important
	require Vendor::Path('libs/Guard.php');
	require Vendor::Path('libs/MonoAlpha.php');

	// Require model
	require Vendor::Path('model/kota.php');
	require Vendor::Path('model/kantor.php');

	class KantorController extends Vendor
	{

		private $guard;

		public function __construct()
		{
			$this->guard = new Guard();
		}

		public function kota()
		{
			$id_provinsi = $this->guard->isPost('id');
			$obj = new Kota(Self::$_db);
			$datas = $obj->show($id_provinsi);
			$callback = [];

			$ma = new MonoAlpha();

			while($data = $datas->fetch())
			{
				$callback[] = ["id"=>$data["id"], "nama"=>$ma->decrypt($data["nama"])];
			}

			echo json_encode($callback);
		}

		public function cabang()
		{
			$id_kota = $this->guard->isPost('id');
			$obj = new Kantor(Self::$_db);
			$datas = $obj->show($id_kota, $this->guard->UserInfo('kode_kantor'));
			$callback = []; $jarak = [];

			$ma = new MonoAlpha();

			while($data = $datas->fetch())
			{
				$callback[] = ["kode"=>$data["kode"], "kecamatan"=>$ma->decrypt($data["nama_kecamatan"])];
				$jarak[$data["kode"]] = $data["jarak"];
			}

			echo json_encode(["data"=>$callback, "jarak" => $jarak]);
		}

	}

 ?>