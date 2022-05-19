<?php  
	if (!isset($_SESSION['admin']['id'])) {
		header("location:index.php?module=Common&action=login");
	}
?>