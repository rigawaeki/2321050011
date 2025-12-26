<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        a {
            text-decoration: none;
            color: white;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        ul {
            list-style: none;
            display: flex;
            gap: 30px;
            padding: 0 0;
        }

        header nav {
            display: flex;
            justify-content: space-between;
            width: 60%;
            align-items: center;
            display: flex;
            margin: 0 auto;
            padding: -5px;     
        }

        header {
            background-color: blue;
            padding: 0;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }

        main {
            width: 60%;
            height: 100%;
            margin:80px auto;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        th {
        background: #1E3A8A;
        color: white;
        padding: 12px;
        text-align: left;
        }

        td {
        padding: 10px 12px;
        border-bottom: 1px solid #E5E7EB;
        }

        tr:nth-child(even)  {
        background: #F9FAFB;
        }
        /* dòng CHẴN */

        h1{
            text-decoration: underline;
            color: rgb(13, 13, 142);
        }
        .sua {
            background-color: blue;
        }
        .them{
            background-color: rgb(13, 13, 142);

        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("location: login.php");
    }
    ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php?page_layout=trangchu">Trang chủ</a></li>
                <li><a href="index.php?page_layout=nguoidung">Quản lý người dùng</a></li>
                <li><a href="index.php?page_layout=phong">Quản lý phòng</a></li>
                <li><a href="index.php?page_layout=dondat">Quản lý đơn đặt</a></li>
                <li><a href="index.php?page_layout=loaiphong">Quản lý loại phòng</a></li>
            </ul>
            <ul>
                <li ><?php echo "Xin chào " . $_SESSION["username"]; ?></li>
                <li><a href="index.php?page_layout=dangxuat">Đăng xuất</a></li>
            </ul>
        </nav>


    </header>
    <main>

        <?php
        if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'trangchu':
                    include "trangchu.php";
                    break;
                case 'nguoidung':
                    include "./nguoidung/nguoidung.php";
                    break;
                case 'themnguoidung':
                    include "./nguoidung/them.php";
                    break;
                case 'suanguoidung':
                    include "./nguoidung/sua.php";
                    break;
                case 'phong':
                    include "./phong/phong.php";
                    break;
                case 'themphong':
                    include "./phong/them.php";
                    break;
                case 'suaphong':
                    include "./phong/sua.php";
                    break;
                case 'dondat':
                    include "./dondat/dondat.php";
                    break;
                case 'themdondat':
                    include "./dondat/them.php";
                    break;
                case 'suadondat':
                    include "./dondat/sua.php";
                    break;
                case 'loaiphong':
                    include "./loaiphong/loaiphong.php";
                    break;
                case 'themloaiphong':
                    include "./loaiphong/them.php";
                    break;
                case 'sualoaiphong':
                    include "./loaiphong/sua.php";
                    break;
                case 'timkiemdondat':
                    include "./dondat/timkiemdondat.php";
                    break;
            }
        } else {
            include 'trangchu.php';
        }
        ?>
    </main>
</body>

</html>