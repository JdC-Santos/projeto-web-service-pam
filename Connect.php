<?php 
	$servername = '162.241.3.25';
	$user = 'jdc_user';
	$pw = '&[N^u69gDcb0';
	$db = 'jdc_app';

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$db", $user, $pw);	
	}catch(Exception $e){
		echo $e->getMessage();
	}