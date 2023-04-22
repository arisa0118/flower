<?php include('header.php'); ?>
<?php
//拿訪客的訂單資料

$picQ=mysqli_query($dbConnection,sprintf("SELECT * FROM `person_data`"));

while ($pic=mysqli_fetch_array($picQ)){

  
    echo '<div class="order"><p>';
    //echo '客戶稱呼：'.$order['client_name'].'<br/>';
    header("Content-type: image/".$pic['image_type']);  
    ?>
    <img src="imageView.php?image_id=<?php echo $pic['image']; ?>" /><br/>
    <?php
    

    echo '</p></div>'; 
}
mysqli_close($dbConnection);
// $orderData=file_get_contents('data.csv');
// $orders=str_getcsv($orderData,"\r\n");

// //顯示所有訂單
// foreach($orders as $order){

//     // echo $order."<br>";
//     //拆解每一筆資料
//     $singleOrder=explode(",",$order);

//     echo '<div class="order"><p>';
//     echo '客戶稱呼:'.$singleOrder[1].'<br/>';
//     echo '客戶郵件:'.$singleOrder[2].'<br/>';
//     echo '想預訂:'.$gems[$singleOrder[0]-1]['name'].'X'.$singleOrder[3].'件<br/>';
//     echo '下單時間:'.$singleOrder[4].'<br/>';
//     echo '</p></div>';

// }
?>
<?php include('footer.php'); ?>