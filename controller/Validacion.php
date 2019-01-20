<?php 
	require_once '../model/bd.php';
	$email=$_POST['email'];
	$password=$_POST['password'];

	login($email,$password);
	
 ?>