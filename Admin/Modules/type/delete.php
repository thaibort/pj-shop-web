<?php  
	$id = $err = "";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once 'config/connect.php';
		$sql = "DELETE from type where id = '$id'";
		$rs = mysqli_query($conn,$sql);
		if ($rs == true) {
			header("Location:index.php?module=type&action=type");
		}
		else {
			$err = "Không thể xóa";
			header("Location:index.php?module=type&action=type&err=$err");
		}
	}
	else {
		header("Location:index.php?module=type&action=type");
	}
	mysqli_close($conn);
?>