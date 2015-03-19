<?php
	require_once '../util/DBUtil.php';

	function insertArticle($author,$title,$content,$ptime){
		$conn = getConn();
		$title = mysqli_real_escape_string($conn,$title);
		$content = mysqli_real_escape_string($conn,$content);
		$insertSql = "insert into Article(author,title,ptime,content) values('$author','$title','$ptime','$content')";
		mysqli_query($conn, $insertSql);
	}
	function getArticlesByAccount($account,$query){
		$conn = getConn();
		$query = mysqli_real_escape_string($query);
		$selectSql = "select * from Article where author in (select account from Student where groupId in (select groupId from Student where account = '$account')) and title like '%$query%'";
		$result = mysqli_query($conn, $selectSql);
		return $result;
	}
	function searchArticle($search){
		$conn = getConn();
		$selectSql = "select * from Article where title like %$search%";
		$result = mysqli_query($conn, $selectSql);
		return $result;
	}
	function getArticleById($id){
		$conn = getConn();
		$selectSql = "select * from Article where articleId = $id";
		$result = mysqli_query($conn, $selectSql);
		return $result;
	}
?>
