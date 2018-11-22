	<nav>
		<div class="navbar-left">
			<img src="assets/image/menu.png" id="menu" class="navbar-menu" alt="Menu">
			<img src="assets/image/blitzi.png" class="navbar-logo">
			<h3 class="navbar-title"> Blitz Admin </h3>
		</div>
		<div class="navbar-right">
			<a href="#" class="user-info"><?php Guard::getInfo('username');?></a>
		</div>
	</nav>

	<?php 

		// Define Menubar(Leftbar) Content
		$_menu = [
			"dashboard" => "",
			"input_pengiriman" => "",
			"data_pengiriman" => "",
			"konfirmasi_barang_datang" => "",
			"data_penerimaan" => "",
			"data_terkirim" => "",
			"atur_tarif" => ""
		];

	?>