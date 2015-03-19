<?php
	require_once '../util/DBUtil.php';

	@session_start();
	function addAss($reportId,$grades,$comment){
		$conn = getConn();
		$time = date('Y-m-d',time());
		$account = $_SESSION['account'];
		$insertSql = "insert into Assessment(reportId,account,content,remark,atime) values('$reportId','$account','$comment','$grades','$time')";
		mysqli_query($conn, $insertSql);
	}

	function getAss($account){
		$conn = getConn();
		$selectSql = "select groupId from Student where account='$account'";
		$row = mysqli_fetch_row(mysqli_query($conn, $selectSql));
		$groupId = $row[0];
		$selectSql = "select * from assessment where account in (select account from Student where groupId in (select GroupTo from GroupRelation where GroupAssigned='$groupId'))";
		$result1 = mysqli_query($conn, $selectSql);

		$selectSql = "select * from Report a, (select account from Student where groupId='$groupId') b where a.uploader=b.account";
		$result2 = mysqli_query($conn, $selectSql);
		$result = array();
		$i=0;
		while($row1 = mysqli_fetch_row($result2)){
			while($row2 = mysqli_fetch_row($result1)){
				if($row2[0]==$row1[0]){
					$result[$i] = $row2;
					$i++;
				}
			}
		}
		return $result;
	}

	function getTotalAndRank(){
		$conn = getConn();
		$selectSql = "select groupId from Groups";
		$result = mysqli_query($conn, $selectSql);
		$arr = array();
		while($row = mysqli_fetch_row($result)){
			$arr[$row[0]] = getGroupTotal($row[0]);
		}
		arsort($arr);
		return $arr;
	}
	
	function getGroupTotal($groupId){
		$conn = getConn();
		$selectSql = "select * from assessment where account in (select account from Student where groupId in (select GroupTo from GroupRelation where GroupAssigned='$groupId'))";
		$result1 = mysqli_query($conn, $selectSql);

		$selectSql = "select * from Report a, (select account from Student where groupId='$groupId') b where a.uploader=b.account";
		$result2 = mysqli_query($conn, $selectSql);
		$result = array();
		$i=0;
		while($row1 = mysqli_fetch_row($result2)){
			while($row2 = mysqli_fetch_row($result1)){
				if($row2[0]==$row1[0]){
					$result[$i] = $row2;
					$i++;
				}
			}
		}
		$total = 0;
		foreach ($result as $t){
			$total +=$t[3];
		}
		return $total;
	}
	function getRelatedGroupInfo($groupId){
		$conn = getConn();
		$selectSql = "select * from GroupRelation where groupAssigned='$groupId'";
		$result = mysqli_query($conn, $selectSql);
		$arr = array();
		while($row = mysqli_fetch_row($result)){
			$arr[$row[1]] = getGroupTotal($row[1]);
		}
		return $arr;
	}
	function getAllGroupInfo(){
		$conn = getConn();
		$selectSql = "select * from Groups";
		$result = mysqli_query($conn, $selectSql);
		$arr = array();
		while($row = mysqli_fetch_row($result)){
			$arr[$row[0]] = getGroupTotal($row[0]);
		}
		arsort($arr);
		return $arr;
	}
?>
