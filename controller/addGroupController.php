<?php
	$name = $_GET['name'];
	$desc = $_GET['desc'];
	$stus = $_GET['stu'];
	if (count($stus) > 3) {
		header("Location:../view/addGroup.php?info=Maximum 3 students!");
		return;
	}
	require_once '../model/Group.php';
	require_once '../model/Student.php';
	$groupId = addGroup($name, $desc);
	foreach($stus as $stu){
		updateGroup($stu, $groupId);
	}
	header("Location:../view/adminGroup.php");
?>
