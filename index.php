<?php include_once('dbConnect.php');?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="UseCSS.css" rel="stylesheet">
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
  
<div class="main" id="main">
    
    <img src="img\index.PNG" width="100%" >
    
</div>
<div class="context" id="context">
<p class="context_title">作品介紹
</p>
    <p class="context_context">這面補夢網守護著關渡，將一切厄運都拒之門外，而關渡所有的美好記憶則成為守門花的養分。
一個巨大的厄運襲擊向原本平靜的關渡平原，守門花耗盡力量，即將衰竭。請您幫助我們一起延續守門花的生命，您可以拍攝記錄下對於這個地方最美好的記憶，並將照片上傳至網站上，再透過AR軟體觀賞守護這片土地的花朵。
</p>
    
</div>

    
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