<?php
require_once('connect.php');

session_start();
if (!isset($_SESSION['username'])){
	header( 'location: login.php' );
	} else{
$id = $_SESSION['username'];

$ReadSql = "SELECT * FROM `user` WHERE username='$id'";
$res = mysqli_query($connection, $ReadSql);
$r = mysqli_fetch_assoc($res);
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
			       <p class="form-control-static"><?php echo $r['username'] ?></p>
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Adres e-mail</label>
			    <div class="col-sm-10">
			       <p class="form-control-static"><?php echo $r['email'] ?></p>
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <p class="form-control-static"><?php echo $r['password'] ?></p>
			    </div>
			</div>

			</div>
		</form>
	</div>
</div>
</body>
</html>
<?php } ?>
