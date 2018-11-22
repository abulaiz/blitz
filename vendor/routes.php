<?php 
	// Front end Layer  --------------------------------------------------
	Router::get('','DashboardController@index');

	// Back End Layer ----------------------------------------------------

	// Auth
	Router::get('login','UserController@login');
	Router::get('logout','UserController@logout');
	Router::post('login','UserController@auth');

	// Image access
	Router::get('storage/image','FileController@image');

	// Dashboard Menu
	Router::get('dashboard','DashboardController@index');
	Router::get('input','DashboardController@input');
	Router::get('pengiriman','DashboardController@pengiriman');
	Router::get('konfirmasi','DashboardController@konfirmasi');
	Router::get('penerimaan','DashboardController@penerimaan');
	Router::get('terkirim','DashboardController@terkirim');
	Router::get('tarif','DashboardController@tarif');

	// AJAX Request
	Router::post('kantor/kota','KantorController@kota');
	Router::post('kantor/cabang','KantorController@cabang');
	Router::post('pengirim/cek','PengirimController@cek');


	// Detail Pengiriman
	Router::post('detail/pengiriman','DetailController@pengiriman');

	// Submit Form Request
	Router::post('pengiriman_simpan', 'PengirimanController@store');
	Router::post('tarif_simpan', 'TarifController@update');

	// Update Status Pengiriman
	Router::get('update_pengiriman', 'PengirimanController@update');

	// HApus Pengiriman
	Router::get('delete_pengiriman', 'PengirimanController@delete');
 ?>