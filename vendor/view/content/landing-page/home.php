<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">

</head>
<body>
	<h1 style="margin-left: 20px;">Selamat Datang</h1>
	<content style="padding : 20px;">
		<div style="margin-left: 20px;">
			<label style="display: block; margin-bottom: 10px;">Masukkan ID Kurir : </label>
			<input type="text" style="display: block; width: 200px; margin-bottom: 10px;" id="id" placeholder="Masukkan ID">
			<button id="cari" style="width: 200px;">Cari</button>			
		</div>
	</content>

</body>

	<script type="text/javascript">
		var a = document.getElementById('cari');
		a.addEventListener('click', function(){
			window.location = 'search?id=' + document.getElementById('id').value;
		});
	</script>

</html>