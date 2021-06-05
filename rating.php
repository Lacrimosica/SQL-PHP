<?php


$con = mysqli_connect('localhost', 'root' ,'1325131','MULTIMEDIA_COMP');

if(mysqli_connect_errno()){
    die('Failed to connect to MySQL'.mysqli_connect_error());
}

$username=$_GET["username"];
$codc=$_GET["codc"];
$date=$_GET["date"];
$rating=$GET["rating"];
$sql= "START TRANSACTION;
INSERT INTO RATING(SSN, CodC, Date, Evaluation) VALUES ($username,$codc, $date, $rating);   
COMMIT";

?>