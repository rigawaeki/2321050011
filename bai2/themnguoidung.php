<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>

    <style>
        form {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
        }
        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        input, select {
            margin-bottom: 10px;
            padding: 8px;
        }   
        button {
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- FORM -->
    <form method="post">
        <h1>Thêm người dùng</h1>

        <label>Họ tên</label>
        <input type="text" name="hoten" placeholder="Nhập họ tên">

        <label>Mật khẩu</label>
        <input type="password" name="pwd" placeholder="Nhập mật khẩu">

        <label>Email</label>
        <input type="text" name="email" placeholder="Nhập email">

        <label>Số điện thoại</label>
        <input type="number" name="sdt" placeholder="Nhập số điện thoại">

        <label>Ngày sinh</label>
        <input type="date" name="ngaysinh">

        <label>Giới tính</label>
        <select name="gioitinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
            <option value="Khác">Khác</option>
        </select>

        <label>Chọn quyền</label>
        <select name="id_quyen">
            <option value="1">Admin</option>
            <option value="2">Đạo diễn</option>
            <option value="3">Diễn viên</option>
            <option value="4">Người dùng</option>
        </select>

        <button type="submit">Thêm mới</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (
            !empty($_POST["hoten"]) &&
            !empty($_POST["pwd"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["sdt"]) &&
            !empty($_POST["ngaysinh"]) &&
            !empty($_POST["gioitinh"])
        ) {

            $hoten = $_POST["hoten"];
            $pwd = $_POST["pwd"];
            $email = $_POST["email"];
            $sdt = $_POST["sdt"];
            $ngaysinh = $_POST["ngaysinh"];
            $gioitinh = $_POST["gioitinh"];
            $quyen = $_POST["id_quyen"];

            // Dùng email làm tên đăng nhập
            $tenDN = $hoten;

            include("connect.php");

            $sql = "INSERT INTO nguoi_dung 
                    (ten_dang_nhap, ho_ten, email, ngay_sinh, sdt, vai_tro_id, mat_khau)
                    VALUES
                    ('$tenDN', '$hoten', '$email', '$ngaysinh', '$sdt', '$quyen', '$pwd')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: index.php?page_layout=nguoidung");
                exit;
            } else {
                echo "<p style='color:red;'>Lỗi SQL: " . mysqli_error($conn) . "</p>";
            }

        } else {
            echo "<p style='color:red;'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }
    ?>
</div>

</body>
</html>