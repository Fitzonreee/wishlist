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
		        <li><a href="#">My List</a></li>
		        <li class="active"><a href="#">Friends</a></li>
		        <li><a href="#">Settings</a></li>
		      </ul>
		    </div>
		</nav>
		<div class="container">
			<div class="row"  id="collection_top">
				<div class="col m6 offset-m3">
					<div class="input-field grey lighten-4">
			          <input class="grey lighten-4" id="search" type="search" required>
			          <label for="search"><i class="material-icons">search</i></label>
			        </div>
				</div>
			</div>
			<div class="row">
				<div class="col m6 offset-m3">
					<ul class="collection with-header">
				        <li class="collection-header center-align"><h4>Friends</h4></li>
				        <li class="collection-item"><div>Ryan<a href="#!" class="secondary-content"><i class="material-icons grey-text darken-4-text">view_list</i></a></div></li>
				        <li class="collection-item"><div>Jeff<a href="#!" class="secondary-content"><i class="material-icons grey-text">view_list</i></a></div></li>
				        <li class="collection-item"><div>Kevin<a href="#!" class="secondary-content"><i class="material-icons grey-text">view_list</i></a></div></li>
				        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons grey-text">view_list</i></a></div></li>
				    </ul>
				</div> <!--end of col m6 -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->

		
	</body>
</html>