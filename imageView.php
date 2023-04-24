
<?php include_once('dbConnect.php');
$sql = "SELECT * FROM person_data";
$result = mysqli_query($dbConnection,$sql);
while($row = mysqli_fetch_assoc($result)) {

  echo '/home/site/wwwroot/preview_img'.$row['image_name'].'<br/>';
}

?>