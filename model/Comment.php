<?php
	require_once '../util/DBUtil.php';

	function addCommnet($articleId,$comment,$commentor,$ctime){
		$conn = getConn();
		$insertSql = "insert into Comment values('$articleId','$commentor','$comment','$ctime')";
		mysqli_query($conn, $insertSql);
	}
	function check($id,$commentor){
		$conn = getConn();
		$selectSql = "select * from Comment where articleId=$id and commentor='$commentor'";
		return mysqli_query($conn, $selectSql);
	}
	function getCommentById($articleId){
		$conn = getConn();
		$selectSql = "select * from Comment where articleId = $articleId";
		$result = mysqli_query($conn, $selectSql);
		return $result;
	}
?>
