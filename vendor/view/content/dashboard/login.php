<!DOCTYPE html>
<html>
<head>
	<title>Login | Blitz</title>
  	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
  	<link rel="stylesheet" type="text/css" href="assets/css/base.css">
</head>
<body>
<div class="bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div id="card">
					<div id="card-header">
						<img src="assets/image/blitzi.png">
						<h3>Masuk Sebagai Staff</h3>
					</div>
					<div id="card-body">
						<?php if(isset($_error)): ?>
						<div class="error-message">
							Username atau password salah
						</div>
						<?php endif; ?>
						<form action="login" method="POST">
						<label>Username</label> <br>
						<input type="text" name="username" placeholder="Username" autocomplete="false">
						<label>Password</label> <br>
						<input type="password" name="password" placeholder="Password" autocomplete="false">								
						<button name="login" type="submit" id="submit" class="pull-right">Masuk</button>	
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

<link rel="stylesheet" type="text/css" href="assets/css/login/style.css">
</body>
</html>