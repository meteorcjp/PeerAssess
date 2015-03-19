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
	?>
	<div class="container">

		<div class="starter-template">
			<h1>Forum</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<form action="./forum.php" class="form-inline">
				<input type="text" style="width:50%" class="form-control" id="searchText"
				placeholder="Input Search Content" name="query">
				<button class="btn btn-default" type="submit">Search</button>
			</form>
			<br>
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Time</th>
				</tr>
				<?php
				require_once '../model/Article.php';
				if(!empty($_GET["query"])){
					$query = $_GET["query"];
				}else{
					$query="";
				}
				$result = getArticlesByAccount($_SESSION['account'],$query);
				while($row = mysqli_fetch_row($result)){
					echo "<tr>
						<td><a href='./article.php?id=$row[0]'>$row[2]</a></td>
						<td>$row[1]</td>
						<td>$row[3]</td>
					</tr>";
				}
				?>
			</table>
			<a style="float:right;font-size:1.5em" href="./postArticle.php">Make a Post</a>
		</div>
	</div>
	<!-- /.container -->



</body>
</html>
