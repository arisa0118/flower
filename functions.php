<?php include_once('header.php');

if ($_GET['op'] == 'createOrder') {
    createOrder();
}
function createOrder()
{
    global $dbConnection;
    //取得上傳檔案資訊
    $filename = $_FILES['imgfile']['name'];
    $tmpname = $_FILES['imgfile']['tmp_name'];
    $filetype = $_FILES['imgfile']['type'];
    $filesize = $_FILES['imgfile']['size'];
    $imageProperties = getimageSize($_FILES['imgfile']['tmp_name']);
    $file = NULL;


    //儲存2


    if (is_uploaded_file($tmpname)) {
        // move_uploaded_file($tmpname, '/home/wwwroot/preview_img');
        if ($_FILES['imgfile']['error'] == 0) {
            $instr = fopen($tmpname, "rb");
            $file = fread($instr, filesize($tmpname));
        }
        // $imgData =addslashes(file_get_contents($_FILES['imgfile']['tmp_name']));
        $imgData = file_get_contents($file);


        $sql = "INSERT INTO person_data(
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
            $imgData,
            $filename,
            $filetype,
            '" . date('Y-m-d H:i:s') . "')";
    }

    //寫入MSQL資料庫
    if (mysqli_query($dbConnection, $sql)) {

        $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1";
        $result = mysqli_query($dbConnection, $sql);
        $row = mysqli_fetch_assoc($result);


        //echo $row['person_id'];
        if ($row['person_id'] > 61) {
            $query2 = "DELETE FROM person_data WHERE person_id=" . $row['person_id'];
            $query_run2 = mysqli_query($dbConnection, $query2);
        }
        mysqli_close($dbConnection);
        header("Location: /order-completed.php");
    } else {
        header("Location: /");
    }

}
?>