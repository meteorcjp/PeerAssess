<?php
	getConn();
	require_once '../constant/Constant.php';
	//connnect database
	function getConn(){
		$info = array();
		//read the db.txt file and get the database address,username and password
		$fp = fopen("../config/db.txt", "r");
		if($fp)
		{
			for($i=1;! feof($fp);$i++)
			{
				$temp = split("=",fgets($fp));
				$info[$temp[0]] = $temp[1];
			}
		}
		else
		{
			echo "failed to open db.txt";
		}
		fclose($fp);
		return mysqli_connect(trim($info['dbaddress']), trim($info['username']),trim($info['password']), DATABASE);
	}
?>
