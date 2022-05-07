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
	<title>Eat Smart</title>
	<style>
.button {
  border: none;
  color: #3282b8;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
  border: none;
  color: #bbe1fa;;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
	margin-left: 30px;
  cursor: pointer;
}

.button2 {background-color: #bbe1fa;}
.button1 {background-color:black;} /* Blue */
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row" id="hm_navbar">
			<h5>
			<p>
			Hello,
			<?php
			    echo $_SESSION['r_username'];
				

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://v1.nocodeapi.com/shru/fit/whdlwSaStICsNYhB/aggregatesDatasets?dataTypeName=steps_count,active_minutes,heart_minutes&timePeriod=today",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS =>'{}',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);
$newresponse =substr($response,25,4);


$activemin =substr($response,193,2);
$heart =substr($response,358,2);

$name=$_SESSION['r_username'];
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
			    <h5 class="display-4">Ideal calorie intake per day:  <?php echo $_SESSION['cal_intake']?></h5>
				<?php if($name=='ShrutiPrasad'){echo "<h5 class='display-4'>Footstep Count:&nbsp </h5> "; if($name=='ShrutiPrasad') echo "<h5 class='display-4'> $newresponse </h5> ";} echo "<br>";?>
        <?php if($name=='ShrutiPrasad'){echo "\n<h5 class='display-4'> &nbsp Heart Points:&nbsp </h5> "; if($name=='ShrutiPrasad') echo "<h5 class='display-4'> $heart </h5> ";}?>
        <?php if($name=='ShrutiPrasad'){echo "<h5 class='display-4'>Active Minutes:&nbsp </h5> "; if($name=='ShrutiPrasad') echo "<h5 class='display-4'> $activemin </h5> ";}?>

			 
	
    	
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
				<h1 class="display-4">&nbsp Dashboard</h1>
				<form method="POST">
					<br>
				<input type="submit" style="align:left" name="b3" class="button1 button1" value="Overall Calories Summary"/>
				</form>
				</div>
				<div class="row" id="form_content">
					<form>
                        <p> 
                            <?php 
                                $array=explode(',',$_SESSION['derived_items']);


									require_once 'Twilio/autoload.php';
										use Twilio\Rest\Client;
										$sid = '';
										$token = '';
										$client = new Client($sid, $token);
										$sendAt = (new DateTime())->add(new DateInterval('PT60M'));
                    if(sizeof($array)==3)
                    {
                      $msg='Breakfast- '.$array[0].'Lunch- '.$array[1].'Dinner- '.$array[2];
                    }
                    if(sizeof($array)==4)
                    {
                      $msg='Breakfast- '.$array[0].'Lunch- '.$array[1].'Dinner- '.$array[2]. 'Snacks- ' .$array[3];
                    }
										$message = $client->messages->create('+',
										[
											// A Twilio phone number you purchased at twilio.com/console
											'from' => '+',
											// the body of the text message you'd like to send
											'body' => 'Here is your diet recommendation for today by Eat Smart: ' .$msg,
											"sendAt" => $sendAt->format('c'),
            								"scheduleType" => "fixed",
										]
									);



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

<?php


//column to print, E would be 5th
$col = 1;
$sum=0;
$e=0;
// open the file for reading
$file = fopen("indian_breakfast.csv","r");
$brk=$array[0];
strval($brk);
// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
    if(trim($brk)===trim($data)){
        $cal=fgetcsv($file)[5];
        $sum=$sum+$cal;
    }
   
}
// close the file connection
fclose($file);

$file = fopen("indian_dinner.csv","r");
$din=$array[2];
// while there are more lines, keep doing this
 while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
    if(trim($data)===trim($din)){
        $cal=fgetcsv($file)[5];
            $sum=$sum+$cal;

    }
  
}

if(sizeof($array)==4)
{
$file = fopen("indian_snacks.csv","r");
$snak=$array[3];
// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
    if(trim($data)===trim($snak)){
        $cal=fgetcsv($file)[5];
        $sum=$sum+$cal;

    }
   
}
}

$file = fopen("indian_meals.csv","r");
$lun=$array[1];
// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
    if(trim($data)===trim($lun))
	{
        $cal=fgetcsv($file)[5];
        $sum=$sum+$cal;

    }
   
}


// close the file connection

