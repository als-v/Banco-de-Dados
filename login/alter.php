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

    //alterar login
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

		//Deletar conta
		if ($acao == "del") {
			$delete = mysqli_query($conectbd, "delete from cliente where email='$email';");
			$x = 1;
		}

		//Inserção de pedido
		if ($acao == "ins") {

			$select = mysqli_query($conectbd, "select id_cliente from cliente where email='$email';");

			$row = mysqli_fetch_array($select);
			$id = (int)$row["id_cliente"];

			$tam = $_REQUEST["tama"];
			$quant = $_REQUEST["quant"];
			$sabor = $_REQUEST["sabor"];
			$preco = $_REQUEST["valor"];

			$insert = mysqli_query($conectbd, "Insert into pedido (id_cliente, id_sorvete, tamanho, preco, qtde) values ($id, $sabor, '$tam', $preco, $quant);");
			$x = 1;
		}

				//Cancelar pedido
				if ($acao == "can") {

					$id = $_REQUEST["id"];
					$select = mysqli_query($conectbd, "select status from pedido where id_pedido='$id';");
					$row = mysqli_fetch_array($select);

					if ($row['status'] == "Na fila") {
						$delete = mysqli_query($conectbd, "delete from pedido where id_pedido='".$id."';");
						$x = 1;
					}else {
						$x = 2;
					}

				}


				//Cancelar pedido
				if ($acao == "ava") {
					$id = $_REQUEST["id"];
					$select = mysqli_query($conectbd, "select status from pedido where id_pedido='$id';");
					$row = mysqli_fetch_array($select);

				switch ($row['status']) {
					case 'Na fila':
					$update = mysqli_query($conectbd, "update pedido set status='Em preparacao' where id_pedido=$id;");
						break;
					case 'Em preparacao':
					$update = mysqli_query($conectbd, "update pedido set status='Pedido pronto' where id_pedido=$id;");
						break;
					case 'Pedido pronto':
					$update = mysqli_query($conectbd, "update pedido set status='Entregue' where id_pedido=$id;");
						break;
					}
					if ($row['status'] == "Na fila") {
						$x = 1;
					}else {
						$x = 2;
					}
				}

    echo $x;
