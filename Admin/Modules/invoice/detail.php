<?php  
	$kw = "";
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
	$title = "Hóa đơn chi tiết";
	require_once 'layout/top.php';
?>
<style type="text/css">
	#menu2 a{
		background: darkolivegreen;
		color: floralwhite;
		border-left: 2px solid red;
		font-size: large;
	}
	#menu3:hover {
		border-left: 2px solid red;
		color: floralwhite;
		background: darkolivegreen;
		width: 100%;
		transition: ease-in 0.2s;
		-moz-transition: ease-in 0.2s;
		-webkit-transition: ease-in 0.2s;
		font-size: large;
	}
	#menu1:hover {
		border-left: 2px solid red;
		color: floralwhite;
		background: darkolivegreen;
		width: 100%;
		transition: ease-in 0.2s;
		-moz-transition: ease-in 0.2s;
		-webkit-transition: ease-in 0.2s;
		font-size: large;
	}
	#menu4:hover {
		border-left: 2px solid red;
		color: floralwhite;
		background: darkolivegreen;
		width: 100%;
		transition: ease-in 0.2s;
		-moz-transition: ease-in 0.2s;
		-webkit-transition: ease-in 0.2s;
		font-size: large;
	}
	
	textarea{
	 	resize: none;
	 	background: white;
	 	font-size: larger;
	 	border: none;
	}
	#back{
		margin-right: 600px;
	}
	#back a{
		text-decoration: none;
		color: black;
		font-size: large;
		font-weight: bolder;

	}
	#back a:hover{
		color: orangered;
	}
	#list_invoice{
		width: 90%;
		color: black;
		margin: auto;
		margin-top: 50px;
	}
	#tt{
		width: 350px;
		float: left;
		margin-left: 50px;
		background: white;
	}
	#ttkh{
		width: 350px;
		margin: auto;
		margin-top: 20px;
		margin-bottom:  20px;
		border: 5px dotted black;
		padding-left: 20px;
	}
	#ttkh td {
		height: 30px;
	}
	.ttk{
		text-align: left;
		width: 120px;
	}
	.ttdt{
		text-align: left;
	}
	.dc{
		float: left
	}
</style>
<br><br>
<div>
	<h2>Hóa đơn # <?php echo $id_iv; ?></h2><br><br>
	<p id="back"><a href="index.php?module=invoice&action=invoice">< Quay lại lịch sử hóa đơn</a></p>
	<table id="list_invoice" border="1" cellpadding="0" cellspacing="0">
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
		<table id="ttkh" cellspacing="0" cellpadding="0" >
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
<?php  
	require_once 'layout/bot.php';
?>
