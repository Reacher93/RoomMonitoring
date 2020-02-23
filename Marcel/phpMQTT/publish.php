<?php

require("phpMQTT.php");

$server = "192.168.1.XXX";         // change if necessary
$port = 1883;                      // change if necessary
$username = "";                    // set your username
$password = "";                    // set your password
$client_id = "XXXXXXXXXXXXXXXX";  // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("zbw/test", "Hello World! at " . date("r"), 0);
	$mqtt->close();
} else {
	echo "Time out!\n";
}
