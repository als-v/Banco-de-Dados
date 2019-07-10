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

    function avancar(id){

    if(confirm("Você tem Certez que deseja avançar o pedido?") == true){

      var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var x = xmlhttp.responseText; // Resposta do login
                 /* Condição para reposta ao usuario ou redirecionamento da pagina */
                switch(x) {
                case "1":
                alert("Pedido em preparação.");
                window.location.replace("admped.php");
                break;
                case "2":
                alert("Pedido Pronto.");
                window.location.replace("admped.php");
                break;
                case "3":
                alert("Pedido entregue.");
                window.location.replace("admped.php");
                break;
                default:
                alert("Problemas Internos, favor entrar em contato.");
              }
           }
      };
      xmlhttp.open("GET", "alter.php?acao=ava&id=" + id, true);
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
            <a href='admped.php'>Pedidos</a>
            <a href="index.php" id="exit">Voltar</a>
          </ul>
        </nav>
      </header>

    </br>
    </br>

    <div id="tabela">

      <table id="historico">
      <tr>
        <th colspan="7">Pedidos</th>
      </tr>


      <?php

      echo "<tr>
      <td class='cli'>Cliente</td>
      <td class='sab'>Sabor</td>
      <td class='tam'>Tamanho</td>
      <td class='qtde'>Quantidade</td>
      <td class='pre'>Preço</td>
      <td class='sts1'>Status</td>
      </tr>";

      /* Select no banco de dados para sabores */
      $select = mysqli_query($conectbd, "select C.nome, P.id_pedido, P.tamanho, P.qtde, P.preco, P.status, S.sabor from cliente C, sorvete S, pedido P where C.id_cliente = P.id_cliente and P.id_sorvete = S.id_sorvete");

          // Variável para diferenciação de Colunas
          //$x=1;
          while ($rows = mysqli_fetch_array($select)){


            echo "<tr> <td class='cent'>";

            echo $rows['nome'];

            echo "</td> <td class='cent'>";

            echo $rows['sabor'];

            echo "</td> <td class='cent'>";

            echo $rows['tamanho'];

            echo "</td> <td class='cent'>";

            echo $rows['qtde'];

            echo "</td> <td class='cent'>";

            echo $rows['preco'];

            echo "</td> <td class='cent'>";

            echo $rows['status'];

            if ($rows['status'] == "Entregue") {
              echo " <button id=".$rows['id_pedido']." disabled='true''>Avançar</button>";
            }else {
              echo " <button id=".$rows['id_pedido']." Onclick=avancar(this.id)>Avançar</button>";
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
