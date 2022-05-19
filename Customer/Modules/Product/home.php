<?php 
	$sql = "SELECT id,name,pic,pri from product";
	$title = "BKC";
	require_once 'layout/top.php'; 
?>
<br><br><br>
<style type="text/css">
	<?php  
		if ($_GET['page'] == $count) {
			echo '#nb{background: powderblue;}';
		}
	?>
	
</style>
<!-- Tất cả sp -->
<table cellspacing="5px;" cellpadding="0">
	<tr>
	<?php  
		if (mysqli_num_rows($rs1) == 0) {
			if ($kw == "") {
				echo '<h1>Không có sản phẩm</h1>';
			}
			else {
				echo '<h1>Ở đây chúng tôi ko bán " '.$kw.' "</h1>';
			}
		}
		$total = mysqli_num_rows($rs1);
		$count = 0;
		while ($count != $total) {
	    	while ($row = mysqli_fetch_assoc($rs1)) {
	    	    $id = $row['id'];
	    	    $name = $row['name'];
		    	echo '<td class="item">';
	    	    	echo "<a id='link' href='index.php?module=Product&action=detail&id=$id&name=$name'><br>";
		    	    	$pic = $row['pic'];
		    	    	echo "<img src='$pic' width='150px' height='150px;' class='mx-auto'><br>";
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
			$_SESSION['key'] = $kw;
			$key = $_SESSION['key'];
			$count = 0;
			for ($i = 1; $i <= $sotr; $i++) {
				if ($sotr > 1 ) {
					if($page==$i){
						echo "<td class='page' style='background-color:lawngreen'>";
								$count ++;
							echo '<a href="?page='.$i.'&kw='.$key.'&a" class="a">'.$i.'</a>';
					echo '</td>';
					}
					else {
						echo "<td class='page'>";
								$count ++;
							echo '<a href="?page='.$i.'&kw='.$key.'&a" class="a">'.$i.'</a>';
					echo '</td>';
					}
				}
			}
		?>
	</tr>
</table>
<?php require_once 'layout/bottom.php'; ?>