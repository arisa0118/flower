<?php include_once('header.php');
include('dbConnect.php');
if ($_GET['op'] == 'createOrder') {
    createOrder();
}
function createOrder()
{

    global $dbConnection;

    $tmpname = $_FILES['imgfile']['tmp_name'];
   
    //檔名(包含附檔名)
$fileName = basename($_FILES["file"]["name"]);
 //暫存位置
$targetFilePath = $tmpname . $fileName;
//檔案類型
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$image=$targetFilePath;
// if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    if(!empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT INTO person_data (
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
                    $image,
                    $fileName,
                    $fileType,
                    '" . date('Y-m-d H:i:s') . "')";
            
            $insert =mysqli_query($dbConnection, $sql);
            // $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';

}
// Display status message
echo $statusMsg;




        //新添加一筆資料(準備)
        

    //寫入MSQL資料庫
    if (mysqli_query($dbConnection, $sql)) {
        //找出目前第一筆資料
        $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1";
        $result = mysqli_query($dbConnection, $sql);
        $row = mysqli_fetch_assoc($result);

        //刪除目前第一筆資料
        //echo $row['person_id'];
        if ($row['person_id'] > 61) {
            $query2 = "DELETE FROM person_data WHERE person_id=" . $row['person_id'];
            $query_run2 = mysqli_query($dbConnection, $query2);
        }
        //關閉連線
        mysqli_close($dbConnection);
        header("Location: /order-completed.php");
    } else {
        header("Location: /");
    }

}
?>