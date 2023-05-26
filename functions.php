
    <?php include_once('header.php');
    include_once('dbConnect.php');

    if ($_GET['op'] == 'createOrder') {
        createOrder();
        
    }
    function createOrder()
    {

        global $dbConnection;

        $tmpname = $_FILES['imgfile']['tmp_name'];

        //檔名(包含附檔名)
        //$fileName = basename($_FILES["imgfile"]["name"]);
        $fileName = explode(date('Y-m-d H:i:s'),$_FILES["imgfile"]["name"]);

        //暫存位置'preview_img/'.$row["image_name"]
      
        $targetFilePath = $tmpname . $fileName;
        //檔案類型
        // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $fileType = $_FILES["imgfile"]["type"];
        //isset($_POST["submit"]) && 
        if (!empty($_FILES["imgfile"]["name"])) {
            //檔案內容
            $image = addslashes(file_get_contents($tmpname));
            if (move_uploaded_file($_FILES["imgfile"]["tmp_name"],iconv("utf-8", "big5",$targetFilePath) )) {
            // if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $targetFilePath)) {
                $fileName = date('Y-m-d H:i:s').$_FILES["imgfile"]["name"];
                // Insert image file name into database
                //新添加一筆資料(準備)
                $sql = "INSERT INTO person_data (
                
                `image_data`,
                `image_name`, 
                `image_type`,
                `time`
                ) VALUES (
                   
                    '{$image}',
                    '{$fileName}',
                    '{$fileType}',
                    '" . date('Y-m-d H:i:s') . "')";
                //echo $sql;
                //寫入MSQL資料庫
                $insert = mysqli_query($dbConnection, $sql);
                if ($insert) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";

                    //找出目前第一筆資料
                    $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1";
                    $result = mysqli_query($dbConnection, $sql);
                    $row = mysqli_fetch_assoc($result);

                    //刪除目前第一筆資料
                    //echo $row['person_id'];
                    if ($row['person_id'] > 8) {
                        $query2 = "DELETE FROM person_data WHERE person_id=" . $row['person_id'];
                        $query_run2 = mysqli_query($dbConnection, $query2);
                    }
                    //關閉連線
                    mysqli_close($dbConnection);
                    echo '<script>document.location.href="/order-completed.php";</script>';
                   
                } else {
                    $statusMsg = "File upload failed, please try again.";
                    header("Location: /");
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Please select a file to upload.';
        }
        // Display status message
        echo $statusMsg;
      





    }
    include_once('footer.php');
    ?>