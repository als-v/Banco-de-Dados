<?php
require_once "../config.php";
$conectbd = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["pswd"], $_SESSION["banco"]);
$email = $_SESSION['email'];
$sql = mysqli_query($conectbd, "select c.nome from cliente c where c.email = '$email';");
$row = mysqli_fetch_row($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sorvete In Box</title>
  <!-- <link href="https://fonts.googleapis.com/css?family=" rel="stylesheet">-->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:700|Slabo+27px|Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="_css/layout.css">
  <link rel="stylesheet" href="_css/index.css">
</head>
<body background-repeat = "no-repeat" background = "../background2.jpg">
<div id="interface">
  <img src="../_imagens/logo.png" id="logo"/>
      <header id="cabecalho">
        <hgroup>
        <h1>Sorvete In Box &copy</h1>
        <h2>Um sorvete como você nunca viu</h2>
        </hgroup>
        <nav id="menu">
            <ul id="segunda">
            <a href="alterar.php">Alterar Perfil</a>
            <a href="pedido.html">Fazer pedido</a>
            <a href="logout.php" id="exit">Sair</a>
          </ul>
        </nav>
      </header>
    <?php
      echo "<p id='inicio'>Bem vindo(a) $row[0]!</p>";
    ?>
    <footer id="rodape">
<p><a href="https://www.facebook.com/Sorvetes-In-Box-Company-709931342754940/" target="_blank">Facebook</a> | <a href="https://twitter.com/SorvetesB" target="blank">Twitter</a></p>
</footer>
</div>
</body>
</html>
