<?php
//Profile DB connection
$dbServerNm = "localhost";
$dbUserNm = "root";
$dbPassWd = "";
$dbSchema = "traviantools";

$encryPassPhrase = "password";


//creating the DB connection for operations schema
function getDBConnection(){
    // Create connection
    //$conn = mysqli_connect($dbServerNm, $dbUserNm, $dbPassWd, $dbSchema);
    
    $conn = mysqli_connect("localhost","root","","traviantools");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_error());
    }    
    return $conn;
}
?>

