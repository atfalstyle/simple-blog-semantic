<?php

# Page For Action Add Book
require_once('../../config/config.php');
$id_user = htmlspecialchars(trim($_POST['id_user']));
$id_post = htmlspecialchars(trim($_POST['id_post']));
$comment = htmlspecialchars(trim($_POST['comment']));
// $kategori = trim($_POST['kategori']);

if(!empty($id_user) and !empty($id_post) and !empty($comment)){
	$queryInsert = $conn->prepare("INSERT INTO comment(id_user, id_post, comment) VALUES(:id_user, :id_post, :comment)");
	$queryInsert->bindParam(":id_user", $id_user);
	$queryInsert->bindParam(":id_post", $id_post);
	$queryInsert->bindParam(":comment", $comment);
	$queryInsert->execute();
	if($queryInsert) {
	  echo "Success";
	  header("location: ../../?page=detail_post&id=".encrypt_id($id_post)."");
	} else {
	  echo "Failed!";
	}
}
	