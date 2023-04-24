<?php include_once('dbConnect.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="UseCSS3.css" rel="stylesheet">
    <title>
        flower
    </title>

</head>

<body>
    <nav>
        <ul class="clientMenu">
            <li class="title">flower</li>
            <li><a href="/">home</a></li>
            <li><a href="/#flower_intro_call">About</a></li>
        </ul>
    </nav>


    <div class="content">



        <div class="logo2">
            <img src="img\logo2.PNG" width="100%">
        </div>


        <div class="flower_frame">
            <img src="img\flower_frame.PNG" id="flowers" width="100%">

            <div class="TITLE_note1">
            <?php
            include_once('dbConnect.php');
                    $sql = "SELECT * FROM person_data ORDER BY RAND ( ) LIMIT 1  ";
                    $result = mysqli_query($dbConnection, $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($row['person_name'] == "匿名") {
                        echo $row['person_name'] . '(' . $row['gender'] . '):<br>';
                    } else {
                        echo $row['person_name'] . ':<br>';
                    }?>
                <div class="note1_container">
                    <?php
                    
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['text'];
                    ?>
                </div>
            </div>
        </div>

        <div class="icon_Download">
            <img src="img\download.PNG"  width="100%">
        </div>
        <div class="btn_Download">
<button onclick="location.href='uploadApk/flower.apk'" style="color: white; background:#78929ad9;border:2px soild white;">下載APK</button>
            <button>未開放下載</button>
        </div>


    </div>



    <footer>

        <p>&copy;&thinsp;
            <?php echo date('Y') ?>&thinsp;nyxc 版權所有 不得轉載
        </p>
    </footer>


</body>

</html>