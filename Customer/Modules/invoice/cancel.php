<?php  
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "UPDATE invoices set status = 3 where id = '$id'";
		$rs = mysqli_query($conn,$sql);
		if (!$rs) {
			echo 'Lỗi: '.mysqli_error($conn);
		}
		else {
			header("location:index.php?module=invoice&action=history");
		}
	}
?>