<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("inc/menu.inc.php");

?>

<!-- Library für die Chart, ajax und style sheets-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<div class="container main-container">

<h1>Sensordaten</h1>

Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
Herzlich Willkommen im internen Bereich!<br><br>

<div class="panel panel-default">
 
<table class="table">
<tr>
	<th>Node ID</th>
	<th>Zeit</th>
	<th>Sensor ID</th>
	<th>Value</th>
</tr>
<?php 
//$statement = $pdo->prepare("SELECT * FROM nodes ORDER BY timestamp");
$statement = $pdo->prepare("SELECT * FROM nodes INNER JOIN sensoren ON nodes.sensor_id=sensoren.sensor_id ORDER BY timestamp, bezeichnung");	

$result = $statement->execute();
$count = 1;

while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$row['node_id']."</td>";
	echo "<td>".$row['timestamp']."</td>";
	echo "<td>".$row['bezeichnung']."</td>";
    echo "<td>".$row['value']."</td>";
	echo "</tr>";
}


$temp = '';
$temp = dbValueToInt("Temperatur",$pdo);

$time = '';
$time = dbTime("Temperatur",$pdo);


?>
</table>

</div>



</div>

<div id="TempChart" style="width:60%";>
<canvas id="myChart" width="400" height="200"></canvas>
</div>

<div class="col-md-3">  
    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
</div>  
<div class="col-md-3">  
    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
</div>  
<div class="col-md-5">  
    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info"/>  
</div>

<script> //AJAX JS
$(document).ready(function(){  
   $.datepicker.setDefaults({  
        dateFormat: 'yy-mm-dd'   
   });  
   $(function(){  
        $("#from_date").datepicker();  
        $("#to_date").datepicker();  
   });  
   $('#filter').click(function(){  
        var from_date = $('#from_date').val();  
        var to_date = $('#to_date').val();  
        if(from_date != '' && to_date != '')  
        {  
             $.ajax({  
                  url:"getchart.php",  
                  method:"POST",  
                  data:{from_date:from_date, to_date:to_date},  
                  success:function(data)  
                  {  
                       $('#myChart').html(data);  
                  }  
             });  
        }  
        else  
        {  
             alert("Please Select Date");  
        }  
   });  
});

</script>

<script>var myChartObject = document.getElementById('myChart');

var chart = new Chart(myChartObject, {
    type: 'line',
    data: {
        labels: [<?php echo $time; ?>],
        datasets: [{
            label: "Temperatur",
            backgroundColor: 'rgba(65, 105, 225, 0.4)',
            borderColor: 'rgba(65, 105, 255, 1)',
			data: [<?php echo $temp; ?>]
        },{
            label: "Datensatz 2",
            fill: true,
            backgroundColor: 'rgba(255, 0, 0, 0.4)',
            borderColor: 'rgba(255, 0, 0, 1)',
            data: [1,2,3,4]
        }]
    },
    options: {
        scales: {
            yAxes:[{
                ticks:{
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>