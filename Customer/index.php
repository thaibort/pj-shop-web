<?php  

	//Kiểm tra đường dẫn tồn tại hay không
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$module = $action = "";
	if (isset($_GET['module'])) {
		$module = $_GET['module'];
	}
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	if ($module == "" || $action == "") {	
		$module = "Product";
		$action = "home";
	}


	//chuyển hướng đường dẫn
	
	$path = "Modules/$module/$action.php";
	if (file_exists($path)) {
		require_once'config/connect.php';
		require_once'config/session.php';
		require_once($path);
		mysqli_close($conn);
	}
	else {
		$path = "Modules/Common/404.php";
		require_once($path);
	}
?>