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
  <link rel="stylesheet" href="_css/pedido.css">


  <script>

  //Cancelar pedido

    function cancelar(id){

    if(confirm("Você tem Certez que deseja cancelar o pedido?") == true){

      var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var x = xmlhttp.responseText; // Resposta do login
                 /* Condição para reposta ao usuario ou redirecionamento da pagina */
                switch(x) {
                case "1":
                alert("Pedido cancelado com sucesso.");
                window.location.replace("index.php");
                break;
                case "2":
                alert("Pedido ja em preparação.");
                break;
                default:
                alert("Problemas Internos, favor entrar em contato.");
              }
           }
      };
      xmlhttp.open("GET", "alter.php?acao=can&id=" + id, true);
      xmlhttp.send();

    }
    }
  </script>

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
            <a href="index.php">Início</a>
            <a href="pedido.php" id="exit">Voltar</a>
          </ul>
        </nav>
      </header>

    </br>
    </br>

    <div id="tabela">

      <table id="historico">
      <tr>
        <th colspan="6">Historico</th>
      </tr>


      <?php

      echo "<tr>
      <td class='sab'>Sabor</td>
      <td class='tam'>Tamanho</td>
      <td class='qtde'>Quantidade</td>
      <td class='pre'>Preço</td>
      <td class='sts'>Status</td>
      <td class='can'>Cancelar</td>
      </tr>";

      /* Select no banco de dados para sabores */
      $select = mysqli_query($conectbd, "select P.id_pedido, P.tamanho, P.qtde, P.preco, P.status, S.sabor from cliente C, sorvete S, pedido P where C.id_cliente = P.id_cliente and P.id_sorvete = S.id_sorvete and C.email = '".$_SESSION['email']."'");

          // Variável para diferenciação de Colunas
          //$x=1;
          while ($rows = mysqli_fetch_array($select)){


            echo "<tr> <td class='cent'>";

            echo $rows['sabor'];

            echo "</td> <td class='cent'>";

            echo $rows['tamanho'];

            echo "</td> <td class='cent'>";

            echo $rows['qtde'];

            echo "</td> <td class='cent'>";

            echo $rows['preco'];

            echo "</td> <td class='cent'>";

            echo $rows['status'];

            echo "</td> <td class='cent'>";

            if ($rows['status'] == "Na fila") {
              echo "<button id=".$rows['id_pedido']." Onclick='cancelar(this.id)'>X</button>";
            }else {
              echo "<button id=".$rows['id_pedido']." disabled='true''>X</button>";
            }

            echo "</td> </tr>";

    }

    echo "</table>";

?>

  </br>
  </br>.

    </div>
</div>
</body>
</html>
