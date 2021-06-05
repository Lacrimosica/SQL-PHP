//connection to MySQL through mysqli_connect

<?php

$con = mysqli_connect('localhost', 'admin' ,'admin','MULTIMEDIA_COMP');

if(mysqli_connect_errno()){
    die('Failed to connect to MySQL'.mysqli_connect_error());
}

//closing connection
mysqli_close($con);

// QUERY SQL

//IMMEDIATE EXECUTION
$sql = "SELECT R.Date , R.Evaluation
        FROM CONTENT C, RATING R
        WHERE C.SSN=R.SSN AND C.CodC = C.SSN";

$result = mysqli_query($con, $sql);

if($result)
    die('Query error: '.mysqli_error($con));

//PREPARED EXECUTION

$stmt = mysqli_prepare($con, "INERT INTO Forniture VALUES (?,?,?)");

$CodF = "F1";
$CodP = "P1";
$Qta = 100;

//parameter binding

mysqli_stmt_bind_param($stmt, "ssi" , $CodF, $CodP, $Qta);

//ANOTHER EXAMPLE

$stmt= mysqli_prepare($con, "SELECT Province FROM City WHERE name=?");

if(!$stmt)
        die('Query error: '.mysqli_error($con));

$name = "Turin";

mysqli_stmt_bind_param($stmt, "s", $name);

mysqli_stmt_execute($stmt);


//reading through a query result

while ($row = mysqli_fetch_row($result)){   //this error is ok i
    echo "<tr>";
    echo "<td>$row[0]</td><td>$row[1]</td>";
    echo "</tr>";
}

//another way to do it:
while ($row = mysqli_fetch_row($result)){   //this error is ok i
    echo "\t<tr>\n";
    foreach ($row as $cell){
            echo "\t\t<td>$cell</td>\n";
    }
    echo "\t</tr>\n";
}


//nwo for fetching a scalar array:

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row["Name"]."<td></td>".$row["Num"]."</td>";
    echo "</tr>";
}

//another way of implementation
if(mysqli_num_rows($result)){
    echo "<h5> No Result </h5>";
}else{
    //access to the rows of the result
}

//using fields

for($i = 0; $i < mysqli_num_fields($result) ; $i++){
    $title = mysqli_fetch_field($result);
    $name = $title->name;
    echo "<th> $name </th>";
}


if(mysqli_num_rows($result >0)){
    //table heading
    echo "<table border = 1 cellpadding=10>";
    echo "<tr>";

    for ($i = 0; $i< mysqli_num_fields($result); $i++){
        $title = mysqli_fetch_fields($result);
        $name = $title->name;
        echo "<th> $name </th>";
    }
    echo "</tr>";
    //table filling
    while ($row = mysqli_fetch_row($result)){

    }
}


//in order to disable or anable autocommit

mysqli_autocommit($con, false);

//if off and we need to do it manually, the commit and rollback

mysqli_commit($con);
mysqli_rollback($con);
?>