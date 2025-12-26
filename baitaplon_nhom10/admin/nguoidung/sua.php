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
    $sql = "SELECT * FROM nguoi_dung WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $nguoiDung = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="index.php?page_layout=suanguoidung&id=<?php echo $nguoiDung["id"] ?>" method="post">
            <h1>Sửa Thông Tin</h1>

            <div>
                <h4>Tên đăng nhập</h4>
                <input type="text" name="ten-dang-nhap" placeholder="Tên đăng nhập" 
                value="<?php echo $nguoiDung['ten_dang_nhap']?>">
            </div>
            <div>
                <h4>Mật khẩu</h4>
                <input type="password" name="password" placeholder="Mật khẩu" 
                value="<?php echo $nguoiDung['mat_khau'] ?>">
            </div>
            <div>
                <h4>Họ và tên</h4>
                <input type="text" name="ho-va-ten" placeholder="Họ tên" 
                value="<?php echo $nguoiDung['ho_va_ten'] ?>">
            </div>
            <div>
                <h4>Ngày sinh</h4>
                <input type="datetime" name="ngay-sinh" placeholder="Ngày sinh" 
                value="<?php echo $nguoiDung['ngay_sinh'] ?>">
            </div>
            <div>
                <h4>Địa chỉ</h4>
                <input type="text" name="dia-chi" placeholder="Địa chỉ" 
                value="<?php echo $nguoiDung['dia_chi'] ?>">
            </div>
            <div>
                <h4>Email</h4>
                <input type="email" name="email" placeholder="Email" 
                value="<?php echo $nguoiDung['email'] ?>">
            </div>
            <div>
                <h4>Số điện thoại</h4>
                <input type="text" name="so-dien-thoai" placeholder="Số điện thoại" 
                value="<?php echo $nguoiDung['so_dien_thoai'] ?>">
            </div>
            <div>
                <h4>Vai trò</h4>
                <select id="vai-tro" name="vai-tro">
                    <option value="1" <?= ($nguoiDung['vai_tro_id']==1)?'selected':'' ?>>Admin</option>
                    <option value="2" <?= ($nguoiDung['vai_tro_id']==2)?'selected':'' ?>>User</option>
                </select>
            </div>
            
            <div class="box">
                <input type="submit" name="submit" value="Sửa">
            </div>


        </form>
    </div>
<?php
    if(isset($_POST['submit'])){
        if (
        !empty($_POST["ten-dang-nhap"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["ho-va-ten"]) &&
        !empty($_POST["ngay-sinh"]) &&
        !empty($_POST["dia-chi"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["so-dien-thoai"]) &&
        !empty($_POST["vai-tro"])
    ) {
        $tenDangNhap = $_POST["ten-dang-nhap"];
        $matKhau = $_POST["password"];
        $hoVaTen = $_POST["ho-va-ten"];
        $ngaySinh = $_POST["ngay-sinh"];
        $diaChi = $_POST["dia-chi"];
        $email = $_POST["email"];
        $soDienThoai = $_POST["so-dien-thoai"];
        $vaiTroId = $_POST["vai-tro"];

        $sql = "UPDATE nguoi_dung SET
                ten_dang_nhap = '$tenDangNhap',
                mat_khau = '$matKhau',
                ho_va_ten = '$hoVaTen',
                ngay_sinh = '$ngaySinh',
                dia_chi = '$diaChi',
                so_dien_thoai = '$soDienThoai',
                email = '$email',
                vai_tro_id = '$vaiTroId'
                WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=nguoidung');
        exit();

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }
    }


    ?>
    
</body>

</html>