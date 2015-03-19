<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../homepage.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#li1").addClass("active");
	});
	</script>
</head>

<body>

	<?php
	require_once './adminHeader.php';
	if(!empty($_GET['info'])){
		?>
		<script type="text/javascript">
		$("#cause").text("<?php echo $_GET['info']?>");
		$("#suc").modal("toggle");
		</script>
		<?php
	}
	?>

	<div class="container">

		<div class="starter-template">
			<h1>Add Student</h1>
		</div>

		<div style="max-width: 50%; margin: 0 auto">
			<form class="form-horizontal" action="../controller/addStuController.php">
				<div class="form-group">
					<label for="exampleInputEmail1" class="col-sm-2 control-label">Account</label>
					<div class="col-sm-10">
						<input
						name="account"
						type="text" class="form-control"
						id="exampleInputEmail1" placeholder="Account" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input
						type="password" class="form-control" id="exampleInputPassword1"
						placeholder="Password" name="password" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input
						type="text" class="form-control"
						id="exampleInputEmail1" placeholder="Name" name="name" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1" class="col-sm-2 control-label">Sex</label>
					<div class="col-sm-10">
						<select class="form-control" id="exampleInputEmail1" name="sex" required="">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input
						type="text" class="form-control"
						id="exampleInputEmail1" placeholder="Email" name="email" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1" class="col-sm-2 control-label">Telephone</label>
					<div class="col-sm-10">
						<input
						type="text" class="form-control"
						id="exampleInputEmail1" placeholder="Telephone" name="telephone" required="">
					</div>
				</div>

				<label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<br>
		</div>
	</div>
	<!-- /.container -->



</body>
</html>
