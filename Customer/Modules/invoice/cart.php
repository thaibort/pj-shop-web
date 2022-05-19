<?php  
	$id = "";
	if(isset($_GET['delete'])){
		$delete=$_GET['delete'];
		unset($_SESSION['cart'][$delete]);
		header("Location:index.php?module=invoice&action=cart");
	}


	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		if (isset($_SESSION['cart'][$id])) {
			if (isset($_GET['up'])) {
				$_SESSION['cart'][$id] += 1;
			}
			if (isset($_GET['down'])) {
				$_SESSION['cart'][$id] -= 1;
				if ($_SESSION['cart'][$id] < 0) {
					$_SESSION['cart'][$id] = 0;
				}
			}
		}
		else {
			$_SESSION['cart'][$id] = 1;
		}
		header("location:index.php?module=invoice&action=cart");
	}
?>
<?php  
	$title = "Giỏ Hàng";
	require_once 'layout/top.php'; 
?>
<style type="text/css">
	#tb{
		width: 90%;
		margin: auto;
		background: ghostwhite;
		text-align: left;
	}
	#lh{
		margin-top: 20px;
	}
	#atag{
		text-decoration: none;
		color: black;
		font-weight: bolder;
	}
	#atag:hover{
		color: purple;
		text-decoration: auto;
	}
	.tbc{
		padding: 10px 0 30px 20px;
	}
	.btqtt{
		width: 30px;
		height: 30px;
		background: slategrey;
		font-size: x-large;
	}
	#form{
		line-height: 30px;
	}
	.information{
		width: 200px;
		height: 30px;
		background: white;
		margin: auto;
		border: 1px solid black;
	}
	input{
        outline: 0;     
        outline-style: none;     
        outline-width: 0;
        border: none;
        width: 90%;
        height: 70%;
		position: relative;
		bottom: 2px;
	}
	#form{
		border: 1px solid black;
		width: 400px;
		background: ghostwhite;
		margin: auto;
		margin-top: 50px; 
		padding-bottom: 30px;
	}
	.check{
		width: 100px;
		height: 30px;
		border: none;
		background: #353922;
		font-weight: bolder;
		color: white;
	}
	.check:hover{
		background: #98D82C;
		color: black;
	}
	#tt{
		width: 100%;
		height: 100%;
		line-height: 30px;
		display: block;
		text-decoration: none;
		color: white;
	}
	#tt:hover{
		color: black;
	}
	#index{
		color: black;
		text-decoration: none;
	}
	#index:hover{
		color: red;
	}
	.cart{
		padding-bottom: 50px;
	}
	#err{
		color: red;
		font-size: 17px;
		margin: 10px 0 10px 0;
	}
</style>

<div class="cart">
	<h1>Giỏ Hàng</h1><br><br>
	<?php  
		if (count($_SESSION['cart']) <= 0) {
			echo '<h1>Không có sản phẩm trong giỏ hàng</h1><br>';
			echo '<h2><a id="index" href="index.php">Quay lại cửa hàng</a></h2>';
		}
		else {
	?>
		<table cellpadding="0" cellspacing="0" id="tb">
			<tr>
				<th class="tbc">Sản phẩm</th>
				<th class="tbc">Giá</th>
				<th class="tbc">Hãng</th>
				<th class="tbc">Số lượng</th>
				<th class="tbc"></th>
			</tr>
			<?php  
				$total = 0;
				$c=$_SESSION['cart'];
				foreach ($c as $key => $qtt) {
					$sql = "SELECT product.name,product.pic,product.pri,brand.name_brand,type.name_type,product.id as id_product from product
							INNER JOIN brand ON product.id_brand = brand.id
							INNER JOIN type  ON product.id_type = type.id where product.id = $key";
					$rs = mysqli_query($conn,$sql);
					if (!$rs) {
						echo 'Lỗi x: '.mysqli_error($conn);
					}
					else if (mysqli_num_rows($rs) == 1) {
						$row  = mysqli_fetch_assoc($rs);
						$name = $row['name'];
						$pri  = $row['pri'];
						$pic  = $row['pic'];
						$nbr  = $row['name_brand'];
						$nt   = $row['name_type'];
						$id   = $row['id_product'];
						echo '<tr>';
							echo '<td class="tbc">';
								echo "<a id='atag' href='index.php?module=Product&action=detail&id=$id&name=$name'>";
									echo "<img id='lh' src='$pic' width='100px;'><br>";
									echo $name.'<br>';
								echo '</a>';
							echo '</td>';
							echo '<td>'.number_format($pri,0,'','.')." đ".'</td>';
							echo '<td>'.$nbr.'</td>';

							echo '<td>';
								echo "<a href='index.php?module=invoice&action=cart&id=$id&down'><button class='btqtt'> - </button></a>";
								echo '&nbsp;&nbsp;';
								echo $qtt;
								echo '&nbsp;&nbsp;';
								echo "<a href='index.php?module=invoice&action=cart&id=$id&up'><button class='btqtt'> + </button></a>";
							echo '</td>';
							echo '<td>';
								echo "<a href='index.php?module=invoice&action=cart&delete=".$id."'>Xóa</a>";
							echo '</td>';

							$tt1sp = $qtt*$pri;
							$total += $qtt*$pri;
						echo '</tr>';
					}
				}
				echo '<tr>';
					echo '<th class="tbc">Tổng tiền</th>';
					echo "<th style='color:red' class='tbc'>".number_format($total,0,'','.')." đ"."</th>";
				echo '</tr>';
			?>
		</table>
		<?php  
			if (!isset($_SESSION['user']['id'])) {
		?>
				<button class="check">
						<a id="tt" href="index.php?module=Common&action=login&di=1">
							Thanh Toán
						</a>
				</button>
		<?php		
			}
			else {
				$id_ct = $_SESSION['user']['id'];
				$sql = "SELECT name_customer,phone,addr from customer where id = '$id_ct'";
				$rs = mysqli_query($conn,$sql);
				if (!$rs) {
					echo 'Lỗi: '.mysqli_error($conn);
				}
				else if (mysqli_num_rows($rs) == 1) {
					$row = mysqli_fetch_assoc($rs);
					$namecs = $row['name_customer'];
					$phone = $row['phone'];
					$add = $row['addr'];
				}
			?>
				<script type="text/javascript">
					function kt() {
						var vname = document.getElementById('name');
						var name = vname.value;
						var vphone = document.getElementById('phone');
						var phone = vphone.value;
						var vadd = document.getElementById('add');
						var add = vadd.value;
						var verr = document.getElementById('err');
						if (name == "" || phone == "" || add == "") {
							verr.innerHTML = "Không được để trống thông tin";
							return false;
						}
						else{
							return true;
						}
					}
				</script>
				<div id="form">
					<h2 style="text-align: center;">Thông tin thanh toán</h2><br>
					<form method="POST" onsubmit="return kt()" action="index.php?module=invoice&action=checkout&total=<?php echo $total; ?>">
						<div class="information">
							<input type="text" name="name"  id="name"  value="<?php echo $namecs; ?>">
						</div>
						<br>
						<div class="information">
							<input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
						</div>
						<br>
						<div class="information">
							<input type="text" name="add"   id="add"   value="<?php echo $add; ?>">
						</div>
						<br>
						<div id="err"></div>
						<button type="submit" class="check" name="check">Thanh toán</button>
					</form>
				</div>
			<?php
			}
		}
		?>
</div>
<?php  require_once 'layout/bottom.php'; ?>