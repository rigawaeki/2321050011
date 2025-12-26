<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2</title>

    <style>
        .warning {
            color: red;
        }
    </style>
</head>

<body>

    <form action="login.php" method="post">
        <h1>Đăng nhập</h1>
        <div>
            <input type="text" name="username" placeholder="Tên đăng nhập">
        </div>
        <div>
            <input type="password" name="password" placeholder="Mật khẩu">
        </div>
        <div>
            <input type="submit" name="submit" value="Đăng Nhập">
        </div>
    </form>
    <?php
    include("connect.php");
    if (isset($_POST['submit'])) 
    {
        if (isset($_POST['username']) && isset($_POST['password'])) 
        {

            $tenDangNhap = $_POST['username'];
            $matKhau = $_POST['password'];


            $sql = "select * from nguoi_dung where ten_dang_nhap = '$tenDangNhap' and mat_khau = '$matKhau'";

            $result = mysqli_query($conn, $sql);

            $nguoiDung = mysqli_fetch_assoc($result);


            if (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION["username"] = $tenDangNhap;
                // phân cấp người dùng
                if($nguoiDung["vai_tro_id"]==1)
                header('location: ./admin/index.php');
                else{
                    header('location: ./user/index.php');
                }
    } else {
                echo "<p class='warning'>Đã nhập sai!!! Vui lòng nhập lại</p>";
            }
            }
        exit(); // Luôn dùng exit sau header để dừng script
    }// nếu nhấn submit thì mới thực hiện câu lệnh tránh trường hợp in ra warning
    
    ?>


</body>

</html>