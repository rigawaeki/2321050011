<?php
    include("../connect.php");

    if (isset($_GET["id"])) {
        $id_don = $_GET["id"];

        // 1. Lấy room_id từ đơn đặt trước khi xóa để trả lại trạng thái phòng
        $sql = "SELECT room_id FROM don_dat WHERE id = $id_don";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $room_id = $row['room_id'];

            // 2. Cập nhật bảng phong: hoat_dong = 1 (Còn trống)
            $sql_update_room = "UPDATE phong SET hoat_dong = 1 WHERE id = $room_id";
            mysqli_query($conn, $sql_update_room);

            // 3. Xóa đơn đặt
            $sql_delete = "DELETE FROM don_dat WHERE id = $id_don";
            if (mysqli_query($conn, $sql_delete)) {
                echo "<script>window.location.href='index.php?page_layout=phongdadat';</script>";
            } else {
                echo "Lỗi khi xóa: " . mysqli_error($conn);
            }
        } else {
            echo "Đơn đặt không tồn tại.";
        }
    } else {
        header("location: index.php?page_layout=phongdadat");
    }
?>