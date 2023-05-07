
<?php include_once('dbConnect.php');
include_once('header.php');
$sql = "SELECT * FROM person_data";
$result = mysqli_query($dbConnection,$sql);
$a=0;
echo mysqli_num_rows($result);
if (mysqli_num_rows($result) == 0) {
  
  echo "No rows found, nothing to print so am exiting";
  exit;
}
while($row = mysqli_fetch_assoc($result)) {

  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image_data']).'" />';
  // echo '<img src="data:'.$row['image_type'].';base64,'.base64_encode($row['image_data']).'" width="200" alt="TCU" /><br/>';
  //'.$row['image_type'].';
  echo $a++.'<br/>';
}
include_once('footer.php');
?>