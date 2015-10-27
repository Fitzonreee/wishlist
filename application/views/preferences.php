<!DOCTYPE html>
<html>
	<head>
		<title>Wishlist - Preferences</title>
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
		      <a href="#" class="brand-logo center" id="logo"><i class="material-icons hide-on-med-and-down" id="list_view">view_list</i>Wishlist</a>
		    </div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col m5">
					<h4 class="form_label">Preferences</h4>
					<form action="#" class="center-align offset-m2">
					    <p>
					      <input type="checkbox" class="filled-in" id="filled-in-box_1" />
					      <label for="filled-in-box_1">Arts and Crafts</label>
					    </p>
					    <p>
					      <input type="checkbox" class="filled-in" id="filled-in-box_2" />
					      <label for="filled-in-box_2">Sports</label>
					    </p>
					    <p>
					      <input type="checkbox" class="filled-in" id="filled-in-box_3" />
					      <label for="filled-in-box_3">Tech</label>
					    </p>
					    <p>
					      <input type="checkbox" class="filled-in" id="filled-in-box_4" />
					      <label for="filled-in-box_4">Clothing</label>
					    </p>
					    <p>
					      <input type="checkbox" class="filled-in" id="filled-in-box_5" />
					      <label for="filled-in-box_5">Appliances</label>
					    </p>
					 </form>
				</div>
			 	<!-- BILLING INFORMATION -->
			    <form class="col m5 offset-m2">
			      <div class="row">
			        <h4 class="form_label">Billing Information</h4>
			        
			        <div class="input-field col s6">
			          <input id="first_name" type="text" class="validate">
			          <label for="first_name">First Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Last Name</label>
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
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</body>
</html>