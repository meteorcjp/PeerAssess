<?php
session_start();
include_once '../model/Report.php';
$title = $_POST['title'];
$desc = $_POST['desc'];
$uploader = $_SESSION['account'];
$time = date('Y-m-d',time());
$name = $_FILES["file"]["name"];

$imageFileType = pathinfo($name,PATHINFO_EXTENSION);
// if($imageFileType == "xml"){
  //save the file
  $result = move_uploaded_file($_FILES["file"]["tmp_name"],"../files/".$name);

  if($result == true){
    $xml=simplexml_load_file("../files/".$name) or die("Error: Cannot create object");
    $content = $xml->content;
    //insert into database
    addReport($title, $name, $uploader, $desc, $content, $time);
    header("Location:../view/homepage.php?show=1");
  }
  else{
    header("Location:../view/homepage.php?info=Fail to upload");
  }
// }
// else {
//   header("Location:../view/homepage.php?info=Wrong file type: ".$imageFileType);
// }
?>
