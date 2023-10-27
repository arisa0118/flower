<?php include_once('dbConnect.php');?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/Logo去背.png">
    <link href="UseCSS2.css" rel="stylesheet">
    <title>
    日月草
    </title>

</head>

<body>
    <nav>
        <ul class="clientMenu">
        <li class="title"><a href="/"> <img src="img/home.png" width="20"></a></li>

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
                    <div class="fileUpload">
                    <input type="file" name="imgfile" data-target="preview_img" accept="image/gif,image/jpeg,image/png"
                        required="required" class="upload" onchange="upload(this)">
                        <span>Upload</span>
                        </div><br><br>
                    <label for="image" >預覽照片：</label><br><br>
                    <div>
                        <img class="preview_img" id="preview_img" src="#" width="250" />
                    </div>
                    <br><br>
                    <input type="checkbox" required="required" ><a style="color: rgb(255, 255, 255);">同意使用者條款</a><a href="/privatebook.php"
                        style="font-size: 10px; color: rgb(195, 226, 255);">隱私權與條款細項</a><br><br>
                </div>
              <br>
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
        function upload(obj) {
     var f = obj.files[0];
     var image = new Image();
     fr.onload = function () {
        //裁剪
        image.src = this.result;

        var cvs = document.createElement('canvas');
        var ctx = cvs.getContext('2d');
        var scale = 1;
        image.onload = function() {
            var max_width = 750, max_height = 480;
            //如果   [宽/高]   >  [最大宽/高]
            if (image.width / image.height >= max_width / max_height) {
                //如果 [宽]>[最大宽] 
                if (image.width > max_width) {
                    cvs.width = max_width;
                    cvs.height = (image.height * max_width) / image.width;
                } else {
                    cvs.width = image.width;
                    cvs.height = image.height;
                }
            } else {
                //如果 [高]>[最大高] 
                if (image.height > max_height) {
                    cvs.height = max_height;
                    cvs.width = (image.width * max_height) / image.height;
                } else {
                    cvs.width = image.width;
                    cvs.height = image.height;
                }
            }

            // if(image.width > 750 || image.height > 480){  
            // //1000只是示例，可以根据具体的要求去设定    
            //     if(image.width > image.height){    
            //         scale = 750 / image.width;  
            //     }else{    
            //         scale = 485 / image.height;    
            //     }    
            // }  
            // cvs.width = image.width*scale;    
            // cvs.height = image.height*scale;     
            //计算等比缩小后图片宽高  
           
            var mpImg = new MegaPixImage(image);
            mpImg.render(cvs, {
              maxWidth: 750,
              maxHeight: 480,
              quality: 0.8,
              orientation: Orientation
            });
            //得到裁剪后base64位图片
            var newImageData = cvs.toDataURL("image/jpeg", 0.8);
            //ajax传到后台处理
    }
    
 } 

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