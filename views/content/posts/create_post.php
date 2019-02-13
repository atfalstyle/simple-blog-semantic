
<div class="ui main container"> 

	<h2 class="ui center aligned icon header">
	  <i class="circular edit icon"></i>
	  Create Post
	</h2>
	<?
      if(@$_SESSION['flashdata']) {
        echo "<div class='ui error message'>".$_SESSION['flashdata']."</div>";
        unset($_SESSION['flashdata']);
      }
    ?>
	<form class="ui form" enctype="multipart/form-data" id="create_post">
	  	<div class="field">
		    <label>Title</label>
		    <input type="hidden" name="id" value="<?= $_SESSION['user']; ?>">
		    <input type="text" name="title_add" placeholder="Input Title">
	  	</div>
	  	<div class="field">
		    <label>Your Article</label>
		    <textarea name="article_add" placeholder="Input Article"></textarea>
	  	</div>
	  	<div class="field">
			<label>Upload Image</label>
		    <div class="ui small basic icon buttons">
			  <input type="file" class="ui button" name="gbr_add">
			</div>
	  	</div>
	  	<div class="field">
		  	<div class="ui buttons">
			  <button type="reset" class="ui button">Reset</button>
			  <div class="or"></div>
			  <button type="submit" class="ui primary button">Publish</button>
			</div>
		</div>
	</form>
</div>