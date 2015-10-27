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
				<h4 class="form_label" id="margin_bottom">Preferences</h4>
			</div>
			<div class="row">
					
					<form action="#">
						<div class="col m3 offset-m2">
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
						 </div>

						 <div class="col m3">
							<p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_6" />
						      <label for="filled-in-box_6">Books</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_7" />
						      <label for="filled-in-box_7">Sports</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_8" />
						      <label for="filled-in-box_8">Tech</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_9" />
						      <label for="filled-in-box_9">Video Games</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_10" />
						      <label for="filled-in-box_10">Puzzles</label>
						    </p>
						 </div>

						 <div class="col m3">
							<p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_11" />
						      <label for="filled-in-box_11">Toys</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_12" />
						      <label for="filled-in-box_12">Fitness</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_13" />
						      <label for="filled-in-box_13">Outdoors</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_14" />
						      <label for="filled-in-box_14">Fashion</label>
						    </p>
						    <p>
						      <input type="checkbox" class="filled-in" id="filled-in-box_15" />
						      <label for="filled-in-box_15">Art</label>
						    </p>
						 </div>
					</form>
				</div> <!-- end of row -->

				
			 	
			 	<!-- BILLING INFORMATION -->
				<div class="row">
				 	<div class="col m5">
				 	<h4 class="form_label">Billing Information</h4>
					    <form>
					      <div class="row">
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
					          <input id="address" type="text" class="validate">
					          <label for="address">Address</label>
					        </div>
					      </div>
					      
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="city" type="text" class="validate">
					          <label for="city">City</label>
					        </div>
					        <div class="input-field col s6">
					          <input id="state" type="text" class="validate">
					          <label for="state">State</label>
					        </div>
					      </div>
					      
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="zip" type="text" class="validate">
					          <label for="zip">Zip Code</label>
					        </div>
					      </div>
					    </form>
				    </div> <!-- end of col m5 -->

				    <div class="col m5 offset-m2">
				 	<h4 class="form_label">Shipping Information</h4>
					    <form>
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="first_name_ship" type="text" class="validate">
					          <label for="first_name_ship">First Name</label>
					        </div>
					        <div class="input-field col s6">
					          <input id="last_name_ship" type="text" class="validate">
					          <label for="last_name_ship">Last Name</label>
					        </div>
					      </div>
					      
					      <div class="row">
					        <div class="input-field col s12">
					          <input id="address_ship" type="text" class="validate">
					          <label for="address_ship">Address</label>
					        </div>
					      </div>
					      
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="city_ship" type="text" class="validate">
					          <label for="city_ship">City</label>
					        </div>
					        <div class="input-field col s6">
					          <input id="state_ship" type="text" class="validate">
					          <label for="state_ship">State</label>
					        </div>
					      </div>
					      
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="zip_ship" type="text" class="validate">
					          <label for="zip_ship">Zip Code</label>
					        </div>
					      </div>

					      <div class="row">
					        <div class="input-field col s12">
					          <input type="checkbox" class="filled-in" id="same" />
						      <label for="same">Same as billing information</label>
					        </div>
					      </div>
					    </form>
				    </div> <!-- end of col m5 -->
			</div> <!-- end of row -->
			<div class="row">
				<div class="col m2 offset-m5">
				 	<a class="waves-effect waves-light btn amber accent-2 black-text">Submit</a>
				</div>
			</div>
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