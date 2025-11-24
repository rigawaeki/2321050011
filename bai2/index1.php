<?php
  //cookie
    #lưu thông tin người dùng
    #dùng cho những thông tin ít quan trọng
    $cookieName ="user";
    $cookieValue ="VanDai";
    
    setcookie($cookieName,$cookieValue,time()+(86400),"/");
    
    if(isset($_COOKIE[$cookieName])){
        echo "cooki đã tồn tại";
    }
    else {
        echo "cooki k tồn tại";
    }
         //session
    #Thông tin đăng nhập, giỏ hàng,....
    session_start();
    $_SESSION["name"] = "Đại vippro";
    
    echo $_SESSION['name'];


?>