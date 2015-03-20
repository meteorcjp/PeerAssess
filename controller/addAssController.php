<?php
	$grades= $_GET['grades'];
	$comment = $_GET['comment'];
	$reportId = $_GET['reportId'];
	require_once '../model/Assessment.php';
	addAss($reportId,$grades,$comment);
	header("Location:../view/viewReport.php?show=1");
?>
