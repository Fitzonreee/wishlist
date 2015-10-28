<!DOCTYPE html>
<html>
	<head>
		<title>Wishlist - Product</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Raleway:200,100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>
	<body>
		<nav>
		    <div class="nav-wrapper">
		      <!-- needs responsive work -->
		      <a href="#" class="brand-logo center" id="logo"><i class="material-icons left hide-on-med-and-down" id="list_view">view_list</i>Wishlist</a>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li><a href="/wishlists/my_list">My List</a></li>
		        <li><a href="/main/friends">Friends</a></li>
		        <li><a href="#">Settings</a></li>
		        <li><a href="#">My Cart</a></li>
		      </ul>
		    </div>
		</nav>

		<div class="container">
	      <div class="row">
	      <h4 class="form_label">Your Wishlist</h4>
	      <?
	      	foreach($items as $item){ 
	      ?>
	      	<div class="col s12 m3">
	          <div class="card grey lighten-1">
	            <div class="card-content">
	              <img src="<?= $item['image_url']?>" width= 100%>
	            </div>
	            <div class="card-action">
	              <span class="black-text"><?= $item['name'] ?></span>
	              <a href="/wishlists/delete/<?= $item['product_id'] ?>"><i class="material-icons amber-text accent-2-text right">delete</i></a>
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