<?php
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $baza = 'moja_strona';

  $db = mysqli_connect($dbhost, $dbuser, $dbpass, $baza);

  if (!$db) {
    echo '<b>Przerwana połączenie</b>'; 
    echo mysqli_connect_error();
  }

  $login = 'admin';
  $haslo = '1234';

?>