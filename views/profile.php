<?php
require_once '../Config.php';
if(isset($_FILES['img_file'])){
    $errors= array();
    $file_name = $_FILES['img_file']['name'];
    $file_size = $_FILES['img_file']['size'];
    $file_tmp = $_FILES['img_file']['tmp_name'];
    $file_type = $_FILES['img_file']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['img_file']['name'])));

    $expensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152) {
        $errors[]='File size must be excately 2 MB';
    }
    if(empty($errors)==true) {
       $target_path = "../public/UploadedImages/" . $file_name;
        move_uploaded_file($file_tmp,$target_path);
        $conn = connection::createConnection();
        $query = "INSERT INTO user (img_path) VALUES ('$target_path')";
        if (!$conn ->query($query)) {
            echo " INSERT failed: (" . $conn ->errno . ") " . $conn ->error;
        } else
            echo "done";
        $query = "SELECT `img_path` FROM `user` where `id` = 35";
        $res = $conn->query($query);
        $img_path = $res->fetch_assoc();
        $img_path =  $img_path['img_path'];
        echo "<img src='$img_path'>";

        connection::closeConnection($conn);
    }else{
        print_r($errors);
        echo "error";
    }



}
?>

<html>
<body>
<img src="E:\UploadedImages\s.jpg" alt="">

<form action = "" method = "POST" enctype = "multipart/form-data" onsubmit="return validateImg();">
    <input type = "file" name = "img_file" id="img_file" />
    <input type = "submit" class="submit_button" value="Submit" name="s"/>

    <ul>
        <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
        <li>File size: <?php echo $_FILES['image']['size'];  ?>
        <li>File type: <?php echo $_FILES['image']['type'] ?>
    </ul>

</form>

<img src="<?php echo $img_path;?>" alt="">
<script>
    function validateImg() {
        var imgPath = document.getElementById("img_file").value;
        var exetensions =  ['jpg','jpeg','png','gif', 'bmp'];
        var getExt = imgPath.split('.');
        getExt = getExt.reverse();
        if (imgPath.length > 0) {
            if (exetensions.includes(getExt[0].toLowerCase())) {
                return true;
            } else {
                alert("Upload only jpg, jpeg, png, gif, bmp images");
                return false;
            }
        } else {
            alert("please enter an image");
            return false;
        }
    }


</script>
</body>
</html>