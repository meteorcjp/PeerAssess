<?php
	require_once '../util/DBUtil.php';

	function addStu($account,$password,$name,$sex,$email,$telephone){
		$conn = getConn();

		$account = mysqli_real_escape_string($conn, $account);
		$password = mysqli_real_escape_string($conn, $password);
		$name = mysqli_real_escape_string($conn, $name);
		$sex = mysqli_real_escape_string($conn, $sex);
		$email = mysqli_real_escape_string($conn, $email);
		$telephone = mysqli_real_escape_string($conn, $telephone);

		$insertSql="insert into Student(account,password,name,sex,email,telephone,groupId) values('$account','$password','$name','$sex','$email','$telephone','')";
		mysqli_query($conn, $insertSql);
	}

	function selectStu($query){
		$conn = getConn();
		$query = mysqli_real_escape_string($conn, $query);
		$selectSql="select * from Student where name like '%$query%' or account like '%$query%'";
		return mysqli_query($conn, $selectSql);
	}

	function login($account,$password){
		$conn = getConn();
		$account = mysqli_real_escape_string($conn, $account);
		$password = mysqli_real_escape_string($conn, $password);
		$selectSql = "select * from Student where account='$account' and password='$password'";
		return mysqli_query($conn, $selectSql);
	}

	function updateGroup($account,$groupId){
		$conn = getConn();
		$updateSql = "update Student set groupId = '$groupId' where account='$account'";
		mysqli_query($conn, $updateSql);
	}

	function selectByGroupId($groupId){
		$conn = getConn();
		$selectSql = "select * from Student where groupId='$groupId'";
		return mysqli_query($conn, $selectSql);
	}

	function selectByAccount($account){
		$conn = getConn();
		$selectSql = "select * from Student where account = '$account'";
		return mysqli_query($conn, $selectSql);
	}

	function selectGroupNameByAccount($account){
		$conn = getConn();
		$selectSql = "select a.name from Groups a,Student b where b.account = '$account' and a.groupId=b.groupId";
		return mysqli_query($conn, $selectSql);
	}

	function deleteStu($account){
		$conn = getConn();
		$deleteSql = "delete from Student where account = '$account'";
		mysqli_query($conn, $deleteSql);
	}

	function emptyStuGrp($groupId){
		$conn = getConn();
		$updateSql = "update Student set groupId='' where groupId = '$groupId'";
		mysqli_query($conn, $updateSql);
	}
?>
