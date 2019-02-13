
<!DOCTYPE html>
<html>
<head>
	<title>Simple Blog</title>
	<? require_once('views/partials/_header.php'); ?>
</head>
<body>
	<? require_once('views/partials/_menu.php'); ?>
	
	<? include 'yield.php'; ?>

</body>
<? require_once('views/partials/_footer.php'); ?>
</html>
