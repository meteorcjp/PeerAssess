<?php
	require_once '../util/DBUtil.php';

	function addReport($title,$name,$uploader,$desc,$content,$uploadTime){
		$conn = getConn();
		$deleteSql = "delete from Report where uploader in (select account from Student where groupId in (select groupId from Student where account = '$uploader'))";
		mysqli_query($conn, $deleteSql);
		$insertSql = "insert into Report(title,name,uploader,description,content,uploadTime) values('$title','$name','$uploader','$desc','$content','$uploadTime')";
		mysqli_query($conn, $insertSql);
	}

	function getRelatedReport($account){
		$conn = getConn();
	// 	$selectSql = "select a.GroupAssigned from GroupRelation a,Student b
	// 	where a.GroupTo = b.groupId and b.account='$account'";
	// 	$result = mysql_db_query(DATABASE, $selectSql,$conn);
	// 	$row = mysql_fetch_row($result);
	// 	$selectSql = "select account from Student where groupId in (select a.GroupAssigned from GroupRelation a,Student b
	// 	where a.GroupTo = b.groupId and b.account='$account')";
	// 	$result = mysql_db_query(DATABASE, $selectSql,$conn);
	// 	$row = mysql_fetch_row($result);
		$selectSql = "select * from Report r where r.uploader in(select account from Student where groupId in (select a.GroupAssigned from GroupRelation a,Student b
		where a.GroupTo = b.groupId and b.account='$account')) and r.reportId not in (select reportId from Assessment where account in (  select account from Student where groupId in (select groupId from Student where account='$account')))";
		$result = mysqli_query($conn, $selectSql);

		return $result;
	}
?>
