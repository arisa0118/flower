<?php include('header.php');

?>
<div class="main">
    <form action="functions.php?op=createOrder" method="post" enctype="multipart/form-data">
        <label for="text">名稱：</label>
        <input type="text" id="person_name" name="person_name" value="匿名" required="required"><br><br>
        <label for="gender">性別：</label><br><br>
        <input type="radio" name="gender" checked="checked" value="男"> 男
        <input type="radio" name="gender" value="女"> 女<br><br>
        <label for="text">你想說的話：</label>
        <input type="text" id="want_tell_text" name="want_tell_text" required="required" placeholder="我想說.."><br><br>
        <label for="image">拍一張這裡的照片：</label><br><br>
        <input type="file" id="imgfile" name="imgfile" onchange="upload(this)" data-target="preview_img"
            accept="image/gif,image/jpeg,image/png" required="required"><br><br>
        <label for="image">預覽照片：</label><br>
        <div>
            <img id="preview_img" src="#" width="330" />
        </div>
        <br>
        <input type="checkbox" required="required">同意使用者條款<a href="/private.php"
            style="font-size: 1px;">隱私權與條款細項</a><br><br>

        <Input type="submit" class="btn_submit">
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
        //圖片裁剪
        function upload(obj){
            var f = obj.files[0];
            var image = new Image();
            fr.onload = function () {
                //裁剪
                image.src = this.result;

                var cvs = document.createElement('canvas');
                var ctx = cvs.getContext('2d');
                var scale = 1;
                image.onload = function () {
                    var max_width = 600, max_height = 400;
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
  
                
                    var mpImg = new MegaPixImage(image);
                    mpImg.render(cvs, {
                        maxWidth: 600,
                        maxHeight: 400,
                        quality: 0.8,
                        orientation: Orientation
                    });
                    //得到裁剪后base64位图片
                    var newImageData = cvs.toDataURL("image/jpeg", 0.8);
                    //ajax传到后台处理
                }

            } 
            //圖片裁剪end
    </script>
    
</div>
<?php include('footer.php');

//參考:預覽照片https://www.youtube.com/watch?v=hUphKQ8uXVo
?>