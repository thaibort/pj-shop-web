<?php  
	if (!isset($_GET['id']) || !isset($_GET['name'])) {
		header("location:index.php?module=Product&action=home");
	}
?>
<?php  
	$name1 = $_GET['name'];
	$title = $name1;
	require_once 'layout/top.php'; 
?>
<style type="text/css">
	a{
		text-decoration: none;
		color: black;
	}
	#imgp{
		width: 300px; 
		display: inline-block;
		margin-top: 20px;
	}
	#product{
		width: 80%;
		background:rgba(255, 255, 255, 1.0);
		margin: auto;
		margin-top: 50px;
		padding-bottom: 50px;
	}
	#product_information{
		display: inline-block;
		text-align: left;
		line-height: 35px;
		margin-top: 20px;
	}
	#nut{
		width: 100px;
		height: 40px;
		background: #353922;
		color: white;
		border: none;
        outline: 0;     
        outline-style: none;     
        outline-width: 0;
        font-weight: bolder;
        display: block;
        text-align: center;
        font-weight: bolder;
        font-size: large;
        transition: 0.3s;
	}
	#nut:hover{
		background: lawngreen;
		color: black;
	}
	#cl{
		width: 500px;
		line-height: 50px;	
	}
	.di{
		width: 200px;
		height: 50px;
		margin: 10px;
		background: rgb(255, 231, 250);
		border: 2px solid red;
		color: orangered;
		line-height: 40px;
		text-align: center;
		font-size: larger;
		font-weight: bolder;
	}
	#click{
		border: none;
		line-height: 40px;
	}
</style>
<script type="text/javascript">
	function tc() {
		alert("Thêm thành công vào giỏ hàng");
	}
</script>
<div id="product">
	<table>
		<tr>
			<?php  
				$id1 = $name2 = $row = "";
				$name2 = $_GET['name'];
				if (isset($_GET['id'])) {
					$id1 = $_GET['id'];
					$sql1 = "SELECT * from product 
							INNER JOIN brand
							ON product.id_brand = brand.id
							INNER JOIN type 
							ON product.id_type = type.id where product.id = $id1 and product.name = '$name2'";
					$rs = mysqli_query($conn,$sql1);
					if (!$rs) {
						echo 'Lỗi: '.mysqli_error($conn);
						mysqli_close($conn);
					}
					else {
						if (mysqli_num_rows($rs) < 1) {
							echo '<script type="text/javascript">window.location.replace("index.php");</script>';
							// header("location:index.php?module=Product&action=home");
						}
						else {
							$row = mysqli_fetch_assoc($rs);
						}
					}

				}
			?>
			<td id="cl">
				<img id="imgp" src="<?php echo $row['pic']; ?>" alt="<?php echo $row['name'] ?>" title="<?php echo $row['name'] ?>">
			</td>
			<td id="product_information">
				<h1> <?php echo $row['name']; ?> </h1>
				<h4>Giá: <?php echo number_format($row['pri'],0,'','.')." đ"; ?></h4>
				<h4>Hãng: <?php echo $row['name_brand']; ?> </h4>
				<ul>
					<h4> Thông tin sản phẩm: </h4>
					<li>
						<?php echo $row['dess']; ?><br>
					</li>
				</ul>
				<?php  
				$stt = $row['status'];
					if ($stt == 0) {
						echo '<div class="di">Sản phẩm đã hết hàng</div>';
					}
					else if ($stt == 2) {
						echo '<div class="di">Sản phẩm sắp bán</div>';
					}
					else if ($stt == 3) {
						echo '<div class="di">Sản phẩm ngừng bán</div>';
					}
					else{
						echo '<button id="click" onclick="tc()">';
							echo '<a id="nut" href="index.php?module=invoice&action=cart&id='.$id1.'&up">Chọn Mua</a>';
						echo '<button>';
					}
				?>
			</td>
		</tr>
	</table>
</div>
<?php require_once 'layout/bottom.php'; ?>