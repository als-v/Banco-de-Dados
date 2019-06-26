<?php
<<<<<<< HEAD
 //require_once "config.php";
=======
<<<<<<< HEAD
 require_once "config.php";
=======
 //require_once "config.php";
>>>>>>> 6b9c8e6baa04ec2a8824fb8379bf2d73c9563510
>>>>>>> e3f5b5e95fb6c74e80e816ae8a9d12dc5886701d
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sorvete In Box</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:700|Slabo+27px" rel="stylesheet">
  <link rel="stylesheet" href="_css/login.css">
<<<<<<< HEAD

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
=======
  <div id="interface">
<<<<<<< HEAD
=======
>>>>>>> e3f5b5e95fb6c74e80e816ae8a9d12dc5886701d
    <form id="login">
  		<legend id="Lentrar">Digite sua nova senha:</legend>
  		<!-- Lemail e Lsenha: O 'L' significa Login -->
      <p><input type="password" name="password" id="password" size="20" maxlenght="35"></p>

      <legend id="Lentrar">Digite seu novo telefone</legend>

      <p><input type="number" name="tel" id="tel" maxlenght="11"></p>

<<<<<<< HEAD
      <button type="button" id="buton" Onclick="alt(password.value, tel.value)">Confirmar</button>

      <p id="excluir"><a href="index.php" id="unic" Onclick="del()">Excluir conta</a></p>

      <p id="cima"><a href="index.php" id="unic">Voltar</a></p>

    </form>
  </div>
</body>
=======
      <button type="button" id="buton" Onclick="log(Lemail.value, Lsenha.value)">Confirmar</button>

  		<p id="cima"><a href="index.php" id="unic">Voltar</a></p>
  	</form>
  </div>
>>>>>>> 6b9c8e6baa04ec2a8824fb8379bf2d73c9563510
>>>>>>> e3f5b5e95fb6c74e80e816ae8a9d12dc5886701d
