<?php
if ( ini_set( 'upload_tmp_dir', '/home/site/wwwroot/preview_img' ) === false ) die( 'Unable to set upload_tmp_dir.' );

$db_hostname = "nyxc.mysql.database.azure.com";
$db_username = "nyxc";
$db_password = "@Arisa0118Cassie0429";
$database = "flower"; 
// $db_hostname = "127.0.0.1";
// $db_username = "root";
// $db_password = "";
// $database = "flower_picture"; 
$dbConnection=mysqli_connect($db_hostname,$db_username,$db_password,$database);

//檢查連線是否成功
if(mysqli_connect_errno()){
    
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}else{
    //echo "成功連線";
}


//將文字編碼設為UTF-8以正確顯示中文
mysqli_set_charset($dbConnection,"utf8");
?>