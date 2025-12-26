<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa lịch</title>
</head>
<body>
    <?php
    include("../connect.php");
    if (isset($_GET["id"])) {
        $id_don = $_GET["id"];
        
        // Lấy thông tin đơn đặt hiện tại với tên cột mới
        $sql = "SELECT dd.*, p.ten_phong, p.gia 
                FROM don_dat dd 
                JOIN phong p ON dd.room_id = p.id
                WHERE dd.id = $id_don";
        $result = mysqli_query($conn, $sql);
        $don_dat = mysqli_fetch_assoc($result);
        
        if (!$don_dat) {
            echo "Không tìm thấy đơn đặt!";
            exit;
        }
    } else {
        header('location: index.php?page_layout=phongdadat');
    }
    ?>
    
    <div class="container">
        <form action="index.php?page_layout=sualich&id=<?php echo $id_don; ?>" method="post">
            <h1>Sửa lịch đặt phòng</h1>
            <div>
                <b>Phòng:</b> <?php echo $don_dat['ten_phong']; ?>
            </div>
            <br>
            <div>
                <div>Ngày đặt (Check-in Mới)</div>
                <input type="datetime-local" name="ngay-dat" value="<?php echo date('Y-m-d\TH:i', strtotime($don_dat['thoi_gian_nhan_phong'])); ?>">
            </div>
            <br>
            <div>
                <div>Ngày trả (Check-out Mới)</div>
                 <input type="datetime-local" name="ngay-tra" value="<?php echo date('Y-m-d\TH:i', strtotime($don_dat['thoi_gian_tra_phong'])); ?>">
            </div>
            <br>
            <div class="box">
                <input type="submit" name="btn-update" value="Cập nhật">
                <a href="index.php?page_layout=phongdadat">Quay lại</a>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["btn-update"])) {
        if (!empty($_POST["ngay-dat"]) && !empty($_POST["ngay-tra"])) {
            $ngayNhanMoi = $_POST["ngay-dat"];
            $ngayTraMoi = $_POST["ngay-tra"];
            
            // Cập nhật lại vào đúng 2 cột thời gian
            $sql_update = "UPDATE `don_dat` SET 
                `thoi_gian_nhan_phong` = '$ngayNhanMoi',
                `thoi_gian_tra_phong` = '$ngayTraMoi'
                WHERE id = $id_don";
                
            if (mysqli_query($conn, $sql_update)) {
                echo "<script>alert('Cập nhật thành công!'); window.location.href='index.php?page_layout=phongdadat';</script>";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }

        } else {
            echo "<p class='warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
        }
    }
    ?>
</body>
</html>