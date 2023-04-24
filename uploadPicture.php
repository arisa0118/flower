<?php //include_once('dbConnect.php');?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="UseCSS2.css" rel="stylesheet">
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

	
<div class="main">

<div class="logo">
    
    <img src="img\logo.PNG" width="100%">
    
</div>
    <form action="functions.php?op=createOrder" method="post" enctype="multipart/form-data">
        <label for="text">名稱：</label>
        <input type="text" class="person_name" id="person_name" name="person_name" value="匿名" required="required"><br><br>
        <label for="gender">性別：</label><br><br>
        <input type="radio" name="gender" checked="checked" value="男"> 男
        <input type="radio" name="gender" value="女"> 女<br><br>
        <label for="text">留下一句來自您的祝福：</label>
        <textarea type="text"  id="want_tell_text" rows="6"
          cols="30" name="want_tell_text" required="required" placeholder="我想說.."></textarea><br><br>
        <label for="image">拍一張這裡的照片：</label><br><br>
        <input type="file" name="imgfile" data-target="preview_img"
            accept="image/gif,image/jpeg,image/png" required="required"><br><br>
        <label for="image">預覽照片：</label><br>
        <div>
            <img id="preview_img" src="#" width="310" />
        </div>
        <br>
        <input type="checkbox" required="required">同意使用者條款<a href="/privatebook.php"
            style="font-size: 1px;">隱私權與條款細項</a><br><br>

        <Input type="submit" class="btn_submit" name="submit" value="提交">
    </form>

 
    <script>
        //圖片預覽script
        var input = document.querySelector('input[name=imgfile]')
        input.addEventListener('change', function (e) { readURL(e.target) })
        function readURL(input) {
            var imgId = input.getAttribute('data-target')
            var img = document.querySelector('#' + imgId)
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    img.setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        //圖片預覽script end
        
    </script>
    
</div>
<footer>
	
	<p>&copy;&thinsp;<?php echo date('Y')?>&thinsp;nyxc 版權所有 不得轉載</p>
</footer>


</body>

</html>