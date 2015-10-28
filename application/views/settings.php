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
		      <a href="#" class="brand-logo center" id="logo"><i class="material-icons left hide-on-med-and-down" id="list_view">view_list</i>Wishlist</a>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li><a href="#">My List</a></li>
		        <li><a href="#">Friends</a></li>
		        <li><a href="#">Settings</a></li>
		      </ul>
		    </div>
		</nav>
		<div class="container">
			<div class="row">
			 	<!-- EDIT INFO -->
			    <form class="col m5 s12">
			    <h4 class="form_label">Change Information</h4>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="username" type="email" class="validate">
			          <label for="username">Username</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="email" type="email" class="validate">
			          <label for="email">Email</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="password" class="validate">
			          <label for="password">Password</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="confirm_password" type="password" class="validate">
			          <label for="confirm_password">Confirm Password</label>
			        </div>
			      </div>
			    </form>
			    <!-- LOGIN -->
			    <!-- needs responsive work -->
			    <form class="col m5 offset-m2 s12">
			      <h4 class="form_label">Login</h4>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="login_username" type="email" class="validate">
			          <label for="login_username">Username</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="login_password" type="password" class="validate">
			          <label for="login_password">Password</label>
			        </div>
			      </div>
			    </form>
			</div> <!-- end of row -->
		</div> <!-- end of container -->

		
	</body>
</html>