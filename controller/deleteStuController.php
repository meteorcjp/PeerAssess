<?php
  $account= $_GET['account'];
  require_once '../model/Student.php';
  deleteStu($account);
  header("Location:../view/adminStu.php");
?>
