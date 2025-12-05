<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat nguoi dung</title>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
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
    </style>
</head>

<body>
    <?php
    include("connect.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM the_loai WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $theLoai = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="index.php?page_layout=capnhattheloai&id=<?php echo $theLoai["id"] ?>" method="post">
            <h1>Cập nhật thể loại</h1>
            <div>
                <input type="text" name="ten_the_loai" placeholder="Tên thể loại"
                    value="<?php echo $theLoai['ten_the_loai'] ?>">
            </div>
            <div class="box">
                <input type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten_the_loai"])
        
    ) {
        $tenTheLoai = $_POST["ten_the_loai"];
        

        $sql = "UPDATE the_loai SET ten_the_loai='$tenTheLoai' WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=theloai');

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>