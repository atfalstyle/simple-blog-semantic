<?
  require_once('config/config.php');

  @$id = decrypt_id($_GET['id']);
  $views = $conn->prepare("SELECT * FROM post WHERE id_user = $id");
  $views->execute();
?>
<div class="ui main container"> 
    <h2 class="ui center aligned icon header">
      <i class="circular bullhorn icon"></i>
      Your Post 
    </h2>
<!--     <div class="ui search">
      <div class="ui icon input">
        <input class="prompt" id="src_y" type="text" placeholder="Search Post...">
        <i class="search icon"></i>
      </div>
      <div class="results"></div>
    </div> -->
    <br>
    <div class="ui four special doubling stackable cards" id="load"></div>
    <div class="ui four special doubling stackable cards" id="your_post">
    	<? 
    	if ($views->rowCount() <= 0) {
		    echo '<h2 class="ui center aligned icon header">Sorry Post Empty :(</h2>';
		} else {
    		while ($data = $views->fetch(PDO::FETCH_LAZY)) { ?>
    	<div class="card">
		  <div class="blurring dimmable image">
		    <div class="ui dimmer">
		      <div class="content">
		        <div class="center">
		          <a href="?page=detail_your_post&id=<?= encrypt_id($data->id_post); ?>" class="ui inverted button">View Post</a>
		        </div>
		      </div>
		    </div>
		    <img src="assets/image/post/<?= $data->gbr; ?>">
		  </div>
		  <div class="content">
		    <a href="?page=detail_post&id=<?= encrypt_id($data->id_post); ?>" class="header"><?= $data->title; ?></a>
		    <div class="meta">
		      <span class="date"></span>Created At <?= indonesian_date($data->created_at); ?>
		    </div>
		    <div class="description"><?= substr($data->post, 0, 130); ?></div>
		  </div>
		  <div class="extra content">
		    <a>
		      <i class="comments icon"></i>
		      <?
		        $id_posts = $data->id_post; 
		        $comments = $conn->prepare("SELECT * FROM comment WHERE id_post = $id_posts");
		        $comments->execute();
		        echo $comments->rowCount().' Comments';
		      ?>
		    </a>
		  </div>
		</div>
		<? } } ?>
    </div>
</div>
<br>
<br>
<br>
<!-- <script src="assets/js/jqueryslim.min.js"></script> -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$('.special.cards .image').dimmer({
	  		on: 'hover'
		});
		$("#your_post").hide();

		$("#load").load("views/loaders/loader_post.php");

		setTimeout(function() {

			$("#load").fadeOut();
			$("#your_post").show().fadeIn();
		}, 3000);
	});

	$("#src_y").autocomplete({
			source: "action/search/search_ajax	.php",
			select: function( event, ui ) {
				window.location.href = '?page=detail_post&id='+ui.item.id;
			}
		});
</script>