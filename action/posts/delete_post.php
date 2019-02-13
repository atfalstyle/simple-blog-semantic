<?
 	if(isset($_GET['id'])){
 		include('../../config/config.php');
 		$id = htmlspecialchars(trim(decrypt_id($_GET['id'])));
 		$query = $conn->prepare("DELETE FROM post WHERE id_post = :id_post");
 		$query->bindParam(":id_post", $id);
 		$query->execute();
 		if($query) {
    		echo "Success";
   	} else {
    	echo "Failed!";
    } 
	}	