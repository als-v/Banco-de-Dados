<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sorvetes In Box</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:700|Slabo+27px" rel="stylesheet">
  <link rel="stylesheet" href="_css/layout.css">
  <link rel="stylesheet" href="_css/pedido.css">
  <script>
  function preco(tam){

    switch (tam) {
      case "P":
        document.getElementById("pre").innerHTML = "R$10,00";
        break;

      case "M":
        document.getElementById("pre").innerHTML = "R$20,00";
        break;
      case "G":
        document.getElementById("pre").innerHTML = "R$30,00";
        break;
      default:

    }
  }
  </script>
</head>
<body>
<div id="interface">
    <header id="cabecalho">
      <hgroup>
      <h1>Sorvete In Box &copy</h1>
      <h2>Um sorvete como você nunca viu</h2>
      </hgroup>
      <nav id="menu">
          <ul id="primeira">
            <a href="index.html">Home</a>
            <a href="perfil.html">Perfil</a>
          </ul>
          <ul id="segunda">
            <a href="duvidas.html">Dúvidas</a>
            <a href="pedido.html">Fazer pedido</a>
          </ul>
      </nav>
    </header>
    <p id="pedido"> Por favor, selecione os sabores abaixo:</p>
    <p id="pedido">Tamanho:<font id="pre">R$ 00,00</font></p>
    <input type="radio" name="tamanho" id="rd_peq" value="P" onchange="preco(this.value)">Pequeno
    <input type="radio" name="tamanho" id="rd_med" value="M" onchange="preco(this.value)">Médio
    <input type="radio" name="tamanho" id="rd_gra" value="G" onchange="preco(this.value)">Grande


    <div id="tabela">
      <p>blanlabla</p>
    </div>
</div>
</body>
</html>
