<?php
  require_once('../cfg.php');
  session_start();
  if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']) ) {
    function ListaPodstron() {
  
      global $db;
 
      $query = "SELECT id, page_title FROM page_list";
      $result = $db->query($query);
    
      if ($result->num_rows > 0) {
        echo "<h4>Lista podstron:</h4>";
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. ", tytuł: " .$row["page_title"]. "<br>";
        }
      } else {
        echo "Brak wyników";
      }
      // $db->close();
    }
    $wyloguj='
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <form class="logout" name="logout" method="post">
    Zalogowano => <input type="hidden" name="logut" value="yes">
    <input type="submit" class="form_button" name="logout_submit" value="Wyloguj"/>
    </form>
    ';
    echo "<br>" .$wyloguj;
  
    ListaPodstron();

    $edycja ='
    <form name="choose_id" method="post">
    <h4>Edycja:</h4>
    <input type="text" name="choosen_id" placeholder="Wpisz nr id podstrony">
    <input type="submit" class="form_button" name="x2_submit" value="Wybierz"/>
    </form>
    ';
  
    $nowastrona ='
    <form method="post">
    <h4>Dodać podstronę?</h4>
     <select name="czy_nowa_strona">
    <option value="tak"selected>Tak</option>
    <option value="nie">Nie</option>
    </select>
    <input type="submit" class="form_button" name="x3_submit" value="Zatwierdź">
    </form>
    ';
  
    $usunstrone ='
    <form method="post">
    <h4>Usuwanie:</h4>
    <input type="text" name="delete_id" placeholder="id podstrony do usunięcia">
    <input type="submit" class="form_button" name="x4_submit" value="Wybierz"/>
    </form>
    ';
    
    echo "<br>" .$edycja;
    echo "<br>" .$nowastrona;
    echo "<br>" .$usunstrone;

    echo "<h1>Poniżej obszar roboczy wybranej czynności:</h1>";
  
    function EdytujPodstrone($id) {
      global $db;
      $id_clear = htmlspecialchars($id);
      $query="SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
      $result = mysqli_query($db, $query);
      $row = mysqli_fetch_assoc($result);
  
      $page_id = $row["id"];
      $page_title = $row["page_title"];
      $page_content = $row["page_content"]; 
      $status = $row["status"];
  
      $edit_form = '
        <form action="updateFormScript.php" method="post">
        ID strony: "'.$page_id.'"<br>
        <input type="hidden" name="page_id" value="'.$id.'">
        Tytuł: <input type="text" name="page_title" value="'.$page_title.'"><br>
        <br>Status: <select name="status">
          <option value='.$status.'" selected>'.$status.'</option>
          <option value="0">0</option>
          </select><br><br>
          Zawartość: <br>
        <textarea name="page_content" rows="30" cols="100">'.$page_content.'</textarea><br><br>
        <input type ="submit" class="form_button" value="Zatwierdź i wyślij">
        </form>
      ';
      echo $edit_form;
    }
    
  
    function DodajNowaPodstrone() {
      require_once('../cfg.php');
      global $db;
  
      $edit_form = '
      <link rel="stylesheet" type="text/css" href="../css/admin.css">
      <form action="addRecordScript.php" method="post">
      Tytuł: <input type="text" name="page_title"><br>
      <br>Status: <select name="status">
        <option value="1" selected>1</option>
        <option value="0">0</option>
        </select><br><br>
      Kod zawartości: <br>
      <textarea name="page_content" rows="30" cols="100"><h1>Hello World</h1></textarea><br><br>
      <input type ="submit" class="form_button" name="dodaj_strone" value="Dodaj podstronę">
      </form>
    ';
  
      echo $edit_form;
    }

    function UsunPodstrone($id) {
      global $db;
      $id_clear = htmlspecialchars($id);
      $query="DELETE FROM page_list WHERE id='$id_clear' LIMIT 1";
      $result = mysqli_query($db, $query);
    }

    function Wyloguj() {
      session_destroy(); 
      header("Refresh:1"); 
      exit;
    }  

    if(isset($_POST['logout_submit'])) {
      Wyloguj();
    }
    
    if(isset($_POST['x2_submit'])) {
      $choosen_id = $_POST['choosen_id'];
      EdytujPodstrone($choosen_id);
    }
  
    if(isset($_POST['x3_submit'])) {
      $ans = $_POST['czy_nowa_strona'];
      if($ans == "tak") {
        DodajNowaPodstrone();
      }
    }
  
    if(isset($_POST['x4_submit'])) {
      $choosen_id = $_POST['delete_id'];
      UsunPodstrone($choosen_id);
    }

  } else {
 
    $wynik = '
    <link rel="stylesheet" type="text/css" href="../css/admin_login.css">
    <div class="logowanie">
      <h1 class="heading">Panel CMS:</h1>
      <h5>Zaloguj się, aby mieć dostęp do dalszych metod administracyjnych</h5>
        <div class="logowanie">
          <form action="login.php" method="post" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
            <table class="logowanie">
              <tr><td class="log4_t">Login:</td><td><input type="text" name="user_name" class="logowanie" /></td></tr>
              <tr><td class="log4_t">Haslo:</td><td><input type="password" name="user_pass" class="logowanie" /></td></tr>
              <tr><td>&nbsp;</td><td><input type="submit" class="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
            </table>
          </form>
        </div>
    </div>
    ';
    echo $wynik;
  }
?>
  
