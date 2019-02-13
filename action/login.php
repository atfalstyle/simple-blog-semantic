<?php
require_once('../config/config.php');
require_once('../config/helper.php');
session_start();
try 
{
	$username = htmlspecialchars(trim($_POST['username']));
	$password = htmlspecialchars(trim($_POST['password']));

  	$login = $conn->prepare("SELECT * FROM user WHERE username = ?");
  	$login->bindParam(1, $username);
  	$login->execute();
  	$cek  = $login->rowCount();

  	if ($cek > 0) {
    	while ($dt = $login->fetch(PDO::FETCH_OBJ)) {
      		$id   = $dt->id_user;
      		$pass = $dt->password;
    	}
    	if(!hash_verify($password, $pass)) {
      		header('location: ..?page=login');
      		$_SESSION['flashdata'] = "Password Salah";
    	} else {

        	$_SESSION['user'] = $id;
    	    header('location: ..?page=dashboard');
    	}
  	} else {
	    header('location: ..?page=login');
	    $_SESSION['flashdata'] = "Username Atau Password Salah";
  	}
  	return true;

} 
catch (PDOException $e) 
{
  	echo $e->getMessage();
  	return false;
}