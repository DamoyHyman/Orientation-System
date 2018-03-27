<?php
// Do not change the following two lines.
$teamURL = dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR;
$server_root = dirname($_SERVER['PHP_SELF']);

// You will need to require this file on EVERY php file that uses the database.
// Be sure to use $db->close(); at the end of each php file that includes this!

$dbhost = 'localhost';  // Most likely will not need to be changed
$dbname = 'manastasova2017';   // Needs to be changed to your designated table database name
$dbuser = 'manastasova2017';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'mila_sqlQ'; // Needs to be changed to reflect your LAMP server credentials

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);