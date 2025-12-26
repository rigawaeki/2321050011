<?php
    include("../connect.php");
?>
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

        $sql = "INSERT INTO `nguoi_dung`( `ten_dang_nhap`, `mat_khau`, `ho_va_ten`, `ngay_sinh`, `dia_chi`, `so_dien_thoai`, `email`, `vai_tro_id`) 
        VALUES ('$tenDangNhap','$matKhau','$hoVaTen','$ngaySinh','$diaChi','$soDienThoai','$email','$vaiTroId')";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=nguoidung');
        exit();

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }
    }


    ?>

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
    
    <div class="container">
        <form action="index.php?page_layout=themnguoidung" method="post">
            <h1>Thêm người dùng</h1>

            <div>
                <h4>Tên đăng nhập</h4>
                <input type="text" name="ten-dang-nhap" placeholder="Tên đăng nhập">
            </div>
            <div>
                <h4>Mật khẩu</h4>
                <input type="password" name="password" placeholder="Mật khẩu">
            </div>
            <div>
                <h4>Họ và tên</h4>
                <input type="text" name="ho-va-ten" placeholder="Họ tên">
            </div>
            <div>
                <h4>Ngày sinh</h4>
                <input type="date" name="ngay-sinh" placeholder="Ngày sinh">
            </div>
            <div>
                <h4>Địa chỉ</h4>
                <input type="text" name="dia-chi" placeholder="Địa chỉ">
            </div>
            <div>
                <h4>Email</h4>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>
                <h4>Số điện thoại</h4>
                <input type="text" name="so-dien-thoai" placeholder="Số điện thoại">
            </div>
            <div>
                <h4>Vai trò</h4>
                <select id="vai-tro" name="vai-tro">
                    <?php 
                        include("../connect.php");
                        $sql = "SELECT * FROM vai_tro";
                        $result = mysqli_query($conn, $sql);
                        while ($vaiTro = mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $vaiTro['id'] ?>"><?php echo $vaiTro['ten_vai_tro'] ?></option>
                    <?php }?>
                </select>
            </div>
            
            <div class="box">
                <input type="submit" name="submit" value="Thêm mới">
            </div>


        </form>
    </div>
    
    
</body>

</html>