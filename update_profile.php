<?php
session_start();
require_once('connect.php');
$id = $_SESSION['username'];

$SelSql = "SELECT * FROM `user` WHERE username='$id'";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);
if(isset($_POST) & !empty($_POST)){
	$fname = mysql_real_escape_string($_POST['username']);
	$lname = mysql_real_escape_string($_POST['email']);
	$email = mysql_real_escape_string($_POST['password']);

	$UpdateSql = "UPDATE `user` SET username='$username', email='$email', password='$password' WHERE id=$id";
	$res = mysqli_query($connection, $UpdateSql);
	if($res){
		header('location: view.php');
	}else{
		$fmsg = "Failed to update data.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application - UPDATE Operation</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
		<h2>UPDATE Operation in CRUD Application</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <input type="text" name="username"  class="form-control" id="input1" value="<?php echo $r['username']; ?>" placeholder="Username" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Adres e-mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email"  class="form-control" id="input1" value="<?php echo $r['email']; ?>" placeholder="Email" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" name="password"  class="form-control" id="input1" value="<?php echo $r['password']; ?>" placeholder="Password" />
			    </div>
			</div>

			</div>
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>
	</div>
</div>
</body>
</html>
