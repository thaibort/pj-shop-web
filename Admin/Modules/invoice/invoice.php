<?php  
	$kw = "";
	$sql = "SELECT * from invoices";
	if (isset($_POST['but2'])) {
		$kw = trim($_POST['kw']);
		$sql = "SELECT * from invoices where receiver like '%$kw%' or id like '%$kw%'";
	}
	if (isset($_POST['nut3'])) {
		$but = $_POST['select'];
		if ($but == 4) {
			$sql = "SELECT * from invoices";
		}
		else if ($but == 0) {
			$sql = "SELECT * from invoices where status = 0";
		}
		else if ($but == 1) {
			$sql = "SELECT * from invoices where status = 1";
		}
		else if ($but == 2) {
			$sql = "SELECT * from invoices where status = 2";
		}
		else if ($but == 3) {
			$sql = "SELECT * from invoices where status = 3";
		}
		else{
			$sql = "SELECT * from invoices group by date_oder desc";
		} 
	}
	$rs1 = mysqli_query($conn,$sql);
	$nr = mysqli_num_rows($rs1);
	$limit = 30;
	$sotr = ceil($nr/$limit);
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	else {
		$page = 1;
	}
	if ($page > $sotr) {
		$page = $sotr;
	}
	if ($page < 1) {
		$page = 1;
	}
	$offset = ($page - 1)* $limit;

	$sql .= " LIMIT $offset,$limit";
	$rs = mysqli_query($conn,$sql);
	if (!$rs) {
		echo 'Lỗi: '.mysqli_error($conn);
	}

?>
<?php  
	$title = "Quản lí hóa đơn";
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
	#inv{
		width: 80%;
		margin: auto;
		margin-top: 10px;
		font-size: larger;
		background: ghostwhite;
	}
	tr,th{
		height: 30px;
	}
	
	.hv:hover{
		background: yellowgreen;
		color: brown;
	}
	.ad{
		width: 100%;
		height: 100%;
		display: block;
		line-height: 28px;
		text-decoration: none;
		color: black;
	}
	.td:hover{
	}
	.td:hover .ad{
		
		background: blueviolet;
		color: gold;
	}
	h3{
		display: inline;
	}
	#page{
		margin: auto;
		margin-top: 50px;
	}
	table .page{
		border: 1px solid darkviolet;
		border-collapse: collapse;
		width: 30px;
	}
	.ttl{
		width: 60%;
		height: 28px;
		border: none;
		float: left;
		outline: 0;     
        outline-style: none;     
        outline-width: 0;
	}
	.ttr{
		width: 40%;
		height: 28px;
		border: none;
		outline: 0;     
        outline-style: none;     
        outline-width: 0;
	}
	.hv:hover .ttl{
		background: yellowgreen;
		color: brown;
	}
	.hv:hover .ttr{
		background: yellowgreen;
		color: brown;
	}
	.ttr:hover{
		background: blueviolet !important;
		color: gold !important;
	}
</style>
<div>
	<h1>Danh sách hóa đơn</h1>
	<br><br>
	<form method="POST">
		<div>
			<h3>Sắp xếp theo :</h3>
			<select name="select">
				<option value="4">Tất cả</option>
				<option value="0">Chưa duyệt</option>
				<option value="1">Đang giao</option>
				<option value="2">Đã giao</option>
				<option value="3">Bị hủy</option>
				<option value="5">Gần đây</option>
			</select>
			<button type="submit" name="nut3">Sắp xếp</button>
		</div>
	</form>
	<?php  
		if (mysqli_num_rows($rs) == 0) {
			echo '<h1>Không có hóa đơn</h1>';
		}
		else {
	?>
	<table border="1" cellpadding="0" cellspacing="0" id="inv">
		<th>Mã</th>
		<th>Người đặt</th>
		<th>Ngày đặt</th>
		<th>Tổng giá</th>
		<th colspan="2">Tình trạng</th>
		<?php
				foreach ($rs as $row) {
					echo '<tr class="hv">';
						$id5 = $row['id'];
						echo '<td class="td"><a class="ad" href="index.php?module=invoice&action=detail&id='.$id5.'">'.$id5.'</a></td>';
						echo '<td>'.$row['receiver'].'</td>';
						echo '<td>'.$row['date_oder'].'</td>';
						echo '<td>'.number_format($row['total'],0,'','.')." đ".'</td>';
						echo '<td>';
							$arrstt = array(0=>"Chưa Duyệt",1=>"Đang giao",2=>"Đã giao",3=>"Đã hủy");
							echo $arrstt[$row['status']];
						echo '</td>';
						echo '<td class="stt">';
		?>
							<form method="POST" action="index.php?module=invoice&action=status&id='<?php echo $id5 ; ?>'">
								<select name="tt" class="ttl">
									<option value="4">Mặc định</option>
									<option value="0">Chưa duyệt</option>
									<option value="1">Đang giao</option>
									<option value="2">Đã giao</option>
									<option value="3">Bị hủy</option>
								</select>
								<button type="submit" name="update" class="ttr">cập nhật</button>
							</form>
		<?php
						echo '</td>';
					echo '</tr>';
				}
			}
		?>
	</table>
	<br><br>
	<table id="page">
		<tr>
			<?php  
				$_SESSION['key'] = $kw;
				$key = $_SESSION['key'];
				for ($i = 1; $i <= $sotr; $i++) {
					if ($sotr > 1 ) {
						echo '<td class="page">';
								echo '<a href="index.php?module=Product&action=list&page='.$i.'&kw='.$key.'" class="a">'.$i.'</a>';
						echo '</td>';
					}
				}
			?>
		</tr>
	</table>
</div>
<?php  
	require_once 'layout/bot.php';
?>
