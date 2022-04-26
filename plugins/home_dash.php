<?php

session_start();
include("../includes/dbconfig.php");
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
	<h1>Home Dash</h1>
	<?php
	
		echo $_SESSION['derived_items'];
		// $day_cal = $_SESSION['cal_intake'];
		// $user_key = $_SESSION['username_id'];
		// $ref= "profiledb/";
		// $getdata=$database->getReference($ref)->getChild($user_key)->getValue();
		// $selected_status = $getdata['selected_items'];

		

		// $pref_breakfast_item = trim((string)$getdata['pref_bf_item']);
		// $pref_lunch_item = trim((string)$getdata['pref_lun_item']);
		// $pref_dinner_item = trim((string)$getdata['pref_din_item']);

		// $output = shell_exec(__DIR__."/compute.py $breakfast $lunch $dinner string($pref_breakfast_item) string($pref_lunch_item) string($pref_dinner_item)");
        //  $_SESSION['derived_items'] = $output;
		// echo $output;
		// echo "brakfast->",$pref_breakfast_item;
	?>
		
</body>
</html>