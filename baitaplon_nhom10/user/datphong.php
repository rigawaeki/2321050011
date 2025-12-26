<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng</title>
</head>
<body>
    <?php
    include("../connect.php");
    
    if (isset($_GET['room_id'])) {
        $room_id = $_GET['room_id'];
        
        $sql = "SELECT * FROM phong WHERE id = $room_id";
        $result = mysqli_query($conn, $sql);
        $phong = mysqli_fetch_assoc($result);
    } else {
        header('location: index.php?page_layout=xemphong');
        exit();
    }
    ?>

    <div class="container">
        <form action="index.php?page_layout=datphong&room_id=<?php echo $room_id; ?>" method="post">
            <h1>Đặt phòng: <?php echo $phong['ten_phong']; ?></h1>
            <p>Giá: <?php echo $phong['gia']; ?> USD/ngày</p>

            <div>
                <div>Ngày nhận phòng</div>
                <input type="datetime-local" name="ngay-dat" required>
            </div>
            <div>
                <div>Ngày trả phòng</div>
                <input type="datetime-local" name="ngay-tra" required>
            </div>
            <br>
            <div class="box">
                <input type="submit" name="btn-submit" value="Xác nhận đặt phòng">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["btn-submit"])) {
        $ngayNhanPhong = $_POST["ngay-dat"];
        $ngayTraPhong = $_POST["ngay-tra"];
        
        $username = $_SESSION['username'];

        if (strtotime($ngayTraPhong) <= strtotime($ngayNhanPhong)) {
            echo "<p style='color:red'>Ngày trả phòng phải sau ngày nhận phòng!</p>";
        } else {
            $sql_user = "SELECT id FROM nguoi_dung WHERE ten_dang_nhap = '$username'";
            $res_user = mysqli_query($conn, $sql_user);
            
            if ($res_user && mysqli_num_rows($res_user) > 0) {
                $row_user = mysqli_fetch_assoc($res_user);
                $user_id = $row_user['id'];

                // Tính tổng tiền
                $diff = abs(strtotime($ngayTraPhong) - strtotime($ngayNhanPhong));
                $days = floor($diff / (60*60*24)); 
                
                if($days == 0) $days = 1;
                $tong_tien = $days * $phong['gia'];

                $ngayTaoDon = date("Y-m-d H:i:s"); 

                $sql_insert = "INSERT INTO `don_dat`
                               (`user_id`, `room_id`, `ngay_dat`, `thoi_gian_nhan_phong`, `thoi_gian_tra_phong`, `trang_thai_thanh_toan_id`, `tong_tien`)
                               VALUES 
                               ('$user_id', '$room_id', '$ngayTaoDon', '$ngayNhanPhong', '$ngayTraPhong', 1, '$tong_tien')";
                
                    if (mysqli_query($conn, $sql_insert)) {
                    
                    $sql_update = "UPDATE phong SET hoat_dong = 0 WHERE id = '$room_id'"; 
                    mysqli_query($conn, $sql_update);
                    
                    echo "<script>alert('Đặt phòng thành công!'); window.location.href='index.php?page_layout=phongdadat';</script>";
                
                }
                 
            }
        }
    }
    ?>
</body>
</html>