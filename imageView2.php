
<?php 

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Content-Type, Origin, Methods');

$db_hostname = "nyxc1.mysql.database.azure.com";
$db_username = "nyxc_mySQL";
$db_password = "@Arisa0118Cassie0429";
$database = "flower"; 
// $db_hostname = "127.0.0.1";
// $db_username = "root";
// $db_password = "";
// $database = "flower_picture"; 
// echo "12行";
$dbConnection=mysqli_connect($db_hostname,$db_username,$db_password,$database);

//檢查連線是否成功
if(mysqli_connect_errno()){
    
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}else{
    //echo "成功連線";
}


//將文字編碼設為UTF-8以正確顯示中文
mysqli_set_charset($dbConnection,"utf8");


$sql = "SELECT * FROM person_data";
$result = mysqli_query($dbConnection,$sql);

//echo mysqli_num_rows($result);
if (mysqli_num_rows($result) == 0) {
  
  echo "No rows found, nothing to print so am exiting";
  exit;
}
while($row = mysqli_fetch_assoc($result)) {

  //echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image_data']).'" />';
  //echo '<img src="data:'.$row['image_type'].';base64,'.base64_encode($row['image_data']).'" width="200" alt="TCU" /><br/>';
 
  ?><img src="pimg/<?php echo $row['image_data'];?>" width="200" alt="TCU" /><br/>
  
  <?php
  //'.$row['image_type'].';
}

?>