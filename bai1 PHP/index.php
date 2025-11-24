<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //1. in ra màn hình
        // echo "Hello world!! <br>";
        
        // echo"hi ";
        // //2. biến
        // // cú pháp: # + tên biến = giá trị của biến
        // $ten = "Văn Đại";
        // $tuoi = "20 ";
        // echo $ten . " " . $tuoi . "<br>";
        // //3. Hằng
        // define("soPi","3.14");
        // echo soPi . "<br>";


        // //4. phân biệt '' và ""
        // echo '$ten' . "<br>" ;
        // echo "$ten"  . "<br>";
        // //5. chuỗi
        // #5.1 kiểm tra đọ dài của chuỗi
        // echo strlen($ten) . "<br>";
        // #5.2 đêm số từ
        // echo str_word_count($ten) . "<br>";
        // #5.3 tìm kiếm kí tự trong chuỗi
        // echo strpos($ten,"i"). "<br>";
        // #5.4 thay thế kí tự trong chuỗi
        // echo str_replace("Đại", "Vở", $ten). "<br>";
        // //6. toán tử
        // #6.1 
        // $soThuNhat = 10;
        // $soThuHai = 5;
        // #phép cộng
        // echo $soThuNhat + $soThuHai. "<br>";
        // #phép trừ
        // echo $soThuNhat - $soThuHai. "<br>";
        // #phép nhân 
        // echo $soThuNhat * $soThuHai. "<br>";
        // #phép chia
        // echo $soThuNhat / $soThuHai. "<br>";
        // # += -= *= /= %=
        // // echo $soThuNhat %= $soThuHai. "<br>";
        // #so sánh == !=  < > >= <= ===;
        // echo $soThuNhat > $soThuHai. "<br>";
        // // 7. câu điều kiện
        // // if("điều kiện"){
        // //     logic
        // // }
        // // elseif("điều kiện"){
        // //     logic
        // // }
        // // else{
        // //     logic
        // // }
        // // kiểm tra tỏng số thứ nhất và số thứ 2
        // // nếu nhỏ hơn 15 thì in nhỏ hơn 15
        // // nếu bằng 15 thì in ra tông rbanwgf 15
        // // còn lại in 15
        // if(($soThuNhat+$soThuHai)<15){
        //     echo "nhỏ hơn 15<br>";
        // }elseif(($soThuNhat+$soThuHai)==15){
        //     echo "tổng bằng 15<br>";
        // }else{
        //     echo "lớn hơn 15<br>";
        // }
        // // 8.switch case
        // $color ="red";
        // switch($color){
        //     case"red";
        //         echo "is RED <br>";
        //         break;
        //     case"blue";
        //         echo "is blue <br>";
        //         break;
        //     default:
        //         echo "no color";
        //         break;
        // }
        // //9.For
        // for ($i=0; $i < 10 ; $i++) { 
        //     echo $i . "<br>";
        // }
        // //10.mảng 
        // $mang = ["an","nhật anh","vũ anh","đại vip pro"];
        
        // // đếm phần tử
        // echo count($mang) . "<br>";
        // echo $mang[3] . "<br>";
        // print_r($mang);
        // $mang[0]= "hai anh";
        // print_r($mang);
        // $mang[]= "adu vip";
        // print_r($mang);
        // #xóa
        // unset($mang[4]);
        // print_r($mang);

        # Sắp xếp 
        $mang = ["C","A","B","R","S",]
        print_r($mang);
        echo "<br>";
        #sx tang
        sort($mang);
        print_r($mang);
        #sx giam
        rsort($mang)
        print_r($mang);



    ?>
</body>
</html>