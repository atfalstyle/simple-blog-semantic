<?
	// session_start();
	$page = $_GET['page'];

	switch ($page) {
		case '' :
			$page = include 'views/content/dashboard.php';
			break;
		case 'dashboard' :
			$page = include 'views/content/dashboard.php';
			break;
		case 'create_post' :
			$page = include 'views/content/posts/create_post.php';
			break;
		case 'update_post' :
			$page = include 'views/content/posts/update_post.php';
			break;
		case 'your_post' :
			$page = include 'views/content/posts/your_post.php';
			break;
		case 'detail_post':
			$page = include 'views/content/posts/detail_post.php';
			break;
		case 'detail_your_post':
			$page = include 'views/content/posts/detail_your_post.php';
			break;
		case 'login' :
			$page = include 'views/login.php';
			break;
		case 'logout' :
			$page = session_destroy();
			header("location: ?page=dashboard");
			break;
		case 'register' :
			$page = include 'views/register.php';
			break;
		case 'profile' :
			$page = include 'views/profile.php';
			break;
	}

?>