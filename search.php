<?php

$con = mysqli_connect('localhost', 'root' ,'1325131','MULTIMEDIA_COMP');

if(mysqli_connect_errno()){
    die('Failed to connect to MySQL'.mysqli_connect_error());
}

$SSN = $_GET["username"];

$sql = "SELECT C.CodC R.Date , R.Evaluation , C.Category
        FROM RATING R, CONTENT C
        WHERE C.SSN=$SSN AND R.CodeC=C.CodC
        ORDER BY R.DATE";

$result = mysqli_query($con, $sql);

if($result){
    die('Query error: '.mysqli_error($con));
}
echo "<table>";
echo "<tr>";
echo "<th> No. </th> <th> Date </th> <th> Evaluation </th> <th> Genre </th>";
while ($row = mysqli_fetch_row($result)){  
    echo "<tr>";
    echo "<td><$i></td> <td>$row[0]</td><td>$row[1]</td><td>$row[2]</td> <td>$row[3]</td>";
    echo "</tr>";
    }

mysqli_close($con);
?>