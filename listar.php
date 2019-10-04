<?php 
	header("Access-Control-Allow-Origin: *");
	if(isset($_POST['listar'])){

		require_once 'Connect.php';

		$query = "SELECT cd_usuario, nm_usuario, email_usuario FROM usuario ";
		$sql = $conn->prepare($query);
		$sql->execute();
		
		$usuarios = [];
		$i = 0;
		
		while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
			$usuarios[$i]['cd'] = $fetch['cd_usuario'];
			$usuarios[$i]['nome'] = $fetch['nm_usuario'];
			$usuarios[$i]['email'] = $fetch['email_usuario'];
			$i++;
		}
		
		$retorno['status'] = 1;
		$retorno['usuarios'] = $usuarios;
		echo json_encode($retorno);

	}else{
		echo "requisição sem parametros!";
	}
	