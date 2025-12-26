

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
            width: 25%;
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
    </style>
</head>

<body>
    <?php
    include("../connect.php");
    ob_start(); // Bắt đầu lưu vào bộ nhớ đệm
    $id = $_GET["id"];
    $sql = "SELECT * FROM phong WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $phong = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="index.php?page_layout=suaphong&id=<?php echo $phong['id']; ?>" method="post" enctype="multipart/form-data"> 
            <h1>Sửa Thông Tin</h1>

            <div>
                <h4>Tên phòng</h4>
                <input type="text" name="ten-phong" placeholder="ten phong" value="<?php echo $phong['ten_phong'] ?>">
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
                <input type="number" name="so-luong-nguoi" placeholder="so luong nguoi" value="<?php echo $phong['so_luong_nguoi'] ?>">
            </div>
            <div>
                <h4>Tầng</h4>
                <input type="text" name="tang" placeholder="tang" value="<?php echo $phong['tang'] ?>">
            </div>
           <div>
                <h4>Poster</h4>
                <input type="text" name="poster" placeholder="Poster" value="<?php echo $phong['poster'] ?>">
                
            </div>
            <div>
                <h4>Mô tả</h4>
                <textarea name="mo-ta" placeholder="Mô tả<?php echo $phong['mo_ta'] ?>" ></textarea>
            <div>
                <h4>Giá</h4>
                <input type="number" name="gia" placeholder="gia" value="<?php echo $phong['gia'] ?>">
            </div>
            <div class="box">
                <input type="submit" name="submit" value="Sửa">
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
        $poster = $_POST["poster"];
        $moTa = $_POST["mo-ta"];
        $gia = $_POST["gia"];


        $sql = "UPDATE phong SET
                    ten_phong = '$tenPhong',
                    loai_phong_id = '$loaiPhong',
                    so_luong_nguoi = '$soLuongNguoi',
                    tang = '$tang',
                    poster = '$poster',
                    mo_ta = '$moTa',
                    gia = '$gia'
                    WHERE id = '$id'";

                $result = mysqli_query($conn, $sql);
                header('location: index.php?page_layout=phong');
                ob_end_flush(); //Xả bộ nhớ đệm ra để gửi về trình duyệ

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }
    }


    ?>
</body>

</html>