<?php
// Start the session
session_start();
//include("../plugins/initial_choice.php");
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="index_style.css">
	<title>Svasthya</title>

</head>
<body>
	<div class="container-fluid">
		<div class="row" id="hm_navbar">
			<h5>
			<p>
			Hello,
			<?php
			    echo $_SESSION['r_username'];
			?>	

			</p></h5>
			<div class="col-12">
			<ul class="nav justify-content-end" >
			  <li class="nav-item">
			    <a class="nav-link active" href="logout.php">Logout</a>
			  </li>	
			  <li class="nav-item">
			    <a class="nav-link active" href="db_display.php">Profile</a>
			  </li>			  
			</ul>
			</div>
		</div>
			<div class="row" >
			<div class="col-12 jumbotron jumbotron-fluid" id="hm_c_display_bar">
			  <div class="container">
			    <h5 class="display-4">Your ideal calorie intake per day is <p> <?php echo $_SESSION['cal_intake']?></p></h5>
			    <p id="hm_c_intake _display"></p>
			  </div>
			</div>
		</div>
		<div class="row" >
			
		</div>		
		<div class="row" id="main">
			<div class="col"></div>
			<div class="col rounded" id="form_wrapper">
				<div class="row jumbotron jumbotron-fluid" id="form_header">
				<h1 class="display-4">Dashboard</h1>
				</div>
				<div class="row" id="form_content">
					<form>
                        <p> 
                            <?php 
                                $array=explode(',',$_SESSION['derived_items']);
                                if(sizeof($array)==3)
                                {

                            ?>
                                <ul>
                                    <li><p>Breakfast : <?php echo $array[0];?></p></li>
                                    <li><p>Lunch     :<?php echo $array[1];?></p></li>
                                    <li><p>Dinner    :<?php echo $array[2];?></p></li>
                                </ul>
                               <?php
                                }
                                elseif(sizeof($array)==4)
                                {
                               ?>
                               <ul>
                                    <li><p>Breakfast :<?php echo $array[0];?></p></li>
                                    <li><p>Lunch     :<?php echo $array[1];?></p></li>
                                    <li><p>Dinner    :<?php echo $array[2];?></p></li>
                                    <li><p>Snacks    :<?php echo $array[3];?></p></li>
                                </ul>
                                <?php
                                }
                                ?>
                        </p>
                        
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

