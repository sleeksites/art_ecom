<!DOCTYPE html>
<html>
<head>
	<title>Input Page</title>
</head>
<body>
	<form method="post" action="save_data.php" enctype="multipart/form-data">
		<input type="text" name="seller_name" placeholder="Enter Name" required>
		<select name="category">
			<option selected disabled>Chose a category</option>
			<option value="abstract">Abstract</option>
			<option value="modern">Modern Art</option>
			<option value="cubism">Cubism</option>
			<option value="expressionism">Expressionism</option>
		</select>
		<input type="file" name="sell_item" required>
		<button>Submit</button>
	</form>
</body>
</html>