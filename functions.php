
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/Logo去背.png">
    <link href="UseCSS3.css" rel="stylesheet">
    <title>
        flower
    </title>

</head>

<body><?php 
include('dbConnect.php');

if ($_GET['op'] == 'createOrder') {
    createOrder();

}

function createOrder()
{

    global $dbConnection;
if($_FILES['imgfile']['error']=== 4){

echo "<script> alert('Image Does Not Exist');</script>";

}
else{
    

    //檔名(包含附檔名)$fileName = basename($_FILES["imgfile"]["name"]);
    $fileName = $_FILES["imgfile"]["name"];
    $fileSize = $_FILES["imgfile"]["size"];
    // $fileSize =ImageResize($fileName, $fileName, 400, 300, 100);
   

    
    //暫存位置'preview_img/'.$row["image_name"]
    $tmpname = $_FILES['imgfile']['tmp_name'];
    list($width, $height) = getimagesize($tmpname);
    $p=500/$width;
    $new_width = $width*$p;
    $new_height = $height*$p;

    $new_image = imagecreatetruecolor($new_width, $new_height);
    $source=imagecreatefromjpeg($tmpname);
    // copy and resize the image data from the original image into the new image
    imagecopyresampled($new_image, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    $filePlace='/uploads/'.$fileName;
// output the new image as a JPEG file
imagejpeg($new_image,$filePlace,$fileName);
    //檔案類型
    // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $fileType = $_FILES["imgfile"]["type"];

    $validImageExtension=['jpg','jpeg','png'];
    $imageExtension=explode('.',$fileName);
    $imageExtension=strtolower(end($imageExtension));
    if(!in_array($imageExtension,$validImageExtension)){
        echo "<script> alert('Invalid Image Extension');</script>";
    }if($fileSize>100000000){
        echo "<script> alert('Image Size Is Too Large');</script>";
    }else{
        $newImageName=uniqid();
        $newImageName .= '.'. $imageExtension;
        move_uploaded_file($filePlace,'Pimg/'.$newImageName);
        // Insert image file name into database
            //新添加一筆資料(準備)
            $sql = "INSERT INTO person_data (
                
                `image_data`,
                `image_name`, 
                `image_type`,
                `time`
                ) VALUES (
                   
                    '{$newImageName}',
                    '{$fileName}',
                    '{$fileType}',
                    '" . date('Y-m-d H:i:s') . "')";
            //寫入MSQL資料庫
            $insert = mysqli_query($dbConnection, $sql);
            if ($insert) {

                //找出目前第一筆資料
                $sql = "SELECT person_id FROM person_data ORDER BY TIME DESC LIMIT 1;";
                $result = mysqli_query($dbConnection, $sql);
                $row = mysqli_fetch_assoc($result);

                //刪除目前第一筆資料
                //echo $row['person_id'];
                if ($row['person_id'] > 6) {
                    $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1;";
                    $result = mysqli_query($dbConnection, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $query2 = "DELETE FROM person_data WHERE person_id=" . $row['person_id'];
                    //刪資料夾照片
                    $filepath="pimg/".$row['image_data'];
                    unlink($filepath);
                    $query_run2 = mysqli_query($dbConnection, $query2);
                    
                }
                //關閉連線
                mysqli_close($dbConnection);
                echo '<script>document.location.href="https://nyxc1.azurewebsites.net/order-completed.php";</script>';

            } else {
                $statusMsg = "File upload failed, please try again.";
                header("Location: /");
            }
    }

}



}

?>

<footer>

<p>&copy;&thinsp;
    <?php echo date('Y') ?>&thinsp;nyxc 版權所有 不得轉載
</p>
</footer>
</div>

</body>

</html>