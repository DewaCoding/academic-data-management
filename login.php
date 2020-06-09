<!DOCTYPE html>
<html>
<head>
	<title>Academic Data Management</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
	<?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo '<div class="alert alert-danger" role="alert"> Login gagal! username atau password salah!
            </div>';
        }else if($_GET['pesan'] == "logout"){
            echo '<div class="alert alert-primary" role="alert"> Anda telah berhasil logout
            </div>';
        }else if($_GET['pesan'] == "belum_login"){
            echo '<div class="alert alert-primary" role="alert"> Anda harus login untuk mengakses halaman utama!
            </div>';
        }
    }
    ?>
	<div class="login-form">
		<form action="check_login.php" method="post">
			<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
			<h4 class="modal-title">Academic Data Management</h4>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input type="submit" name="login" value="Login" class="btn btn-success">
		</form>
	</div>
</body>
</html>


