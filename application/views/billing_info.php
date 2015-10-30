<!DOCTYPE html>
<html>
	<head>
		<title>Wishlist - Billing Info</title>
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
		<button id="customButton">Purchase</button>

		<script src="https://checkout.stripe.com/checkout.js"></script>
		<script>
		  var handler = StripeCheckout.configure({
		    key: 'pk_test_m7JCy0kSf4lkc0AghLPzwJp6',
		    image: '',
		    locale: 'auto',
		    token: function(token) {
		      // Use the token to create the charge with a server-side script.
		      // You can access the token ID with `token.id`
		      $.post("/billing/bill_user", token, function(res) {
		      	console.log(token.id);
		      });
		    }
		  });

		  $('#customButton').on('click', function(e) {
		    handler.open({
		      name: 'Wishlist',
		      description: 'Product',//insert php here
		      amount: 2000 //here too
		    });
		    e.preventDefault();
		  });

		  $(window).on('popstate', function() {
		    handler.close();
		  });
		</script>

		
	</body>
</html>