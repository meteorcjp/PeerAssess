<?php
	session_start();

	require_once '../model/Admin.php';
	require_once '../model/Student.php';


	$account = $_GET['account'];
	$password = $_GET['password'];

	$result = login($account, sha1($password));
	$i = 0;
	while($row = mysqli_fetch_row($result)){
		$i++;
	}

	if($i>0)
	{
		//Student login
		$_SESSION['account'] = $account;
		header("Location:../view/homepage.php");
	}
	else
	{
		$result = loginAdmin($account, $password);
		$i = 0;
		while($row = mysqli_fetch_row($result)){
			$i++;
		}
		if($i>0)
		{
			//Admin login
			$_SESSION['account'] = $account;
			header("Location:../view/adminStu.php");
		}else
		{
			header("Location:../view/login.php?info=Wrong username or password");
		}
	}


?>
