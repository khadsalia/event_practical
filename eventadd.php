<?php

$eventtite = $_POST["eventtitle"];
$startdate = $_POST["startdate"];
$enddate   = $_POST["enddate"];
$recurrence = $_POST["recurrence"];
$recurrencetime = $_POST["recurrencetime"];

$connect = mysqli_connect('localhost:3306','root','HardPatel#@9991','userdb');

if(!$connect){
    die('can not connect to database:'.mysqli_connect_error());
}

$sql = "INSERT INTO eventdetails(eventtitle,startdate,enddate,recurrence,recurrencetime)
        VALUES('$eventtite','$startdate','$enddate','$recurrence','$recurrencetime')";

$result = mysqli_query($connect,$sql);

if($result)
{
    echo'data inserted successfully.';
}
else
{
    echo 'could not be able to innsert data due to error:'.mysqli_error($connect);
}

mysqli_close($connect);

?>