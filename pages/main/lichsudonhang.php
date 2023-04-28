<h3>Lịch sử đơn hàng</h3>
<?php
	$id_khachhang = $_SESSION['id_khachhang'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_cart.id_khachhang='$id_khachhang' ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
  	<th>Quản lý</th>
  	<th>Hình thức thanh toán</th>
    <th>Đơn hàng</th>

  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>

    <td>
    <?php if($row['cart_status']==1 && $row['cart_cancel']==''){
    		echo '<a "modules/quanlydonhang/xuly.php?action=new&code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}elseif($row['cart_status']==0){
    		echo 'Đã xem';
    	}
    	?>
    </td>
   	<td>
   		<a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
   	</td>
    <td><?php echo $row[ 'cart_payment'] ?></td>
    <td>
      <form action="pages/main/xulydonhang.php" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng?') && history.back()">
    <input type="hidden" name="code" value="<?php echo $row['code_cart'] ?>">
    <?php if($row['cart_status']==1 && $row['cart_cancel']==''): ?>
      <button type="submit" name="cancel_order">Hủy Đơn hàng</button>
    <?php elseif($row['cart_cancel']=='X'): ?>
      <span>Đã Hủy Đơn Hàng</span>
    <?php endif; ?>
  </form>

<?php
  }
?>    
</table>