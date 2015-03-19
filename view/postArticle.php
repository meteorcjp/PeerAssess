<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Make a Post</title>

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
	?>

	<div class="container">

		<div class="starter-template">
			<h1>Make a Post</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<form action="../controller/postArticleController.php" method="post">
				<div class="form-group">
					<div>
						<input type="text" class="form-control" id="title"
						placeholder="Title" name="title" required="">
					</div>
				</div>
				<div class="form-group">
					<div>
						<textarea class="form-control" rows="10" placeholder="Content" name="content" required=""></textarea>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</form>
		</div>

	</div>



</body>
</html>
