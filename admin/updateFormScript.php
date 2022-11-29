<?php
  require_once('../cfg.php');

  global $db;

  $page_id = $_POST["page_id"];
  $page_title = $_POST["page_title"];
  $page_content = $_POST["page_content"];
  $status = $_POST["status"];

  if ($db->connect_error){
    die("Connection failed: ". $db->connect_error);
  }

  $sql = "UPDATE page_list SET page_title ='$page_title', page_content = '$page_content', status ='$status' WHERE id='$page_id' LIMIT 1";

  if ($db->query($sql) === TRUE) {
    header("location:admin.php");
  } else {
    echo "Error: ".$sql."<br>".$db->error;
  }


?>