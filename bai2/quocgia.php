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
    <h1>Quốc gia</h1>
    <table border = 1>
        <tr>
            <th>ID</th>
            <th>Quốc gia</th>
            <th>Chức năng</th>
        </tr>
        <?php
            include("connect.php");
            $sql = "SELECT * FROM `quoc_gia` ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["ten_quoc_gia"] ?></td>
            <td>
                
                <a class="xoa" href="xoanguoidung.php?id=<?php echo $row["id"]?>">Xóa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>