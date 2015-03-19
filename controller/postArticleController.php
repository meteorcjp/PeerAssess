<?php
	@session_start();
	$title = $_POST['title'];		
	$content = $_POST['content'];
	$author = $_SESSION['account'];
	$time = date('Y-m-d',time());
	require_once '../model/Article.php';
	insertArticle($author,$title,$content,$time);
	header("Location:../view/forum.php");
?>