<?php
require_once('./cfg.php');

function PokazPodstrone($id) 
{
  global $db;
  //czyścimy $id, aby przez GET ktoś nie próbował wykonać ataku SQL INJECTION
  $id_clear = htmlspecialchars($id);

  $query="SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
 
  //wywołanie strony z bazy
  if(empty($row['id']))
  {
    $web = '[nie_znaleziono_strony]';
  }
  else 
  {
    $web = $row['page_content']; 
  }
      
  echo $web;
}
?>

