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
		$("#li3").addClass("active");
	});
	</script>
</head>

<body>
	<?php
	require_once './adminHeader.php';
	?>
	<div class="container">

		<div class="starter-template">
			<h1>View Rank</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<table class="table">
				<tr>
					<th>Group</th>
					<th>Total Grades</th>
					<th>Rank</th>
				</tr>
				<?php
				require_once '../model/Assessment.php';
				require_once '../model/Group.php';
				$arr = getAllGroupInfo();
				for($i=0;$i<count($arr);$i++){
					$t1 = key($arr);
					$row = mysqli_fetch_row(selectGroupById($t1));
					$t2 = $i+1;
					echo "<tr>
						<td>$row[1]</td>
						<td>$arr[$t1]</td>
						<td>$t2</td>
					</tr>";
					next($arr);
				}
				?>
			</table>
		</div>
	</div>


</body>
</html>
