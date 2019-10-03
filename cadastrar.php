<?php 
	header("Access-Control-Allow-Origin: *");
	if(isset($_POST['cadastrar']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){

		require_once 'Connect.php';

		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha  = md5($_POST['senha']);

		$query = "SELECT * FROM usuario WHERE email_usuario = '".$_POST['email']."' ";
		$sql = $conn->prepare($query);
		$sql->execute();
		$res = $sql->fetch();
		
		if(is_array($res)){
			$retorno['status'] = 0;
			$retorno['msg'] = "Este email ja está cadastrado!";
			echo json_encode($retorno);
		}else{
			$query = "INSERT INTO 
						usuario (cd_usuario, nm_usuario, email_usuario, cd_senha)
					  VALUES 
					  	(null,'$nome','$email','$senha')";
			$sql = $conn->prepare($query);
			if($sql->execute()){
				$retorno['status'] = 1;
				$retorno['msg'] = "Usuário cadastrado com sucesso!";
				echo json_encode($retorno);
			}
		}
	}else{
		echo "requisição sem parametros!";
	}
	