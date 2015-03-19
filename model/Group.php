<?php
	require_once '../util/DBUtil.php';

	function addGroup($name,$description){
		$conn = getConn();

		$name = mysqli_real_escape_string($conn, $name);
		$discription = mysqli_real_escape_string($conn, $discription);
		
		$insertSql = "insert into Groups(name,description) values('$name','$description')";
		mysqli_query($conn, $insertSql);
		$selectSql = "select max(groupId) from Groups";
		$result = mysqli_query($conn, $selectSql);
		$row = mysqli_fetch_row($result);
		return $row[0];
	}
	function selectGroup(){
		$conn = getConn();
		$selectSql = "select * from Groups";
		return mysqli_query($conn, $selectSql);
	}
	function selectGroupById($groupId){
		$conn = getConn();
		$selectSql = "select * from Groups where groupId='$groupId'";
		return mysqli_query($conn, $selectSql);
	}
?>
