<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phòng đã đặt</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 5px; color: white; }
        .sua { background-color: yellow; color: black; }
        .xoa { background-color: red; }
        .them { background-color: green ; display: inline-block; padding: 10px; margin-bottom: 10px;}
    </style>
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Danh sách đơn đặt phòng</h1>
    </div>

    <table>
        <tr>
            <th>Mã đơn</th>
            <th>Khách hàng</th>
            <th>Tên phòng</th>
            <th>Ngày Check-in</th>
            <th>Ngày Check-out</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include("../connect.php");
        $sql = "SELECT dd.id as ma_don, nd.ho_va_ten, p.ten_phong, dd.thoi_gian_nhan_phong, dd.thoi_gian_tra_phong, tttt.ten_trang_thai, dd.tong_tien
                FROM `don_dat` dd
                JOIN `phong` p ON p.id = dd.room_id
                JOIN `nguoi_dung` nd ON nd.id = dd.user_id
                JOIN `trang_thai_thanh_toan` tttt ON dd.trang_thai_thanh_toan_id = tttt.id
                ORDER BY dd.id DESC"; // Sắp xếp mới nhất lên đầu
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["ma_don"] ?></td>
                    <td><?php echo $row["ho_va_ten"] ?></td>
                    <td><?php echo $row["ten_phong"] ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row["thoi_gian_nhan_phong"])) ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row["thoi_gian_tra_phong"])) ?></td>
                    <td><?php echo $row["ten_trang_thai"] ?></td>
                    <td><?php echo number_format($row["tong_tien"]) ?> USD</td>
                    <td>
                        <a class="btn sua" href="index.php?page_layout=sualich&id=<?php echo $row['ma_don']; ?>">Sửa</a>
                        <a class="btn xoa" href="index.php?page_layout=huylich&id=<?php echo $row['ma_don']; ?>" onclick="return confirm('Bạn chắc chắn muốn hủy lịch này?');">Hủy</a>
                    </td>
                </tr>
                <?php 
            }
        } else {
            echo "<tr><td colspan='8'>Chưa có đơn đặt phòng nào.</td></tr>";
        }
        ?>
    </table>
</body>
</html>