<?php  
	$id = "";
	$page = $_GET['page'];
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once 'config/connect.php';
		$sql = "DELETE from product where id = '$id'";
		$rs = mysqli_query($conn,$sql);
		if ($rs == true) {
			header("Location:index.php?module=Product&action=list&page=$page");
		}
		else {
			header("Location:index.php?module=Product&action=list&err=1&page=$page");
		}
	}
	else {
		header("Location:index.php?module=Product&action=list&page=$page");
	}
	mysqli_close($conn);
?>