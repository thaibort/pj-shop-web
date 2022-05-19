<?php  
	if (isset($_GET['brand'])) {
		$_SESSION['brand'] = $_GET['brand'];
		$brand = $_SESSION['brand'];
		$sql ="SELECT product.id,name,pic,pri from product
			   INNER JOIN brand  ON product.id_brand = brand.id 
			   where name_brand = '$brand'";
		$rs = mysqli_query($conn,$sql);
		$nr = mysqli_num_rows($rs);
		$limit = 12;
		$sotr_brand = ceil($nr/$limit);
		if (isset($_GET['page1'])) {
			$page1 = $_GET['page1'];
		}
		else {
			$page1 = 1;
		}
		if ($page1 > $sotr_brand) {
			$page1 = $sotr_brand;
		}
		if ($page1 < 1) {
			$page1 = 1;
		}
		$offset = ($page1 - 1)* $limit;

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
	$title = "BKC";
	require_once 'layout/top.php'; 
?>
<br><br><br>


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
			if ($sotr_brand > 1 ) { 
				$_SESSION['key'] = $kw;
				$key = $_SESSION['key'];
				for ($i = 1; $i <= $sotr_brand; $i++) {
					if($page1==$i){
						echo "<td class='page' style='background-color:lawngreen'>";
								echo '<a href="index.php?module=Product&action=list_brand&page1='.$i.'&brand='.$brand.'" class="a">'.$i.'</a>';
						echo '</td>';
					}
					else {
						echo "<td class='page'>";
								echo '<a href="index.php?module=Product&action=list_brand&page1='.$i.'&brand='.$brand.'" class="a">'.$i.'</a>';
						echo '</td>';
					}
				}
			}
		?>
	</tr>
</table>
<!-- Kết thúc phân trang -->
<?php require_once 'layout/bottom.php'; ?>