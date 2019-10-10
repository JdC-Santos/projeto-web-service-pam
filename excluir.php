<?php 
	header("Access-Control-Allow-Origin: *");
	if(isset($_POST['excluir'])){

		require_once 'Connect.php';

		$query = "DELETE FROM usuario WHERE cd_usuario = ".$_POST['excluir']." LIMIT 1";
		$sql = $conn->prepare($query);
		if($sql->execute()){
			$retorno['status'] = 1;
			$retorno['msg'] = "Usuário deletado com sucesso!";
			echo json_encode($retorno);
		}else{
			$retorno['status'] = 0;
			$retorno['msg'] = "Erro: não foi possivel excluir o usuário!";
			echo json_encode($retorno);
		}
	
	}else{
		echo "requisição sem parametros!";
	}
	