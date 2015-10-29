<!DOCTYPE html>

<html>
	<head>
		<title> </title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "  .css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
<?php
@include('partials/nav_logged_in.php');
?>
	    <div class="container">
		  <div class="row">
	        <div class="col s12 m8 offset-m2">
	        	<h4 class="form_label">Wait a tick!</h4>
	          	<h5 class="center-align">You already added this item to your list.</h5>
	          	<h6 class="center-align"><a href="#" class="waves-effect waves-light btn-large amber accent-2 black-text" >Back</a></h6>
	        </div>
	      </div>
		</div> <!-- end of container -->
	</body>
</html>

