<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>View Assessments</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../homepage.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#viLi").addClass("active");
	});
	function showContent(title,content){
		$("#rT").html(title);
		$("#causeLg").html(content);
		$("#sucLg").modal("toggle");
	}
	</script>
</head>

<body>

	<?php
	require_once './stuHeader.php';
	?>
	<div class="container">

		<div class="starter-template">
			<h1>View Report</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<div>
				<p>The reports allocated to your group:</p>
			</div>
			<?php
			require_once '../model/Report.php';
			$result = getRelatedReport($_SESSION['account']);
			while($row = mysqli_fetch_row($result)){
				?>
				<div
				style="border-top: 1px solid #ccc">
				<form class="form-horizontal" action="../controller/addAssController.php">
					<input type="hidden" name="reportId" value="<?php echo $row[0]?>">

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Link</label>
						<div class="col-sm-10" style="margin-top:5px;">
							<a href="../files/<?php echo $row[2]?>"><?php echo $row[1]?></a>
							<?php
								$content = file_get_contents("../files/$row[2]");
								$content = nl2br($content);
								$title = $row[1];
							?>
							<a style="margin-left:50px;" href="javascript:showContent('','')">view this report</a>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Report</label>
						<div class="col-sm-9" style="margin-top:5px;">
							<h3 style="text-align:center;"><?php echo $title?></h3></br>
							<p><?php echo $content?></p>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Assessments</label>
						<div class="col-sm-10">
							<select class="form-control" id="inputEmail3" name="grades" required="">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Comment</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputPassword3"
							placeholder="Comment" name="comment" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Confirm</button>
						</div>
					</div>

				</form>
			</div>
			<?php
		}
		?>
	</div>
</div>



</body>
</html>
