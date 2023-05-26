<?php include_once('dbConnect.php');?>
<!DOCTYPE html>
<html>

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
	<nav>
		<ul class="clientMenu1">
		<li class="title"><a href="/"> <img src="img/Logo去背.png" width="50"></a></li>
	</ul>
	</nav>
	
	
<div class="main" id="main">
    <img src="img\index2.PNG" width="100%" >
</div>
<div class="btn_Download">
<button onclick="location.href='/uploadPicture.php'">前往上傳照片</button>   
        </div>
<footer>
	
	<p>&copy;&thinsp;<?php echo date('Y')?>&thinsp;nyxc 版權所有 不得轉載</p>
</footer>

</body>

</html>