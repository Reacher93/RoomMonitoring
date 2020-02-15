<!DOCTYPE html>
<html lang="en">

<?php

//php Variablen
$dbservername = '192.168.1.113';
$dbname = 'RoomMonitoring';
$dbuser = 'mysqladmin';
$dbpw = 'zbwzbw';


$sensorData1 = array(
    array()
);

//Verbindungsaufbau zur DB über PDO (dbname, user und pw von)
try {
    $pdo = new PDO('mysql:host=' . $dbservername . ';dbname=' . $dbname, $dbuser, $dbpw);

    // den PDO-Fehlermodus auf Ausnahme setzen
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to DB";


    $sqlOrder = $pdo->prepare("SELECT * FROM User");
    $sqlOrder->execute();

    $sensorData1 = $sqlOrder->fetchAll();

    print_r($sensorData1);


} catch (PDOException $e) {
    echo "Connection to DB failed: " . $e->getMessage();
}



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