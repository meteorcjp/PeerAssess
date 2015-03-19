<?php
	require_once '../util/DBUtil.php';

	function addGroupRelation($from,$to){
		$conn = getConn();
		$insertSql = "insert into GroupRelation values('$from','$to')";
		mysqli_query($conn, $insertSql);
	}
?>
