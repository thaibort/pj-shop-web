<?php  
	$id = $err = "";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once 'config/connect.php';
		$sql = "DELETE from brand where id = '$id'";
		$rs = mysqli_query($conn,$sql);
		if ($rs == true) {
			header("Location:index.php?module=brand&action=brand");
		}
		else {
			$err = "Không thể xóa";
			header("Location:index.php?module=brand&action=brand&err=$err");
		}
	}
	else {
		header("Location:index.php?module=brand&action=brand");
	}
	mysqli_close($conn);
?>