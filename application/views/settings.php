<?php
@include('partials/nav_logged_in.php');
?>
		<div class="container">
			<div class="row">
			 	<!-- CHANGE INFORMATION -->
			    <form class="col m5 s12">
			    <h4 class="form_label">Change Information</h4>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="first_name" type="text" name="first_name" class="validate">
			          <label for="first_name">First Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" type="text" name="last_name" class="validate">
			          <label for="last_name">Last Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="email" type="email" name="email" class="validate">
			          <label for="email">Email</label>
			        </div>
			      </div>
			      <div class="row">
					<div>
					 	<a class="waves-effect waves-light btn amber accent-2 black-text right">Update</a>
					</div>
				  </div>
			    </form>
			    <!-- RESET PASSWORD -->
			    <form class="col m5 offset-m2 s12">
			      <h4 class="form_label">Reset Password</h4>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="email" name="email" class="validate">
			          <label for="password">New Password</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="confirm_password" type="password" name="password" class="validate">
			          <label for="confirm_password">Password</label>
			        </div>
			      </div>
			      <div class="row">
					<div>
					 	<a class="waves-effect waves-light btn amber accent-2 black-text right">Reset</a>
					</div>
				  </div>
			    </form>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</body>
</html>