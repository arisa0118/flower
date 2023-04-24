<?php include_once('dbConnect.php');?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="UseCSS1.css" rel="stylesheet">
	<title>
		flower
	</title>
	
</head>

<body>
	<nav>
		<ul class="clientMenu1">
		<li class="title">flower</li>
		<li><a href="/">home</a></li>
		<li><a href="/#flower_intro_call">About</a></li>
	</ul>
	</nav>
    <div class="content"></div>
  
<div class="black-white_1layer" id="flower_intro_call">
    
    <img src="img\black-white_1layer.PNG" width="100%" >
    
</div>
<div class="black-white_2_5layer">
    
  
    </div>
<div class="black-white_2layer" >
    
    <img src="img\black-white_2layer.PNG" width="100%" >
    
</div>
<div class="black-white_3layer">
    
    <img src="img\black-white_3layer.PNG" width="100%">
    
</div>
<div class="black-white_0layer" id="black-white_0layer">
    
    <img src="img\black-white_0layer.PNG" width="100%" >
    <a href="/uploadPicture.php"><div class="ring"></div></a>
	<p>點擊注入能量</p>
    
</div>	

<script>

let black_white_0layer = document.getElementById('black-white_0layer');
let black_white_1layer = document.getElementById('black-white_1layer');
let black_white_2layer = document.getElementById('black-white_2layer');

window.addEventListener('load', ()=>{
// 	black_white_0layer.style.top =Math.round( 1200/320*(screen.width))+ 'px';
//  black_white_1layer.style.top = Math.round( 348/320*(screen.width))+ 'px';

});
// window.addEventListener('scroll', ()=>{
// 	let value = window.scrollY;

// 	black_white_0layer.style.marginTop = value * 2.5+ 'px';
// 	black_white_1layer.style.top = value * -1.5+  'px';
// 	black_white_2layer.style.top = value * 1.5+  'px';
// });

</script>



<footer>
	
	<p>&copy;&thinsp;<?php echo date('Y')?>&thinsp;nyxc 版權所有 不得轉載</p>
</footer>

</body>

</html>