<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xem phòng</title>
    <style>
        .list-container {
            width: 80%;
            margin: 0 auto;
        }
        .anh_phong {
            display: flex;
            margin: 30px 0;
            gap: 20px;
            border: 1px solid #ddd; /* Thêm khung cho gọn */
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #fff;
        }
        .anh_phong img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .thongtin-phong {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex: 1;
        }
        .status-available { color: green; font-weight: bold; }
        .status-booked { color: red; font-weight: bold; }
        
        /* Style cho nút đặt phòng */
        .btn-datphong {
            display: inline-block;
            padding: 10px 20px;
            background-color: crimson;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-datphong:hover {
            background-color: #a71d38;
        }

        /* Style cho nút khi bị vô hiệu hóa (Phòng đã đặt) */
        .btn-disabled {
            background-color: #ccc;
            color: #666;
            pointer-events: none; /* Không cho click */
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="list-container">
        <h1 style="text-align: center; margin-top: 20px;">Danh Sách Các Phòng</h1>

        <?php
        include "../connect.php"; 

        // Lấy TẤT CẢ phòng để khách thấy cả phòng đang bận
        $sql = "SELECT * FROM phong";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                // Kiểm tra trạng thái để gán class CSS và text
                $is_available = ($row['hoat_dong'] == 1);
                $status_text = $is_available ? 'Còn trống' : 'Đã được đặt / Tạm ngưng';
                $status_class = $is_available ? 'status-available' : 'status-booked';
                // Nếu phòng bận thì thêm class disabled cho nút
                $btn_class = $is_available ? 'btn-datphong' : 'btn-datphong btn-disabled';
                $btn_text = $is_available ? 'Đặt Phòng Ngay' : 'Hết phòng';
                ?>
                
                <div class="anh_phong">
                    <img src="../anhphong/p<?php echo $row['id']; ?>/1.jpeg" 
                         alt="Ảnh phòng <?php echo $row['ten_phong']; ?>"> 
                         <div class="thongtin-phong">
                        <div>
                            <h2 style="margin-top: 0; color: #333;"><?php echo $row['ten_phong']; ?></h2>
                            <p><b>Giá: </b> <span style="color: crimson; font-size: 1.2em;"><?php echo number_format($row['gia']); ?> USD</span> / đêm</p>
                            <p>
                                <b>Tình trạng:</b> 
                                <span class="<?php echo $status_class; ?>">
                                    <?php echo $status_text; ?>
                                </span>
                            </p>
                            <p><b>Mô tả: </b><?php echo $row['mo_ta']; ?></p>
                        </div>
                        
                        <div style="text-align: right;">
                            <a href="index.php?page_layout=datphong&room_id=<?php echo $row['id']; ?>" 
                               class="<?php echo $btn_class; ?>">
                               <?php echo $btn_text; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center;'>Hiện chưa có dữ liệu phòng nào.</p>";
        }
        ?>
    </div>
</body>
</html>