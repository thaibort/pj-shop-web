<?php  
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		if (isset($_POST['update'])) {
			$tt = $_POST['tt'];
			echo $tt;
			if ($tt == 0) {
				$sql = "UPDATE invoices set status = 0 where id = $id";
			}
			else if ($tt == 1) {
				$sql = "UPDATE invoices set status = 1 where id = $id";
			}
			else if ($tt == 2) {
				$sql = "UPDATE invoices set status = 2 where id = $id";
			}
			else if ($tt == 3) {
				$sql = "UPDATE invoices set status = 3 where id = $id";
			}
			else {
				header("location:index.php?module=invoice&action=invoice");
			}
			$rs = mysqli_query($conn,$sql);
			if (!$rs) {
				header("location:index.php?module=invoice&action=invoice");
			}
			else {
				header("location:index.php?module=invoice&action=invoice");
			}
		}
	}
	else {
		header("location:index.php?module=invoice&action=invoice");
	}
?>