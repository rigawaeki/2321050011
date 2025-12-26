<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat quoc gia</title>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px solid #ccc;
            width: 30%;
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
            width: 65%;
            margin: auto;
        }
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
        h4 {
            padding-bottom: 0;
            margin-bottom: 0 ;
            margin-top: 5px;
            color: rgb(42, 42, 142);
        }
    </style>
</head>
        
<body>
    <div class="container">
    <form action="index.php?page_layout=timkiemdondat" method="post">
        <h1>Tìm kiếm đơn đặt</h1>
            <div>
                <h4>ID</h4>
                <input type="text" name="id" >
            </div>
            <div>
                <h4>Tên khách hàng</h4>
                <input type="text" name="ten-khach-hang" >
            </div>
            <div>
                <h4>Tên phòng</h4>
                <input type="text" name="ten-phong" >
            </div>
            <div class="box">
                <input type="submit" name="submit" value="chọn">
            </div>
    </form>
    </div>
    <?php 
    if (isset($_POST['submit'])) {
        include("../connect.php");

        $sql = "SELECT dt.* , p.id AS id_phong, p.ten_phong, 
                        nd.id AS id_nguoi_dung, nd.so_dien_thoai
            FROM `don_dat` dt 
            JOIN `phong` p ON p.id=dt.room_id
            JOIN `nguoi_dung` nd ON nd.id=dt.user_id";

        $result = mysqli_query($conn, $sql);
        if(!empty($_POST["id"])){
            $idDonDat =$_POST["id"];
    ?>  
            <table border=1>
        <tr>
            <th>ID</th>
            <th>Họ tên khách hàng</th>
            <th>Tên phòng</th>
            <th>Ngày đặt</th>
            <th>Thời gian nhận phòng</th>
            <th>Thời gian trả phòng</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include("../connect.php");
        $sql = "SELECT dt.* , p.id AS id_phong, ten_phong  , nd.id AS id_nguoi_dung,ho_va_ten FROM `don_dat` dt 
                JOIN `phong` p ON p.id=dt.room_id
                JOIN `nguoi_dung` nd ON nd.id=dt.user_id WHERE dt.id =$idDonDat";
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
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=capnhatnguoidung&id=<?php echo $row["id"] ?>">Cập nhật</a>
                    <a class="btn xoa" href="nguoidung/xoanguoidung.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        </table>        
    <?php }else if(!empty($_POST["ten-khach-hang"])){
            $tenKhachHang =$_POST["ten-khach-hang"];
    ?>  
            <table border=1>
        <tr>
            <th>ID</th>
            <th>Họ tên khách hàng</th>
            <th>Tên phòng</th>
            <th>Ngày đặt</th>
            <th>Thời gian nhận phòng</th>
            <th>Thời gian trả phòng</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include("../connect.php");
        $sql = "SELECT dt.* , p.id AS id_phong, p.ten_phong  , nd.id AS id_nguoi_dung,nd.ho_va_ten FROM `don_dat` dt 
                JOIN `phong` p ON p.id=dt.room_id
                JOIN `nguoi_dung` nd ON nd.id=dt.user_id WHERE nd.ho_va_ten='$tenKhachHang'";
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
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=capnhatnguoidung&id=<?php echo $row["id"] ?>">Cập nhật</a>
                    <a class="btn xoa" href="nguoidung/xoanguoidung.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        </table>        
    <?php }else {
            $tenPhong =$_POST["ten-phong"];
    ?>  
            <table border=1>
        <tr>
            <th>ID</th>
            <th>Họ tên khách hàng</th>
            <th>Tên phòng</th>
            <th>Ngày đặt</th>
            <th>Thời gian nhận phòng</th>
            <th>Thời gian trả phòng</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include("../connect.php");
        $sql = "SELECT dt.* , p.id AS id_phong, p.ten_phong  , nd.id AS id_nguoi_dung,nd.ho_va_ten FROM `don_dat` dt 
                JOIN `phong` p ON p.id=dt.room_id
                JOIN `nguoi_dung` nd ON nd.id=dt.user_id WHERE p.ten_phong='$tenPhong'";
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
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=capnhatnguoidung&id=<?php echo $row["id"] ?>">Cập nhật</a>
                    <a class="btn xoa" href="nguoidung/xoanguoidung.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        </table>        
    <?php }


    }
    ?>

    

</body>

</html>