<html>
    <head>
        <title>
        Event List Page:
        </title>
    </head>
    
<body>
<?php

$connect = mysqli_connect('localhost:3306','root','HardPatel#@9991','userdb');

if(!$connect){
    die('can not connect to database:'.mysqli_connect_error());
}

$sql = "SELECT * FROM eventdetails";

$result = mysqli_query($connect,$sql);
?>
 
<h3>Event Details:</h3>
    
<table border="1">
<tr>
<th>Title</th> 
<th>Dates</th>
<th>Occurence</th>
<th>Actions</th>
</tr>    
 
<?php while($array=mysqli_fetch_row($result)){?>
<tr>
<td><?php echo $array[0]; ?></td>
<td><?php echo $array[1]; ?> to <?php echo $array[2];?></td>
<td><?php echo $array[3]; ?> <?php echo $array[4]; ?></td>
<!--    <td><a href="" class="button"><input type="button" value="view" onclick="function eventview(<?php echo $array[0]; ?>)"/></a></td>-->
 <td><a href="eventview.php?eventtitle=<?php echo $array[0]; ?>" class="button"><input type="button" value="view" /></a></td>   
</tr>  
<?php } ?> 
</table>

<?php mysqli_close($connect);
?>
   <script>
       function eventview(eventtile)
       {
           window.location.href = 'eventview.php'+eventtitle;
       }
    </script> 
 </body>   
</html>