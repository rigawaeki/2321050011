<?php
    include "../../connect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM don_dat WHERE id = $id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../index.php?page_layout=dondat");
?>