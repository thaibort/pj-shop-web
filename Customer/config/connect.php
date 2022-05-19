<?php  
	$conn = mysqli_connect("localhost","root","","project_1");
	mysqli_set_charset($conn, 'UTF8');
	if (!$conn) {
		die("Lỗi: ".mysqli_connect_error());
	}
?>