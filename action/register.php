<?php

# Page For Action Add Book
require_once('../config/config.php');
require_once('../config/helper.php');

$nama = trim($_POST['nama_add']);
$email = trim($_POST['email_add']);
$username = trim($_POST['username_add']);
$password = hash_string(trim($_POST['password_add']));

$nama_file = $_FILES['gbr_add']['name'];
$ukuran_file = $_FILES['gbr_add']['size'];
$tipe_file = $_FILES['gbr_add']['type'];
$tmp_file = $_FILES['gbr_add']['tmp_name'];

$path = "../assets/image/user/".$nama_file;

if(!empty($nama) and !empty($email)) {

	if($tipe_file == "image/jpeg" || $tipe_file == "image/png") {

	  	if($ukuran_file <= 1000000) {

		    if(move_uploaded_file($tmp_file, $path)) {

		      	$queryInsert = $conn->prepare("INSERT INTO user(nama, email, username, password, gbr) VALUES(:nama, :email, :username, :password, :gbr)");
				$queryInsert->bindParam(":nama", $nama);
				$queryInsert->bindParam(":email", $email);
				$queryInsert->bindParam(":username", $username);
				$queryInsert->bindParam(":password", $password);
				$queryInsert->bindParam(":gbr", $nama_file);
				$queryInsert->execute();
		      
		      	if($queryInsert == true) {
				  echo "Success";
				  header("location: ../?page=login");
				} else {
				  echo "Failed!";
				}
		    } else {
		      
		      echo "Maaf, Gambar gagal untuk diupload.";
		    }
	  	} else {
		    
		    echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
	  	}
	}else{
	  
	  echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
	}
}
	