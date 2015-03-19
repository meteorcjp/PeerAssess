<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>View Report</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../homepage.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#vili2").addClass("active");
	});
	</script>
</head>

<body>

	<?php
	require_once './stuHeader.php';
	?>

	<div class="container">

		<div class="starter-template">
			<h1>View Assessments</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<div>
				<p>The assessments recieved from other groups: </p>
			</div>
			<table class="table">
				<tr>
					<th>Group</th>
					<th>Assessments</th>
					<th>Comment</th>
					<th>Time</th>
				</tr>
				<?php
				require_once '../model/Assessment.php';
				require_once '../model/Student.php';
				$result = getAss($_SESSION['account']);
				foreach($result as $row){
					$temp = mysqli_fetch_row(selectGroupNameByAccount($row[1]));
					echo "<tr>
						<td>$temp[0]</td>
						<td>$row[3]</td>
						<td>$row[2]</td>
						<td>$row[4]</td>
					</tr>";
				}
				?>
			</table>
			<div>
				<p>Total Assessments and Rank: </p>
			</div>
			<table class="table">
				<tr>
					<th>Total</th>
					<th>Rank</th>
				</tr>
				<?php
				$row = mysqli_fetch_row(selectByAccount($_SESSION['account']));
				$groupId = $row[6];
				$arr = getTotalAndRank();
				$rank = 1;
				$total = 0;
				for($i=0;$i<count($arr);$i++){
					if(key($arr) == $groupId){
						$total = $arr[$groupId];
						break;
					}
					$rank++;
					next($arr);
				}
				?>
				<tr>
					<td><?php echo $total?></td>
					<td><?php echo $rank ?></td>
				</tr>
			</table>
			<div>
				<p>Related Groups' Aggregate Assessment Grades </p>
			</div>
			<table class="table">
				<tr>
					<th>Group</th>
					<th>Total</th>
				</tr>
				<?php
				require_once '../model/Group.php';
				$arr = getRelatedGroupInfo($groupId);
				for($i=0;$i<count($arr);$i++){
					$t1 = key($arr);
					$row = mysqli_fetch_row(selectGroupById($t1));
					echo "<tr>
						<td>$row[1]</td>
						<td>$arr[$t1]</td>
					</tr>";
					next($arr);
				}
				?>
			</table>
		</div>
	</div>



</body>
</html>
