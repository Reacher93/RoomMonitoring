<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
//include("templates/header.inc.php");
include("inc/menu.inc.php");


if(isset($_POST["from_date"], $_POST["to_date"]))  
{  
    $statement = $pdo->prepare("SELECT * FROM nodes INNER JOIN sensoren ON nodes.sensor_id=sensoren.sensor_id WHERE timestamp BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."23:59:59' ORDER BY timestamp, bezeichnung");	

    $result = $statement->execute();
    $count = 1;
    
    $valueArrayY = array();
	$dbValueY = '';

	//Wert aus db in array speichern
	while($row = $statement->fetch()) {
		if ($row['bezeichnung'] == "Temperatur") {
			array_push($valueArrayY, $row['value']);
		}
	}

	//array to string
	for ($i=0; $i < count($valueArrayY); $i++) { 
		$dbValueY = $dbValueY . ''.$valueArrayY[$i].',';
	}

	//Letztes Komma weg
	$dbValueY = trim($dbValueY,",");

    // $dbValueY zurück an sensordaten.php geben
    

    $statement = $pdo->prepare("SELECT * FROM nodes INNER JOIN sensoren ON nodes.sensor_id=sensoren.sensor_id WHERE timestamp BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."23:59:59' ORDER BY timestamp, bezeichnung");	

    $result = $statement->execute();
    $count = 1;
    
    $valueArrayX = array();
	$dbValueX = '';

	//Zeit aus db in array speichern
	while($row = $statement->fetch()) {
		if ($row['bezeichnung'] == "Temperatur") {
			array_push($valueArrayX, $row['timestamp']);
		}
	}

	//array to string
	for ($i=0; $i < count($valueArrayX); $i++) { 
		$dbValueX = $dbValueX . '"'.$valueArrayX[$i].'",';
	}

	//Letztes Komma weg
	$dbValueX = trim($dbValueX,",");

	// $dbValueX zurück an sensordaten.php geben

}  
?>

</body>
</html>