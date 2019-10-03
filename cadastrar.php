<?php 
	 header("Access-Control-Allow-Origin: *");
	if(isset($_GET['cadastrar']) && !empty($_GET['nome']) && !empty($_GET['email']) && !empty($_GET['senha'])){

		require_once 'Connect.php';

		$nome = addslashes($_GET['nome']);
		$email = addslashes($_GET['email']);
		$senha  = md5($_GET['senha']);

		$query = "SELECT * FROM usuario WHERE email_usuario = '".$_GET['email']."' ";
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
	}
	