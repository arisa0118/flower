<?php include_once('header.php');

if ($_GET['op'] == 'createOrder') {
    createOrder();
}
function createOrder()
{

    global $dbConnection;
    //取得上傳檔案資訊
    //檔名(包含附檔名)
    $imagename = $_FILES['imgfile']['name'];
    //暫存位置
    $tmpname = $_FILES['imgfile']['tmp_name'];
    //檔案類型
    $imagetype = $_FILES['imgfile']['type'];
    //檔案大小
    $imagesize = $_FILES['imgfile']['size'];


    if (is_uploaded_file($tmpname)) {

        if ($_FILES['imgfile']['error'] == 0) {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        } else {
            die("Unable to upload");
        }


        //新添加一筆資料(準備)
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
            $image,
            $imagename,
            $imagetype,
            '" . date('Y-m-d H:i:s') . "')";
    }

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