<?php
 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
 /* po tym komentarzu będzie kod do dynamicznego ładowania stron */

 switch ($_GET['idp']) {
  case "glowna":
    $page = './html/glowna.html';
    break;
  case "rasy":
    $page = './html/rasy.html';
    break;
  case "galeria":
    $page = './html/galeria.html';
    break;
  case "dieta":
    $page = './html/dieta.html';
    break;
  case "etapy":
    $page = './html/etapy.html';
    break;
  case "filmy":
    $page = './html/filmy.html';
    break;
  case "kontakt":
    $page = './html/kontakt.html';
    break;
  default:
    $page = '';
}
  if (file_exists($page)) {
    include $page;
  }
  else {
    echo "The file $page does not exist";
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Language" content="pl" />
  <meta name="Author" content="Alicja Dabrowska" />
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
  <link rel="icon" type="image/x-icon" href="./img/cat-icon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
  <!-- START NAVBAR -->
  <nav class="zone gradient sticky">
    <ul class="main-nav">
      <li><a href="./index.php?idp=glowna">Start</a></li>
      <li><a href="./index.php?idp=rasy">Rasy</a></li>
      <li><a href="./index.php?idp=galeria">Galeria</a></li>
      <li><a href="./index.php?idp=dieta">Żywienie</a></li>
      <li><a href="./index.php?idp=etapy">Etapy życia</a></li>
      <li><a href="./index.php?idp=filmy">Filmy</a></li>
      <li class="push"><a href="./index.php?idp=kontakt">Kontakt</a></li>
    </ul>
  </nav>
  <!--END NAVBAR -->

 
  <!--  FOOTER START -->
  <div class="footer">
    <div class="inner-footer">
      <!--  container1 -->
      <div class="footer-items">
        <h1>Sierściuchy</h1>
        <p>Koty towarzyszą człowiekowi od tysięcy lat. Obecnie można spotkać koty dzikie i domowe. Zamieszkują one
          praktycznie cały świat </p>
      </div>
      <!--  container2 -->
      <div class="footer-items">
        <h3>Na skróty</h3>
        <div class="border1"></div>
        <ul>
          <a href="./index.php?idp=glowna">
            <li>Start</li>
          </a>
          <a href="./index.php?idp=rasy">
            <li>Rasy</li>
          </a>
          <a href="./index.php?idp=dieta">
            <li>Żywienie</li>
          </a>
          <a href="./index.php?idp=kontakt">
            <li>Kontakt</li>
          </a>
        </ul>
      </div>
      <!--  container3 -->
      <div class="footer-items">
        <h3>Przydatne linki</h3>
        <div class="border1"></div>
        <ul>
          <a href="https://blog.kocibehawioryzm.pl">
            <li>Kocibehawioryzm</li>
          </a>
          <a href="https://www.koty.pl/artykuly/zycie-z-kotem/ksiazki-o-kotach">
            <li>Książki</li>
          </a>
          <a href="https://www.zooplus.pl">
            <li>Zooplus</li>
          </a>
          <a href="https://zooart.com.pl">
            <li>Zooart</li>
          </a>
        </ul>
      </div>
      <!--  container4 -->
      <div class="footer-items">
        <h3>Kontakt</h3>
        <div class="border1"></div>
        <ul>
          <li><i class="fa fa-map-marker-alt" aria-hidden="true"></i>Olsztyn, ul. Nowa 44/12</li>
          <li><i class="fa fa-phone" aria-hidden="true"></i>+48 123456789</li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i>123@email.com</li>
        </ul>
        <!--   for social links -->
        <div class="social-media">
          <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
          <a href="https://pl-pl.facebook.com"><i class="fab fa-facebook"></i></a>
          <a href="https://www.google.com/intl/pl/gmail/about/"><i class="fab fa-google-plus-square"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      Copyright &copy; Sierściuchy 2022.<br>
      <span>
        <?php 
         $autor = 'Alicja Dąbrowska'; 
         $nr_indeksu = '156921';
         $nrGrupy = 'I';
         echo 'Autor: '.$autor.', numer indeksu: ' .$nr_indeksu.', grupa '.$nrGrupy.' <br /><br />';
        ?>
      </span>
    </div>
  </div>
  <!--   FOOTER END -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>







