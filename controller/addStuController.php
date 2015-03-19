<?php
	$account = $_GET['account'];
	$password = $_GET['password'];
	$name = $_GET['name'];
	$sex = $_GET['sex'];
	$email = $_GET['email'];
	$telephone = $_GET['telephone'];
	require_once '../model/Student.php';

	$result = selectByAccount($account);
	$i=0;
	while($row = mysqli_fetch_row($result)){
		$i++;
	}
	if($i>0){
		header("Location:../view/addStu.php?info=This account has been registered!");
	}else{
		addStu($account, sha1($password), $name, $sex, $email, $telephone);
		header("Location:../view/adminStu.php");
	}
?>
