<?php 
	require_once 'Connect.php';

	$query = $conn->prepare("SELECT * FROM usuario");
	$query->execute();
	
	$res = $query->fetch();
	print_r($res);