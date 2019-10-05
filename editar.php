<?php 
	header("Access-Control-Allow-Origin: *");
	if(isset($_POST['codigo']) && is_numeric($_POST['codigo'])){

		require_once 'Connect.php';
		
		$query = "UPDATE usuario ";
		$query .= "SET nm_usuario = '".$_POST['nome']."' ";
		$query .= ", email_usuario = '".$_POST['email']."' ";
		
		if(!empty($_POST['senha'])){
			$query .= ", cd_senha = '".md5($_POST['senha'])."' ";
		}

		$query .= " WHERE cd_usuario = ".$_POST['codigo'];
		$sql = $conn->prepare($query);
		if($sql->execute()){
			$retorno['status'] = 1;
			$retorno['usuarios'] = 'usuario atualizado com sucesso';
			echo json_encode($retorno);
		}else{
			$retorno['status'] = 0;
			$retorno['usuarios'] = 'Erro: não foi possivel editar o usuário';
			echo json_encode($retorno);
		}
	}else{
		echo "requisição sem parametros!";
	}
	