?>

	</div>
	<div class="row" >
			<div class="col-12 jumbotron jumbotron-fluid" id="hm_c_display_bar">
			  <div class="container"> 
				  <center>
			    <h5 class="display-4">Did You Follow Today's Diet Plan ? </p></h5>
				<form method="POST">
				<input type="submit" name="b1" class="button button2" value="YES"	/>
				<input type="submit" name="b2" class="button button2" value="NO"	/>
				</form>
				</center>
				<?php
			
      date_default_timezone_set('Asia/Kolkata');
		if(isset($_POST['b1']))
		{
    
		$list = array($sum,$sum,date("d/m/y"));
		$file = fopen("changes.csv","a");
		  fputcsv($file, $list);
		  Echo " <br>Your Entry has been added ";	
			}
		if(isset($_POST['b2']))
		{
		$list = array($sum,$sum+127,date("d/m/y"));
		$file = fopen("changes.csv","a");
		  fputcsv($file, $list);
		  echo "<br> Your Entry has been added ";
		} 
		if(isset($_POST['b3']))
		{
			header("Location:http://localhost/eat_smart/MiniProject_GroupID_6/plugins/graph.php");
			die();
		}
	
	

				?>
				
			</div>
			</div>
	</div>







<?php

//column

$file = fopen("indian_breakfast.csv","r");
$col=1;
$combinesnacks=array();
// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
    if(trim($data)===trim($brk)){
        $cal=fgetcsv($file)[5];
        $pro=fgetcsv($file)[4];
        $carb=fgetcsv($file)[3];
        $fat=fgetcsv($file)[2];
        array_push($combinesnacks,$cal,$pro,$carb,$fat);
    }
  
}

?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Order', 'Amount'],
                        ['Calories', parseInt('<?php echo $cal; ?>')],
                        ['Protein',       parseInt('<?php echo $pro; ?>')],
                        ['Fats', parseInt('<?php echo $fat; ?>')],
                        ['Carbs',       parseInt('<?php echo $carb; ?>')]
                ]); 

        var options = {
          title: 'Recommended Breakfast Items Ratio',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
        chart.draw(data, options);
      }
    </script>






<?php

//column

$file = fopen("indian_dinner.csv","r");
$col=1;
$combinesnacks=array();
// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
	if(trim($data)===trim($din)){
        $cal=fgetcsv($file)[5];
        $pro=fgetcsv($file)[4];
        $carb=fgetcsv($file)[3];
        $fat=fgetcsv($file)[2];
        array_push($combinesnacks,$cal,$pro,$carb,$fat);
    }
  
}

?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Order', 'Amount'],
                        ['Calories', parseInt('<?php echo $cal; ?>')],
                        ['Protein',       parseInt('<?php echo $pro; ?>')],
                        ['Fats', parseInt('<?php echo $fat; ?>')],
                        ['Carbs',       parseInt('<?php echo $carb; ?>')]
                ]); 

        var options = {
          title: 'Recommended Dinner Items Ratio',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d4'));
        chart.draw(data, options);
      }
    </script>








<?php

//column

$file = fopen("indian_meals.csv","r");
$col=1;
$combinesnacks=array();
// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
	if(trim($data)===trim($lun)){
        $cal=fgetcsv($file)[5];
        $pro=fgetcsv($file)[4];
        $carb=fgetcsv($file)[3];
        $fat=fgetcsv($file)[2];
        array_push($combinesnacks,$cal,$pro,$carb,$fat);
    }
  
}

?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Order', 'Amount'],
                        ['Calories', parseInt('<?php echo $cal; ?>')],
                        ['Protein',       parseInt('<?php echo $pro; ?>')],
                        ['Fats', parseInt('<?php echo $fat; ?>')],
                        ['Carbs',       parseInt('<?php echo $carb; ?>')]
                ]); 

        var options = {
          title: 'Recommended Lunch Items Ratio',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
      }
    </script>








<?php

if(sizeof($array)==3)
{
 $cal=0;
 $pro=0;
 $fat=0;
 $carb=0; 
}

else{
    $file = fopen("indian_snacks.csv","r");
$col=1;
$combinesnacks=array();
// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    $data=fgetcsv($file)[$col];
	if(trim($data)===trim($snak)){
        $cal=fgetcsv($file)[5];
        $pro=fgetcsv($file)[4];
        $carb=fgetcsv($file)[3];
        $fat=fgetcsv($file)[2];
        array_push($combinesnacks,$cal,$pro,$carb,$fat);
    }
  
}
}

?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Order', 'Amount'],
                        ['Calories', parseInt('<?php echo $cal; ?>')],
                        ['Protein',       parseInt('<?php echo $pro; ?>')],
                        ['Fats', parseInt('<?php echo $fat; ?>')],
                        ['Carbs',       parseInt('<?php echo $carb; ?>')]
                ]); 
                
        var options = {
          title: 'Recommended Snacks Items Ratio (IF Valid)',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d6'));
        chart.draw(data, options);
      }
    </script>







	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<table>
        <tr>
   <td> <div id="piechart_3d1" style="width: 900px; height: 500px;"></div></td>
   <td> <div id="piechart_3d2" style="width: 900px; height: 500px;"></div></td></tr>
    <tr><td><div id="piechart_3d6" style="width: 900px; height: 500px;"></div></td>
    <td><div id="piechart_3d4" style="width: 900px; height: 500px;"></div></td></tr>
    </table>

</body>
</html>