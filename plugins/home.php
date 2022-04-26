<?php
ob_start();
// Start the session
session_start();
include("../plugins/initial_choice.php");
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
	</div>

	<form method="POST" action="home.php">
		<div class="wrapper">
			<div class="title">
				Choose your favorite food item from each of these categories
			</div>
			<div class="title">
				Breakfast
			</div>
			<div class="container">
				<label class="option_item">
					<input type="radio" name="bf" value="bf1" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/cotton/64/000000/milk-bottle--v1.png"/></div>
					<div class="name"><?php echo $breakfast_items[0] ?></div>
				</label>
				<label class="option_item">
					<input type="radio" name="bf" value="bf2" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/cotton/64/000000/milk-bottle--v1.png"/></div>
					<div class="name"><?php echo $breakfast_items[1] ?></div>
				</label>
				<label class="option_item">
					<input type="radio" name="bf" value="bf3" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/cotton/64/000000/milk-bottle--v1.png"/></div>
					<div class="name"><?php echo $breakfast_items[2] ?></div>
				</label>
			</div>
			<div class="title">
				Lunch
			</div>
			<div class="container">
				<label class="option_item">
					<input type="radio" name="lun"  value="lun1" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/dusk/64/000000/lunchbox.png"/></div>
					<div class="name"><?php echo $lunch_items[0] ?></div>
				</label>
				<label class="option_item">
					<input type="radio" name="lun" value="lun2" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/dusk/64/000000/lunchbox.png"/></div>
					<div class="name"><?php echo $lunch_items[1] ?></div>
				</label>
				<label class="option_item">
					<input type="radio" name="lun" value="lun3" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/dusk/64/000000/lunchbox.png"/></div>
					<div class="name"><?php echo $lunch_items[2] ?></div>
				</label>
			</div>
			<div class="title">
				Dinner
			</div>
			<div class="container">
				<label class="option_item">
					<input type="radio" name="din" value="din1" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/color/48/000000/soup-plate.png"/></div>
					<div class="name"><?php echo $dinner_items[0]?></div>
				</label>
				<label class="option_item">
					<input type="radio" name="din" value="din2" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/color/48/000000/soup-plate.png"/></div>
					<div class="name"><?php echo $dinner_items[1]?></div>
				</label>
				<label class="option_item">
					<input type="radio" name="din" value="din3" class="checkbox">
					<div class="tickmark"></div>
					<div class="icon"><img src="https://img.icons8.com/color/48/000000/soup-plate.png"/></div>
					<div class="name"><?php echo $dinner_items[2] ?></div>
				</label>
			</div>

			<button type="submit" class="btn btn-primary btn-lg btn-block" name="result" value="result" style="margin-bottom: 5%; margin-top: 5%;">Save Interests</button>		
		</div>
	</form>

	<?php
		if(isset($_POST['result']))
		{
			$selected_bf_item = $_POST['bf'];
			$selected_lun_item = $_POST['lun'];
			$selected_din_item = $_POST['din'];

			$pref_bf_item = "";
			$pref_lun_item = "";
			$pref_din_item = "";

			if($selected_bf_item=='bf1'){ $pref_bf_item = $breakfast_items[0]; }
			elseif($selected_bf_item=='bf2'){ $pref_bf_item = $breakfast_items[1]; }
			elseif($selected_bf_item=='bf3'){ $pref_bf_item = $breakfast_items[2]; }

			if($selected_lun_item=='lun1'){ $pref_lun_item = $lunch_items[0]; }
			elseif($selected_lun_item=='lun2'){ $pref_lun_item = $lunch_items[1]; }
			elseif($selected_lun_item=='lun3'){ $pref_lun_item = $lunch_items[2]; }

			if($selected_din_item=='din1'){ $pref_din_item = $dinner_items[0]; }
			elseif($selected_din_item=='din2'){ $pref_din_item = $dinner_items[1]; }
			elseif($selected_din_item=='din3'){ $pref_din_item = $dinner_items[2]; }

			// $ref= "profiledb/";
			// $getdata=$database->getReference($ref)->getChild($user_key)->getValue();
			// $selected_status = $getdata['selected_items'];
			
			// $postData = ['selected_items' => '1'];
			// $newPostKey = $database->getReference('posts')->push()->getKey();
			// $updates = ['posts/'.$newPostKey => $postData,
			// 			'profiledb/'.$user_key.'/'.$newPostKey => $postData,];
			// $database->getReference()->update($updates);

			$database->getReference($ref)->getChild($user_key)->update(array('selected_items' => '1','pref_bf_item' => $pref_bf_item,'pref_lun_item' => $pref_lun_item,'pref_din_item' => $pref_din_item));

			// $_SESSION['pref_bf_item'] = $pref_bf_item;
			// $_SESSION['pref_lun_item'] = $pref_lun_item;
			// $_SESSION['pref_din_item'] = $pref_din_item;
			include("../plugins/initial_choice.php");

			#shell_exec(__DIR__."/compute.py $pref_bf_item $pref_lun_item $pref_din_item ");

		}
	?>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>