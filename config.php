<?php
/* Comando para não ocorrer erro de criptografia */
header("Content-type: text/html; charset=utf-8");
session_start(); // Inicio da sessão
 
 /* Informações para conexão com o banco de dados */
$_SESSION["host"] = "localhost";
$_SESSION["user"] = "root";
$_SESSION["pswd"] = "";
$_SESSION["banco"] = "dbps";

	/* Validação do login. Criação da variavel caso n exista, para não ocorrer erro */
	if(!isset($_SESSION['perm'])) {	
	$_SESSION["perm"] = "";
	} else{}


/* Conexão com o host e o banco de dados */
$conect = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["pswd"]);
$conectbd = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["pswd"], $_SESSION["banco"]);