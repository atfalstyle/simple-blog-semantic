<?

# Page For Action Add Book
require_once('../../config/config.php');

$id_user 	= htmlspecialchars(trim(decrypt_id($_POST['id_user'])));
$id_post 	= htmlspecialchars(trim(decrypt_id($_POST['id_post'])));
// $id_posts 	= htmlspecialchars(trim($_POST['id_post']));
$title 		= htmlspecialchars(trim($_POST['title_update']));
$article 	= htmlspecialchars(trim($_POST['article_update']));

$nama_file = $_FILES['gbr_update']['name'];
$ukuran_file = $_FILES['gbr_update']['size'];
$tipe_file = $_FILES['gbr_update']['type'];
$tmp_file = $_FILES['gbr_update']['tmp_name'];

$path = "../../assets/image/post/".$nama_file;

if(!empty($title) and !empty($article)) {

	if($tipe_file == "image/jpeg" || $tipe_file == "image/png") {

	  	if($ukuran_file <= 1000000) {

		    if(move_uploaded_file($tmp_file, $path)) {
		    	$stmt = $conn->prepare("SELECT * FROM post WHERE id_post = :id_post");
		    	$stmt->bindParam(":id_post", $id_post);
		    	$stmt->execute();
		    	$gbr_awal = $stmt->fetch(PDO::FETCH_LAZY)->gbr;
				unlink("../../assets/image/post/".$gbr_awal);

		      	$queryInsert = $conn->prepare("UPDATE post SET id_user = :id_user, title = :title, post = :article, gbr = :gbr WHERE id_post = :id_post");
				$queryInsert->bindParam(":id_user", $id_user);
				$queryInsert->bindParam(":title", $title);
				$queryInsert->bindParam(":article", $article);
				$queryInsert->bindParam(":gbr", $nama_file);
				$queryInsert->bindParam(":id_post", $id_post);
				$queryInsert->execute();
		      
		      	if($queryInsert == true) {
				  echo "Success";
				} else {
				  echo "Failed!";
				}
		    } else {
		      	$_SESSION['flashdata'] = "Maaf, Gambar gagal untuk diupload.";
		      	// header("location: ../../?page=update_post");
		      
		    }
	  	} else {
		    
		    $_SESSION['flashdata'] = "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
		    // header("location: ../../?page=update_post&id=".$id_posts."");  
	  	}
	}else{
	  
	  	$_SESSION['flashdata'] = "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
		// header("location: ../../?page=update_post&id=".$id_posts."");  
	}
}
	