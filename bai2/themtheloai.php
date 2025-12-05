   <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>

    <style>
        form {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
        }
        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        input, select {
            margin-bottom: 10px;
            padding: 8px;
        }   
        button {
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- FORM -->
    <form method="post">
        <h1>Thêm thể loại</h1>
        <label>Thể loại</label>
        <input type="text" name="ten_the_loai" placeholder="Nhập thể loại">

        <button type="submit">Thêm mới</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (
            !empty($_POST["ten_the_loai"]) 
            
        ) {

            $id = $_POST["id"];
            $theloai = $_POST["ten_the_loai"];

            include("connect.php");

            $sql = "INSERT INTO the_loai 
                    (ten_the_loai)
                    VALUES
                    ('$theloai')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: index.php?page_layout=theloai");
                exit;
            } else {
                echo "<p style='color:red;'>Lỗi SQL: " . mysqli_error($conn) . "</p>";
            }

        } else {
            echo "<p style='color:red;'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }
    ?>
</div>

</body>
</html>