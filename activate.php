<?php
	require('connect.php');
	$user = new User();

	if(!empty($_GET["id"])) {
  $id = $_GET["id"];
  $query = "UPDATE user set active = 1 WHERE id= '$id'");

      $result = mysqli_query($connection, $query);
      if($result){
          $smsg = "User Created Successfully.";
      }else{
          $fmsg ="User Registration Failed";
      }
			$message = "Your account is activated.";
	}
?>
<html>
<head>
<title>Activate link</title>
</head>
<body>
<?php if(isset($message)) { ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>
</body></html>
