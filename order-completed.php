<?php include('header_color.php'); ?>
<div class="colorBG" >

</div>
<div class="TITLE">
    
<h1 id="text1">Flower</h1>

</div>

<div class="TITLE_flower1" >
<img src="img\IMG_2223.PNG" id="flowers" width="100%">
</div>
<div class="TITLE_flower">
<img src="img\flowers2.PNG" id="flowers" width="100%">
</div>
<div class="cover">

</div>
<div class="TITLE_note">
<img src="img\flower_frame.PNG" id="flowers" width="100%">
</div>
<div class="TITLE_note1">
<div class="note1_container">
<?php
include_once('dbConnect.php');
$sql = "SELECT * FROM person_data";
$result = mysqli_query($dbConnection,$sql);
$row = mysqli_fetch_assoc($result);
if($row['person_name']=="匿名"){
    echo $row['person_name'].'('.$row['gender'].'):<br>';
}else{
    echo $row['person_name'].':<br>';
}
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['text'];
  
 
?>
</div>
</div>

<div class="container">
	<p>請點擊下方下載app 見證花朵的生命力</p>
</div>
<div class="text_Download">

<p>Android</p>
<p>ios</p>
</div>
<div class="icon_Download">

<img src="img\andriod2.PNG" id="flowers" width="50%" >
<img src="img\ios2.PNG" id="flowers" width="50%" >
</div>
<div class="btn_Download">

<button>下載</button>
<button>下載</button>
</div>







<?php include('footer_color.php'); ?>