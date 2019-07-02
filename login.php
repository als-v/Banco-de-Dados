<?php
 require_once "config.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sorvete In Box</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:700|Slabo+27px" rel="stylesheet">
  <link rel="stylesheet" href="_css/login.css">

  <script type="text/javascript">
	function log(email, senha){

        if (email.length == 0 || senha.length == 0) { // Verificação se o login está em branco
          alert("Usuário ou senha em branco. Favor prenche-los.");
          return;
          } else {

              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var x = xmlhttp.responseText; // Resposta do login

                   /* Condição para reposta ao usuario ou redirecionamento da pagina */
                  switch(x) {
                  case "0":
                  window.location.replace("login/index.php");
                  break;
                  case "1":
                  alert("Email ou senha errado(s).");
                  break;
                  default:
                  alert("Problemas Internos, favor entrar em contato.");
                }
             }
        };
        xmlhttp.open("GET", "logcad.php?logcad=log&email=" + email + "&senha=" + senha, true);
        xmlhttp.send();
      }
      }



    </script>
</head>
<body>
<div id="interface">
	<form id="login">
		<legend id="Lentrar">Login</legend>
		<!-- Lemail e Lsenha: O 'L' significa Login -->
    <p><input type="email" name="email" id="Lemail" size="20" maxlenght="35" placeholder="Email"></p>
    
    <p><input type="password" name="senha" id="Lsenha"size="20" maxlenght="20" placeholder="Senha"></p>
    
    <button type="button" id="buton" Onclick="log(Lemail.value, Lsenha.value)">Entrar</button>
    
		<p id="baixo">Não possui uma conta?</p>
    <p id="cima"><a href="cadastro.html" id="unic">Crie uma já</a></p>
    <p id="cima"><a href="index.html" id="unic">Voltar</a></p>
	</form>
</div>
</body>
</html>
