<?php
include("../../connect.php");

$id = $_GET['id'];

// Kiểm tra user có đơn đặt hay không
$sql_check = "SELECT id FROM don_dat WHERE user_id = '$id'";
$result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
        // TRƯỜNG HỢP 1: CÓ ĐƠN ĐẶT -> Thông báo và không xóa
        echo "<script>
                alert('Người dùng này đang có đơn đặt hàng, bạn không thể xóa!');
                window.location.href = '../index.php?page_layout=nguoidung';
                </script>";
        exit();
}else {
        $sql = "DELETE FROM nguoi_dung WHERE id = '$id'";
        mysqli_query($conn, $sql);

        header("Location: ../index.php?page_layout=nguoidung");
        exit();
}

?>