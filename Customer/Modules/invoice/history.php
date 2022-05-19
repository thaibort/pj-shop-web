<?php  
	if (!isset($_SESSION['user']['id'])) {
		header("location:index.php");
		die();
	}
?>
<?php  
	$title = "Lịch sử hóa đơn";
	require_once 'layout/top.php'; 
?>
<?php  
	$id_ct = $_SESSION['user']['id'];

	$sql = "SELECT id,date_oder,total,receiver,status from invoices where id_customer = '$id_ct' order by date_oder desc";
	$rs2 = mysqli_query($conn,$sql);
	if (!$rs2) {
		die ('Lỗi: '.mysqli_error($conn));
	}
?>
<style type="text/css">
	table{
		width: 70%;
		margin: 10px;
		font-size: larger;
		background: antiquewhite;
	}
	tr,th{
		height: 30px;
	}
	#content3{
		width: 100%;
		height: 100%;
		/* background: white; */
		margin: auto;
	}
	.ad{
		width: 100%;
		display: block;
		text-decoration: none;
		color: black;
	}
	.ad:hover{
		color: red;
		text-decoration: solid;
	}
	#p{
		margin: 20px 550px 0 0;
	}
	.cancel{
		/* display: none; */
		line-height: 30px;
		width: 15%;
	}
	.cancel a{
		height: 100%;
		display: block;
		width: 100%;
		height: 30px;
		text-decoration: none;
		color: black;
	}
	.hv:hover{
		background: lightgreen;
	}
	.cancel a:hover{
		color: red;
	}
	#li2{
		color: red;
	}
</style>
<br>
<h1>Lịch sử đơn hàng</h1>
<?php require_once 'layout/font.php'; ?>
<?php  
	if (mysqli_num_rows($rs2) == 0) {
		echo '<br><h1>Không có hóa đơn</h1>';
	}
	else {
?>
			<div id="content3">
				<br>
				<h3 id="p">Ấn vào mã để xem chi tiết hóa đơn</h3>
				<table border="1" cellpadding="0" cellspacing="0">
					<th>Mã</th>
					<th>Người đặt</th>
					<th>Ngày đặt</th>
					<th>Tổng giá</th>
					<th colspan ="2">Tình trạng</th>
<?php
			foreach ($rs2 as $row) {
				echo '<tr class="hv">';
					$id5 = $row['id'];
					echo '<td><a class="ad" href="index.php?module=invoice&action=detail&id='.$id5.'">'.$id5.'</a></td>';
					echo '<td>'.$row['receiver'].'</td>';
					echo '<td>'.$row['date_oder'].'</td>';
					echo '<td>'.number_format($row['total'],0,'','.')." đ".'</td>';
					echo '<td>';
						$arrstt = array(0=>"Chưa Duyệt",1=>"Đã Duyệt",2=>"Thành Công",3=>"Đã hủy");
						$stt1 = $arrstt[$row['status']];
						echo $stt1;
					echo '</td>';
					echo '<td class="cancel">';
						$stt = $row['status'];
						if ($stt == 0) {
							echo '<a href="index.php?module=invoice&action=cancel&id='.$id5.'">Hủy đơn</a>';
						}
					echo '</td>';
				echo '</tr>';
			}
?>
				</table>
				<br><br>
			</div>
<?php  
		}
?>
<?php  require_once 'layout/bottom.php'; ?>