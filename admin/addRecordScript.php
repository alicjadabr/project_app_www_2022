<?php
  require_once('../cfg.php');

  global $db;

  $page_title = $_POST["page_title"];
  $page_content = $_POST["page_content"];
  $status = $_POST["status"];

  if ($db->connect_error){
    die("Connection failed: ". $conn->connect_error);
  }
  $sql = "INSERT INTO page_list (page_title,page_content,status) values('$page_title','$page_content','$status')";
  
  if ($db->query($sql) === TRUE) {
    header("location:admin.php");
  } else {
    echo "Error: ".$sql."<br>".$db->error;
  }


?>