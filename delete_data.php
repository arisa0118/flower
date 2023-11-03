<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/Logo去背.png">
	<link href="UseCSS.css" rel="stylesheet">
	<title>
	日月草

	</title>
	
</head>

<body>
<!-- <?php 
// global $a,$b,$c;
// $a=1;
// $b=2;
// function AllDelete()
// {
    
	
// }
// function DeleteOne()
// {
   
// }

?>
<script language="JavaScript">
function bt_click1(){
    <?php //AllDelete(); ?>
}
function bt_click2(){
    <?php //DeleteOne(); ?>
}
</script>
<input type="submit" name="submitButton" value="全部清除" onclick="bt_click1();"  />
<input type="submit" name="submitButton" value="刪除最前面一筆" onclick="bt_click2();"  /> -->

<?php
include('dbConnect.php');

        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        } 
        function button1() { 
            global $dbConnection;
            $sql = "DELETE FROM person_data ;";
                $result = mysqli_query($dbConnection, $sql);
                $sql = "ALTER TABLE person_data AUTO_INCREMENT = 1;";
                $result = mysqli_query($dbConnection, $sql);
            echo "已全部清除";
        } 
        function button2() { 
            global $dbConnection;
            $sql = "SELECT person_id FROM person_data ORDER BY TIME LIMIT 1;";
                    $result = mysqli_query($dbConnection, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $query2 = "DELETE FROM person_data WHERE person_id=" . $row['person_id'];
                    //刪資料夾照片
                    $query_run2 = mysqli_query($dbConnection, $query2);
            echo "已刪除最前面一筆";
            
        } 
    ?> 
  
    <form method="post"> 
        <input type="submit" name="button1"
                class="button" value="全部清除" /> 
          
        <input type="submit" name="button2"
                class="button" value="刪除最前面一筆" /> 
    </form> 





<footer>

<p>&copy;&thinsp;
    <?php echo date('Y') ?>&thinsp;nyxc 版權所有 不得轉載
</p>
</footer>
</body>

</html>