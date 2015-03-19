<?php
	@session_start();
	$comment = $_GET['comment'];
	$id = $_GET['id'];
	$commentor = $_SESSION['account'];
	$ctime = date('Y-m-d',time());
	require_once '../model/Comment.php';
	$result = check($id, $commentor);
	$i=0;
	while($row = mysqli_fetch_row($result)){
		$i++;
	}
	if($i>0){
		header("Location:../view/article.php?id=$id&info='You have commented before!'");
	}else{
		addCommnet($id, $comment, $commentor, $ctime);
		header("Location:../view/article.php?id=$id&show=1");
	}
?>
