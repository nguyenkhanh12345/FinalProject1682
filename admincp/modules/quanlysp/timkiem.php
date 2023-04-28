<!-- <?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
    global $mysqli;
    $sql_timkiem_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($mysqli,$sql_timkiem_sp);

?>
<h3>Từ khoá tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
				<ul class="product_list">
                <?php
                    $i = 0;
                    while($row = mysqli_fetch_array($query_lietke_sp)){
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['tensanpham'] ?></td>
                        <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
                        <td><?php echo $row['giasp'] ?></td>
                        <td><?php echo $row['soluong'] ?></td>
                        <td><?php echo $row['tendanhmuc'] ?></td>
                        <td><?php echo $row['masp'] ?></td>
                        <td><?php echo $row['tomtat'] ?></td>
                        <td><?php if($row['tinhtrang']==1){
                            echo 'Kích hoạt';
                        }else{
                            echo 'Ẩn';
                        } 
                        ?>
                        
                        </td>
                        <td>
                            <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a> 
                        <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a> 
                        </td>
                    
                    </tr>
                    <?php
                    } 
                    ?>
				</ul> -->