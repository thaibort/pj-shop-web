<?php  
	$kw = "";
	$sql = "SELECT id as id_product,name,pic,pri,status from product";
	if (isset($_POST['but2'])) {
		$kw = trim($_POST['kw']);
		$sql = "SELECT *, product.id as id_product from product
				INNER JOIN brand ON product.id_brand = brand.id
				INNER JOIN type  ON product.id_type = type.id 
				where product.name like '%$kw%' or brand.name_brand like '%$kw%' or type.name_type like '%$kw%' or product.id like '%$kw%'";
	}
	$rs1 = mysqli_query($conn,$sql);
	$nr = mysqli_num_rows($rs1);
	$limit = 12;
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
	$title = "Danh sách sản phẩm";
	require_once 'layout/top.php';
?>
<style type="text/css">
	#tong2{
		width: 100%;
	}
	#menu1 a{
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
	#menu2:hover {
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
	#ds{
		width: 90%;
		margin: auto;
		margin-top: 50px;
		text-align: center;
	}
	#taga{
		text-decoration: none;
		color: royalblue;
		font-weight: bold;
	}
	#taga:hover{
		color: darkblue;
	}
	#taga2{
		text-decoration: none;
		color: indianred;
		font-weight: bold;
	}
	#taga2:hover{
		color: red;
	}
	tr{
		height: 30px;
	}
	td{
		height: 30px;
	}
	#a{
		color: black;
		font-size: 20px;
		text-decoration: none;
		position: relative;
		top: 40px;
		left: -350px;
	}
	#a:hover{
		color: red;
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
	.a{
		display: block;
		width: 100%;
		text-decoration: none;
		color: black;
	}
</style>
<?php  
	if (isset($_GET['err'])) {
		echo '<script type="text/javascript">';
			echo "alert('không xóa nổi sản phẩm');";
		echo '</script>';
	}
?>

<div id="tong2">
	<h1>Danh sách sản phẩm</h1>
	<!-- Thêm sản phẩm -->
	<a id="a" href="index.php?module=Product&action=insert&page=<?php echo $page ?>"><i class="fa fa-plus-circle"></i>Thêm sản phẩm</a>

	<!-- Danh sách sản phẩm -->
	<table id="ds" cellpadding="0" cellspacing="0" border="1">
		<tr>
			<th>Mã</th>
			<th>Sản phẩm</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th colspan="2">Chỉnh sửa</th>
		</tr>
		<?php  
			if (mysqli_num_rows($rs) == 0) {
				echo '<th colspan="6">Không có hàng trong danh sách</th>';
			}
			else {
				foreach ($rs as $row) {
					echo '<tr>';
						$id8 = $row['id_product'];
						echo '<td>'.$id8.'</td>';
						echo '<td><br>'.$row['name'].'<br>';
							$url=$row['pic'];
							echo "<img src='$url' width='180px;' style='padding:10px;'><br>";
						echo '</td>';
						echo '<td>'.number_format($row['pri'],0,'','.')." đ".'</td>';
						echo '<td>';
							$stt = array(0=>"Hết hàng",1=>"Có hàng",2=>"Sắp có",3=>"Ngừng bán");
							$st = $row['status'];
							echo $stt[$st];
						echo '</td>';
						echo '<td>';
							echo '<a id="taga" href="index.php?module=Product&action=edit&id='.$id8.'&page='.$page.'"><i class="fa fa-edit"></i>Edit</a>';
						echo '</td>';
						echo '<td>';
							echo '<a id="taga2" href="index.php?id='.$id8.'&page='.$page.'&module=Product&action=delete"><i class="fa fa-trash"></i>Delete</a>';
						echo '</td>';
					echo '</tr>';
				}
			}
		?>
	</table>
	<table id="page">
		<tr>
			<?php  
				$_SESSION['key'] = $kw;
				$key = $_SESSION['key'];
				for ($i = 1; $i <= $sotr; $i++) {
					if ($sotr > 1 ) {
						if($page==$i){
							echo "<td class='page' style='background-color:lawngreen'>";
								echo '<a href="index.php?module=Product&action=list&page='.$i.'&kw='.$key.'" class="a">'.$i.'</a>';
							echo '</td>';
						}
						else{
							echo "<td class='page'>";
								echo '<a href="index.php?module=Product&action=list&page='.$i.'&kw='.$key.'" class="a">'.$i.'</a>';
							echo '</td>';
						}
					}
				}
			?>
		</tr>
	</table>
</div>	
<?php  
	require_once 'layout/bot.php';
?>

