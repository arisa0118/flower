
<?php include_once('dbConnect.php');
$sql = "SELECT * FROM person_data";
$result = mysqli_query($dbConnection,$sql);
?>

<?php
while($row = mysqli_fetch_assoc($result)) {

  echo '<img src="data:'.$row['image_type'].';base64,'.base64_encode($row['image_data']).'" width="200" /><br/>';
}

?>