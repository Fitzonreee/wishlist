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
		<script>
			$(document).ready(function(){
				$(document).on('click','img',function(){
					alert('hello');
				})

				// $('img').hover(function(){
				// 	$('.'+ $(this).attr('class')).show();
				// }, function(){
				// 	$('.add, .buy, .info').hide();
				// })
				
				})
		</script>
		<style>
			img{
				display: inline-block;
				border: 2px solid black;
				width: 200px;
				height: 200px;
			}
			#items{
				display: inline-block;
				margin-left: 50px;
				margin-bottom: 300px;
			}
			.add, .buy, .info{
				height: 30px;
				width : 150px;
				margin-left: 25px;
				position: absolute;
				/*display: none;*/

			}
			.add{
				margin-top: 50px;
			}
			.info{
				margin-top: 100px;
				
			}
		</style>

	</head>
	<body>
		<div id = 'products'>
			<?
				foreach($products as $product){ ?>
				<div id = 'items'>
					<img class = '<?= $product['id'] ?>' src = '<?= $product['image_url'] ?>'>
					<form  action = '/wishlists'>
						<button class = 'add <?= $product['id'] ?>' type="submit" class="btn btn-success">Add to my WishList</button>
						<input type = 'hidden' name = 'id' value = '<?= $product['id'] ?>'>
					</form>
					<form action = '/carts'>
						<button class = 'buy <?= $product['id'] ?>' type="submit" class="btn btn-success">Buy for Friend!</button>
						<input type = 'hidden' name = 'id' value = '<?= $product['id'] ?>'>
					</form>
					<form action = '/products/info'>
						<button class = 'info <?= $product['id'] ?>' type="submit" class="btn btn-success">View Product</button>
						<input type = 'hidden' name = 'id' value = '<?= $product['id'] ?>'>
					</form>
				</div>
			<?
				}
			?>	
			</div>
	</body>
</html>


