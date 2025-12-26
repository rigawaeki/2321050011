<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            width: 65%;
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
    <?php 
    include("../connect.php");
    ob_start();
    $id=$_GET['id'];
    $sql_id="SELECT * FROM `loai_phong` lp WHERE lp.id =$id";
    $result_id=mysqli_query($conn,$sql_id);
    $loaiPhong=mysqli_fetch_assoc($result_id);
    ?>
    <div class="container">
        <form action="index.php?page_layout=sualoaiphong&id=<?php echo $id ?>" method="post">
            <h1>Sửa</h1>
            <div>
                <h4>Loại phòng</h4>
                <input type="text" name="loai-phong" value="<?php echo $loaiPhong['ten_loai'] ?>">
            </div>
            <div>
                <h4>Mô tả</h4>
                <textarea name="mo-ta" placeholder="Mô tả<?php echo $loaiPhong['mo_ta_loai'] ?>"></textarea>
            </div>
            <div class="box">
                <input type="submit" name="submit" value="Sửa">
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        if(
            !empty($_POST["loai-phong"]) &&
            !empty($_POST["mo-ta"]) 
        ){
            $loaiPhong=$_POST["loai-phong"];
            $moTa=$_POST["mo-ta"];

            $sql="UPDATE `loai_phong` 
            SET `ten_loai`='$loaiPhong',
            `mo_ta_loai`='$moTa' WHERE id=$id";
            $result=mysqli_query($conn,$sql);
            header('location: index.php?page_layout=loaiphong');
        }else{

        }
    }
    ?>
</body>
</html>