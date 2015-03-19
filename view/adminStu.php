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
			<h1>Manage Student</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<form action="./adminStu.php" class="form-inline">
				<input type="text" style="width:50%" class="form-control" id="searchText"
				placeholder="Input Search Content" name="query">
				<button class="btn btn-default" type="submit">Search</button>
			</form>
			<br>
			<?php
			require_once '../model/Student.php';
			if(!empty($_GET["query"])){
				$query = $_GET["query"];
			}else{
				$query = "";
			}
			$result = selectStu($query);
			?>
			<table class="table">
				<tr>
					<th>Account</th>
					<th>Name</th>
					<th>Sex</th>
					<th>Email</th>
					<th>Telephone</th>
					<th>Group</th>
				</tr>
				<?php
				while($row=mysqli_fetch_row($result)){
					?>
					<tr>
						<td><?php echo $row[0]?></td>
						<td><?php echo $row[2]?></td>
						<td><?php echo $row[3]?></td>
						<td><?php echo $row[4]?></td>
						<td><?php echo $row[5]?></td>
						<td><?php echo $row[6]?></td>
						<?php
					}
					?>
				</tr>
			</table>
			<a style="float:right;font-size:1.5em" href="./addStu.php">Add a Student</a>
		</div>
	</div>
	<!-- /.container -->



</body>
</html>
