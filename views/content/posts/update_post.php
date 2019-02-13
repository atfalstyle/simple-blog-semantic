<div class="ui main container"> 

	<h2 class="ui center aligned icon header">
	  <i class="circular edit icon"></i>
	  Update Post
	</h2>
	<?
  		require_once('config/config.php');
		@$id = decrypt_id($_GET['id']);
		$views = $conn->prepare("SELECT * FROM post WHERE id_post = '$id'");
		$views->execute();
		$data = $views->fetch(PDO::FETCH_LAZY);
	?>
	
	<form class="ui form" enctype="multipart/form-data" id="update_post">
		<?
      if(@$_SESSION['flashdata']) {
        echo "<div class='ui error message'>".$_SESSION['flashdata']."</div>";
        unset($_SESSION['flashdata']);
      }
    ?>
	  	<div class="field">
		    <label>Title</label>
		    <input type="hidden" id="id_post" name="id_post" value="<?= encrypt_id($data->id_post); ?>">
		    <input type="hidden" id="id_user" name="id_user" value="<?= encrypt_id($data->id_user); ?>">
		    <input type="text" name="title_update" value="<?= $data->title; ?>" placeholder="Input Title">
	  	</div>
	  	<div class="field">
		    <label>Your Article</label>
		    <textarea name="article_update" placeholder="Input Article"><?= $data->post; ?></textarea>
	  	</div>
	  	<div class="field">
			<label>Upload Image</label>
			<img width="200" src="assets/image/post/<?= $data->gbr; ?>" >
			<br>
		    <div class="ui small basic icon buttons">
			  <input type="file" class="ui button" name="gbr_update">
			</div>

	  	</div>
	  	<div class="field">
		  	<div class="ui buttons">
			  <button type="reset" class="ui button">Reset</button>
			  <div class="or"></div>
			  <button type="submit" class="ui green button">Edit Post</button>
			</div>
		</div>
	</form>
</div>