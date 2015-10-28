<!DOCTYPE html>
<html>
	<head>
		<title>Wishlist - Home</title>
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
		      <a href="#" class="brand-logo center" id="logo"><i class="material-icons" id="list_view">view_list</i>Wishlist</a>
		    </div>
		</nav>
		<div class="container">
			<div class="row">
			 	<!-- REGISTRATION -->
			    <form class="col m5 s12">
			    <h4 class="form_label">Register</h4>
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

		<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"></h5>
              </div>
      		</div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2015 Copyright 
            </div>
          </div>
        </footer>
	</body>
</html>