<?php
	$id = $_GET["id"];
	require_once '../model/Group.php';
	deleteGroup($id);
	require_once '../model/Student.php';
	emptyStuGrp($id);
	require_once '../model/GroupRelation.php';
	deleteAllRelated($id);
	header("Location:../view/adminGroup.php");
?>
