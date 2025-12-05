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
    <h1>Phim</h1>
    <table border = 1>
        <tr>
            <th>Tên phim</th>
            <th>Đạo Diễn</th>
            <th>Năm phát hành</th>
            <th>Poster</th>
            <th>Quốc Gia</th>
            <th>Số Tập</th>
            <th>Trailer</th>
            <th>Mô tả</th>
            <th>Chức năng</th>
        </tr>
        <?php
            include("connect.php");
            $sql = "SELECT p.*, qg.ten_quoc_gia, vt.ten_vai_tro, nd.ho_ten FROM  phim p
                JOIN  quoc_gia qg on p.quoc_gia_id=qg.id 
                JOIN  nguoi_dung nd ON nd.id=p.dao_dien_id
                JOIN vai_tro vt ON vt.id = nd.vai_tro_id
                GROUP BY p.id" ;
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["ten_phim"]?></td>
            <td><?php echo $row["ho_ten"] ?></td>
            <td><?php echo $row["nam_phat_hanh"] ?></td>
            <td><?php echo $row["poster"] ?></td>
            <td><?php echo $row["quoc_gia_id"] ?></td>
            <td><?php echo $row["so_tap"]?></td>
            <td><?php echo $row["trailer"]?></td>
            <td><?php echo $row["mo_ta"]?></td>
            <td>
                <button>Sửa</button>
                <a class="xoa" href="xoanguoidung.php?id=<?php echo $row["id"]?>">Xóa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>