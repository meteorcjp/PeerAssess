<?php

function guid(){
  if (function_exists('com_create_guid')){
    return com_create_guid();
  }else{
    mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
    $charid = strtoupper(md5(uniqid(rand(), true)));
    $hyphen = chr(45);// "-"
    $uuid = chr(123)// "{"
    .substr($charid, 0, 8).$hyphen
    .substr($charid, 8, 4).$hyphen
    .substr($charid,12, 4).$hyphen
    .substr($charid,16, 4).$hyphen
    .substr($charid,20,12)
    .chr(125);// "}"
    return $uuid;
  }
}
session_start();
include_once '../model/Report.php';
$title = $_POST['title'];
$desc = $_POST['desc'];
$uploader = $_SESSION['account'];
$time = date('Y-m-d',time());
$name = $_FILES["file"]["name"];
$content = 'c';

if(!eregi("xml$", $name)){
  header("Location:../view/homepage.php?info=You can only upload .xml file!");
  return;
}

$index = strrpos($name,".");
$name1 = substr($name, 0, $index);
$name1.=guid();
$name2 = substr($name, $index);
$name_string = $name1.$name2;


//save the file
move_uploaded_file($_FILES["file"]["tmp_name"],"../files/".$name);
$xml=simplexml_load_file("../files/".$_FILES["file"]["tmp_name"]) or die("Error: Cannot create object");
$content = $xml->content;
//insert into database
addReport($title, $name, $uploader, $desc, $content, $time);
header("Location:../view/homepage.php?show=1");
?>
