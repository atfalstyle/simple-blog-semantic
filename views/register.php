<div class="ui main container"> 
  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui teal image header">
        <img src="assets/image/logo-icon.png" class="image">
        <div class="content">
          Register New Account
        </div>
      </h2>
      <form action="action/register.php" method="POST" enctype="multipart/form-data" class="ui large form">
        <div class="ui error message"></div>

        <div class="ui stacked segment">
        	<div class="field">
	            <div class="ui left icon input">
	              <i class="user icon"></i>
	              <input type="text" name="nama_add" required="required" placeholder="Nama Lengkap">
	            </div>
          	</div>
          	<div class="field">
	            <div class="ui left icon input">
	              <i class="user icon"></i>
	              <input type="email" name="email_add" required="required" placeholder="Email">
	            </div>
          	</div>
          	<div class="field">
	            <div class="ui left icon input">
	              <i class="user icon"></i>
	              <input type="text" name="username_add" required="required" placeholder="Username">
	            </div>
          	</div>
          	<div class="field">
	            <div class="ui left icon input">
	              <i class="lock icon"></i>
	              <input type="password" name="password_add" required="required" placeholder="Password">
	            </div>
          	</div>
          	<div class="field">
				<label>Upload Image</label>
			    <div class="ui left small basic icon buttons">
				  <input type="file" class="ui button" name="gbr_add">
				</div>
		  	</div>
          	<button type="submit" class="ui fluid large teal submit button">Register</button>
        </div>

      </form>

      <div class="ui message">
        Already Account ? <a href="?page=login">Sign in</a>
      </div>
    </div>
  </div>
</div>