<?php 
include_once('dbConnect.php');

if(isset($_GET['personId'])) {
    $sql = "SELECT image_type,image_data FROM person_data WHERE person_id=". $_GET['personId'] ;
    $result = mysqli_query($dbConnection,$sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>"
    . mysqli_error($dbConnection));
    $row = mysqli_fetch_assoc($result);
    echo '<div class="order"><p>';
    header("Content-type: ".$row['image_type']);  
    echo  $row['image_data'];
    echo '</p></div>';
 }

  
     



?>