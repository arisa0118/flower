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
        <input type="file" id="imgfile" name="imgfile" data-target="preview_img" accept="image/gif,image/jpeg,image/png"
            required="required"><br><br>
        <label for="image">預覽照片：</label><br>
        <div>
            <img id="preview_img" src="#" width="330" />
        </div>
        <br>
        <input type="checkbox" required="required">同意使用者條款<a href="/private.php" style="font-size: 1px;">隱私權與條款細項</a><br><br>

        <Input type="submit" class="btn_submit">
    </form>

    <!-- 圖片預覽script -->
    <script>
        var input = document.querySelector('input[name=imgfile]')
        input.addEventListener('change', function (e) { readURL(e.target) })
        // $("#img").change(function () {
        //     //當檔案改變後，做一些事 
        //     readURL(this);   // this代表<input id="img">
        // });

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
    </script>
    <!-- 圖片預覽script end -->
</div>
<?php include('footer.php');

//參考:預覽照片https://www.youtube.com/watch?v=hUphKQ8uXVo
?>