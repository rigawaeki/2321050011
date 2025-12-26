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
        <h1>Thông tin đơn đặt</h1>
        <div>
            <a class="btn them" href="index.php?page_layout=themdondat">Thêm đơn</a>
            <a class="btn them" href="index.php?page_layout=timkiemdondat">Tìm kiếm</a> 
            <!-- có thể sử dụng form button để gửi đi cho file tìm kiếm thực hiện -->
        </div>
    </div>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Họ tên khách hàng</th>
            <th>Tên phòng</th>
            <th>Ngày đặt</th>
            <th>Thời gian nhận phòng</th>
            <th>Thời gian trả phòng</th>
            <th>Trạng thái thanh toán</th>
            <th>Tổng tiền của đơn</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include("../connect.php");
        $sql = "SELECT dd.* , p.id AS id_phong, ten_phong  , nd.id AS id_nguoi_dung,ho_va_ten, tttt.ten_trang_thai
                FROM `don_dat` dd
                JOIN `phong` p ON p.id=dd.room_id
                JOIN `nguoi_dung` nd ON nd.id=dd.user_id
                JOIN `trang_thai_thanh_toan` tttt ON dd.trang_thai_thanh_toan_id=tttt.id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["ho_va_ten"] ?></td>
                <td><?php echo $row["ten_phong"] ?></td>
                <td><?php echo $row["ngay_dat"] ?></td>
                <td><?php echo $row["thoi_gian_nhan_phong"] ?></td>
                <td><?php echo $row["thoi_gian_tra_phong"] ?></td>
                <td><?php echo $row["ten_trang_thai"] ?></td>
                <td><?php echo $row["tong_tien"] ?></td>
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=suadondat&id=<?php echo $row["id"] ?>">Sửa</a>
                    <a class="btn xoa" href="dondat/xoa.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>