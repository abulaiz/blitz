<!DOCTYPE html>
<html>
<?php Vendor::View('layout.dashboard.head'); ?>
<body>

<?php require Vendor::Path('view/layout/dashboard/navbar.php'); ?>

<?php $_menu['dashboard'] = "class='active'"; ?>

<?php Vendor::View('layout.dashboard.leftbar', compact('_menu')); ?>


	<div class="content-app">
		<h2>Global</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					Jumlah Pengiriman <br>
					<?php echo $pengirimanG; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					Sedang dikirim <br>
					<?php echo $dikirimG; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					Barang Terkirim <br>
					<?php echo $terkirimG; ?>
				</div>
			</div>						
		</div>

		<h2>Lokal / Cabang ini</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					Jumlah Pengiriman <br>
					<?php echo $pengiriman; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					Sedang dikirim <br>
					<?php echo $dikirim; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					Barang Terkirim <br>
					<?php echo $terkirim; ?>
				</div>
			</div>						
		</div>		
	</div>

	<?php Vendor::View('layout.dashboard.footer'); ?>
</body>
</html>