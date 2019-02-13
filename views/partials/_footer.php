<script src="assets/js/jqueryslim.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/semantic.min.js"></script>
<script src="assets/js/sweetalert.js"></script>
<script src="assets/js/ajax.js"></script>
<script>	


	var content = 'http://localhost/keamanan_data/action/search/search.php?q=';


	$(document).ready(function() {
		$("#post").load("views/loaders/loader_post.php");

		$('.ui.dropdown').dropdown({
			on : 'hover'
		});

		setTimeout(function() {
			$("#post").load("views/content/posts/content/c_post.php").transition("fade in");
		}, 3000);
	});
</script>