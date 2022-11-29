<?php
  session_start();
  require_once "../cfg.php";
  global $login, $haslo;
  $error = false;
  if (isset($_POST['x1_submit']))  {
    $uname = $_POST['user_name'];
    $pass = $_POST['user_pass'];
    if(empty($uname)) {
      echo "<h3 style='color:red'>Nie podano loginu</h3>";
      header('Refresh:1; url=admin.php');
    }
    else if(empty($pass)) {
      echo "<h3 style='color:red'>Nie podano hasła</h3>";
      header('Refresh:1; url=admin.php');
    }
    else if($uname == $login && $pass == $haslo) {
      $_SESSION['logged_in'] = $uname;
      header('Refresh:2; url=admin.php');
      exit;
    } else {
      echo "<h3 style='color:red'>Nieprawidłowy login lub hasło</h3>";
      header('Refresh:1; url=admin.php');
    }
  }
?>