<?php
 //require_once "config.php"; NAO
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sorvete In Box</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:700|Slabo+27px" rel="stylesheet">
  <link rel="stylesheet" href="_css/login.css">
  <script type="text/javascript">
	function alt(senha, tel){

    var y = 0;

    if (senha != 0) {
      y +=1;
    }

    if (tel != 0) {
      y +=2;
    }

    if (senha.length == 0 && tel.length == 0) { // Verificação se os campos estão em branco
          alert("Usuário e senha em branco. Favor prenche-los.");
          return;
    } else {

              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var x = xmlhttp.responseText; // Resposta do login

                   //Condição para reposta ao usuario ou redirecionamento da pagina
                  switch(x) {
                  case "1":
                  alert("Senha alterada com sucesso.");
                  window.location.replace("index.php");
                  break;
                  case "2":
                  alert("Telefone alterado com sucesso.");
                  window.location.replace("index.php");
                  break;
                  case "3":
                  alert("Telefone e senha alterados com sucesso.");
                  window.location.replace("index.php");
                  break;
                  default:
                  alert("Problemas Internos, favor entrar em contato.");
                }
             }
        };
        xmlhttp.open("GET", "alter.php?acao=alt&var=" + y + "&senha=" + senha + "&tel=" + tel, true);
        xmlhttp.send();
      }
    }

      function del(){


        var y = confirm("Você tem certeza que deseja excluir a conta?")

        if(y == true)
        {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var x = xmlhttp.responseText; // Resposta do login

               //Condição para reposta ao usuario ou redirecionamento da pagina
              switch(x) {
              case "1":
              alert("Conta excluido com sucesso.");
              window.location.replace("logout.php");
              break;
              default:
              alert("Problemas Internos, favor entrar em contato.");
            }
          }
          };
          xmlhttp.open("GET", "alter.php?acao=del", true);
          xmlhttp.send();

        }else
        {
          alert("Cancelado");
        }
      }



    </script>

</head>
<body>
<div id="interface">
  
    <form id="login">
  		<legend id="Lentrar">Digite sua nova senha:</legend>
  		<!-- Lemail e Lsenha: O 'L' significa Login -->
      <p><input type="password" name="password" id="password" size="20" maxlenght="35"></p>

      <legend id="Lentrar">Digite seu novo telefone</legend>

      <p><input type="number" name="tel" id="tel" maxlenght="11"></p>

      <button type="button" id="buton" Onclick="alt(password.value, tel.value)">Confirmar</button>

      <p id="excluir"><a href="index.php" id="unic" Onclick="del()">Excluir conta</a></p>

      <p id="cima"><a href="index.php" id="unic">Voltar</a></p>

    </form>
  </div>
</body>]
</html>