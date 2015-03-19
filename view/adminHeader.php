<?php
session_start();
if(empty($_SESSION['account'])){
	header("Location:./login.php");
}

require_once './msgBox.php';

if (!empty($_GET['show'])){
	?>
	<script type="text/javascript">
	$("#suc").modal("toggle");
	</script>
	<?php
}
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
			data-toggle="collapse" data-target="#navbar" aria-expanded="false"
			aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand">Peer Assessment Admin</a>
	</div>

	<div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li id="li1"><a href="./adminStu.php">Manage Student</a></li>
			<li id="li2"><a href="./adminGroup.php">Manage Group</a></li>
			<li id="li3"><a href="./viewRank.php">View Rank</a></li>
		</ul>
		<ul class="nav navbar-nav" style="float: right">
			<li class="active"><a href="" style="cursor: default">Welcome,<?php echo $_SESSION['account']?>!</a></li>
			<li ><a href="../controller/logoutController.php" >Logout</a></li>
		</ul>
	</div>
	<!--/.nav-collapse -->
</div>
</nav>
