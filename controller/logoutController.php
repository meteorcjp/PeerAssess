<?php
	session_start();
	unset ($_SESSION['account']);
	header("Location:../view/login.php");
?>