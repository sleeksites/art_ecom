<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>The <?php echo $_SESSION['title'] ?> was added</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<br>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1><?php echo $_SESSION['title'] ?> was added</h1>
		</div>
		<a href="data_form.php"><button>Go Back to Data Form</button></a>
		<img src=" <?php echo $_SESSION['image'] ?> " style="width:50%;margin:auto;text-align:center;">
	</div>
</body>
</html>