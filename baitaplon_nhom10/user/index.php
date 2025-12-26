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

        }

        ul {
            list-style: none;
            display: flex;
            gap: 30px;
            padding: 0 40px;
        }

        header nav {
            display: flex;
            justify-content: space-between;
        }

        header {
            background-color: blue;
            padding: 0;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
        }

        main {
            width: 95%;
            height: auto;
            margin: 100px auto;
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
                <li><a href="index.php?page_layout=xemphong">Xem phòng</a></li>
                <li><a href="index.php?page_layout=phongdadat">Phòng đã đặt</a></li>
            </ul>
            <ul>
                <li><?php echo "Xin chào " . $_SESSION["username"]; ?><br><a>Hạng</a></li>
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
                case 'xemphong':
                    include "xemphong.php";
                    break;
                case 'phongdadat':
                    include "phongdadat.php";
                    break;
                case 'datphong':
                    include "datphong.php";
                    break;
                case 'huylich':
                    include "huylich.php";
                    break;
                case 'sualich':
                    include "sualich.php";
                    break;
                
            }
        } else {
            include 'trangchu.php';
        }


        ?>
    </main>
</body>

</html>