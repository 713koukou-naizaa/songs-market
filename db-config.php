<?php

// $lakartxelaCurrentDB="ehamid_pro";
// $lakartxelaHost="lakartxela.iutbayonne.univ-pau.fr";
// $lakartxelaUsername="ehamid_pro";
// $lakartxelaPassword="ehamid_pro";

$localCurrentDB="songs-market";
$localHost="localhost";
$localUsername="root";
$localPassword="root";

$tableName="songs_table";

// lakartxela

// print "DEBUG START" . "<br>";
// print "Configuring lakartxela connection..." . "<br>";
// print "Trying to connect to database $lakartxelaCurrentDB on $lakartxelaHost..." . "<br>";
// $conn = mysqli_connect($lakartxelaHost, $lakartxelaUsername, $lakartxelaPassword, $lakartxelaCurrentDB) or die("Could not connect: " . mysqli_error($conn));
// print "Connected successfully" . "<br>";
// print "DEBUG END" . "<br>";

// local
// print "DEBUG START" . "<br>";
// print "Configuring local connection..." . "<br>";
// print "Trying to connect to database $localCurrentDB on $localHost..." . "<br>";
$conn = mysqli_connect($localHost, $localUsername, $localPassword, $localCurrentDB) or die("Could not connect: " . mysqli_error($conn));
// print "Connected successfully" . "<br>";
// print "DEBUG END" . "<br>";

