<?php require_once 'connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-md-5 col-lg-5 col-xxl-5 mx-auto my-3">
				<form action="" method="POST" >
					<figure>
						<img src="img/avatar.svg" height=60px width=60px style="margin-left:150px;margin-top:100px;"/>
					</figure>
					<div class="form-group">
						<label for="admin_email">Email address</label>
						<input name="admin_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>
					<div class="form-group">
						<label for="admin_pass">Password</label>
						<input name="admin_pass" type="password" class="form-control" id="exampleInputPassword1">
					</div>
					<button name="admin_login" type="submit" class="btn btn-primary my-3">Login</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
</body>
</html>

<?php
	if(isset($_POST ['admin_login'])) {
		if(($_POST ['admin_email']=='') && ($_POST ['admin_pass']=='')) {
			echo '<script>alert("Please fill all fields");</script>';
		} else {
			$query = "SELECT * FROM admin";
			$result = $conn->query($query);
			if($result->num_rows >0) {
				while($row = $result->fetch_assoc()) {
					$myemail = $row ['EMAIL'];
					$mypass = $row ['PASS'];
					$pass_check = password_verify($_POST ['admin_pass'], $mypass);
					if(($_POST ['admin_email']===$myemail) && ($pass_check)) {
						$_SESSION ['email'] = $_POST ['admin_email'];
						$_SESSION ['username'] = 'admin';
						header('location:panel.php');
						exit;
					} else {
						echo '<script>alert("password or email do not match");</script>';
					}
				}
			} else {

			}
		}
	} else {

	}
?>