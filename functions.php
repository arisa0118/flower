<?php include_once('header.php');
if ($_GET['op'] == 'createOrder') {
    createOrder();
}
function createOrder()
{
    global $dbConnection;
     //取得上傳檔案資訊
     $filename=$_FILES['imgfile']['name'];
     $tmpname=$_FILES['imgfile']['tmp_name'];
     $filetype=$_FILES['imgfile']['type'];
     $filesize=$_FILES['imgfile']['size'];    
     $file=NULL;
     
     if(isset($_FILES['imgfile']['error'])){    
         if($_FILES['imgfile']['error']==0){                                    
             $instr = fopen($tmpname,"rb" );
             $file = addslashes(fread($instr,filesize($tmpname)));        
         }
     }
    //儲存訂單1
    // $sql = "INSERT INTO `flower_picture`.`person_data`(
    //     `gender`,
    //     `text`,
    //     `image`,
    //     `image_name`, 
    //     `image_type`,
    //     `time`
    //     ) VALUES (
    //         '{$_POST['gender']}',
    //         '{$_POST['want_tell_text']}',
    //         %s,
    //         '".$filename."',
    //         '".$filetype."',
    //         '" . date('Y-m-d H:i:s') . "')";
    //         $sql=sprintf($sql,"'".$file."'");



 
    // //寫入MSQL資料庫
    // if(mysqli_query($dbConnection, $sql)) {

    //     //你可以在這裡減去gem table的remaining存貨
    //     //轉變頁面
    //     header("Location: /order-completed.php");
    // } else {
    //     header("Location: /");
    // }



     //儲存2



     if(is_uploaded_file($_FILES['imgfile']['tmp_name'])) {

$imgData =addslashes(file_get_contents($_FILES['imgfile']['tmp_name']));
$imageProperties = getimageSize($_FILES['imgfile']['tmp_name']);


     $sql = "INSERT INTO `flower`.`person_data`(
        `person_name`,
        `gender`,
        `text`,
        `image_data`,
        `image_name`, 
        `image_type`,
        `time`
        ) VALUES (
            '{$_POST['person_name']}',
            '{$_POST['gender']}',
            '{$_POST['want_tell_text']}',
            '{$imgData}',
            '{$filename}',
            '{$filetype}',
            '" . date('Y-m-d H:i:s') . "')";
        }
 
    //寫入MSQL資料庫
    if(mysqli_query($dbConnection, $sql)) {
        $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1";
       $result = mysqli_query($dbConnection,$sql);
         $row = mysqli_fetch_assoc($result);

        
    //echo $row['person_id'];
        if($row['person_id']>61){
            $query2 = "DELETE FROM person_data WHERE person_id=".$row['person_id'] ;
            $query_run2 = mysqli_query($dbConnection,$query2);
        }
        header("Location: /order-completed.php");
    } else {
        header("Location: /");
    }
    
}
?>