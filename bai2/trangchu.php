<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION["username"])){
        header('location:index.php');
    }
    
    ?>
    <h1>trang chủ</h1>;
    <?php
        echo "xin chao ". $_SESSION["username"];
    ?>
</body>
</html> 