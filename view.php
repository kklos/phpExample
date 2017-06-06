<?php
require_once('connect.php');
$ReadSql = "SELECT * FROM `crud`";
$res = mysqli_query($connection, $ReadSql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application - READ Operation</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<div class="container">
	<div class="row">
	<h2>Read Operation in CRUD applicaiton</h2>
		<table class="table ">
		<thead>
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>E-Mail</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Extras</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr>
				<th scope="row"><?php echo $r['id']; ?></th>
				<td><?php echo $r['first_name'] . " " . $r['last_name']; ?></td>
				<td><?php echo $r['email_id']; ?></td>
				<td><?php echo $r['gender']; ?></td>
				<td><?php echo $r['age']; ?></td>
				<td>
					<a href="update.php?id=<?php echo $r['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

					<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>">Delete</button>

					<!-- Modal -->
					  <div class="modal fade" id="myModal<?php echo $r['id']; ?>" role="dialog">
					    <div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Delete File</h4>
					        </div>
					        <div class="modal-body">
					          <p>Are you sure?</p>
					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					          <a href="delete.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
					        </div>
					      </div>

					    </div>
					  </div>

				</td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>




<div id="confirm" class="modal hide fade">
  <div class="modal-body">
    Are you sure?
  </div>
  <div class="modal-footer">

    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
</div>

</body>
</html>
