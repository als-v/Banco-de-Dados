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
</head>
<body>
<div id="interface">
	<form id="login">
		<legend id="Lentrar">Entrar</legend>
		<!-- Lemail e Lsenha: O 'L' significa Login -->
		<p><input type:"email" name="email" id="Lemail" size="20" maxlenght="35" placeholder="Email"></p>
		<p><input type:"password" name="senha" id="Lsenha"size="20" maxlenght="20" placeholder="Senha"></p>
		<button type="submit" id="buton">Entrar</button>
		<p id="baixo">Não possui uma conta?</p>
		<p id="cima"><a href="cadastro.html" id="unic">Crie uma já</a></p>
	</form>
</div>
</body>
</html>
