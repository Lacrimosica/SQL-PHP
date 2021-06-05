<?php

$con = mysqli_connect('localhost', 'root' ,'1325131','MULTIMEDIA_COMP');

if(mysqli_connect_errno()){
    die('Failed to connect to MySQL'.mysqli_connect_error());
}



$name=$_GET["name"];
$surname=$_GET["surname"];
$codice=$_GET["fiscalcode"];
$yob=$GET["yob"];
$sql= "START TRANSACTION;
INSERT INTO Users(SSN,Name,Surname,YearOfBirth)    VALUES($codice,$name,$surname,$yob);
COMMIT";



#if query was successful
ehco "<html>"
<body>
<link href="style.css" rel=stylesheet type="text/css">
?>