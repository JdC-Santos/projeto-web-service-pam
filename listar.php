<?php 
	header("Access-Control-Allow-Origin: *");
	if(isset($_GET['listar'])){

		require_once 'Connect.php';

		$query = "SELECT * FROM usuario ORDER BY nm_usuario";
		$sql = $conn->prepare($query);
		$sql->execute();
		$res = $sql->fetch();
		
		if(is_array($res)){
			$usuarios = [];
			$i = 0;
			foreach($res as $key => $value){
				$usuarios[$i]['cd'] = $value['cd_usuario'];
				$usuarios[$i]['nome'] = $value['nm_usuario'];
				$usuarios[$i]['email'] = $value['email_usuario'];
				$i++;
			}

			$retorno['status'] = 1;
			$retorno['usuarios'] = $usuarios;
			echo json_encode($retorno);
		}else{
			$retorno['status'] = 0;
			$retorno['usuarios'] = null;
			echo json_encode($retorno);
		}
	}else{
		echo "requisição sem parametros!";
	}
	