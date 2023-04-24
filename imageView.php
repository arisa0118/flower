
<?php include_once('dbConnect.php');
$sql = "SELECT * FROM person_data";
$result = mysqli_query($dbConnection,$sql);
while($row = mysqli_fetch_assoc($result)) {

  $imageURL = 'preview_img/'.$row["image_name"];
  ?>
  <img src="<?php echo $imageURL; ?>" alt="" width="200" />
  <?php 
}

?>