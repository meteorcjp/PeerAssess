<?php
	$from = $_GET['group1'];
	$to = $_GET['group2'];
	if($from==$to){
		header("Location:../view/allocateGroup.php?info=Group can not be allocated to itself!");
		return;
	}
	require_once '../model/GroupRelation.php';
	addGroupRelation($from, $to);
	header("Location:../view/adminGroup.php");
?>