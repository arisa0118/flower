
<?php include_once('dbConnect.php');
$sql = "SELECT * FROM person_data";
$result = mysqli_query($dbConnection,$sql);
while($row = mysqli_fetch_assoc($result)) {

  echo '<img src="https://nyxc.azurewebsites.net/collect_img/'.$row['image_name'].'" width="200" /><br/>';
  echo 'https://nyxc.azurewebsites.net/collect_img/'.$row['image_name'];
}

?>