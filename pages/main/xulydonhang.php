<?php
include('../../admincp/config/config.php');
if(isset($_POST['cancel_order'])){
    $code_cart = $_POST['code'];
    $sql_huy = "UPDATE tbl_cart SET cart_cancel='X' WHERE code_cart = '".$code_cart."' ";
    if(mysqli_query($mysqli,$sql_huy)){
      // show cancel notification
      echo '<script>alert("Cập Nhật Thành Công")</script>';
    } else {
      // show error notification
      echo '<script>alert("Cập Nhật Không Thành Công")</script>';
    }
}
// header('Location:../../index.php?quanly=lichsudonhang')
?>