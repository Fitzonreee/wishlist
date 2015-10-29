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
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>
	<body>
		<nav>
		    <div class="nav-wrapper">
		      <!-- needs responsive work -->
		      <a href="#" class="brand-logo center" id="logo"><i class="material-icons left hide-on-med-and-down" id="list_view">view_list</i>Wishlist</a>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li><a href="#">My List</a></li>
		        <li><a href="#">Friends</a></li>
		        <li><a href="#">Settings</a></li>
		      </ul>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="#"><i class="material-icons">shopping_cart</i></a></li>
		        <li><a href="#">Log Out</a></li>
		      </ul>
		    </div>
		</nav>
		<div class="container">
		  <div class="row">
	        <div class="col s12 m8 offset-m2">
	        <h4 class="form_label">Your Cart</h4>
	        	<div class="row">
    		      <table class="striped">
				    <thead>
				      <tr>
				          <th data-field="id">Item</th>
				          <th data-field="quantity">Quantity</th>
				          <th data-field="price">Price</th>
				          <th data-field="remove">Remove</th>
				      </tr>
				    </thead>
					<tbody>
				      <tr>
				        <td>Scooter</td>
				        <td>6</td>
				        <td>$400.87</td>
				        <td><a href="#"><i class="material-icons remove black-text">delete</i></a></td>
				      </tr>
				      <tr>
				        <td>Beats by Dre</td>
				        <td>4</td>
				        <td>$39.76</td>
				        <td><a href="#"><i class="material-icons remove black-text">delete</i></a></td>
				      </tr>
				      <tr>
				        <td>Toyota Rav 4</td>
				        <td>1</td>
				        <td>$37,000.00</td>
				        <td><a href="#"><i class="material-icons remove black-text">delete</i></a></td>
				      </tr>
				    </tbody>
				  </table>
	        	</div> <!-- end of row -->

				<div class="row">
    		      <table class="striped">
				    <thead>
				      <tr>
				          <th data-field="id">Total:</th>
				          <th data-field="price" id="total">$899.99</th>
				      </tr>
				    </thead>
				  </table>
	        	</div> <!-- end of row -->

	        	<div class="row">
	        	<form action="/billing/bill_user" method="POST" class="right">
		          <script
		            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		            data-key="pk_test_m7JCy0kSf4lkc0AghLPzwJp6"
		            data-image="/img/documentation/checkout/marketplace.png"
		            data-name="Demo Site"
		            data-description="2 widgets"
		            data-amount="2000"
		            data-locale="auto"
		            data-billing-address="true">
		          </script>
		        </form>
	        	</div> <!-- end of row -->
	        	
	        	<div class="row">
	        	<!-- CHECKOUT BUTTON -->
					<!-- <form>
						<div>
					 	  <button class="waves-effect waves-light btn amber accent-2 black-text center right" type="submit" name="action">Checkout</button>
						</div>
					</form> -->
				</div>
	     	</div>
	      </div>
		</div> <!-- end of container -->
	</body>
</html>