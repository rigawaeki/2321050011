    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            table {
                width: 100%;
            }
            .xoa {
                color: white;
                background-color : red;
                padding: 0 10px;
            }
        </style>
    </head>
    <body>
        <header>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1>Thông tin người dùng</h1>
            <div>
                <a class="btn" style="margin-right: 10px;" href="index.php?page_layout=themnguoidung">Thêm người dùng</a>
            </div>
            </div>
        <table border = 1>
            <tr>
                <th>Tên đăng nhập</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Ngày sinh</th>
                <th>Chức năng</th>
            </tr>
            <?php
                include("connect.php");
                $sql = "SELECT nd.*, vt.ten_vai_tro FROM `nguoi_dung` nd
                        JOIN vai_tro vt on nd.vai_tro_id = vt.id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row["ten_dang_nhap"]?></td>
                <td><?php echo $row["ho_ten"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["sdt"] ?></td>
                <td><?php echo $row["ten_vai_tro"] ?></td>
                <td><?php echo $row["ngay_sinh"]?></td>
                <td>
                    <a class="btn" href="index.php?page_layout=capnhatnguoidung&id=<?php echo $row["id"]?>">Cập Nhật</a>
                    <a class="btn" href="xoanguoidung.php?id=<?php echo $row["id"]?>">Xóa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        </header>
        <main>

        </main>
    </body>
    </html>