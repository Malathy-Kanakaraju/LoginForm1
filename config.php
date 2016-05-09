<?php

$dbUser = "root";
$dbPwd = "";
$dbDatabase = "test1";
$dbHost = "localhost";

$dbconn = mysqli_connect($dbHost, $dbUser, $dbPwd,$dbDatabase);

if (!$dbconn) {
    die("<h2>Error: Database not connected</h2>");
} 

?>