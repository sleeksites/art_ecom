<!DOCTYPE html>
<html>
<head>
	<title>Input Page</title>
</head>
<body>
	<form method="post" action="save_data.php" enctype="multipart/form-data">
		<input type="text" name="seller_name" placeholder="Enter Name" required>
		<input type="file" name="sell_item" required>
		<button>Submit</button>
	</form>
</body>
</html>