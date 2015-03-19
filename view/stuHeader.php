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
			<span	class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand">Peer Assessment</a>
	</div>
	
	<div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li id="upLi"><a href="./homepage.php">Upload Report</a></li>
			<li id="viLi"><a href="./viewReport.php">View Report</a></li>
			<li id="vili2"><a href="./viewAssessments.php">View Assessments</a></li>
			<li id="vili3"><a href="./forum.php">Forum</a></li>
		</ul>
		<ul class="nav navbar-nav" style="float: right">
			<li class="active"><a href="" style="cursor: default">Welcome,<?php echo $_SESSION['account']?>!</a></li>
			<li ><a href="../controller/logoutController.php" >Logout</a></li>
		</ul>
	</div>
	<!--/.nav-collapse -->
</div>
</nav>
