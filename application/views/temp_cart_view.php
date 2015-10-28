<!DOCTYPE html>
<html>
	<head>
		<title> </title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "  .css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?
				foreach($items as $item){ 
					var_dump($item);
					?>
					<form action = '/carts/remove'>
						<button id = <?= $item['id'] ?>' type="submit" class="btn btn-success">Remove</button>
						<input type = 'hidden' name = 'id' value = "<?= $item['product_id'] ?>">
					</form>
			<?
				}
			?>

			<form action = '/products'>
				<button type="submit" class="btn btn-success">Back to wishlists</button>
			</form>	
	</body>
</html>