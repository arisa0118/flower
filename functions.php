<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="UseCSS.css" rel="stylesheet">
	<title>
		flower
	</title>
	
</head>

<body>
<?php //include_once('header.php');
include('dbConnect.php');

if ($_GET['op'] == 'createOrder') {
    createOrder();
}
function createOrder()
{

    global $dbConnection;

    $tmpname = $_FILES['imgfile']['tmp_name'];
   
    //檔名(包含附檔名)
$fileName = basename($_FILES["imgfile"]["name"]);
 //暫存位置
$targetFilePath = $tmpname . $fileName;
//檔案類型
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["imgfile"]["name"])){
    // if(!empty($_FILES["file"]["name"])){
    // Allow certain file formats
    // $allowTypes = array('jpg','png','jpeg','gif','pdf');
    //if(in_array($fileType, $allowTypes)){
        // Upload file to server
       $image = addslashes(file_get_contents($tmpname));
        if(move_uploaded_file($_FILES["imgfile"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
         
            $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1";
        // $result = mysqli_query($dbConnection, $sql);
        // $row = mysqli_fetch_assoc($result);
            echo '45行 <br>';
            
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
                    '{$image}',
                    $fileName,
                    $fileType,
                    '" . date('Y-m-d H:i:s') . "')";
                    echo $sql;
            echo '62行 <br>';
            //$insert =mysqli_query($dbConnection, $sql);
            echo '64行 <br>';
             $insert = $dbConnection->query($sql);
            if($insert){
                echo '67行 <br>';
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                echo '70行 <br>';
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
     //}else{
        // $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    //}
}else{
    $statusMsg = 'Please select a file to upload.';

}
echo '83行 <br>';
// Display status message
echo $statusMsg;




        //新添加一筆資料(準備)
        

    //寫入MSQL資料庫
//    if (mysqli_query($dbConnection, $sql)) {
        //找出目前第一筆資料
        // $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1";
        // $result = mysqli_query($dbConnection, $sql);
        // $row = mysqli_fetch_assoc($result);

        //刪除目前第一筆資料
        //echo $row['person_id'];
        // if ($row['person_id'] > 61) {
        //     $query2 = "DELETE FROM person_data WHERE person_id=" . $row['person_id'];
        //     $query_run2 = mysqli_query($dbConnection, $query2);
        // }
        //關閉連線
         mysqli_close($dbConnection);
        //header("Location: /order-completed.php");
   // } else {
      //  header("Location: /");
   // }

}
?>