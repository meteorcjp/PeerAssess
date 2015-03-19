<?php
	require_once '../util/DBUtil.php';

	function addGroupRelation($from,$to){
		$conn = getConn();
		$insertSql = "insert into GroupRelation values('$from','$to')";
		mysqli_query($conn, $insertSql);
	}

	function selectGroupRelations(){
		$conn = getConn();
		$selectSql = "select * from GroupRelation";
		return mysqli_query($conn, $selectSql);;
	}
	
	function deleteGroupRelation($from,$to){
		$conn = getConn();
		$deleteSql = "delete from GroupRelation where GroupAssigned = '$from' and GroupTo = '$to'";
		mysqli_query($conn, $deleteSql);
	}

	function deleteAllRelated($groupId){
		$conn = getConn();
		$deleteSql = "delete from GroupRelation where GroupAssigned='$groupId' or GroupTo = '$groupId'";
		mysqli_query($conn, $deleteSql);
	}
?>
