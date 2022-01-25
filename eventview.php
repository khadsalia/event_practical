<html>
    <head>
        <title>
        Event View Page:
        </title>
    </head>
    
<body>
<?php

$eventtite = request.getParameter("eventtitle");

    $connect = mysqli_connect('localhost:3306','root','HardPatel#@9991','userdb');

if(!$connect){
    die('can not connect to database:'.mysqli_connect_error());
}

$sql = "SELECT * FROM eventdetails WHERE eventtitle='$eventtite'";

$result = mysqli_query($connect,$sql);
?>

<h3>Event View Detais:</h3>
    
<table border="1">
<tr>
<th>Event Name</th> 
<th>Event date</th>
<th>Event Day Name</th>
</tr>    
 
<?php while($array=mysqli_fetch_row($result)){ ?>
<tr>
<td><?php echo $array[0]; ?></td>
<!--<td><?php echo $array[1]; ?></td>-->
<?php if($array[4]=='day'){
    $diff = strtotime($array[1])-strtotime($array[2]);
    $days = round($diff/86400);
    
    for($i=0,$j=0;$i<$days;$i++){?>
        <td><?php echo $array[1]; ?></td> 
    <?php $dayname = date('D',strtotime($array[1]));?>
        <td><?php echo $dayname; ?></td>
    <?php $array[1] = strtotime('+1 day',strtotime($array[1]));?>
   <?php $j++; }
    
}else if($array[4]=='week'){
    $diff = strtotime($array[1])-strtotime($array[2]);
    $days = round($diff/86400);
    
    for($i=0,$j=0;$i<$days;$i=$i+7){?>
        <td><?php echo $array[1]; ?></td>
    <?php $dayname = date('D',strtotime($array[1]));?>
        <td><?php echo $dayname; ?></td>
    <?php $array[1] = strtotime('+7 day',strtotime($array[1]));?>
  <?php  $j++;}
    
}else if($array[4]=='month'){
    $diff = strtotime($array[1])-strtotime($array[2]);
    $days = round($diff/86400);
    
    for($i=0,$j=0;$i<$days;$i=$i+30){?>
        <td><?php echo $array[1]; ?></td>
    <?php $dayname = date('D',strtotime($array[1]));?>
        <td><?php echo $dayname; ?></td>
    <?php $array[1] = strtotime('+30 day',strtotime($array[1]));?>
  <?php  $j++;}
    
}else if($array[4]=='year'){
    $diff = strtotime($array[1])-strtotime($array[2]);
    $days = round($diff/86400);
    
    for($i=0,$j=0;$i<$days;$i=$i+365){?>
        <td><?php echo $array[1]; ?></td>
    <?php $dayname = date('D',strtotime($array[1]));?>
        <td><?php echo $dayname; ?></td>
    <?php $array[1] = strtotime('+365 day',strtotime($array[1]));?>
  <?php  $j++;}
}
    
    
?>
</tr>  
<?php } ?>  
<?php echo "total number of count:",$j ;?>
</table>

<?php mysqli_close($connect);
?>
    
    </body>   
</html>