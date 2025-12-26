

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them nguoi dung</title>

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
            width: 25%;
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
            width: 80%;
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
    </style>
</head>

<body>
    <?php
    include("../connect.php");
    ob_start(); // Bắt đầu lưu vào bộ nhớ đệm
    $id = $_GET["id"];
    $sql = "SELECT * FROM `don_dat` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $donDat = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="index.php?page_layout=suadondat&id=<?php echo $donDat['id']; ?>" method="post" > 
            <h1>Sửa Thông Tin</h1>
            <div>
                <?php
                include("../connect.php");
                $sql_ho_ten = "SELECT dd.*, nd.id AS id_nguoi_dung, nd.ho_va_ten FROM `don_dat` dd 
                                join `nguoi_dung` nd on dd.user_id = nd.id where dd.id=$id";
                $result_check = mysqli_query($conn, $sql_ho_ten);
                $hoTen= mysqli_fetch_assoc($result_check)
                ?>
                <h4>Họ và tên</h4>
                <input type="text" name="ho-va-ten" value="<?php echo $hoTen['ho_va_ten'] ?>">
            </div>





            <div>
                <?php
                include("../connect.php");
                $sql_ho_ten = "SELECT dd.*, p.id AS id_phong, p.ten_phong, p.gia FROM `don_dat` dd 
                                join `phong` p on dd.room_id = p.id where dd.id=$id ";
                $result_check = mysqli_query($conn, $sql_ho_ten);
                $phong= mysqli_fetch_assoc($result_check);


                $roomDangChon = $phong['room_id'];

                $giaRoomDangChon =$phong['gia'];

                ?>
                <h4>Phòng</h4>
                <select id="room-id" name="room-id" onchange="capNhatGia()">
                    <option value="">Chọn phòng</option>
                    <?php 
                        include("../connect.php");
                        $sql = "SELECT * FROM phong";
                        $result = mysqli_query($conn, $sql);
                        while ($phong = mysqli_fetch_assoc($result)){
                        $selected = ($phong['id'] == $roomDangChon) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $phong['id'] ?>" 
                            data-gia="<?= $phong['gia'] ?>"
                            <?= $selected ?>>
                            <?php echo $phong['ten_phong']?>
                        </option>

                    <?php }?>
                </select>
            </div>







            <div>
                <h4>Giá</h4>
                <input type="number" name="gia" id="gia"
                    value="<?= $giaRoomDangChon ?>" readonly>
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
                <input type="datetime" name="ngay-dat" value="<?php echo $donDat['ngay_dat'] ?>" >
            </div>
            <div>
                <h4>Thời gian nhận phòng</h4>
                <input type="datetime" name="thoi-gian-nhan-phong" value="<?php echo $donDat['thoi_gian_nhan_phong'] ?>">
            </div>
            <div>
                <h4>Thời gian trả phòng</h4>
                <input type="datetime" name="thoi-gian-tra-phong" value="<?php echo $donDat['thoi_gian_tra_phong'] ?>">
            </div>


            <div>
                <h4>Tình trạng thanh toán</h4>
                <select id="tttt" name="tttt">
                    <?php 
                        $sql = "SELECT dd.* , tttt.id AS tttt_id, tttt.ten_trang_thai 
                        FROM don_dat dd 
                        JOIN trang_thai_thanh_toan tttt 
                        ON dd.trang_thai_thanh_toan_id=tttt.id 
                        WHERE dd.id=$id";
                        $result_now = mysqli_query($conn, $sql);
                        $donDatNow = mysqli_fetch_assoc($result_now);
                        $ttttNow =$donDatNow['trang_thai_thanh_toan'];




                        $sql = "SELECT * FROM trang_thai_thanh_toan";
                        $result1 = mysqli_query($conn, $sql);
                        $tttt = mysqli_fetch_assoc($result1);
                        while ($tttt = mysqli_fetch_assoc($result1)){
                            $selected = ($tttt['id'] == $ttttNow) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $tttt['id'] ?>" <?php echo $selected ?>> <?php echo $tttt['ten_trang_thai'] ?></option>
                    <?php }?>
                </select>
            </div>
            
            <div class="box">
                <input type="submit" name="submit" value="Sửa">
            </div>


        </form>
    </div>
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
        $sql_ho_ten = "SELECT * FROM `nguoi_dung` WHERE ho_va_ten='$hoVaTen'";
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
        
        
        $sql = "UPDATE don_dat 
        SET 
            user_id = '$idNguoiDung',
            room_id = '$roomId',
            ngay_dat = '$ngayDat',
            thoi_gian_nhan_phong = '$tgnp',
            thoi_gian_tra_phong = '$tgtp',
            trang_thai_thanh_toan_id = '$tttt',
            tong_tien = '$tongTien'
        WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=dondat');
        exit();

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }
    }


    ?>
</body>

</html>