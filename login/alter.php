<?php
	/* Início de sessão */

header("Content-type: text/html; charset=utf-8");
	require_once "../config.php";

header("Content-type: text/html; charset=utf-8");
	/* Request do usuario e senha */
	$acao = $_REQUEST["acao"];
	$email = $_SESSION["email"];
    //$senha = md5($senha);

	/* coneção com o banco e a tabela. Select na tabela */
	$conectbd = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["pswd"], $_SESSION["banco"]);

	$x = 0;

    //login
	if ($acao == "alt") {

		$senha = $_REQUEST["senha"];
		$tel = $_REQUEST["tel"];
		$y = $_REQUEST["var"];

			switch ($y) {
				case '1':
				$update = mysqli_query($conectbd, "update cliente set senha='$senha' where email='$email';");
				$x=1;
					break;
				case '2':
					$update = mysqli_query($conectbd, "update cliente set telefone='$tel' where email='$email';");
					$x=2;
					break;
				case '3':
					$update = mysqli_query($conectbd, "update cliente set senha='$senha', telefone='$tel' where email='$email';");
					$x=3;
					break;

				default:
					$x = 9;
					break;
			}
    }

		if ($acao == "del") {
			$delete = mysqli_query($conectbd, "delete from cliente where email='$email';");
			$x = 1;
		}

    echo $x;
