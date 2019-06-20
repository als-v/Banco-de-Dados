<?php
	/* Início de sessão */
	
header("Content-type: text/html; charset=utf-8");
	require_once "config.php";
	
header("Content-type: text/html; charset=utf-8");
	/* Request do usuario e senha */
	$logcad = $_REQUEST["logcad"];
	$email = $_REQUEST["email"];
	$senha = $_REQUEST["senha"];
	//$senha = md5($senha);
	/* coneção com o banco e a tabela. Select na tabela */
	$conectbd = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["pswd"], $_SESSION["banco"]);
	$select = mysqli_query($conectbd, "select c.email, c.senha from cliente c;");

	$x = 0;

    //login
	if ($logcad == "log") {
		$select = mysqli_query($conectbd, "select c.email, c.senha from cliente c where c.email = '$email' and c.senha = '$senha';");
		if (!$select || mysqli_num_rows($select) == 0){
        $x = 1;
		}else{
		
		/* Leitura e reposta do login. E gravação na sessão dos dados do usuario */
		$rows = mysqli_fetch_array($select);
		$_SESSION["email"] = $email;
		$x = 0;
		}
    }

    //cadastro
    if ($logcad == "cad") {
        $cpf = $_REQUEST["cpf"];
        $nome = $_REQUEST["nome"];
        $telefone = $_REQUEST["telefone"];
        $cidade = $_REQUEST["cidade"];
        $nascimento = $_REQUEST["nascimento"];
        $select = mysqli_query($conectbd, "select c.cpf, c.email from cliente c");
            /*Verificação se ja existe o usuario*/
                while ($rows = mysqli_fetch_array($select)){
                    if ($rows['cpf'] == $cpf || $rows['email'] == $email) {
                        $x = 1;
                    }
                }
    
                if ($x == 0) {
                    $select = mysqli_query($conectbd, "insert into cliente (email, cpf, nome, senha, telefone, cidade, nascimento) values('$email', $cpf, '$nome', '$senha', $telefone, '$cidade', $nascimento);");
                    //$select1 = mysqli_query($conectbd, "insert into tese (a) values('aaa');");
                }
            }
    
    //alteracao
    if ($logcad == "cad2") {
    $nome = $_REQUEST["nome"];
    $cpf = $_REQUEST["cpf"];
        /*Verificação se ja existe o usuario*/
            while ($rows = mysqli_fetch_array($select)){
                if ($rows['user'] == $usuario || $rows['CPF'] == $CPF) {
                    $x = 1;
                }
            }
    
            if ($x == 0) {
                $select = mysqli_query($conectbd, "insert into login (user, nome, senha, func) values('$usuario', '$nome', '$senha', 1);");
                $select1 = mysqli_query($conectbd, "insert into funcionario (CPF, user) values('$cpf', '$usuario');");
            }
    }
    
    
    
    echo $x;