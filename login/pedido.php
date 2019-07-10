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
    //Variaveis para atualizar o preço
    var prec = 10, quant = 1, tam = "P";

    //função para atualizar o preço com base no tamnho e quantidade
    function preco(){

      switch(tam){
        case "P":
          prec = quant * 10;
        break;
        case "M":
          prec = quant * 20;
        break;
        case "G":
          prec = quant * 30;
        break;
      }
      document.getElementById("pre").innerHTML = "R$ " + prec + ",00";

    }

    //função para atualizar o tamanho e em seguida o valor
    function tama(t){
      tam = t;
    preco();
  }

    //função para atualizar a quantidade e em seguida o valor
    function qat(x){
      if(x < 0){
        x= x * -1;
        document.getElementById("quant").value = x;
      }
      quant = x;
    preco();
  }


//Inserção de pedido

    function confirmar(){

      var id = -1;

      //algoritmos para pegar o sabor escolhido
      var radios = document.getElementsByName('sabor');

for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        // do whatever you want with the checked radio
        id = radios[i].id;

        // only one radio can be logically checked, don't check the rest
        i = radios.length + 1;
    }
}


    if(id == -1)
      alert("Escolha um sabor para continuar.");
    else{

      if (quant == "" || quant == 0) {
        alert("Coloque uma quantidade valida para continuar.");
      }else{

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var x = xmlhttp.responseText; // Resposta do login
            /* Condição para reposta ao usuario ou redirecionamento da pagina */
            switch(x) {
              case "1":
              alert("Pedido efetuado com sucesso.");
              window.location.replace("index.php");
              break;
              default:
              alert("Problemas Internos, favor entrar em contato.");
            }
          }
        };
        xmlhttp.open("GET", "alter.php?acao=ins&tama=" + tam + "&quant=" + quant + "&sabor=" + id + "&valor=" + prec, true);
        xmlhttp.send();

      }

    }
    }

function cancelar(){
  window.location.replace("index.php");

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
            <a href="historico.php">Histórico</a>
            <a href="index.php" id="exit">Voltar</a>
          </ul>
        </nav>
      </header>
    <p id="pedido"> Por favor, selecione os sabores abaixo:</p>
    <p id="pedido">Tamanho:<font id="pre">R$ 10,00</font></p>

    <!-- radio buttons para esolher o tamanho e automaticamente chamar a função para atualizar o valor -->
    <input type="radio" name="tamanho" id="rd_peq" value="P" onchange="tama(this.value)" checked>Pequeno
    <input type="radio" name="tamanho" id="rd_med" value="M" onchange="tama(this.value)">Médio
    <input type="radio" name="tamanho" id="rd_gra" value="G" onchange="tama(this.value)">Grande

    </br>
    </br>

    <div id="tabela">

      <table id="sabs">
      <tr>
        <th colspan="3">Sabores</th>
      </tr>


    <?php
    /* Select no banco de dados para sabores */
    $select = mysqli_query($conectbd, "select * from sorvete");

        // Variável para diferenciação de Colunas
        $x=1;
        while ($rows = mysqli_fetch_array($select)){

        // Condição para diferenciação de Colunas
        switch ($x){
          case 1:
            echo "<tr>  <td class='col1'> <input type='radio' name='sabor' id=".$rows['id_sorvete'].">".$rows['sabor']."</td>";
            $x++;
          break;
          case 2:
            echo "<td class='col2'>  <input type='radio' name='sabor' id=".$rows['id_sorvete'].">".$rows['sabor']."</td>";
            $x++;
          break;
          case 3:
            echo "<td class='col3'>  <input type='radio' name='sabor' id=".$rows['id_sorvete'].">".$rows['sabor']."</td>  </tr>";
            $x = 1;
          break;
      }
    }

    if($x != 1)
      echo"</tr>";

    echo "</table>";

?>

  </br>

      <!-- Input de numeros para esolher a quantidade e automaticamente chamar a função para atualizar o valor -->
      Quantidade: &nbsp&nbsp&nbsp&nbsp <input type="number" id="quant" onkeyup="qat(this.value)" value="1" min="1">
  </br>
  </br>
  <button type="button" id="canc" onClick="cancelar()">Cancelar</button>
  <button type="button" id="conf" onClick="confirmar()">Confirmar</button>
  </br>.

    </div>
</div>
</body>
</html>
