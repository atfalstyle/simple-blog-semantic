<?
  require_once('../../../../config/config.php');

  $views = $conn->prepare("SELECT * FROM post ORDER BY created_at DESC");
  $views->execute();
  if ($views->rowCount() <= 0) {
    echo '<h2 class="ui center aligned icon header">Sorry Post Empty :(</h2>';
  } else {
  while ($data = $views->fetch(PDO::FETCH_LAZY)) {
?>
<div class="card">
  <div class="blurring dimmable image">
    <div class="ui dimmer">
      <div class="content">
        <div class="center">
          <a href="?page=detail_post&id=<?= encrypt_id($data->id_post); ?>" class="ui inverted button">View Post</a>
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
    <div class="description"><?= substr($data->post, 0, 130); ?><br></div>
  </div>
  <div class="extra content">
    <a>
      <i class="comments icon"></i>
      <?php
        $id_posts = $data->id_post; 
        $comments = $conn->prepare("SELECT * FROM comment WHERE id_post = $id_posts");
        $comments->execute();
        echo $comments->rowCount().' Comments';
      ?>
    </a>
  </div>
</div>
<?php } } ?>
<script type="text/javascript">
	$('.special.cards .image').dimmer({
  		on: 'hover'
	});
</script>