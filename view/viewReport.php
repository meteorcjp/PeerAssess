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
<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="js/star-rating.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$("#viLi").addClass("active");
		$("#input-21a").rating();
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
	<div id="sucLg" class="modal fade bs-example-modal-sm" tabindex="-1"
		role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 id="rT" class="modal-title">Hint Info</h4>
				</div>
				<div class="modal-body">
					<p id="causeLg">Operation Successfully!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
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
						<div class="col-sm-1"></div>
						<div class="col-sm-8" style="margin-top:5px;">
							<a href="../files/<?php echo $row[2]?>"><?php echo $row[1]?></a>
							<?php
								$title = $row[1];
                $content = $row[5];
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Report</label>
						<div class="col-sm-9" style="margin-top:5px;">
							<h3 style="text-align:center;"><?php echo $title?></h3>
						</br>
						<p><?php echo $content?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Assessments</label>
						<div class="col-sm-1"></div>
						<div class="col-sm-8">
							<input id="input-21a" name="grades" value="0" type="number" class="rating" min=0 max=5 step=1 data-size="xs" >
						<!--
							<input type="text" class="form-control" id="inputEmail3"
								placeholder="Grading assessments" name="grades" required="">
								 -->
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Comment</label>
						<div class="col-sm-1"></div>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputPassword3"
								placeholder="Comment" name="comment" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-10">
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
	<!-- /.container -->



</body>
</html>
