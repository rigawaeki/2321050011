<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat nguoi dung</title>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
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
    </style>
</head>

<body>
    <?php
    include("connect.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM nguoi_dung WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $nguoiDung = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="index.php?page_layout=capnhatnguoidung&id=<?php echo $nguoiDung["id"] ?>" method="post">
            <h1>Cập nhật người dùng</h1>
            <div>
                <input type="text" name="ten-dang-nhap" placeholder="Tên đăng nhập"
                    value="<?php echo $nguoiDung['ten_dang_nhap'] ?>">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mật khẩu"
                    value="<?php echo $nguoiDung['mat_khau'] ?>">
            </div>
            <div>
                <input type="text" name="ho-ten" placeholder="Họ tên" value="<?php echo $nguoiDung['ho_ten'] ?>">
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" value="<?php echo $nguoiDung['email'] ?>">
            </div>
            <div>
                <input type="text" name="so-dien-thoai" placeholder="Số điện thoại"
                    value="<?php echo $nguoiDung['sdt'] ?>">
            </div>
            <div>
                <select id="vai-tro" name="vai-tro">
                    <option value="1" <?php echo ($nguoiDung['vai_tro_id'] == 1) ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo ($nguoiDung['vai_tro_id'] == 2) ? 'selected' : ''; ?>>Đạo diễn</option>
                    <option value="3" <?php echo ($nguoiDung['vai_tro_id'] == 3) ? 'selected' : ''; ?>>Diễn viên</option>
                    <option value="4" <?php echo ($nguoiDung['vai_tro_id'] == 4) ? 'selected' : ''; ?>>Người dùng</option>
                </select>
            </div>
            <div>
                <input type="date" name="ngay-sinh" placeholder="Ngày sinh"
                    value="<?php echo $nguoiDung['ngay_sinh'] ?>">
            </div>
            <div class="box">
                <input type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten-dang-nhap"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["ho-ten"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["so-dien-thoai"]) &&
        !empty($_POST["vai-tro"]) &&
        !empty($_POST["ngay-sinh"])
    ) {
        $tenDangNhap = $_POST["ten-dang-nhap"];
        $matKhau = $_POST["password"];
        $hoTen = $_POST["ho-ten"];
        $email = $_POST["email"];
        $soDienThoai = $_POST["so-dien-thoai"];
        $vaiTro = $_POST["vai-tro"];
        $ngaySinh = $_POST["ngay-sinh"];

        $sql = "UPDATE `nguoi_dung` SET `ten_dang_nhap`='$tenDangNhap',`mat_khau`='$matKhau',`ho_ten`='$hoTen',`email`='$email',`sdt`='$soDienThoai',`vai_tro_id`='$vaiTro',`ngay_sinh`='$ngaySinh' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=nguoidung');

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>