<?php //include_once('dbConnect.php');?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/Logo去背.png">
    <link href="UseCSS2.css" rel="stylesheet">
    <title>
        flower
    </title>

</head>

<body>
    <nav>
        <ul class="clientMenu">
            <li class="title"><a href="/">flower</a></li>

        </ul>
    </nav>

    <!-- <div class="bg">
    
    <img src="img/bg_1_1.PNG" width="100%">
    
</div>	 -->
    <div class="container">
        <div class="main">

            <div class="logo">

                <!-- <img src="img/bg_1.PNG" width="100%"> -->

            </div>

            <form action="functions.php?op=createOrder" method="post" enctype="multipart/form-data">

                <div class="photo">
                    <label for="image">拍一張這裡的照片：</label><br><br>
                    <input type="file" name="imgfile" data-target="preview_img" accept="image/gif,image/jpeg,image/png"
                        required="required"><br><br>
                    <label for="image">預覽照片：</label><br><br>
                    <div>
                        <img class="preview_img" id="preview_img" src="#" width="250" />
                    </div>
                    <br><br>
                    <input type="checkbox" required="required">同意使用者條款<a href="/privatebook.php"
                        style="font-size: 1px;">隱私權與條款細項</a><br><br>
                </div>
                <br><br>
                <div class="submit">
                    <Input type="submit" class="btn_submit" name="submit" value="提交">
                </div>
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

            <p>&copy;&thinsp;
                <?php echo date('Y') ?>&thinsp;nyxc 版權所有 不得轉載
            </p>
        </footer>

    </div>
</body>

</html>