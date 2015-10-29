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
var_dump($products);
$rand = rand(0, count($products) - 1);
?>

		<div class="container">
		  <div class="row">
	        <div class="col s12 m8 offset-m2">
	        <h4 class="form_label">Add items to your wishlist!</h4>
	          <div class="card">
	          	<!-- size of area will change depending on the size of img-->
	            <div class="card-image">
	              <img src="<?= $products[$rand]['image_url'] ?>">
	            </div>
	            <div class="card-content">
	              <span class="card-title black-text"><?= $products[$rand]['name'] ?></span>
	              <p><?= $products[$rand]['description'] ?></p>
	            </div>
	              <div class="card-action grey lighten-1">
	               <button class="btn waves-effect waves-light grey darken-3 amber-text accent-2-text" type="submit" name="action">Add to My List
				    <i class="material-icons right">add</i>
				  </button>
	       		  <button class="btn waves-effect waves-light grey darken-3 amber-text accent-2-text right" type="submit" name="action">Next
				  </button>
	            </div>
	          </div>
	        </div>
	      </div>
		</div> <!-- end of container -->
	</body>
</html>