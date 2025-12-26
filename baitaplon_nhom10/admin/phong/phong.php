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
        <h1>Thông tin phòng</h1>
        <div>
            <a class="btn them" href="index.php?page_layout=themphong">Thêm phòng</a>
        </div>
    </div>

    <table border=1>
        <tr>
            <th>Id</th>
            <th>Tên phòng</th>
            <th>Loại phòng</th>
            <th>Số lượng người</th>
            <th>Tầng</th>
            <th>Tình trạng</th>
            <th>Poster</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include("../connect.php");
        $sql = "SELECT 
        p.id, 
        p.ten_phong, 
        p.so_luong_nguoi, 
        p.tang, 
        p.hoat_dong, 
        p.poster, 
        p.mo_ta, 
        p.gia,
        lp.id AS id_loai_phong, 
        lp.ten_loai,
        dd.room_id -- Lấy tất cả thông tin từ bảng đơn đặt
        FROM `phong` p 
        JOIN `loai_phong` lp ON p.loai_phong_id = lp.id
        LEFT JOIN `don_dat` dd ON dd.room_id = p.id;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>  
                <td><?php echo $row["id"] ?></td>  
                <td><?php echo $row["ten_phong"] ?></td>
                <td><?php echo $row["ten_loai"] ?></td>
                <td><?php echo $row["so_luong_nguoi"] ?></td>
                <td><?php echo $row["tang"] ?></td>
                <td>
                    <?php
                    if($row["room_id"]!== null){$row["hoat_dong"]=1;} else {$row["hoat_dong"]=0;}
                    if($row["hoat_dong"]==0){echo "Trống";} else echo "Đã đặt"; 
                    ?>
                </td>
                <td><img src="<?php echo $row["poster"] ?>" alt=""></td>
                <td><?php echo $row["mo_ta"] ?></td>
                <td><?php echo $row["gia"] ?></td>
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=suaphong&id=<?php echo $row["id"] ?>">Sửa</a>
                    <a class="btn xoa" href="phong/xoa.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>