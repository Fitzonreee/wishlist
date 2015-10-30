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
				<div class="col s12 m8 offset-m2">
					<h4 class="form_label">Your Cart</h4>
					<div class="row">
				      <table class="striped">
					    <thead>
					      <tr>
					          <th data-field="id">Item</th>
							  <th data-field="recipient">Recipient</th>
					          <th data-field="price">Price</th>
					          <th data-field="remove">Remove</th>
					      </tr>
					    </thead>
						<tbody>
							<?
							foreach($items as $item){ 
							?>
								<tr>
									<td><?= $item['name'] ?></td>
									<td><?= $item['first_name']." ".$item['last_name'] ?></td>
									<td>$ <?= number_format($item['price'],2,'.',',') ?></td>
									<td><a href="/carts/remove/<?= $item['product_id'] ?>/<?= $item['recipient_id'] ?>"><i class="material-icons remove black-text">delete</i></a></td>
								</tr>
						<?
						}
						?>
					    </tbody>
					  </table>
					</div> <!-- end of row -->


					<div class="row">
				      <table class="striped">
					    <thead>
					      <tr>
					          <th data-field="id">Total:</th>
					      <?
					      	$sum = 0;
					        foreach($items as $item){
					          	$sum += $item['price'];
					      	}
					      ?>
					          <th data-field="price" id="total">$<?= number_format($sum,2,'.',',') ?></th>
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
				</div>
			</div>
		</div> <!-- end of container -->
	</body>
</html>