<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="index.php" method="post">
        <h1>Đăng nhập</h1>
        <div>
            <input type="text" name="username" placeholder="Tên đăng nhâp">
        </div>
        <div>
            <input type="password" name="password" placeholder="Mật khẩu">
        </div>
        <div>
            <input type="submit" value="Đăng Nhập">
        </div>

    </form>
    <?php
        if(isset($_POST['username']) && isset($_POST['password'])){
            $tenDangNhap = $_POST['username'];
            $matKhau = $_POST['password'];
            //Nếu tên đăng nhập = admin
            // mật khẩu 123 thì cho phép người dùng vào trang chủ
            if ($tenDangNhap=="admin" && $matKhau=="123") {
                session_start();
                $_SESSION["username"] = $tenDangNhap;
                header('location: trangchu.php');
            }
            else {
                echo "<p class='Warning'> Sai thong tin </p>";
            }
        }
        
    ?>
</body>
</html>