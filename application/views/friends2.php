<!DOCTYPE html>
<html>
	<head>
		<title> </title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "  .css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<p>Jim:</p>
		<form  action = '/products'>
			<button class = 'add <?= $product['id'] ?>' type="submit" class="btn btn-success">View WishList</button>
			<input type = 'hidden' name = 'id' value = '1'>
		</form>
	</body>
</html>