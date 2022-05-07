
<!DOCTYPE html>
<html>
<head>


<title>Eat Smart Calories Chart</title>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var dataPoints = [];
	 
        function getDataPointsFromCSV(csv) {
            var dataPoints = csvLines = points = [];
            csvLines = csv.split(/[\r?\n|\r|\n]+/);         
		        
            for (var i = 0; i < csvLines.length; i++)
                if (csvLines[i].length > 0) {
                    points = csvLines[i].split(",");
                    dataPoints.push({ 
                        x: parseFloat(points[2]), 
                        y: parseFloat(points[0]) 		
                    });
                }
            return dataPoints;
        }
	
	$.get("http://localhost/eat_smart/MiniProject_GroupID_6/plugins/changes.csv", function(data) {
	    var chart = new CanvasJS.Chart("chartContainer", {
		    title: {
		         text: "Calories Recommended",
		    },
            axisY: {
		        interval:200,
	        },
		    data: [{
		         type: "line",
		         dataPoints: getDataPointsFromCSV(data)
		      }]
	     });
		
	      chart.render();

	});





    function getDataPointsFromCSV1(csv) {
            var dataPoints = csvLines = points = [];
            csvLines = csv.split(/[\r?\n|\r|\n]+/);         
		        
            for (var i = 0; i < csvLines.length; i++)
                if (csvLines[i].length > 0) {
                    points = csvLines[i].split(",");
                    dataPoints.push({ 
                        x: parseFloat(points[2]), 
                        y: parseFloat(points[1]) 		
                    });
                }
            return dataPoints;
        }
	
	$.get("http://localhost/eat_smart/MiniProject_GroupID_6/plugins/changes.csv", function(data) {
	    var chart = new CanvasJS.Chart("chartContainer1", {
		    title: {
		         text: "Calories Intake",
		    },
            axisY: {
		        interval:200,
	        },
		    data: [{
		         type: "line",
		         dataPoints: getDataPointsFromCSV1(data)
		      }]
	     });
		
	      chart.render();

	});
     
  }
</script>
</head>
<body style="background-color:#3282b8;">
<br>
	<div id="chartContainer" style="width:100%; height:400px;"></div>
    <br><br><br><br> 
    <div id="chartContainer1" style="width:100%; height:400px;"></div>

</body>
</html>