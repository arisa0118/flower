
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
// function getResizePercent($source_w, $source_h, $inside_w, $inside_h)
// {
//     if ($source_w < $inside_w && $source_h < $inside_h) {
//         return 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
//     }

//     $w_percent = $inside_w / $source_w;
//     $h_percent = $inside_h / $source_h;

//     return ($w_percent > $h_percent) ? $h_percent : $w_percent;
// }
// function ImageResize($from_filename, $save_filename, $in_width=400, $in_height=300, $quality=100)
// {
//     $allow_format = array('jpeg', 'png', 'gif');
//     $sub_name = $t = '';

//     // Get new dimensions
//     $img_info = getimagesize($from_filename);
//     $width    = $img_info['0'];
//     $height   = $img_info['1'];
//     $imgtype  = $img_info['2'];
//     $imgtag   = $img_info['3'];
//     $bits     = $img_info['bits'];
//     $channels = $img_info['channels'];
//     $mime     = $img_info['mime'];

//     list($t, $sub_name) = explode('/', $mime);
//     if ($sub_name == 'jpg') {
//         $sub_name = 'jpeg';
//     }

//     if (!in_array($sub_name, $allow_format)) {
//         return false;
//     }

//     // 取得縮在此範圍內的比例
//     $percent = getResizePercent($width, $height, $in_width, $in_height);
//     $new_width  = $width * $percent;
//     $new_height = $height * $percent;

//     // Resample
//     $image_new = imagecreatetruecolor($new_width, $new_height);

//     // $function_name: set function name
//     //   => imagecreatefromjpeg, imagecreatefrompng, imagecreatefromgif
//     /*
//     // $sub_name = jpeg, png, gif
//     $function_name = 'imagecreatefrom' . $sub_name;

//     if ($sub_name=='png')
//         return $function_name($image_new, $save_filename, intval($quality / 10 - 1));

//     $image = $function_name($from_filename); //$image = imagecreatefromjpeg($from_filename);
//     */
//     $image = imagecreatefromjpeg($from_filename);

//     imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

//     return imagejpeg($image_new, $save_filename, $quality);
// }
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
        move_uploaded_file($tmpname,'Pimg/'.$newImageName);
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