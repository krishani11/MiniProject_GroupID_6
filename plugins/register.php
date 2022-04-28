
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src="register_script.js"></script>
	<title>Sign Up</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row" id="main">
			<div class="col"></div>
			<div class="col rounded" id="form_wrapper">
				<div class="row jumbotron jumbotron-fluid" id="form_header">
					<h1 class="display-4">Sign Up</h1>
				</div>
				<div class="row" id="form_content">

					<form name="r_form" action="app.php" method="post">
						<label for="r_username">Username</label><br>
						<input type="text" id="r_username" name="r_username" placeholder="Only letters" required/><br><br>

						<label for="r_emailid">Email address</label><br>
						<input type="email" id="r_emailid" name="r_emailid" placeholder="Enter mailId" required/><br><br>

						<label for="r_password">Password</label><br>
						<input type="password" id="r_password" name="r_password" palceholder=">=6 and <=10 chars"required/><br><br>

						<label for="r_cpassword">Confirm Password</label><br>
						<input type="password" id="r_cpassword" name="r_cpassword" required/><br><br><br>

						<input type="submit" class="btn btn-lg" value="Sign Up" id="signup" name="signup"/><br><br>

						<p>Already a member?
						<a href="login.php">Sign In</a></p>
					</form>
				</div>
			</div>
			<div class="col"></div>
		</div>
		<br><br>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>