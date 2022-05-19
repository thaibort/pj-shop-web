<?php  
	if (isset($_GET['type'])) {
		$_SESSION['type'] = $_GET['type'];
		$type = $_SESSION['type'];
		$sql ="SELECT product.id,name,pic,pri from product
			   INNER JOIN type  ON product.id_type = type.id 
			   INNER JOIN brand  ON product.id_brand = brand.id 
			   where type.name_type = '$type'";
		if (isset($_GET['brand'])) {
			$brand = $_GET['brand'];
			$sql .= " AND brand.name_brand ='$brand'";
		}
		$rs = mysqli_query($conn,$sql);
		$nr = mysqli_num_rows($rs);
		$limit = 12;
		$sotr_type = ceil($nr/$limit);
		if (isset($_GET['page2'])) {
			$page2 = $_GET['page2'];
		}
		else {
			$page2 = 1;
		}
		if ($page2 > $sotr_type) {
			$page2 = $sotr_type;
		}
		if ($page2 < 1) {
			$page2 = 1;
		}
		$offset = ($page2 - 1)* $limit;

		$sql .= " LIMIT $offset,$limit";
		$rs2 = mysqli_query($conn,$sql);
		if (!$rs2) {
			echo 'Lỗi: '.mysqli_error($conn);
		}
	}
	else {
		header("location:index.php?module=Product&action=home");
	}
?>
<?php 
	$title = "THAISTORE";
	require_once 'layout/top.php'; 
?>
<br><br><br>
<style type="text/css">
	#left{
		width: 200px;
		position: absolute;
		float: left;
		top: 250px;
		left: 30px;

	}
	#brand{
		color: black;
	}
	.menu_brand{
		height: 30px;
	}
	.br{
		color: black;
		text-decoration: none;
		float: left;
	}
</style>


<!-- Tất cả sp -->
<table cellspacing="5px;" cellpadding="0">
	<tr>
	<?php  
		if (mysqli_num_rows($rs2) == 0) {
			if ($kw == "") {
				echo '<h1>Không có sản phẩm</h1>';
			}
			else {
				echo '<h1>Ở đây chúng tôi ko bán " '.$kw.' "</h1>';
			}
		}
		$total = mysqli_num_rows($rs2);
		$count = 0;
		while ($count != $total) {
	    	while ($row = mysqli_fetch_assoc($rs2)) {
	    	    $id = $row['id'];
	    	    $name = $row['name'];
		    	echo '<td class="item">';
	    	    	echo "<a id='link' href='index.php?module=Product&action=detail&id=$id&name=$name'><br>";
		    	    	$pic = $row['pic'];
		    	    	echo "<img src='$pic' width='150px' height='150px;'><br>";
		    	    	echo $name.'<br>';
		    	    	echo number_format($row['pri'],0,'','.')." đ";
	    	    	echo '</a>';
		    	echo '</td>';
		    	$count ++;
	    	    if ($count % 4 == 0 && $count < $total) {
	    	    	echo "</tr>";
	    	    	echo "<tr>";
	    	    }
	    	}
		}
	?>
	</tr>
</table>

<!-- Phân trang -->
<table id="page">
	<tr>

		<?php  
			if ($sotr_type > 1 ) {
				$_SESSION['key'] = $kw;
				$key = $_SESSION['key'];
				for ($i = 1; $i <= $sotr_type; $i++) {
					if($page2==$i){
						echo "<td class='page' style='background-color:lawngreen'>";
								echo '<a href="index.php?module=Product&action=list_type&page2='.$i.'&type='.$type.'" class="a">'.$i.'</a>';
						echo '</td>';
					}
					else{
						echo "<td class='page'>";
								echo '<a href="index.php?module=Product&action=list_type&page2='.$i.'&type='.$type.'" class="a">'.$i.'</a>';
						echo '</td>';
					}	
				}
			}
		?>
	</tr>
</table>

<!-- Menu trái -->
<div id="left">
	<h3>Các hãng <?php echo $type; ?></h3><br>
	
	<table id="brand" cellspacing="0" cellpadding="0">
		<tr>
			<td class='menu_brand'>
				<a href="<?php echo "index.php?module=Product&action=list_type&type=$type" ?>" class="br">Tất cả sản phẩm</a>
			</td>
		</tr>
		<tr>
			<?php  
				$sql = "SELECT DISTINCT brand.name_brand from product
						INNER JOIN type  ON product.id_type = type.id 
						INNER JOIN brand  ON product.id_brand = brand.id WHERE type.name_type = '$type'";
				$rs4 = mysqli_query($conn,$sql);
				if (!$rs4) {
					echo 'Lỗi: '.mysqli_error($conn);
				}
				$total = mysqli_num_rows($rs4);
				$count = 0;
				while ($count != $total) {
			    	while ($row = mysqli_fetch_assoc($rs4)) {
						echo "<td class='menu_brand'>";
							$brand1 = $row['name_brand'];
							echo '<a class="br" href="index.php?module=Product&action=list_type&type='.$type.'&brand='.$brand1.'">';
								echo '<span class="text1">';
									echo $row['name_brand'];
								echo '</span>';
							echo '</a>';
						echo "</td>";
				    	$count ++;
			    	    if ($count % 1 == 0 && $count < $total) {
			    	    	echo "</tr>";
			    	    	echo "<tr>";
			    	    }
			    	}
				}
			?>
		</tr>
	</table>
</div>
<?php require_once 'layout/bottom.php'; ?>