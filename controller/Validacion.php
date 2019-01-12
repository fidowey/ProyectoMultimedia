<?php 
	require_once 'model/bd.php';
	$user=$_POST[''];
	$pass=$_POST[''];

	ValidacionUsuario ($user ,$pass);
	session_start();
	$_SESSION['user']=$user;
	header("Location:#.html");
 ?>