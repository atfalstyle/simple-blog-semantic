<div class="ui main container"> 

    <h2 class="ui center aligned icon header">
      <i class="circular bullhorn icon"></i>
      Post 
    </h2>
    <div class="ui search">
      <form class="ui icon input" method="POST">
        <input class="prompt src" type="text" id="src" placeholder="Search Post...">
        <i class="search icon"></i>
      </form>
      <div class="result auto-widget"></div>
    </div>
    <br>
    <div class="ui four special doubling stackable cards" id="post"></div>
</div>
<br>
<br>
<br>
<script src="assets/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
  $("#src").autocomplete({
      source: "action/search/search.php",
      select: function( event, ui ) {
        window.location.href = '?page=detail_post&id='+ui.item.id;
      }
  });
</script>