<?php
include "../../connect.php";
$id = $_GET['id']; 
$sql_check = "SELECT id FROM don_dat WHERE room_id = '$id'";
$result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
        // TRƯỜNG HỢP 1: CÓ ĐƠN ĐẶT -> Thông báo và không xóa
        echo "<script>
                alert('Phòng này đang có đơn đặt hàng, bạn không thể xóa!');
                window.location.href = '../index.php?page_layout=phong';
            </script>";
        exit();
} else {
        // TRƯỜNG HỢP 2: KHÔNG CÓ ĐƠN ĐẶT -> Tiến hành xóa
        $sql_delete = "DELETE FROM phong WHERE id = $id";
        
        if (mysqli_query($conn, $sql_delete)) {
            // Xóa thành công, quay lại trang danh sách
            header("location: ../index.php?page_layout=phong");
            exit();
        } else {
            // Trường hợp lỗi khác (ví dụ bị bảng khác chặn)
            echo "Lỗi khi xóa: " . mysqli_error($conn);
        }
    }
?>