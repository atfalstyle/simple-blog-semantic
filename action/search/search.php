<?php
error_reporting (E_ALL ^ E_NOTICE);
require_once('../../config/config.php');
// @$search = trim($_POST['cari']);
if(isset($_GET['term'])) {
	try 
	{	
		$result = [];
		$views = $conn->prepare("SELECT * FROM post WHERE title LIKE '%".$_GET['term']."%'");
		$views->execute();
		if($views->rowCount() > 0) {
			while ($row = $views->fetch()) {
		        $result[] = [ 
		        	'value' => $row['title'],
		        	'id'	=> encrypt_id($row['id_post'])
		        ];
			}
		}

	} catch(PDOException $e) {
		echo $e->getMessage();
	}
	echo json_encode($result);
}
