<?php
  echo 'Zad.1. Za pomocą funkcji echo() swoje imię.<br />';
  echo 'Alicja <br /><br />';
  echo 'Zad.2. <br />';
  echo'Zastosowanie metody include(): <br />';
  include './var.php';
  echo 'Alicja Dabrowska '.$nr_indeksu. ' grupa ' . $nrGrupy . ' <br />';
  echo'Zastosowanie metody require_once(): <br />';
  require_once './var.php';
  echo 'Alicja Dabrowska '.$nr_indeksu. ' grupa ' . $nrGrupy . ' <br />';
  echo'Zastosowanie warunków if, else, elseif, switch: <br />';
  $dodatek1 = 'masło';
  $dodatek2 = 'oliwa';
  $kanapka1 = ('masło' == $dodatek1) ? 'Zróbmy kanapkę' : 'Kanapka bez masła jest niedobra'; 
  $kanapka2 = ('oliwa' == $dodatek2) ? 'Kanapka z oliwą bedzie okropna' : 'hmmm'; 

  echo $kanapka1. ' <br />';
  echo $kanapka2. '<br />';

  $stan_konta = 9;

  if ($stan_konta < 100) {
    echo 'jesteś już całkiem biedny <br />';
  } elseif ($stan_konta >= 100 and $stan_konta < 1000 ) {
    echo 'masz jeszcze sporo na koncie <br />';
  } else {
    echo 'jesteś jeszcze całkiem bogaty <br />';
  }

  $kraj = "tajlandia";

  switch ($kraj) {
    case "tajlandia":
      echo 'Jesteś Azjatą';
      break;
    case "szwecja":
      echo 'Jesteś Europejczykiem';
      break;
    case "kanada":
      echo 'Jesteś Kanadyjczykiem';
      break;
    default:
      echo 'Nie wiem kim jesteś';
  }
  echo '<br />';

  echo'Zastosowanie pętli for: <br />';
  echo 'oto kilka poteg liczby 5: <br />';
  for ($x = 5; $x < 1000; $x *= $x) {
    echo $x. '<br />';
  }

  echo'Zastosowanie pętli while: <br />';
  echo 'a tutaj kilka poteg liczby 2: <br />';
  $number2 = 2;
  while($number2 < 500) {
    echo $number2. '<br />';
    $number2 *= 2;
  }

  echo '<br /> Zad.3. Typy zmiennych $_GET, $_POST, $_SESSION:  <br />';
  echo '<br .> Metody GET używa się kiedy parametrów jest niewiele. Dzieje się tak ponieważ 
  parametry przekazuje się za pomocą adresu URL którego długość jest ograniczona. 
  Należy też pamiętać że parametry są widoczne w pasku adresu przeglądarki, więc tej metody
  nie należy używać jeśli przekazywane są np. hasła. <br />';

  echo '<br />Wejdź na podstronę kontakt i wyślij przykładowe dane; przechwycone dane metodą get:<br />';
  
  echo $_GET["name"]. '<br />';
  echo $_GET["email"]. '<br />';
  echo $_GET["subject"]. '<br />';
  echo $_GET["message"]. '<br />';

  echo '<br .> Metoda „POST” do przekazywania parametrów wykorzystuje nagłówek
  zapytania – wystarczy wiedzieć, że metoda ta umożliwia przekazywanie dużo większych
  parametrów, a także że parametrów nie widać w pasku przeglądarki. <br />';

  echo '<br />Adekwatnie przechwycimy dane metodą POST w niżej przedstawiony sposób, po zmianie 
  atrybutu formularza -method- na -post-<br />';

  // echo $_POST["name"]. '<br />';
  // echo $_POST["email"]. '<br />';
  // echo $_POST["subject"]. '<br />';
  // echo $_POST["message"]. '<br />';

  echo '<br .>Mechanizm sesji umożliwia przekazywanie parametrów między stronami w łatwy sposób. 
  Zmienne są przechowywane po stronie serwera a u klienta trzymane jest tylko ID sesji. 
  Te ID jest zapisane w cookie lub przekazywane przez URL. PHP jest w stanie sam rozpoznać 
  czy na komputerze klienta włączony jest mechanizm cookies i w razie potrzeby dodać 
  identyfikator sesji do każdego URLu i formularza.  <br />';

  echo '<br /> Zmienna $_SESSION przykład:  <br />';

  session_start(); 
  if (!isset($_SESSION['ile_razy'])) { 
    $_SESSION['ile_razy'] = 1;       //  zmienna przechowującą liczbę "odwiedzin strony"
  } else {                          
    $_SESSION['ile_razy']++;         
  }

  echo 'Strona została otwarta '.$_SESSION['ile_razy'].' razy w ciągu tej sesji';

?>