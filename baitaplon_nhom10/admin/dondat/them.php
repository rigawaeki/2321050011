    <?php
    include("../connect.php");
?>
<?php
    if(isset($_POST['submit'])){
        if (
        !empty($_POST["ho-va-ten"]) &&
        !empty($_POST["room-id"]) &&
        !empty($_POST["gia"]) &&
        !empty($_POST["ngay-dat"]) &&
        !empty($_POST["thoi-gian-nhan-phong"]) &&
        !empty($_POST["thoi-gian-tra-phong"]) &&
        !empty($_POST["tttt"])
    ) {
        $hoVaTen = $_POST["ho-va-ten"];
        include("../connect.php");
        $sql_ho_ten = "SELECT * FROM `nguoi_dung` WHERE ho_va_ten='$hoVaTen';";
        $result_check = mysqli_query($conn, $sql_ho_ten);
        if((mysqli_num_rows($result_check) > 0)){
            $idNguoiDungData = mysqli_fetch_assoc($result_check);
            $idNguoiDung = $idNguoiDungData['id'];
        }else{
            echo "<script>
                alert('Không tìm thấy người dùng! Vui lòng tạo tài khoản mới.');
                window.location.href = 'index.php?page_layout=themnguoidung';
                </script>";
            exit();
        }


        $roomId = $_POST["room-id"];
        $gia= $_POST["gia"];
        $ngayDat = $_POST["ngay-dat"];
        $tgnp = $_POST["thoi-gian-nhan-phong"];
        $tgtp = $_POST["thoi-gian-tra-phong"];
        $tttt = $_POST["tttt"];
        // --- LOGIC TÍNH TỔNG TIỀN ---
            $date_nhan = strtotime($tgnp);
            $date_tra = strtotime($tgtp);
            $hieu_so = $date_tra - $date_nhan;

        // Chia cho 86400 (số giây trong 1 ngày)
            $soNgay = floor($hieu_so / 86400); 

        // Nếu khách ở chưa đầy 1 ngày hoặc đi trong ngày, tính là 1 ngày
            if($soNgay <= 0) $soNgay = 1;

            $tongTien = $soNgay * $gia;
        // ----------------------------
        
        
        $sql = "INSERT INTO `don_dat`(`user_id`, `room_id`, `ngay_dat`, `thoi_gian_nhan_phong`, `thoi_gian_tra_phong`, `trang_thai_thanh_toan_id`, `tong_tien`) 
            VALUES ('$idNguoiDung', '$roomId', '$ngayDat', '$tgnp', '$tgtp', '$tttt', '$tongTien')";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=dondat');
        exit();

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }
    }


    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đơn hàng</title>

    <style>
        body{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px solid #ccc;
            width: 33%;
            margin: auto;
            background-color: rgb(198, 198, 207);
            border-radius: 10px;
        }

        .warning {
            color: red;
            display: flex;
            justify-content: center;
        }

        form div{
            width: 70%;
            margin: auto;
        }
        h4 {
            padding-bottom: 0;
            margin-bottom: 0 ;
            margin-top: 5px;
            color: rgb(42, 42, 142);
        }
        form{
        
        }
        .box{
        margin-bottom: 10px ;
        }
        h1{  
        margin: auto; 
        margin-left: 33px ;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <form action="index.php?page_layout=themdondat" method="post">
            <h1>Thêm đơn đặt</h1>

            <div>
                <h4>Họ và tên</h4>
                <input type="text" name="ho-va-ten" placeholder="Họ và Tên">
            </div>
            <div>
                <h4>Phòng</h4>
                <select id="room-id" name="room-id" onchange="capNhatGia()">
                    <option value="">Chọn phòng</option>
                    <?php 
                        include("../connect.php");
                        $sql = "SELECT * FROM phong WHERE hoat_dong=0";
                        $result = mysqli_query($conn, $sql);
                        while ($phong = mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $phong['id'] ?>" 
                        data-gia="<?= $phong['gia'] ?>">
                        <?php echo  $phong['ten_phong']?></option>
                    <?php }?>
                </select>
            </div>
            <div>
                <h4>Giá</h4>
                <input type="number" name="gia" id="gia" readonly>
                    <script>
                        function capNhatGia() {
                        const select = document.getElementById("room-id");
                        const gia = select.options[select.selectedIndex].dataset.gia;
                        document.getElementById("gia").value = gia ?? "";
                        }
                    </script>
            </div>
            <div>
                <h4>Ngày đặt</h4>
                <input type="date" name="ngay-dat" placeholder="Thời gian đặt phòng">
            </div>
            <div>
                <h4>Thời gian nhận phòng</h4>
                <input type="datetime" name="thoi-gian-nhan-phong" placeholder="Thời gian nhận phòng">
            </div>
            <div>
                <h4>Thời gian trả phòng</h4>
                <input type="datetime" name="thoi-gian-tra-phong" placeholder="Thời gian trả phòng">
            </div>
            <div>
                <h4>Tình trạng thanh toán</h4>
                <select id="tttt" name="tttt">
                    <?php 
                        include("../connect.php");
                        $sql = "SELECT * FROM trang_thai_thanh_toan ";
                        $result = mysqli_query($conn, $sql);
                        while ($tttt = mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $tttt['id'] ?>"><?php echo  $tttt['ten_trang_thai'] ?></option>
                    <?php }?>
                </select>
            </div>
            
            <div class="box">
                <input type="submit" name="submit" value="Thêm mới">
            </div>
        </form>
    </div>

    
</body>

</html>