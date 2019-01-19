<?php 
	require_once 'model/bd.php';
	$email=$_POST['email'];
	$password=$_POST['password'];

	ValidacionUsuario ($email ,$password);
	session_start();
	$_SESSION['user']=$user;
	header("Location:#.html");
 ?>