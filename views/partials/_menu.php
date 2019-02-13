<?php
  require_once('config/config.php');

  $users = $conn->prepare("SELECT * FROM user WHERE id_user = '".@$_SESSION['user']."'");
  $users->execute();
  $user = $users->fetch(PDO::FETCH_LAZY);

?>
<div class="ui fixed link stackable menu">
	<div class="ui container">
    <a href="?page=dashboard" class="item">
      <img src="assets/image/logo-icon.png">
    </a>
    <a href="?page=dashboard" class="item">Home</a>
    
    <?php if(@$_SESSION['user']) { ?>
    <div class="ui pointing dropdown link item">
      Post <i class="dropdown icon"></i>
      <div class="menu">
        <a href="?page=your_post&id=<?= encrypt_id($user->id_user); ?>" class="item">Your Post</a>
        <a href="?page=create_post" class="item">Create Post</a>
      </div>
    </div>
    <?php } ?>
    <div class="right menu">
      
      <?php if(!@$_SESSION['user']) { ?>
    	<div class="item">
        <div class="ui buttons">
    		  <a href="?page=register" class="ui button"><i class="user icon"></i> Sign Up</a>
    		  <div class="or"></div>
    		  <a href="?page=login" class="ui primary button"><i class="sign-in icon"></i> Sign In</a>
  	    </div>
      </div>
      <?php } ?>
      <?php if(@$_SESSION['user']) { ?>
      <div class="ui pointing dropdown link item">
  	    <img src="assets/image/user/<?= $user->gbr; ?>"> <?=  $user->nama; ?>
  	    <div class="menu">
  	        <a href="?page=profile&id=<?= encrypt_id($user->id_user); ?>" class="item"><i class="user icon"></i> My Profile</a>
  	        <a href="?page=logout" class="item"><i class="sign-out icon"></i> Sign Out</a>
  	    </div>
  	  </div>
      <?php } ?>
  	<!-- <div class="item"></div> -->
    </div>
  </div>
</div>