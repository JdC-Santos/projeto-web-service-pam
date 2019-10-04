<?php 
	header("Access-Control-Allow-Origin: *");
	if(isset($_POST['listar'])){

		require_once 'Connect.php';

		$query = "SELECT * FROM usuario ORDER BY nm_usuario";
		$sql = $conn->prepare($query);
		$sql->execute();
		$res = $sql->fetch();
		
		if(is_array($res)){
			$retorno['status'] = 1;
			$retorno['usuarios'] = json_decode($res);
			echo json_encode($retorno);
		}else{
			$retorno['status'] = 0;
			$retorno['usuarios'] = null;
			echo json_encode($retorno);
		}
	}else{
		echo "requisição sem parametros!";
	}
	