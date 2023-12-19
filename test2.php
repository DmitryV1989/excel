<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="post" name="form">
		<input type="text" name="test[1][name]">
		<input type="text" name="test[2][name]">
		<input type="text" name="test[1][status]">	
		<input type="text" name="test[2][status]">	
		<input type="submit">
	</form>
	<pre><?
	print_r($_POST);
	?>
</body>
</html>