<?php
$dbConnection=mysqli_connect("nyxc.mysql.database.azure.com","nyxc","@Arisa0118Cassie0429","flower");

//檢查連線是否成功
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error();
    exit();
}
//echo "成功連線";

//將文字編碼設為UTF-8以正確顯示中文
mysqli_set_charset($dbConnection,"utf8");
?>