<!DOCTYPE html>
<html>
<?php Vendor::View('layout.dashboard.head'); ?>
<link rel="stylesheet" type="text/css" href="assets/css/back-end/form-elements.css">
<body>

<?php require Vendor::Path('view/layout/dashboard/navbar.php'); ?>

<?php require Vendor::Path('libs/MonoAlpha.php'); ?>
<?php $ma = new MonoAlpha(); ?>

<?php $_menu['input_pengiriman'] = "class='active'"; ?>

<?php Vendor::View('layout.dashboard.leftbar', compact('_menu')); ?>


	<div class="content-app">
		<h2 class="content-header"> Input Pengiriman Baru</h2>	
		<div class="card">
			<form method="POST" action="pengiriman_simpan" id="form" onsubmit="return validate()"
			enctype="multipart/form-data">

			<div class="card-header">
				Data Pengirim
			</div>
			<div class="card-body">	
				<input type="hidden" name="_token" value="<?php Guard::generateToken(20); ?>">
				<div class="input-group">
					<label>Nomor Induk</label>
				    <input type="text" id="id" name="id" placeholder="No KTP / No KTM / No SIM" required>		
				</div>
				<div class="input-group">
				    <label>Nama</label>
				    <input type="text" name="nama" placeholder="Nama Lengkap" required>	
				</div>
				<div class="input-group">
				    <label>Kontak</label>
				    <input type="text" name="kontak" placeholder="No Telepon / WA / Email" required>	
				</div>								  				
			</div>

			<div class="card-header">
				Detail Pengiriman
			</div>
			<div class="card-body">					
				<div class="input-group">
				    <label>Nama Penerima</label>
				    <input type="text" name="nama_penerima" required placeholder="Nama Calon Penerima">	
				</div>												  	
				<div class="input-group">
				    <label>Alamat Penerima</label>
				    <input type="text" name="alamat_penerima" required placeholder="Alamat Pengiriman">	
				</div>			
				<div class="input-group">
				    <label>Deskripsi Barang</label>
				    <input type="text" name="deskripsi_barang" placeholder="Info singkat mengenai barang" required>	
				</div>	
				<div class="input-group">
				    <label>Berat Benda (Gram)</label>
				    <input type="number" id="berat_benda" step="0.01" name="berat_benda" required placeholder="Contoh : 20.4">	
				</div>	
				<div class="input-group">
				    <label>Gambar Paket</label>
				    <img src="assets/image/upimage.png" height="200" width="200" id="imagePrev" alt="Upload Image">
				    <input type="file" id="gambar" name="gambar" accept="image/*" onchange="previewFile()" required>	
				</div>									
			</div>	
			<div class="card-header">
				Tujuan Pengiriman
			</div>
			<div class="card-body">	
				<div class="input-group">
				    <label>Provinsi</label>
				    <select id="provinsi" name="provinsi" required>
				    	<option value="">--Pilih Provinsi--</option>
				    	<?php  
				    		while($data = $provinsi->fetch())
				    		{
				    			echo "<option value='".$data['id']."'>".$ma->decrypt($data['nama'])."</option>";
				    		}
				    	?>
				    </select>						
				</div>	
				<div class="input-group">
				    <label>Kota</label>
				    <select name="kota" id="kota">
				    	<option value="">--Pilih Kota--</option>
				    </select>						
				</div>	
				<div class="input-group">
				    <label>Kode Pos Tujuan</label>
				    <select name="kode_tujuan" id="kode_tujuan">
				    	<option value="">--Pilih Pos Tujuan--</option>
				    </select>						
				</div>
				<h4>Total Pembayaran : <p id="harga">-</p></h4>		
				<input type="hidden" name="harga" id="harga_asli">			
			  	<hr>
			    <input type="submit" value="Submit">								  				
			</div>					
			</form>
		</div>	
	</div>

	<!-- This section used for parsing php value into javascript -->
	<input type="hidden" id="harga_jarak" value="<?php echo $tarif_jarak;?>">
	<input type="hidden" id="harga_berat" value="<?php echo $tarif_berat;?>">

	<!-- Modal Overlay -->
	<div id="modal-overlay" class="closed modal-overlay" style="text-align: center;">
		<img class="modal-loader" src="assets/image/loading.gif">
	</div>


	<?php Vendor::View('layout.dashboard.footer'); ?>

<link rel="stylesheet" type="text/css" href="assets/customAlert/base.css">		
<script src="assets/customAlert/base.js" type="text/javascript"></script>

<script src="assets/js/view/input_pengiriman.js" type="text/javascript"></script>
	
</body>
</html>