<div class="ui main container"> 
  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui teal image header">
        <img src="assets/image/logo-icon.png" class="image">
        <div class="content">
          Log-in to your account
        </div>
      </h2>
      <?
          if(@$_SESSION['flashdata']) {
            echo "<div class='ui error message'>".$_SESSION['flashdata']."</div>";
            unset($_SESSION['flashdata']);
          }
        ?>
      <form action="action/login.php" method="POST" class="ui large form">
        
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="username" placeholder="Username">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="password" placeholder="Password">
            </div>
          </div>
          <button type="submit" class="ui fluid large teal submit button">Login</button>
        </div>

      </form>

      <div class="ui message">
        New to us? <a href="?page=register">Sign Up</a>
      </div>
    </div>
  </div>
</div>