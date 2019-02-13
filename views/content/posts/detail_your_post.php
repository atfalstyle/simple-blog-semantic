
<div class="ui main text container">	

	<h2 class="ui center aligned icon header">
	  <i class="circular bullhorn icon"></i>
	  Detail Your Post
	</h2>
	<div id="load"></div>
	<div class="ui items" id="your_post">
		<div >
			<?
			  	require_once('config/config.php');
			  
			  	try 
			  	{
			    	@$id = decrypt_id($_GET['id']);

			  		$views = $conn->prepare("SELECT * FROM post WHERE id_post = ?");
			  		$views->bindParam(1, $id);
			  		$views->execute();
			  	} catch (PDOException $e) {
			  		echo $e->getMessage();
			  	}

			  	$data = $views->fetch(PDO::FETCH_LAZY);

			  	$id_posts = $data->id_post;	
			  	$id_user = $data->id_user;

		        $comments = $conn->prepare("SELECT * FROM comment WHERE id_post = $id_posts");
		        $comments->execute();
		        // $comment = $comments->fetch(PDO::FETCH_LAZY);

		        $users = $conn->prepare("SELECT * FROM user WHERE id_user = $id_user");
		        $users->execute();
		        $user = $users->fetch(PDO::FETCH_LAZY);

		        if ($views->rowCount() <= 0) {
		        	echo '<h2 class="ui center aligned icon header">Sorry Post Empty :(</h2>';
		        } else {

			?>
			<img class="ui avatar image" src="assets/image/user/<?= $user->gbr; ?>">
			<span><b>Di Posting Oleh</b> <?php if($user->id_user == @$_SESSION['user']) { echo "Anda"; } else { echo $user->nama; } ?></span>
				<br>

				<h2><?= $data->title; ?></h2>
				<span>Pada Tanggal <?= indonesian_date($data->created_at); ?></span>
				<br>
				<br>
				<a href="?page=update_post&id=<?= encrypt_id($data->id_post); ?>" class="ui inverted button green">Edit Post</a>
				<a href="#" data-id="<?= encrypt_id($data->id_post); ?>" data-idUser="<?= encrypt_id($_SESSION['user']); ?>" id="delete" class="ui right aligned inverted button red">Delete Post</a>
				<br>
				<br>
				<center><img width="700" src="assets/image/post/<?= $data->gbr; ?>" class="fluid image"></center>
			<div class="item">
			    <div class="content">
			      <div class="description">
			      	<br>
			        <p><?= $data->post; ?></p>
			      </div>
			      <div class="extra">
			      	<br>
			        <i class="comment icon"></i>
			        <?= $comments->rowCount().' Comments'; ?>
			      </div>
			    </div>
			</div>

			<?php } ?>

			<div class="ui threaded comments">
			  <h3 class="ui dividing header">Comments</h3>
			  	<?php
				    if($comments->rowCount() <= 0) {
				        echo "<br><b>Belum Ada Komentar</b>";
				    } else {
				        while($comment = $comments->fetch(PDO::FETCH_LAZY)) {
				        	$id_usr = $comment->id_user;
				    		$user_comments = $conn->prepare("SELECT * FROM user WHERE id_user = $id_usr");
				        	$user_comments->execute();
				        	$user_comment = $user_comments->fetch(PDO::FETCH_LAZY)
				?>
			  	<div class="comment">
				    <a class="avatar">
				      <img src="assets/image/user/<?= $user_comment->gbr; ?>">
				    </a>
				    <div class="content">
				      <a class="author"><?= $user_comment->nama; ?></a>
				      <div class="metadata">
				        <span class="date">Tanggal <?= $comment->created_at; ?></span>
				      </div>
				      <div class="text">
				      	<?= $comment->comment; ?>
				      </div>
				    </div>
			  	</div>
				<?php } } ?>
				  <!-- <form class="ui reply form">
				    <div class="field">
				      <textarea></textarea>
				    </div>
				    <div class="ui blue labeled submit icon button">
				      <i class="icon edit"></i> Add Comment
				    </div>
				  </form> -->
			</div>
		</div>
	</div>
</div>
<br>
<br>
<script src="assets/js/jqueryslim.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#your_post").hide();

		$("#load").load("views/loaders/loader_detail_post.php");

		setTimeout(function() {

			$("#load").fadeOut();
			$("#your_post").show().fadeIn();
		}, 3000);
	});
</script>