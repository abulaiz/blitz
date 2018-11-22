<!DOCTYPE html>
<html>
<?php Vendor::View('layout.dashboard.head'); ?>
<body>

<?php require Vendor::Path('view/layout/dashboard/navbar.php'); ?>

<?php $_menu['atur_tarif'] = "class='active'"; ?>

<?php Vendor::View('layout.dashboard.leftbar', compact('_menu')); ?>


	<div class="content-app">
		<h2 class="content-header"> Tarif Pengiriman</h2>	

	    <?php if(Guard::extraExists('pesan')): ?>
	    <div class="message">
	      <?php Guard::putExtra('pesan'); ?>
	    </div>  
	    <?php endif; ?>		
		<div class="card">
			<form method="POST" action="tarif_simpan" id="form">
			<div class="card-body">			
				<input type="hidden" name="_token" value="<?php Guard::generateToken(20); ?>">	
				<div class="input-group">
				    <label>Tarif per Jarak (Rp)</label>
				    <input type="number" name="tarif_jarak" min="500" required value="<?php echo $tarif_jarak; ?>">		
				</div>	
				<div class="input-group">
				    <label>Tarif per Gram</label>
				    <input type="number" name="tarif_berat" min="500" required value="<?php echo $tarif_berat; ?>">		
				</div>												
				<hr>
			    <input type="submit" value="Simpan Perubahan">	
			</div>					
			</form>
		</div>	
	</div>


	<?php Vendor::View('layout.dashboard.footer'); ?>

<link rel="stylesheet" type="text/css" href="assets/css/back-end/form-elements.css">
	
</body>
</html>