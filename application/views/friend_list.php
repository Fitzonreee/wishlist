<html>
	<head>
		<title>Wishlist</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Raleway:200,100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
	</head>
	<body>
<?php
@include('partials/nav_logged_in.php');
?>
		<div class="container">
  			<div class="row">
			<h4 class="form_label"><?= $item[count($item) - 1] ?>'s Wishlist</h4>
	      <?
	      for($i = 0; $i < count($item) - 1; $i ++){
	      	?>
	      	<div class="col s12 m3">
	          <div class="card grey lighten-1">
	            <div class="card-content">
	              <img src="<?= $item[$i]['image_url'] ?>" width= 100%>
	            </div>
	            <div class="card-action padding_bottom">
	              <a href="/main/info/<?= $item[$i]['product_id'] ?>"><span class="black-text title"><?= $item[$i]['name'] ?></span></a>
	              <a href="/wishlists/add_my_list/<?= $item[$i]['product_id'] ?>"><i class="material-icons amber-text accent-2-text right">add</i></a>
	              <!-- CHECKOUT BUTTON -->
					<form action = "/carts/add" method = "post">
						<div>
						  <input type = "hidden" name = "product_id" value = "<?= $item[$i]['product_id'] ?>">
	              	      <input type = "hidden" name = "recipient_id" value = "<?= $item[$i]['id'] ?>">
					 	  <button class="waves-effect waves-light btn amber accent-2 black-text center buy" type="submit" name="action"><i class="material-icons left black-text">payment</i>Buy Gift</button>
						</div>
					</form>
				</div>
	          </div>
	        </div>
	        <?
	      }
	      ?>

	      </div> <!-- end of row -->
		</div> <!-- end of container -->
	</body>
</html>