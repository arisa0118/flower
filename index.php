<!DOCTYPE html>
<html>
<?php 
include('dbConnect.php');?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/Logo去背.png">
	<link href="UseCSS.css" rel="stylesheet">
	<title>
		flower
	</title>
	
</head>

<body>

<!-- <div class="videobox" >

<iframe width="100%" height="100%" src="https://www.youtube.com/embed/HxHDHd4uPqM?autoplay=1" title="flower" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>	 -->
<div class="main" id="main">

    <img src="img\bg_3.PNG" width="100%" >
</div>
<div class="main_text" id="main_text">
<p> </p>
 
</div>

<div class="btn_Download">
<button onclick="location.href='/uploadPicture.php'">前往上傳最美好的回憶</button>   
        </div>
<footer>
	
	<p >&copy;&thinsp;<?php echo date('Y')?>&thinsp;nyxc 版權所有 不得轉載</p>
</footer>


<!-- <script>
let btn=document.querySelector("#show");
let infoModal=document.querySelector("#infoModal");
let close=document.querySelector("#close");
window.addEventListener("load", function(){
	infoModal.showModal();
})
close.addEventListener("click", function(){
  infoModal.close();
})
	</script> -->
	

</body>

</html>