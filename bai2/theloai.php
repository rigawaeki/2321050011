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
    <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1>Thể Loại</h1>
            <div>
                <a style="margin-right: 10px;" class="btn" href="index.php?page_layout=themtheloai">Thêm thể loại </a>
            </div>
            </div>
    <table border = 1>
        <tr>
            <th>ID</th>
            <th>Tên thể loại</th>
            <th>Chức năng</th>
        </tr>
        <?php
            include("connect.php");
            $sql = "SELECT * FROM `the_loai`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["ten_the_loai"] ?></td>
            <td>
                <a class="btn" href="index.php?page_layout=capnhattheloai&id=<?php echo $row["id"]?>">Cập Nhật</a>
                <a class="xoa" href="xoatheloai.php?id=<?php echo $row["id"]?>">Xóa</a>
            </td>
        </tr>
        <?php
            }
        ?>  
    </table>
</body>
</html>