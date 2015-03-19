<?php
	$from = $_GET["from"];
	$to = $_GET["to"];
	require_once '../model/GroupRelation.php';
	deleteGroupRelation($from,$to);
	header("Location:../view/adminGroup.php");
?>
