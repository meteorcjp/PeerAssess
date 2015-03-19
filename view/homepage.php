<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Homepage</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../homepage.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#upLi").addClass("active");
	});
	</script>
</head>

<body>

	<?php
	require_once 'stuHeader.php';
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
			<h1>Upload Report</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<div>
				<p>
					<?php
					require_once '../model/Student.php';
					$result = selectByAccount ( $_SESSION ['account'] );
					$row = mysqli_fetch_row ( $result );
					require_once '../model/Group.php';
					$result = selectGroupById ( $row [6] );
					$row = mysqli_fetch_row ( $result );
					?>
					Your Group : <span id="group"><?php echo $row[1] ?></span>
				</p>
			</div>

			<form name="form1" method="post" enctype="multipart/form-data"
			onsubmit="javascript:checkForm(this);">
			<div class="form-group">
				<label for="exampleInputEmail1">Title</label> <input type="text"
				class="form-control" id="title" placeholder="Title" name="title"
				required="">
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Description</label> <input
				type="text" class="form-control" id="desc"
				placeholder="Description" name="desc" required="">
			</div>

			<div class="form-group">
				<label for="exampleInputFile">Upload Report</label> <input
				type="file" id="exampleInputFile" name="file" required="">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>

	<script type="text/javascript">
	function checkForm(){
		var url="../controller/uploadController.php?";
		url+="title=";
		url+=$("#title").val();
		url+="&desc=";
		url+=$("#desc").val();
		document.form1.action=url;
		document.form1.sumbit();
		return;
	}
	</script>
</div>
<!-- /.container -->



</body>
</html>
