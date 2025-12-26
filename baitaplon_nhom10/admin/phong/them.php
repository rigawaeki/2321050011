

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them nguoi dung</title>

    <style>
        body{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px solid #ccc;
            width: 33%;
            margin: auto;
            background-color: rgb(198, 198, 207);
            border-radius: 10px;
        }

        .warning {
            color: red;
            display: flex;
            justify-content: center;
        }

        form div{
            width: 65%;
            margin: auto;
        }
        h4 {
            padding-bottom: 0;
            margin-bottom: 0 ;
            margin-top: 5px;
            color: rgb(42, 42, 142);
        }
        form{
        
        }
        .box{
        margin-bottom: 10px ;
        }
        h1{  
        margin: auto; 
        margin-left: 33px ;
        }
    </style>
</head>

<body>
    <?php
    include("../connect.php");
    ob_start(); // Bắt đầu lưu vào bộ nhớ đệm
    ?>
    <div class="container">
        <form action="index.php?page_layout=themphong" method="post" enctype="multipart/form-data"> 
            <h1>Thêm phòng</h1>

            <div>
                <h4>Tên phòng</h4>
                <input type="text" name="ten-phong" placeholder="ten phong">
            </div>
            <div>
                <h4>Loại phòng</h4>
                <select id="loai-phong" name="loai-phong">
                    <?php
                    $sql = "SELECT * FROM `loai_phong`";
                    $result = mysqli_query($conn, $sql);
                    while ($loaiPhong = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value=<?php echo $loaiPhong['id'] ?>><?php echo $loaiPhong['ten_loai'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <h4>Số lượng người</h4>
                <input type="number" name="so-luong-nguoi" placeholder="so luong nguoi">
            </div>
            <div>
                <h4>Tầng</h4>
                <input type="text" name="tang" placeholder="tang">
            </div>
            <div>
                <h4>Poster</h4>
                <input type="file" name="fileToUpload" placeholder="Poster">
            </div>
            <div>
                <h4>Mô tả</h4>
                <textarea name="mo-ta" placeholder="Mô tả" ></textarea>
            </div>
            <div>
                <h4>Giá</h4>
                <input type="number" name="gia" placeholder="gia">
            </div>
            <div class="box">
                <input type="submit" name="submit" value="Thêm mới">
            </div>


        </form>
    </div>
    <?php
    include("../connect.php");
    ?>
    <?php
    if(isset($_POST['submit'])){
        if (
        !empty($_POST["ten-phong"]) &&
        !empty($_POST["loai-phong"]) &&
        !empty($_POST["so-luong-nguoi"]) &&
        !empty($_POST["tang"]) &&
        !empty($_POST["mo-ta"]) &&
        !empty($_POST["gia"])
    ) {
        $tenPhong = $_POST["ten-phong"];
        $loaiPhong = $_POST["loai-phong"];
        $soLuongNguoi = $_POST["so-luong-nguoi"];
        $tang = $_POST["tang"];
        $moTa = $_POST["mo-ta"];
        $gia = $_POST["gia"];


        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem file ảnh có hợp lệ không
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File không phải là ảnh.";
                $uploadOk = 0;
            }
        }

        // Kiểm tra nếu file đã tồn tại
        if (file_exists($target_file)) {
            echo "File này đã tồn tại trên hệ thông";
            $uploadOk = 2;
        }

        // Kiểm tra kích thước file
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "File quá lớn";
            $uploadOk = 0;
        }

        // Cho phép các định dạng file ảnh nhất định
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận.";
            $uploadOk = 0;
        }

        #Kết thúc xử lý ảnh
        if ($uploadOk == 0) {
            echo "File của bạn chưa được tải lên";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //Đoạn code xử lý login ban đầu
                $sql = "INSERT INTO `phong` 
                (`ten_phong`, `loai_phong_id`, `so_luong_nguoi`, `tang`, `poster`, `mo_ta`, `gia`) 
                VALUES 
                ('$tenPhong', '$loaiPhong', '$soLuongNguoi', '$tang', '$target_file', '$moTa', '$gia')";
                $result = mysqli_query($conn, $sql);
                header('location: index.php?page_layout=phong');
                ob_end_flush(); //Xả bộ nhớ đệm ra để gửi về trình duyệt
            }

        }

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }
    }


    ?>
</body>

</html>