<?php
	require_once '../util/DBUtil.php';

	function loginAdmin($account,$password){
		$conn = getConn();
		$account = mysqli_real_escape_string($conn, $account);
		$password = mysqli_real_escape_string($conn, $password);
		$selectSql = "select * from Admin where account='$account' and password='$password'";
		return mysqli_query($conn, $selectSql);
	}
?>
