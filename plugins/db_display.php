<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Svasthya Profile</title>
</head>
<body>
	<div class="container-fluid">

		<div class="row" id="main">
			<div class="col"></div>
			<div class="col rounded" id="form_wrapper">
				<div class="row jumbotron jumbotron-fluid" id="form_header">
					<h1 class="display-4">Profile</h1>
				</div>
				<div class="row" id="form_content">
					
					<?php
					    include("../includes/dbconfig.php");
						$ref= "profiledb/";
						$postdata=$database->getReference($ref)->getChild($_SESSION['username_id'])->getValue();
					?>
					    <ul>
						    <li><p>Username : <?php echo $postdata['r_username'];?></p></li>
							<li><p>Gender : <?php echo $postdata['p_gender'];?></p></li>
							<li><p>Age : <?php echo $postdata['p_age'];?></p></li>
							<li><p>Height : <?php echo $postdata['p_height'];?></p></li>
							<li><p>Weight : <?php echo $postdata['p_weight'];?></p></li>
							<li><p>Body Fat level : <?php echo $postdata['p_bfl'];?></p></li>
							<li><p>Sedentarylevel : <?php echo $postdata['p_sl'];?></p></li>
							<li><p>No.of meals : <?php echo $postdata['p_nm'];?></p></li>
							<li><p>Diet Type : <?php echo $postdata['p_dt'];?></p></li>
						</ul>
				
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

