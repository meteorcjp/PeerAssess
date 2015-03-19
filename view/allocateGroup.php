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
			<h1>Allocate Group</h1>
		</div>

		<div style="max-width: 50%; margin: 0 auto">
			<form action="../controller/alloGrpController.php">

				<div class="row">
					<div class="col-sm-3" style="margin-top:4px">
						Allocate
					</div>
					<div class="col-sm-7">
						<select class="form-control" name="group1">
							<?php
							require_once '../model/Group.php';
							$result = selectGroup();
							while($row = mysqli_fetch_row($result)){
								echo "<option value='$row[0]' >$row[1]</option>";
							}
							?>
						</select>
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-sm-3" style="margin-top:4px">
						To
					</div>
					<div class="col-sm-7">
						<select class="form-control" name="group2">
							<?php
							require_once '../model/Group.php';
							$result = selectGroup();
							while($row = mysqli_fetch_row($result)){
								echo "<option value='$row[0]' >$row[1]</option>";
							}
							?>
						</select>
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-7">
						<button class="btn btn-default" style="width:30%" type="submit">Confirm</button>
					</div>
				</div>

			</form>

		</div>
	</div>

</body>
</html>
