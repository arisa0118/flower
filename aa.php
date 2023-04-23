<?php 
include_once('dbConnect.php');

    $sql = "SELECT image_type,image_data FROM person_data WHERE person_id=11";
    $result = mysqli_query($dbConnection,$sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>"
    . mysqli_error($dbConnection));
    $row = mysqli_fetch_assoc($result);
    echo '<div class="order"><p>';
    header("Content-type: ".$row['image_type']);  
    $image_mime_type=$row['image_type'];
    $base64_data=base64_encode($row['image_data']);
    echo '<img src="data:'.$image_mime_type.';base64,'.$base64_data.'">';

    echo '</p></div>';


  
     



?>