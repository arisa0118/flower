<?php
$db_hostname = "nyxc.mysql.database.azure.com";
$db_username = "nyxc";
$db_password = "@Arisa0118Cassie0429";
$database = "flower"; 
$dbConnection=@mysqli_connect($db_hostname,$db_username,$db_password,$database);

//檢查連線是否成功
if(mysqli_connect_errno()){
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}else{
    echo "成功連線";
}


//將文字編碼設為UTF-8以正確顯示中文
mysqli_set_charset($dbConnection,"utf8");
?>