<!DOCTYPE html>
<html lang="en">

<?php

//php Variablen
$dbservername = "192.168.1.113";
//$dbname = RoomMonitoring;
$dbuser = 'mysqladmin';
$dbpw = 'zbwzbw';

$id = 0;
$date = '00.00.0000';
$time = 0;
$temp = 0.0;
$humidity = 0;
$airPressure = 0;
$sonic = 0;
$meterAboveSea = 0;
$brightness = 0.0;

/*Array initialisieren
Node 1 (
    array(Datum, Zeit, Temp, Luftfeuchtigkeit, Druck, Schallpegel, Meter über Meer, Helligkeit)
    array(Datum, Zeit, Temp, Luftfeuchtigkeit, Druck, Schallpegel, Meter über Meer, Helligkeit)
)

*/

$sensorData1 = array(
    array()
);

//Verbindungsaufbau zur DB über PDO (dbname, user und pw von)
try {
    $pdo = new PDO('mysql:host=192.168.1.113;dbname=RoomMonitoring', $dbuser, $dbpw);

    // den PDO-Fehlermodus auf Ausnahme setzen
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to DB";

    $sqlOrder = $pdo->prepare("SELECT * FROM Node1");
    $sqlOrder->execute();

    $sensorData1 = $sqlOrder->fetchAll();
} catch (PDOException $e) {
    echo "Connection to DB failed: " . $e->getMessage();
}



print_r($sensorData1);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RoomMonitoring</title>
</head>

<body>
    <header>

    </header>


</body>

</html>