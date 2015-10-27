<?php
  $this->load->view('partials/header.php');
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Welcome!</a>
    </div>
  </div>
</nav>
<div class="container">
<?php
  $this->load->view('partials/flash_messages.php');
?>
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<h1>Register</h1>
			<form action="/users/register" method="POST">
				<div class="form-group">
					<label>E-mail</label>
					<input type="email" class="form-control" name="email" placeholder="E-mail" required>
				</div>
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" placeholder="First Name" required>
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
				</div>
				<button class="btn btn-primary">Register</button>
			</form>
		</div>
		<div class="col-md-4 col-md-offset-1">
			<h1>Login</h1>
			<form action="/users/login" method="POST">
				<div class="form-group">
					<label>E-mail</label>
					<input type="email" class="form-control" name="email" placeholder="E-mail" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<button class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</div>
<?php
  $this->load->view('partials/footer.php');
?>