<?php
include('../../connect.php');
echo "helo";
$id=$_GET['id'];
echo "$id";
$sql="DELETE FROM `loai_phong` WHERE id=$id";
mysqli_query($conn,$sql);
mysqli_close($conn);
header("Location: ../index.php?page_layout=loaiphong")
?>
