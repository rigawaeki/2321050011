<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguoi Dung</title>
    <style>
        table {
            width: 100%;
        }

        .xoa {
            background-color: red;
            padding: 0 10px;
            color: #fff;
        }

        td {
            padding: 10px;
        }

        .chuc-nang {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .sua {
            color: black;

        }

        .btn {
            border-radius: 10px;
            border: 1px solid gray;
            padding: 5px;
        }

        .them {
            color: white;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Thông tin người dùng</h1>
        <div>
            <a class="btn them" href="index.php?page_layout=themnguoidung">Thêm người dùng</a>
        </div>
    </div>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include("../connect.php");
        $sql = "SELECT nd.*, vt.ten_vai_tro FROM `nguoi_dung` nd JOIN vai_tro vt on nd.vai_tro_id = vt.id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["ten_dang_nhap"] ?></td>
                <td><?php echo $row["ho_va_ten"] ?></td>
                <td><?php echo $row["ngay_sinh"] ?></td>
                <td><?php echo $row["dia_chi"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["so_dien_thoai"] ?></td>
                <td><?php echo $row["ten_vai_tro"] ?></td>
                
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=suanguoidung&id=<?php echo $row["id"] ?>">Sửa</a>
                    <a class="btn xoa" href="nguoidung/xoa.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>