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
		$("#li2").addClass("active");
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
			<h1>Add Group</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<form class="form-horizontal" action="../controller/addGroupController.php">

				<div class="form-group">
					<label for="exampleInputEmail1" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input
						type="text" class="form-control"
						id="exampleInputEmail1" placeholder="Name" name="name">
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
						<input
						type="text" class="form-control" id="exampleInputPassword1"
						placeholder="Description" name="desc">
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1" class="col-sm-2 control-label">Students</label>
					<div class="col-sm-10">
						<table class="table">
							<?php
							require_once '../model/Student.php';
							$result = selectStu('');
							while($row = mysqli_fetch_row($result)){
								echo "<tr>
								<td>$row[2]</td>
								<td><input type='checkbox' name='stu[]' id='inlineCheckbox1' value='$row[0]'></td>
								</tr>";
							}
							?>
						</table>
					</div>
				</div>

				<label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<br>
		</div>
	</div>



</body>
</html>
