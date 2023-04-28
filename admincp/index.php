<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admincp</title>
	<link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">    
</head>
<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
 	header('Location:login.php');
 }
?>
<body>
	<h3 class="title_admin">Sever Admin</h3>
	<div class="wrapper">
	<?php 
			include("config/config.php");
			include("modules/header.php");
			include("modules/menu.php");
			include("modules/main.php");
			include("modules/footer.php");
	?>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		CKEDITOR.replace('thongtinlienhe');
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
    </script>
    <script type="text/javascript">
   	$(document).ready(function(){
   		thongke();
	    var char = new Morris.Area({
		
		  element: 'chart',
		
		  xkey: 'date',
		 
		  ykeys: ['date','order','sales','quantity'],
		
		  labels: ['Năm','Doanh thu','Số lượng bán ra','Số lượng']
		});

		$('.select-date').change(function(){
            var thoigian = $(this).val();
            if(thoigian=='7ngay'){
                var text = '7 ngày qua';
            }else if(thoigian=='28ngay'){
                var text = '28 ngày qua';
            }else if(thoigian=='90ngay'){
                var text = '90 ngày qua';
            }else{
                var text = '365 ngày qua';
            }

             $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
        })
		 function thongke(){
                var text = '365 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
            }
	});
    </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    <?php
    include('../admincp/config/config.php');
     $sql_soluongmua = "SELECT tensanpham, SUM(soluongmua) as total_sales FROM tbl_cart_details GROUP BY id_sanpham ORDER BY total_sales DESC";
     $query_soluongmua = mysqli_query($mysqli,$sql_soluongmua);
     $data = [];
     while ($row = mysqli_fetch_array($query_soluongmua)){
        $data[] = $row;
     }
    ?>
  // Check if current URL matches desired page
    if (window.location.href.indexOf("http://localhost/webbanhoaqua/admincp/index.php") > -1) {
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['tensanpham', 'total_sales'],
          <?php
          foreach($data as $key ){
            echo "['" . $key['tensanpham'] ."', ". $key['total_sales'] ."],";
          }
          ?>
        ]);

        var options = {
            title: 'Statistics of the number of best-selling products',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
        }
    }
    </script>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

</body>
</html>