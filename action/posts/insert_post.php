<?

# Page For Action Add Book
require_once('../../config/config.php');

$id_user 	= htmlspecialchars(trim($_POST['id']));
$title 		= htmlspecialchars(trim($_POST['title_add']));
$article 	= htmlspecialchars(trim($_POST['article_add']));

$nama_file = $_FILES['gbr_add']['name'];
$ukuran_file = $_FILES['gbr_add']['size'];
$tipe_file = $_FILES['gbr_add']['type'];
$tmp_file = $_FILES['gbr_add']['tmp_name'];

$path = "../../assets/image/post/".$nama_file;

if(!empty($title) and !empty($article)) {

	if($tipe_file == "image/jpeg" || $tipe_file == "image/png") {

	  	if($ukuran_file <= 1000000) {

		    if(move_uploaded_file($tmp_file, $path)) {

		      	$queryInsert = $conn->prepare("INSERT INTO post(id_user, title, post, gbr) VALUES(:id_user, :title, :article, :gbr)");
				$queryInsert->bindParam(":id_user", $id_user);
				$queryInsert->bindParam(":title", $title);
				$queryInsert->bindParam(":article", $article);
				$queryInsert->bindParam(":gbr", $nama_file);
				$queryInsert->execute();
		      
		      	if($queryInsert == true) {
				  echo "Success";
				} else {
				  echo "Failed!";
				}
		    } else {
		      $_SESSION['flashdata'] = "Maaf, Gambar gagal untuk diupload.";
		      header("location: ../../?page=create_post");
		    }
	  	} else {
		    
		    $_SESSION['flashdata'] = "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
		    header("location: ../../?page=create_post");  
	  	}
	}else{
	  
	  	$_SESSION['flashdata'] = "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
		header("location: ../../?page=create_post");  
	}
}
	