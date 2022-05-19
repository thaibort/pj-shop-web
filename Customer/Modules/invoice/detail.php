<?php  
	if (!isset($_GET['id'])) {
		header("location:index.php");
	}
	$id_iv = $_GET['id'];

	$sql = "SELECT product.name,product.pic,product.pri,invoices_details.quantity,invoices_details.id_invoices from product 
			inner join invoices_details on invoices_details.id_product = product.id 
			where invoices_details.id_invoices = '$id_iv'";
	$rs6 = mysqli_query($conn,$sql);
	if (!$rs6) {
		die('Lỗi: '.mysqli_error($conn));
	}
?>
<?php  
	$title = "Chi tiết hóa đơn";
	require_once 'layout/top.php'; 
?>
<style type="text/css">
	#list{
		width: 60%;
		margin: auto;
		background: antiquewhite;
		float: left;
		margin-left: 50px;
	}
	.td{
		height: 30px;
	}
	.ttsp{
		height: 150px;
	}
	.sp{
		text-align: left;
		margin-left: 20px;
	}
	#tt{
		width: 350px;
		float: left;
		margin-left: 50px;
		background: white;
	}
	#ttkh{
		width: 300px;
		margin: auto;
		margin-top: 20px;
		margin-bottom:  20px;
	}
	#ttkh td {
		height: 30px;
	}
	.ttk{
		text-align: left;
		width: 100px;
	}
	.ttdt{
		text-align: left;
	}
	textarea{
	 	resize: none;
	 	background: white;
	 	font-size: larger;
	 	border: none;
	}
	.dc{
		vertical-align: 0;
	}
	#q{
		margin: 0 950px 10px 0;
	}
	#q a{
		text-decoration: none;
		color: black;
		font-size: large;
		font-weight: bolder;
	}
	#q a:hover{
		color: orangered;
	}
</style>
<br><br>
<div>
	<h2>Hóa đơn # <?php echo $id_iv; ?></h2><br><br>
	<p id="q"><a href="index.php?module=invoice&action=history">< Quay lại lịch sử hóa đơn</a></p>
	<table id="list" border="1" cellpadding="0" cellspacing="0">
		<tr>
			<th class="td">Sản phẩm</th>
			<th class="td">Số lượng</th>
			<th class="td">giá</th>
		</tr>
		<?php  
			if (mysqli_num_rows($rs6) == 0) {
				echo "<h1>Hóa đơn trống</h1>";
			}
			else {
				foreach ($rs6 as $row) {
					echo '<tr>';
						echo '<td class="ttsp">';
							echo '<div class="sp">';
								echo "<img src='".$row['pic']."' width='100px'>";
								echo "<p>".$row['name']."</p>";
							echo '</div>';
						echo '</td>';
						echo '<td class="ttsp">'.$row['quantity'].'</td>';
						echo '<td class="ttsp">'.number_format($row['pri'],0,'','.')." đ".'</td>';
					echo '</tr>';
				}
			}
		?>
	</table>
	<div id="tt">
		<table id="ttkh" cellspacing="0" cellpadding="0">
			<?php  
				$sql = "SELECT receiver,phone,addr from invoices where id = '$id_iv'";
				$rs7 = mysqli_query($conn,$sql);
				if (!$rs7) {
					die('Lỗi: '.mysqli_error($conn));
				}
				else {
					$row = mysqli_fetch_assoc($rs7);
					$name = $row['receiver'];
					$phone = $row['phone'];
					$add = $row['addr']; 
				}
			?>
			<tr>
				<td class="ttk">Người đặt :</td>
				<td class="ttdt"> <?php echo $name; ?> </td>
			</tr>
			<tr>
				<td class="ttk">Số điện thoại :</td>
				<td class="ttdt"> <?php echo $phone; ?> </td>
			</tr>
			<tr>
				<td class="ttk dc">Địa chỉ :</td>
				<td class="ttdt"><textarea cols="00" rows="3" disabled><?php echo $add; ?></textarea></td>
			</tr>
		</table>
	</div>
</div>
<?php  require_once 'layout/bottom.php'; ?>