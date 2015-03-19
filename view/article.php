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
		$("#vili3").addClass("active");
	});
	</script>
</head>

<body>

	<?php
	require_once './stuHeader.php';
	if(!empty($_GET['info'])){
		?>
		<script type="text/javascript">
		$("#cause").text(<?php echo $_GET['info']?>);
		$("#suc").modal("toggle");
		</script>
		<?php
	}
	?>

	<div class="container">
		<?php
		$id = $_GET['id'];
		require_once '../model/Article.php';
		$result = getArticleById($id);
		$row = mysqli_fetch_row($result);
		?>
		<div class="starter-template">
			<h1><?php echo $row[2] ?></h1>
			<span><b><?php echo $row[1] ?></b></span> published at <span><b><?php echo $row[3] ?></b></span>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<div>
				<p><?php echo $row[4] ?></p>
			</div>
			<h3>Comments</h3>
			<table class="table">
				<tr>
					<th>Student</th>
					<th>Comment</th>
					<th>Time</th>
				</tr>
				<?php
				require_once '../model/Comment.php';
				$result = getCommentById($id);
				while ($row = mysqli_fetch_row($result)){
					echo "<tr>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
					</tr>";
				}
				?>

			</table>
			<h3>Add Comment</h3>
			<form action="../controller/addCommentController.php">
				<input type="hidden" value="<?php echo $id?>" name="id">
				<textarea class="form-control" rows="3" name="comment" required=""></textarea>
				<br>
				<button class="btn btn-default" type="submit">Submit</button>
			</form>
		</div>

	</div>



</body>
</html>
